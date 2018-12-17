

@isset($listUsuarios)
 

 <div class="feed-item-pesquisa">
 @foreach($listUsuarios as $usuario)   
                 
                  <!-- <div class="live-activity"> -->
                  <!-- @if($usuario->fotoProfile)
                        <img src="{{$usuario->fotoProfile}}" 
                                        class="profile2-photo-md"/> 
                      @endif -->
                
        <p>
        @if($usuario->fotoProfile)
             <img src="{{$usuario->fotoProfile}}"  class="profile2-photo-md"/>     
        @else
             <img src="{{URL::asset('foto-perfil/profile_defauth.jpg')}}"  class="profile2-photo-md"/>     
        @endif  
        
        {{$usuario->nome}}   
        <input type="button" value="Seguir" onclick="seguirPessoa({{$usuario->usuario_id}})" class="btn"/>
        </p>

                 <!--     <input type="button" value="Seguir" onclick="seguirPessoa({{$usuario->usuario_id}}, {{ Session::token() }})" class="btn"/>
                    <p class="text-muted"></p> -->
                  <!-- </div> -->
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
