<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Usuario;

class UsuarioController extends Controller
{

  public function feed()
  {
    return view('feed');
  }

  public function signUp(Request $request)
  {	
    $mensagens = [
          'fotoPerfil.required' => 'Foto Obrigatoria.',
          'fotoPerfil.mimes' => 'Somente imagem no formato de jpeg e png.',
        ];
        $this->validate($request,[
          'fotoPerfil' => 'required|mimes:jpeg,png',
        ],$mensagens);
  
      $usuario = new Usuario();
      $usuario->nome = $request['nome'];
      $usuario->email = $request['email'];
      $usuario->password  = bcrypt($request['password']);
      $confirmaSenha = bcrypt($request['confirmaPassword']);  
      $usuario->estado = $request['estado'];
      $usuario->cidade = $request['cidade'];
      $request->file('fotoPerfil')->move('foto-perfil/',$usuario->usuario_id.'.'.$request->file('fotoPerfil')->getClientOriginalExtension());
      $usuario->fotoProfile = 'foto-perfil/'.$usuario->usuario_id.'.'.$request->file('fotoPerfil')->getClientOriginalExtension();
   
      $usuario->save();


     Auth::login($usuario);
     $id = Auth::id();
     session(['usuario_id'=> $id]);

     return redirect('/profilePost');
  }
  public function login(Request $request)
  {

	  $credentials = [
      'email' => $request['email'],
      'password' =>  $request['password']
        ];

    if(Auth::attempt($credentials)){
      // return redirect()->route('feed');
      $id = Auth::id();
      session(['usuario_id'=> $id]);
      return redirect('/profilePost');
    }
    else {
      return redirect()->back();
    }
  }
  public function profile()
  {
      $usuario_id = session('usuario_id');
      $usuario = Usuario::find($usuario_id);
      return view('profile')->with('usuario', $usuario_id);
  }

  public function faq()
  {
       return view('faq');
  }

  public function logout()
  {
      $this->guard()->logout();
      // $request->session()->flush();
      // $request->session()->regenerate();
       return view('welcome');
  }
  
  protected function guard()
  {
      return Auth::guard();
  }

 public function pesquisaUsuario(Request $request){

    $parametro = $request['pesquisa'];
         $listUsuarios =  DB::table('usuarios')
        ->where('nome', 'like', "%".$parametro."%") ->get();
        
        return view('lsUsuariosPesquisa')->with('listUsuarios', $listUsuarios);
    }


    public function seguirPessoas(Request $request){
        $idPessoa = $request['idPessoa'];
        $idUsuarioLogado = Auth::id();

          $amigos = new Amigos();
          $amigos->pessoa1 =  $idUsuarioLogado ;
          $amigos->pessoa2 =  $idPessoa ;

          if($amigos->save()){
              return "Seguindo";
          }


    }
  }
