<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

     public function staff()
     {
         return $this->hasOne(Staff::class, 'user_id');
     }
     
     public function documentsUploaded()
     {
         return $this->hasMany(Document::class, 'uploaded_by');
     }
     
     public function documentsApproved()
     {
         return $this->hasMany(Document::class, 'approved_by');
     }
     
     public function documentsRejected()
     {
         return $this->hasMany(Document::class, 'rejected_by');
     } 
}
