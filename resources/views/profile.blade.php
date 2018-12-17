
@extends('layouts.master')

@section('content')

<html lang="pt-br" >

<head>
  <meta charset="UTF-8">
  <title>Perfil</title>


    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1.0, user-scalable=no">



</head>

<body>

  
<!-- Capa do Perfil -->
<div class="header">
    <img src="/foto-mural/{{$usuario->fotoMural}}" style="position:relative;
    width:100%; height:200px; background-size:cover; background-position: center;
    background-size: cover; min-height: 360px; border-radius: 0 0 4px 4px;">
    <!-- Botão "Alterar Fundo" -->
  </div>
  <button class="mui-btn">
      <a href="/profile/editaMural/{{$usuario->usuario_id}}">ALTERAR FOTO</a>
      <i class="fa fa-picture-o" aria-hidden="true"></i>
    </button>


	<!-- Avatar do Utilizador -->
	<div class="avatar">
  
  @if($usuario->fotoProfile)
  <img src="/foto-perfil/{{$usuario->fotoProfile}}" 
            class="profile-photo-md" alt="post-image"
            class="img-responsive post-image"> @endif
 	</div>
	<!-- Opções de Conta -->
	 <div class="opperfil">
    <center>
      <!-- Botão "Editar Perfil" -->
			<button class="mui-btn mui-btn--primary" style="background-color: #149AC9; ;color: #fff; margin-bottom: 0">
				<!--<div class="text">ALTERAR FOTO</div>-->
        <a href="/profile/editaFoto/{{$usuario->usuario_id}}" style="color: #fff">ALTERAR FOTO</a>
			</button>
			<!-- Botão "Alterar Password" -->
			<button class="mui-btn mui-btn--primary" style="background-color: #149AC9; ;color: #fff; margin-bottom: 0">
				<a href="/profile/editaPerfil/{{$usuario->usuario_id}}" style="color: #fff">EDITAR PERFIL</a>
			</button>
    </center>
  </div>
	<br><br><br>
	<!-- Título do Perfil -->
	<div class="tituloperfil">
		<!-- Nome do Utilizador -->
		<h1>{{Auth::user()->nome}}</h1>
		<div class="bigbriefing">
			<!-- Briefing do usuário -->
			<p>
				
				<b>Cidade:</b> {{Auth::user()->cidade}} <b>|</b>
				<b>Estado:</b> {{Auth::user()->estado}} 
			</p>
		</div>
	<!-- <div class="infocandidato">
		<form class="form-inline" >
			<a class="mui-btn mui-btn--raised" style="background-color: #149AC9; ;color: #fff; margin-bottom: 0">FOTOS E VIDEOS</a>
			<a href="/feed" class="mui-btn mui-btn--raised mui-btn--primary"style="background-color: #ab0127;border-color: #ab0127;color: #fff; margin-bottom: 0 ">Mensagens</a>
		</form>
	</div> -->

     <div class="container">

<!-- Timeline
================================================= -->
<div class="timeline">
  
  
  
  <div id="page-contents">

  <form action="/createpostProfile" method="post">
  @csrf
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-7">

        <!-- Post Mensaggem
        ================================================= -->
        <div class="create-post">
          <div class="row">
            <div class="col-md-10 col-sm-7">
              <div class="form-group">
               
                <textarea name="post" id="post" cols="80" rows="4" class="" ></textarea>
              </div>
             <div>
             <br>
             <input type="submit" id="btnCadastrar" class="btn-primary pull-right" value="Publicar"/>
             </div>
              
            </div>
           
          
          </div>
          
        </div><!-- Post Create Box End-->
</form>
        <!-- Post Conteudo
        ================================================= -->
 
 
    <div id="exibePost">
    @isset($posts)
 @foreach($posts as $post)
          <div class="post-content" id="{{$post->post_id}}">

            <!--Post Date-->
            <div class="post-date hidden-xs hidden-sm">
            
            
            <h5>
            @if($usuario->fotoProfile)
            <img src="{!! asset($usuario->fotoProfile) !!}" 
            class="profile2-photo-md pull-left" alt="post-image"
            class="img-responsive post-image">
            @else
                <img src="{{URL::asset('foto-perfil/profile_defauth.jpg')}}"  class="profile2-photo-md"/>     
            @endif
            
            {{ Auth::user()->nome}} </h5>
            
            
            <p class="post-text">  {{ $post->data_hora }}</p>
            </div><!--Post Date End-->
            <div class="post-container">
                   
                    <div class="post-detail">
                     
                        <div class="reaction">
                            <a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>
                            <a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>
                        </div>
                        <div class="line-divider"></div>
                        
                        <div class="post-text">
                            <p class="post-text">{{ $post->post }}</p> 
                            <i class="em em-anguished"></i> <i class="em em-anguished"></i> 
                            <i class="em em-anguished"></i></p>
                            </div>
                        <div class="line-divider"></div>
                        <div class="post-comment">
                        
                            <a href="/profile/editarpost/{{$post->post_id}}" class=" btn-primary pull-right" >Editar</a>
                            <a onclick="deletarPost({{$post->post_id}})"  class=" btn-primary pull-right" >Excluir</a>
                            <input type="hidden" value="{{ Session::token() }}" name="_token">

                        </div>
                    </div>
                    </div>
            </div>

      @endforeach
      @endisset
    </div>   
       

      </div>
              <div class="col-md-2 static">
                <div id="sticky-sidebar">
                  <h4 class="grey">Digital House News</h4>
                  
                  <div class="feed-item">
                    <div class="live-activity">
                      <p><a href="https://thunder-team.com/friend-finder/timeline.html#" class="profile-link">Novos Cursos</a>
                       NodeJs</p>
                      <p class="text-muted">5 mins ago</p>
                    </div>
                  </div>
                 
                 
                  
                  </div>
                </div>
      </div>
    </div>    
  </div>
</div> <!-- container -->
</div>

	<br/><br/>

</div>



    <style type="text/css">
    div#publish{ display:block ; margin: auto; border: none;
    border-radius:5px;background: #FFF; box-shadow: 0 0 5px #A1A1A1; margin-top:10px;
    overflow: hidden}
     div#publish img{margin-top:0px; margin-left: 10px; width:40px; cursor:pointer;}
    </style>
 

    <input type="hidden" id="token" value="{{ Session::token() }}" name="_token">

</body>

</html>

        <!-- <script>
       
            $(document).ready(function () {
                     $("#btnCadastrar").click(function () {
 
                    //Abaixo é montado um obejto com o mesmo nome do campo, pois no Action programamos para reeber estes nomes;
                    //O nome do formulário do HTML não interfere no nome dado aos itens do Objeto,
                    //porém tando na Action quando no Objeto devem ter os mesmos nomes.
                    //Documentação: http://api.jquery.com/jquery.ajax/           
 
                    var dados = {
                       post: $("#post").val(),
                       _token: $("#token").val()
                       
                    };
 
                    $.ajax({
                        url: "/createpostProfile",
                        type: "post",
                        //dataType: "html",
                        data: dados,
                        success: function (result) {
                           $('#post').val("");
                          
                        },
                        error: function (result) {
                            console.log(result);
                        }
                    });
                });

                    var autoRefresh = setInterval(() => {
                        $("#exibePost").load('<?php echo url('lsPostProfile');?>').fadeIn("slow");
                    }, 1000);
               
            });
        </script> -->



@endsection
