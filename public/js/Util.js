
$(window).on("load", function(){
    $.ajax({
    url:'https://servicodados.ibge.gov.br/api/v1/localidades/estados/',
    type: 'GET',
    success: function(data){
            let option = document.createElement('option');
            option.value='';
            option.disabled=true;
            option.selected=true;
            option.innerHTML = 'Selecione';
            document.getElementById('estado').appendChild(option);
            for(let estado of data){
            let option = document.createElement('option');
            option.setAttribute('id_estado', estado.id);
            option.value=estado.sigla;
            option.innerHTML = estado.nome;
            document.getElementById('estado').appendChild(option);
            }
    },
            error: function(err){
                console.log(err);
            }
            })
                document.getElementById('estado').addEventListener('change', carregaCidades);
            });
    
    
    function carregaCidades(){
    let id = this.options[this.selectedIndex].getAttribute('id_estado');
    document.getElementById('cidade').innerHTML='';
    $.ajax({
    url:'https://servicodados.ibge.gov.br/api/v1/localidades/estados/'+id+'/municipios/',
    type: 'GET',
    success:function(data){
            let option = document.createElement('option');
            option.value='';
            option.disabled=true;
            option.selected=true;
            option.innerHTML = 'Selecione';
            document.getElementById('cidade').appendChild(option);
            for(let cidade of data){
            let option = document.createElement('option');
            option.value=cidade.nome;
            option.innerHTML = cidade.nome;
            document.getElementById('cidade').appendChild(option);
            }
            },
                error:function(err){
                console.log(err);
            }
            });
    }