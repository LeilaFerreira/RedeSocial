<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="{{ URL::asset('js/Util.js') }}"></script>
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>talkHouse</title>
    <style type="text/css">
    
    .fundo{
    background-color:white;
    }
    .fundo1{
    background-color:#27aae1;
    }
  
    </style>


    <script language="javascript" type="text/javascript">
    
      function temaNormal(){
      var obj=document.getElementById('corpo');
        obj.className='fundo';
      }

      function temaDark(){
      var obj=document.getElementById('corpo');
      if(obj.className==''){
        obj.className='fundo';
      }else{
        obj.className='fundo1';
       }
      }
  </script>
  </head>
  <body id="corpo" class="fundo">
 
    @include('includes.header')
    <div class="container">
      @yield('content')
    </div>

    
    
  <footer class="container-fluid bg-4 text-center">
      <a href="/sobre" style= "color: #27aae1; font-size: 11px; font-weight: normal; max-width: 135px; padding: 4px 7px;">Sobre TalkHouse</a>
      <a href="#"style= "color: #27aae1; font-size: 11px; font-weight: normal; max-width: 135px; padding: 4px 7px;">Termo de serviço</a>
      <a href="#"style= "color: #27aae1; font-size: 11px; font-weight: normal; max-width: 135px; padding: 4px 7px;">Ajuda</a>
      <a href='#'style= "color: #27aae1; font-size: 11px; font-weight: normal; max-width: 135px; padding: 4px 7px;">Trabalhe conosco</a> 
      


    
      <div class="btn-group" role="group">
      <button type="button" class="btn btn-default" onclick="temaNormal();">tema normal</button>
      <button type="button" class="btn btn-default" onclick="temaDark();">tema Blue</button>
      </div>
    </footer>





    @include('includes.imports') <!-- imports  js, jquery, boostrap e css -->

    </body>
</html>