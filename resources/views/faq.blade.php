
@extends('layouts.master')

@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Faq</title>
    
  
  </head>
    
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilos.css"> -->
  <!-- <link rel="stylesheet" href="css/montserrat"> -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> -->


<body>
  
  <h1 class="container text-center my-5">FAQ</h1>
  <div id="accordion" class="mx-5 my-3">
    <div class="card">
      <div class="card-header collapsed" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
        aria-controls="collapseOne">
        <h5 class="mb-0">
            O que é o talkHouse?
        </h5>
      </div>

      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body">
          TalkHouse é uma rede social para alunos e membros do corpo docente da Digital House.
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" id="
        headingTwo ">
        <h5 class="mb-0 ">
        Como criar uma conta?
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
          Para criar uma conta clique em "Cadastrar" e preencha os campos com suas informações.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header collapsed" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
        aria-controls="collapseThree">
        <h5 class="mb-0">
            Quem pode criar uma conta?
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
          Somente membros do corpo discente ou docente podem criar uma conta na talkHouse.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header collapsed" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false"
        aria-controls="collapseFour">
        <h5 class="mb-0">
            Há algum custo para a criação da conta?
        </h5>
      </div>
      <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
        <div class="card-body">
          Não, o serviço é totalmente gratuito.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header collapsed" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false"
        aria-controls="collapseFive">
        <h5 class="mb-0">
            Qual o objetivo do talkHouse?
        </h5>
      </div>
      <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
        <div class="card-body">
          O objetivo é conectar os alunos e professores de turmas diferentes para trocarem informações relevantes ao curso.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header collapsed" id="headingSix" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false"
        aria-controls="collapseSix">
        <h5 class="mb-0">
            Como posso me inscrever num curso da Digital House?
        </h5>
      </div>
      <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
        <div class="card-body">
          Os cursos da Digital House podem ser visualizados no website <a href="http://digitalhouse.com">digitalhouse.com</a>.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header collapsed" id="headingSeven" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false"
        aria-controls="collapseSeven">
        <h5 class="mb-0">
            Há alguma forma de entrar em contato com vocês?
        </h5>
      </div>
      <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
        <div class="card-body">
          Em caso de dúvidas, mande um e-mail para <a href="mailto:contato@talkhouse.com?subject=duvida">contato@talkhouse.com</a>.
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header collapsed" id="headingEight" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false"
        aria-controls="collapseEight">
        <h5 class="mb-0">
            Quem pode criar uma conta?
        </h5>
      </div>
      <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
        <div class="card-body">
          Somente membros do corpo discente ou docente podem criar uma conta na talkHouse.
        </div>
      </div>
    </div>

</div>


  
</body>

</html>
@endsection

