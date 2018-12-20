@extends('layouts.master')

@section('content')

<div class="container">
    	<div class="row">
    		<div class="col-md-10 col-md-offset-1">
    			<img src="/foto-perfil/{{$usuario->fotoProfile}}" style="width: 150px; height: 150px; float:left; border-radius: 50%; margin-right: 25px;">
	    			<h2>{{ $usuario->nome }}</h2>
	    				<form enctype="multipart/form-data" action="/profile/atualizaFoto/{{$usuario->usuario_id}}" method="POST">
			    			<label>Atualizando a foto do perfil</label>
			    			<input type="file" name="fotoPerfil">
			    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			    			<input type="submit" class="pull-right  btn-primary">
			    		</form>
			    	</div>
			    </div>
			  </div>

@endsection