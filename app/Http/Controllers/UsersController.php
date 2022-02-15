<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller
{
    public function usersByCountry(string $countryCode = null) {
        $query = User::query();

    }
}
