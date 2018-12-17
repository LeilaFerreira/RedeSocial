
<body>



<meta name="csrf-token" content="{{ csrf_token() }}">
 <style type="text/css">
  *{font-family: 'Montserrat'; cursive; margin:0;}
  body{background: white;}
  </style>

  

  <nav class="navbar navbar-expand-lg navbar navbar-light"style="background-color: #e3f2fd; height: 40px ; padding-bottom:2%" >
    <a class="navbar-brand" href="/feed" >
    <img src="/imagem/logo.png" href="/feed" class="my-0 mr-md-auto font-weight-normal" height="20" name="logo">
  </a>
   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     
    
          <ul class="navbar-nav mr-auto" >
              <li class="nav-item active">
                <a class="nav-link" href="/feed">Linha do Tempo <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Amigos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Notificações <span class="badge badge-info">9</span>
              <span class="sr-only">unread messages</span></a>
              </li>
          
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Meu Perfil
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/profilePost">Perfil</a>
                  <a class="dropdown-item" href="/fed">Pagina Inicial</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Configurações</a>
                  <a class="dropdown-item" href="/faq">Faq</a>
                </div>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}">Sair</a>
              </li>

           </ul>
          
          </div>
             <div>

  
                  <form class="form-inline my-2 my-lg-0"  style= "padding-top:9%" 
                          id="form_pesquisa" name="form_pesquisa">  
                    
                          <input class="form-control mr-sm-2" type="search" id="pesquisa" 
                              name="pesquisa" placeholder="" aria-label="Pesquisa Usuario">
                              
                            <a href="#"><span class="glyphicon glyphicon-search"></span></a>
                              <input type="hidden" value="{{ Session::token() }}" name="_token">
                  </form>  
                    
                      <div id="contentLoading">
                        <div id="loading"></div>
                      </div>
                    
              </div>
           
  </nav>
  <div id="MostraPesq" class="pesquisaPessoas"></div>



</body>

</html>
