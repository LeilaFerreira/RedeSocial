@extends('layouts.master')

@section('content')


<div class="friend-list">
     <div class="row">
@foreach($listaAmigos as $amigo)
<div class="friend-card">
                      
                   
                      <img src="foto-mural/{{$amigo->fotoMural}}" alt="profile-cover" 
                      style="max-width: 75% !important;"
                      class="img-responsive cover">
                      <div class="card-info">
                        <img src="foto-perfil/{{$amigo->fotoProfile}}" alt="user" class="profile-photo-lg">
                        <div class="friend-info">
                          <a href="#" class="pull-right text-green">Seguindo</a>
                          <h5><a href="timeline.html" class="profile-link">{{$amigo->nome}}</a></h5>
                          <p>Amigo</p>
                        </div>
                      </div>
                    </div>


@endforeach
                
</div>
 </div>
@endsection