<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','cpf','rg','user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function papeisUsuario(){
      return $this->hasMany(PapelUsuario::class);
    }

    public function confirmRole($role){
      foreach ($this->papeisUsuario as $roles){
        if(is_array($role))
        {
          if(in_array($roles->papel,$role))
            return true;
        }
        else{
        if($roles->papel===$role)
          return true;
        }
      }

      return false;
    }

}
