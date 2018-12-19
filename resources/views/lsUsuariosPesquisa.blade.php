

@isset($listUsuarios)
 

 <div class="feed-item-pesquisa">
 @foreach($listUsuarios as $usuario)   
 @if($usuario->usuario_id != Auth::User()->usuario_id)             
 <div class="follow-user">
                 @if($usuario->fotoProfile)
                              <img src="/foto-perfil/{{$usuario->fotoProfile}}" class="profile-photo-sm pull-left"> 
							   @else
             <img src="{{URL::asset('foto-perfil/profile_defauth.jpg')}}"  class="profile-photo-sm pull-left"/>   
                            @endif
						<div>
						  <h5><a href="#">{{$usuario->nome}}</a></h5>
						  <input type="button" value="Seguir" 
								  onclick="seguirPessoa({{$usuario->usuario_id}})" class="btn"/>
						</div>
				</div>
@endif               
 @endforeach
</div>

 @endisset

<script>

function seguirPessoa(id, token){
        
        var jsonObject = {
            "idPessoa": id
            "_token": token
        };
    
            $.ajax
                ({
                    type: 'POST',
                   // dataType: 'html',
                    url: '/seguirPessoas',
                    beforeSend: function(){//Chama o loading antes do carregamento
                          
                    },
                    data: jsonObject,
                    success: function(msg)
                    {
                        // loading_hide();
                        // var data = msg;
                        // $(div).html(data).fadeIn();
                       return "Seguindo";				
                    }
                }); 
            
        }


</script>
