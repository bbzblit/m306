<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, HasUuids, SoftDeletes; # Because incremented IDs suck

    protected $table = 'users';

    protected $fillable = [
        "first_name",
        "last_name",
        'email',
        'password',
    ];

    protected $hidden = [
        "last_login_at",
        "created_at",
        "updated_at",
        'password',
        "deleted_at",
        "remember_token",
    ];
}
