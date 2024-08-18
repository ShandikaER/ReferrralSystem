<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'referral_code',
        'points',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function referrals(): HasMany
    {
        return $this->hasMany(Referral::class);
    }

    public function points(): HasMany
    {
        return $this->hasMany(Point::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}
