<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function country() {
        return $this->hasOneThrough(Country::class, UserDetail::class);
    }

    public function details() {
        return $this->hasOne(UserDetail::class);
    }
}
