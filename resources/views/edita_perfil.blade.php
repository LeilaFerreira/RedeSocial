@extends('layouts.master')

@section('content')            

            <div>
                              <form action="/profile/atualizaPerfil/{{$usuario->usuario_id}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                                                                   
                                        <label>
                                            <h3>Alterar perfil</h3>
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

@endsection
<script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>  
<script src="{{ URL::asset('js/Util.js') }}"></script>