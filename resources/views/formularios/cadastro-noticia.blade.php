@extends('layouts.app')

@section('content')

<div class="row">
  <form class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
    <div class="form-group">
      <label for="titulo">Título</label>
      <input type="text" class="form-control" id="titulo" placeholder="Título da notícia">
    </div>
    <div class="form-group">
      <label for="titulo">Texto</label>
      <textarea class="form-control" id="titulo" placeholder="Texto da notícia">
      </textarea>
    </div>
  </form>
</div>

@endsection
