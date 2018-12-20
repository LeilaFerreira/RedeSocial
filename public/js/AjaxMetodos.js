$(document).ready(function(){

        //Aqui a ativa a imagem de load
        function loading_show(){
            $('#loading').html("<img src='imagem/loading.gif'/>").fadeIn('fast');
        }
        
        //Aqui desativa a imagem de loading
        function loading_hide(){
            $('#loading').fadeOut('fast');
        }       
        
    
        // aqui a função ajax que busca os dados em outra pagina do tipo html, não é json
          
        function load_dados(valores, page, div)
        {
            $.ajax
                ({
                    type: 'POST',
                // dataType: 'html',
                    url: page,
                    beforeSend: function(){//Chama o loading antes do carregamento
                        loading_show();
                    },
                    data: valores,
                    success: function(msg)
                    {
                        loading_hide();
                        var data = msg;
                        $(div).html(data).fadeIn();				
                    }
                });
                loading_hide();
        }//fim function
        
          
    
    
    
            //Aqui uso o evento key up para começar a pesquisar, se valor for maior q 0 ele faz a pesquisa
            $('#pesquisa').keyup(function(){
                
                var valores = $('#form_pesquisa').serialize()//o serialize retorna uma string pronta para ser enviada
                load_dados(valores, '/pesquisaUsuarios', '#MostraPesq');
              
            });

    });
    

   function seguirPessoa(id){
       $.ajax
            ({
                type: 'POST',
               // dataType: 'html',
                url: '/seguirPessoas',
                beforeSend: function(){//Chama o loading antes do carregamento
		            
				},
                data: {'idPessoa': id},

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(msg)
                {
                    document.getElementById(id).value = "Seguindo";
                }
            }); 
          
    }


    function deletarPost(id){
    
        $.ajax
        ({
            type: 'GET',
            url: '/profile/deletepost/'+id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(msg)
            {
                var node = document.getElementById(id)
                node.parentNode.removeChild(node);
            }
        }); 


    }


    function publicarPost(){
        let nome = $('#nome').html();
        let pathFoto = document.getElementById('fotoPerfil').src
        let textoPost = document.getElementById('post').value;
        $.ajax
        ({
            type: 'POST',
            url: '/createpostProfile',
            data: {'post': textoPost },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data)
            {
               
                let obj = JSON.parse(data);
                $( "#exibePost" ).prepend( montaHtmlPost(obj.post_id,textoPost,obj.created_at, nome, pathFoto));
                document.getElementById('post').value = '';
            }

        }); 
   
      
   }
    
    

    function montaHtmlPost(postId, textoPost, criadoEM, nome, pathFoto){
        let posthtml;

        
            posthtml = '<div class="post-content" id='+postId+'>';
            posthtml += '<div class="post-date hidden-xs hidden-sm">';
            posthtml += '<h5>';
            posthtml += '<img src="'+pathFoto+'" class="profile2-photo-md pull-left" alt="post-image">'+nome+' </h5>';
            posthtml += '<p class="post-text">'+criadoEM+'</p>';
            posthtml += '</div>';
                            
            posthtml += '<div class="post-container">';
            posthtml += '<div class="post-detail">';
                                        
            posthtml += '<div class="reaction">';
            posthtml += '<a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>';
            posthtml += '<a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>';
            posthtml += '</div>';
            posthtml += '<div class="line-divider"></div>';
                                            
            posthtml += '<div class="post-text">';
            posthtml += '<p class="post-text">'+textoPost+'</p>' ;
            posthtml += '<i class="em em-anguished"></i> <i class="em em-anguished"></i>';
            posthtml += '<i class="em em-anguished"></i><p></p>';
            posthtml += '</div>';
            posthtml += '<div class="line-divider"></div>';
            posthtml += '<div class="post-comment">';
                                            
            posthtml += '<a href="/profile/editarpost/'+postId+'" class=" btn-primary pull-right">Editar</a>';
            posthtml += '<a onclick="deletarPost('+postId+')" class=" btn-primary pull-right">Excluir</a>';
            posthtml += '<input type="hidden" value="ZFNY1qw1IojusPT4EzTwgg1nodjJja1wbpq32Dp2" name="_token">';

            posthtml += '</div>';
            posthtml += '</div>';
            posthtml += '</div>';
            posthtml += '</div>';

            return posthtml;
    }


    function publicarPostFeed(){
        let nome = $('#nome').html();
        let pathFoto = document.getElementById('fotoPerfil').src
        let textoPost = document.getElementById('post').value;
        $.ajax
        ({
            type: 'POST',
            url: '/createpost',
            data: {'post': textoPost },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data)
            {
               
                let obj = JSON.parse(data);
                $( "#exibePost" ).prepend( montaHtmlPostFeed(obj.post_id,textoPost,obj.created_at, nome, pathFoto));
                document.getElementById('post').value = '';
            }

        }); 
   
      
   }
    

   function montaHtmlPostFeed(postId, textoPost, criadoEM, nome, pathFoto){
    let posthtml;

    
        posthtml = '<div class="post-content" id='+postId+'>';
        
            posthtml += '<div class="post-date hidden-xs hidden-sm">';
            posthtml += '<h5>';
            posthtml += '<img src="'+pathFoto+'" class="profile2-photo-md pull-left" alt="post-image">'+nome+' </h5>';
            posthtml += '<p class="post-text">'+criadoEM+'</p>';
            posthtml += '</div>';
                        
            posthtml += '<div class="post-container">';
                posthtml += '<div class="post-detail">';
                                            
                    posthtml += '<div class="reaction">';
                    posthtml += '<a class="btn text-green"><i class="icon ion-thumbsup"></i> 13</a>';
                    posthtml += '<a class="btn text-red"><i class="fa fa-thumbs-down"></i> 0</a>';
                    posthtml += '</div>';
            
                    posthtml += '<div class="line-divider"></div>';
                                                
                    posthtml += '<div class="post-text">';
                    posthtml += '<p class="post-text">'+textoPost+'</p>' ;
                    posthtml += '<i class="em em-anguished"></i> <i class="em em-anguished"></i>';
                    posthtml += '<i class="em em-anguished"></i><p></p>';
                    posthtml += '</div>';
                
                    posthtml += '<div class="line-divider"></div>';
                
                    posthtml += '<div class="post-comment">';
                    posthtml += '<a href="/profile/editarpost/'+postId+'" class=" btn-primary pull-right">Editar</a>';
                    posthtml += '<a onclick="deletarPost('+postId+')" class=" btn-primary pull-right">Excluir</a>';
                    posthtml += '<input type="hidden" value="ZFNY1qw1IojusPT4EzTwgg1nodjJja1wbpq32Dp2" name="_token">';
                    posthtml += '</div>';


                    posthtml +=  '<div class="line-divider"></div>';
                    
                    posthtml +=  '<div class="post-comment">';
                    posthtml +=  '<img src="" alt="" class="profile-photo-sm">';
                    posthtml +=  '<p><a href="" class="profile-link">John</a> 12Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>';
                    posthtml +=  '</div>';
                    
                    posthtml +=  '<div class="post-comment">';
                    posthtml +=  '<img src="" alt="" class="profile-photo-sm">';
                    posthtml +=  '<input type="text" class="form-control" placeholder="Comente aqui">';
                    posthtml +=  '</div>';
            

                posthtml += '</div>';


 

            posthtml += '</div>';
        posthtml += '</div>';

       

        return posthtml;
}
