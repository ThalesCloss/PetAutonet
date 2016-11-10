<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable=['titulo','texto','publicacao','user_id'];
    public $timestamps=false;
}
