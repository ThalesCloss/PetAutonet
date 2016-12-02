@extends('layouts.app')

@section('content')

<div class="wide">
  <div class="container">
    <div class="row">
      <form class="col-sm-12 col-xs-12 col-md-12 col-lg-12" action="/noticia/gravar" method="post">

        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{isset($noticia->id)?$noticia->id:''}}">

        @if(isset($noticia->id))
        {{ method_field('PUT') }}
        @endif

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
          <textarea class="form-control" name="texto" id="texto" placeholder="Texto da notícia">
            {{ isset($noticia)?$noticia->texto:old('texto') }}
          </textarea>
          @if ($errors->has('texto'))
          <span class="help-block">
            <strong>{{ $errors->first('texto') }}</strong>
          </span>
          @endif
        </div>

        <div class="form-group">
          <label for="cadastrarnova">
            <input type="checkbox" name="cadastrarnova" value="true">
            Cadastrar nova após gravar?
          </label>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-saved"></span> Gravar</button>
          <button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</button>

        </div>
      </form>
    </div>
  </div>
</div>
@endsection
