<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

        protected $guard = 'admins';

        protected $fillable = [
            'username', 'name', 'profile_image', 'phone'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
}
