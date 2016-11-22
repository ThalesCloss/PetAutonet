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
        if($this->authorize('create',Noticia::class))
        {
          $this->noticia=new Noticia();
          $this->noticia->titulo=$request->get('titulo');
          $this->noticia->texto=$request->get('texto');
          $this->noticia->user_id=Auth::user()->id;
          $data=new DateTime();
          $this->noticia->publicacao=$data->format(env('DATE_FOMRAT_PERSISTENCE'));
          if($this->noticia->save())
          {
            if($request->get('cadastrarnova'))
            return back();
            else
            return redirect()->route('listarNoticias');
          }

        }
    }

    public function atualizarNoticia(GravarNoticias $request)
    {
      $this->noticia=Noticia::find($request->get('id'));
      if($this->authorize('update',$this->noticia))
      {
        $this->noticia->titulo=$request->get('titulo');
        $this->noticia->texto=$request->get('texto');
        $this->noticia->user_id=Auth::user()->id;
        $data=new DateTime();
        $this->noticia->alteracao=$data->format(env('DATE_FOMRAT_PERSISTENCE'));
        if($this->noticia->update())
        {
          if($request->get('cadastrarnova'))
            return redirect()->route('cadastrarNoticia');
          else
            return redirect()->route('listarNoticias');
        }
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

    public function deletarNoticia(Request $request){
      $this->validate($request,['id'=>'required|numeric']);
    }

    public function listarNoticia(){
      dd(Noticia::paginate(15));
    }
}
