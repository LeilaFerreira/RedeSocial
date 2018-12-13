<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title>talkHouse</title>
    
    
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Util.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/home.css">
    <style>
        main{
              min-height: 100vh;
              overflow: hidden;
              padding: 100px 0 0 0;
          }
          main video{
              top: 0;
              left: 0;
          }
          .jumbotron{
              background-color:rgba(0,0,0,0.2);
              color: #fff;
          }

      </style>
</head>

<body>
    <header class="fixed-top">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <img src="/imagem/logo.png" class="my-0 mr-md-auto font-weight-normal" height="30" name="logo">
            <form class="my-2 my-md-0 mr-md-3" method="POST" action="{{ route('login') }}">
            @csrf
                <div class="input-group">
                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="email" aria-label="email">
                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                    name="password" placeholder="senha" aria-label="senha">
                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    <div class="input-group-append">
                        <button class="btn button" type="submit" id="button-addon2" style="background-color: #149AC9;color: #fff; margin-bottom: 0">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </header>
    <main class="position-relative">
        <video class="position-absolute" autoplay="true" muted="true" loop="true" class="video">
            <source src="/imagem/files.mp4" type="video/mp4">
        </video>

        <div class="container">
            <div class="row">
                <div class="position-relative jumbotron col">
                    <div class="container">
                        <div class="row">
                            <div class="col-7">
                                <h1>
                                    Bem-vindo(a) a </><span style="color:#ab0127;">talk</span>House
                                </h1>


                                <div class="wc-feat-float">
                                    <i class="icon-group" style="font-size: 50px;"></i>
                                    <div class="feat-msg">
                                        <strong>O canal para você conectar e compartilhar com as professores e alunos da
                                            Digital
                                            House.</strong>
                                        <p>
                                            Nunca fique de fora! Mantenha contato com colegas, professores e amigos o tempo
                                            todo!
                                        </p>
                                    </div>
                                    <div class="float-clear"></div>
                                </div>

                                <div class="wc-feat-float">
                                    <i class="icon-tablet" style="font-size: 80px;"></i>
                                    <div class="feat-msg">
                                        <strong>De saída? Ganhe mobilidade!</strong>
                                        <p>
                                            Um site para todos os dispositivos. Se você usa desktop, tablet ou smartphone,<br>
                                            mantenha contato com seus amigos!
                                        </p>
                                    </div>
                                    <div class="float-clear"></div>
                                </div>

                                <div class="wc-feat-float">
                                    <i class="icon-globe" style="font-size: 70px;"></i>
                                    <div class="feat-msg">
                                        <strong>Saiba o que está acontecendo na Digital House!</strong>
                                        <p>
                                            Fique à frente do mundo. Fique de olho na evolução ao seu redor!
                                        </p>
                                    </div>
                                    <div class="float-clear"></div>
                                </div>
                            </div>
                            <div class="col-5">
                              <form id="formulario_bemvindo" class="formulario_bemvindo" action="/signup" method="post" enctype="multipart/form-data">
                                <!-- <form id="formulario_bemvindo" class="formulario_bemvindo" action="" method="post" enctype="multipart/form-data"> -->
                                        @csrf
                                                                                   
                                        <label>
                                            <h3>Criar uma nova conta</h3>
                                        </label>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputNome">Nome</label>
                                                <input type="text" name="nome" class="form-control" id="inputNome" placeholder="" >
                                            </div>
                                            @if ($errors->has('nome'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nome') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail">E-mail</label>
                                                <input type="email" name="email" class="form-control" id="inputEmail"  placeholder="email@email.com" >
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>


                                        <div class="form-row ">
                                            <div class="form-group col-md-6">
                                                <label for="password">Senha</label>
                                                <input type="password" name="password" class="form-control" id="password" placeholder="*******" >
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="confirmarPassword">Confirmar Senha</label>
                                                <input type="password" name="confirmarPassword" class="form-control" id="confirmarPassword"
                                                    placeholder="*******" >
                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-row">
                                            
                                                <div class="form-group col-md-6">
                                                    <label for="estado">Estado*</label>
                                                    <select type="text" class="form-control" id="estado" maxlength="40"  name="estado" required>
                                                    </select>
                                                    
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="estado">Cidade*</label>
                                                    <select type="text" class="form-control" id="cidade" maxlength="40"  name="cidade" required>
                                                    </select>
                                                </div>
                                        </div>

                                      


                                            <div class="form-group">
                                                <label for="upload-foto" class="btn button" style="background-color: #149AC9; ;color: #fff; margin-bottom: 0">Upload Foto </label>
                                                <input type="file" accept="image/*" id="upload-foto" name="fotoPerfil">
                                                <button type="submit" 
                                                class="btn button" 
                                                style="background-color: #149AC9; ;color: #fff; margin-bottom: 0">Cadastrar</button>
                                            </div>

                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


<!-- <footer >
    <div style="bottom: 10px; left: 0px; margin-bottom: 6px; position: absolute; text-align: center; width: 100%;">
        <a href= "#"style="color: rgb(255, 255, 255); font-size: 11px; font-weight: normal; max-width: 135px; padding: 4px 7px;">Sobre TalkHouse</a>
        <a href= "#"style="color: rgb(255, 255, 255); font-size: 11px; font-weight: normal; max-width: 135px; padding: 4px 7px;">Termo de serviço</a>
        <a href= "#"style="color: rgb(255, 255, 255); font-size: 11px; font-weight: normal; max-width: 135px; padding: 4px 7px;">Ajuda</a>
        <a href= "#"style="color: rgb(255, 255, 255); font-size: 11px; font-weight: normal; max-width: 135px; padding: 4px 7px;">Trabalhe conosco</a>

    </div>

</footer> -->

    <script type="text/javascript">
      let form = document.getElementById("formulario_bemvindo");
      let password = document.getElementById("password");
      let confirmarPassword = document.getElementById("confirmarPassword");
      form.onsubmit = function(e) {
        // e.preventDefault();
        let erros = [];
        let check = {};
        if(password.value!=confirmarPassword.value) erros.push("Senhas estão diferentes!")
        for (let i = 0; i < form.elements.length; i++) {
          let elemento = form.elements[i];
          switch(elemento.type){
            case "submit":
            case "hidden":
            case "file":
            break;
            default:
              if(!elemento.value){
                erros.push(elemento.name+" está em branco!");
              }
            break;
          }
        }

        if(erros.length > 0){
          alert("Erros:\r-"+erros.join("\r-"));
        }


      }
      </script>
 
</body>

</html>
