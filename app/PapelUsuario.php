<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PapelUsuario extends Model
{
    public function users(){
      return $this->belongsToMany(User::class);
    }
}
