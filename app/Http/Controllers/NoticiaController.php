<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\GravarNoticias;
use \App\Noticia;
use \DateTime;
use Auth;
class NoticiaController extends Controller
{
    private $noticia;
    public function gravarNoticia(GravarNoticias $request){
        ($request->has('id'))?($this->noticia=Noticia::find($request->get('id')) AND
                              $this->authorize('update',$this->noticia))
        :
                              ($this->noticia=new Noticia() AND
                              $this->authorize('create',Noticia::class));
        $this->noticia->titulo=$request->get('titulo');
        $this->noticia->texto=$request->get('texto');
        $this->noticia->user_id=Auth::user()->id;
        $data=new DateTime();
        if($request->get('id'))
        {
          $this->noticia->alteracao=$data->format(env('DATE_FOMRAT_PERSISTENCE'));
          $this->noticia->update();
        }
        else{
          $this->noticia->publicacao=$data->format(env('DATE_FOMRAT_PERSISTENCE'));
          $this->noticia->save();
        }
    }

    public function cadastrarNoticia(){
      return view('formularios.cadastro-noticia');
    }
    public function alterarNoticia($id){
      $noticia=Noticia::find($id);
      if($this->authorize('update',$noticia))
        return view('formularios.cadastro-noticia',['noticia'=>$noticia]);
    }

    public function deletarNoticia(){

    }
}
