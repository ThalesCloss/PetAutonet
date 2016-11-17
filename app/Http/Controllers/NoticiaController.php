<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function gravarNoticia(Request\GravarNoticias $request){

    }

    public function cadastrarNoticia(){
      return view('formularios.cadastro-noticia');
    }

    public function deletarNoticia(){

    }
}
