<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public function scopeActive(Builder $query)
    {
        return $query->where('active', 1);
    }

    public function detail()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function country() {
        return $this->hasOneThrough(Country::class, UserDetail::class, 'citizenship_country_id', 'id');
    }

}
