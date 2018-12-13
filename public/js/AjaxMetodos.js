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
    }
    
    //Aqui eu chamo o metodo de load pela primeira vez sem parametros para pode exibir todos
    //load_dados(null, 'pesquisa.php', '#MostraPesq');
    
    
            //Aqui uso o evento key up para começar a pesquisar, se valor for maior q 0 ele faz a pesquisa
            $('#pesquisa').keyup(function(){
                
                var valores = $('#form_pesquisa').serialize()//o serialize retorna uma string pronta para ser enviada
                
                //pegando o valor do campo #pesquisa
                var $parametro = $(this).val();
                
                if($parametro.length >= 1)
                {
                    load_dados(valores, '/pesquisaUsuarios', '#MostraPesq');
                }else
                {
                   // $(div).html().fadeIn();	
                }
            });

    });
    

   function seguirPessoa(id){
        
      

        $.ajax
            ({
                type: 'POST',
               // dataType: 'html',
                url: '/seguirPessoas',
                beforeSend: function(){//Chama o loading antes do carregamento
		              loading_show();
				},
                data: 'idPessoa' = id,
                success: function(msg)
                {
                    // loading_hide();
                    // var data = msg;
                    // $(div).html(data).fadeIn();
                    alert('Amigos OK');				
                }
            }); 
            loading_hide();
    }