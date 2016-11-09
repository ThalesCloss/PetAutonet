<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    $fillable=['titulo','texto','publicacao','user_id'];
}
