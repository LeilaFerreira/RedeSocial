@extends('layouts.master')

@section('content')

<div class="row">




<div class="col-md-3">
        <div class="cardLateral card">
              <img src="/foto-mural/{{Auth::user()->fotoMural}}"  width="300" height="150" >
                  <div class="photo"> @if(Auth::user()->fotoProfile)
                    <img src="/foto-perfil/{{Auth::user()->fotoProfile}}" id="fotoPerfil"
                  class="profile-photo-md img-responsive post-image " alt="post-image">
               @endif</div>
              
            

                 <ul>
                <li><b id="nome">{{ Auth::user()->nome}}</b></li>
                <li>Analise e Desenvolvimento de Sistemas</li>
                 </ul>
                <button class="contact" id="main-button">Sobre</button>
              

         </div>
              <div class="social-media-banner">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-instagram"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
    
              <br><br><br><br>
              <div>
              
                <h4 class="grey">Novos Usuarios</h4>
                @isset($listUsuariosCad)
                  @foreach($listUsuariosCad as $usuario)   
                  @if($usuario->usuario_id != Auth::User()->usuario_id)
                      <div class="feed-item">
                       
                          
                        <div class="follow-user">
                              @if($usuario->fotoProfile)
                                  <img src="/foto-perfil/{{$usuario->fotoProfile}}" class="profile-photo-sm pull-left"> 
                                  @else
						                  <img src="{{URL::asset('foto-perfil/profile_defauth.jpg')}}"  class="profile-photo-sm pull-left"/>   
                            @endif
                            <div>
                              <h5><a href="#">{{$usuario->nome}}</a></h5>
                             
                          
                              <input type="button" value="Seguir" id="{{$usuario->usuario_id}}"
                                      onclick="seguirPessoa({{$usuario->usuario_id}})" class="btn"/>
                           
                           
                            </div>
                        </div>
                 
                         
                      
                      </div>
                      @endif
                    @endforeach
                  @endisset
              </div>
    </div><!--col3 -->



        <div class="col-md-1"> </div>
    
              <div class="col-md-7">
                  <form action="/createpost" method="post">
                   @csrf
                         <!-- Post Mensaggem
                      ================================================= -->
                      <div class="create-post">
                        <div class="row">
                                <div class="col-md-10 col-sm-7">
                                
                                        <div class="form-group">
                                          @if(Auth::user()->fotoProfile)
                                          <img src="/foto-perfil/{{Auth::user()->fotoProfile}}" 
                                        class="profile2-photo-md"> 
                                        @else
                                            <img src="{{URL::asset('foto-perfil/profile_defauth.jpg')}}"  class="profile2-photo-md"/>     
                                         
                                        @endif
                                        &nbsp; &nbsp;
                                        <textarea name="post" id="post" cols="80" rows="4" class="" ></textarea>
                                          </div>
                                  <div>
                                <br>
                                
                                <a onclick="publicarPostFeed()"  class=" btn-primary pull-right" >Publicar</a>
                                <!-- <input type="submit" id="btnCadastrar" class="btn-primary pull-right" value="Publicar"/> -->
                          </div>
                            
                          </div>
                    </form>   
                    
                    

                     <div id="exibePost">
                            @isset($posts)
                        @foreach($posts as $post)
                        <div class="post-content">
                                 
                                    
                                    @if($post->pathimagem)
                                      <img src="" alt="post-image" class="img-responsive post-image">
                                    @endif
                                    
                                      <div class="post-container">
                                        <img src="foto-perfil/{{$post->fotoProfile}}" alt="user" class="profile2-photo-md pull-left">
                                        <div class="post-detail">
                                          <div class="user-info">
                                            <h5><a href="https://thunder-team.com/friend-finder/timeline.html" 
                                            class="profile-link"> {{$post->nome}}</a> <span class="following">Seguir</span></h5>
                                            <p class="text-muted"> {{ $post->data_hora }}</p>
                                          </div>
                                          <div class="reaction">
                                            <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                                            <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                                          </div>

                                          <div class="line-divider"></div>
                                          <div class="post-text">
                                            <p> {{ $post->post }} <i class="em em-anguished"></i> <i class="em em-anguished"></i> <i class="em em-anguished"></i></p>
                                          </div>
                                          
                                          @if($post->usuario_id == Auth::user()->usuario_id)
                                          <div class="line-divider"></div>
                                          <div class="post-comment">
                                          <a href="/profile/editarpost/{{$post->post_id}}" class=" btn-primary pull-right">Editar</a>
                                          <a onclick="deletarPost({{$post->post_id}})" class=" btn-primary pull-right">Excluir</a>
                                          </div>
                                          @endif
                                          
                                          
                                          <div class="line-divider"></div>
                                          <div class="post-comment">
                                            <img src="./News Feed _ Check what your friends are doing_files/user-4.jpg" alt="" class="profile-photo-sm">
                                            <p><a href="https://thunder-team.com/friend-finder/timeline.html" class="profile-link">John</a> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
                                          </div>
                                          <div class="post-comment">
                                            <img src="./News Feed _ Check what your friends are doing_files/user-1.jpg" alt="" class="profile-photo-sm">
                                            <input type="text" class="form-control" placeholder="Comente aqui">
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                              @endforeach
                              @endisset
                            </div>   
                                  
          </div>
          


          
</div><!--row-->
 

  
  
 
       

   
    <style type="text/css">
    div#publish{ display:block ; margin: auto; border: none;
    border-radius:5px;background: #FFF; box-shadow: 0 0 5px #A1A1A1; margin-top:10px;
    overflow: hidden}

    div#publish img{margin-top:0px; margin-left: 10px; width:40px; cursor:pointer;}
   
    </style>


  <input type="hidden" value="{{ Session::token() }}" name="_token">
@endsection
