@extends('layouts.master')

@section('title')
    Perfil
@endsection

@section('content')
  <section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
        <header><h3>Seu Perfil</h3></header>
        <form action="/salvarmudancas" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" value="" id="nome">
            </div>
            <div class="form-group">
                <label for="image">Foto de perfil (somente .jpg)</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <button type="submit" class="btn btn-primary">Salvar mudanças</button>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </form>
    </div>
  </section>


@endsection


