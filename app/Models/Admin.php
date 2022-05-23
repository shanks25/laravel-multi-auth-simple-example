<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = "admins";

    protected $guard = 'admin';

    protected $fillable = [
        'user_name', 'email', 'password',
    ];
    protected $dates = ['created_at'];
}
