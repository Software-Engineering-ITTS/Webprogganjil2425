<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    // Mendefinisikan atribut yang dapat diisi secara massal
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Atribut yang disembunyikan saat serialisasi model
    protected $hidden = [
        'password', // Menyembunyikan password dari output
        'remember_token', // Menyembunyikan token "remember me"
    ];
}
