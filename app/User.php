<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



   public function roles(){

    return $this->belongsToMany('App\Role');
   }

// donner des privileges au nom admin dans la base de donne 
   public function isAdmin(){

    return $this->roles()->where('name', 'admin')->first();
   }

   // creaction d'une fonction pour des droit de parcours de page 

   public function hasAnyRole(array $roles)
   {

     return $this->roles()->whereIn('name', $roles)->first();
   }
}
