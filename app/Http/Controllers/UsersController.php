<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDetailsRequest;
use App\Models\User;
use App\Models\UserDetail;

class UsersController extends Controller
{

    public function usersByCountry(string $countryCode = null)
    {
        $query = User::active()->has('detail')->with('detail.country')->get();
        if (isset($countryCode)) {
            // Could be improved with the query builder as well.
            $query = $query->filter(function ($user) use ($countryCode) {
                $countryCode = strtoupper($countryCode);
                return $user->detail->country && ($user->detail->country->iso2 == $countryCode || $user->detail->country->iso3 == $countryCode);
            });
        }

        return response()->json(['data' => $query]);
    }

    public function updateUser(UserDetailsRequest $request, User $user)
    {
        if (!$user->detail) {
            return response()->json('No details stored for this user yet', 400);
        }

        $user->detail()->update($request->validated());

        return response()->json(['data' => 'OK']);
    }

    public function deleteUser(User $user)
    {
        if ($user->detail) {
            return response()->json('Not possible to delete user with details saved',
                400);
        }

        $user->delete();

        return response()->json(['data' => 'OK']);
    }

}
