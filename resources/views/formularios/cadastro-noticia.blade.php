@extends('layouts.app')

@section('content')

<div class="row">

  <form class="col-sm-12 col-xs-12 col-md-12 col-lg-12" action="/noticia/gravar" method="post">
     {{ csrf_field() }}
     <input type="hidden" name="id" value="{{isset($noticia->id)?$noticia->id:''}}">
    <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">

      <label for="titulo">Título</label>

      <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Título da notícia" value="{{ isset($noticia)?$noticia->titulo:old('titulo') }}">

      @if ($errors->has('titulo'))
          <span class="help-block">
              <strong>{{ $errors->first('titulo') }}</strong>
          </span>
      @endif

    </div>

    <div class="form-group{{ $errors->has('texto') ? ' has-error' : '' }}">

      <label for="titulo">Texto</label>
      <textarea class="form-control" name="texto" id="titulo" placeholder="Texto da notícia">
        {{ isset($noticia)?$noticia->texto:old('texto') }}
      </textarea>

      @if ($errors->has('texto'))
          <span class="help-block">
              <strong>{{ $errors->first('texto') }}</strong>
          </span>
      @endif

    </div>

  </form>
</div>
@endsection
