<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Usuario;
use App\Amigos; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use File;
use Image;

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

      $usuario->save();

      //Trecho onde é feito o tratamento da imagem para armazenar no banco
      $imagem = $request->file('fotoPerfil');
      $filename = $usuario->usuario_id . '.' . $imagem->getClientOriginalExtension();
      Image::make($imagem)->resize(300,300)->save(public_path('/foto-perfil/' . $filename));
      $usuario->fotoProfile = $filename;
   
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

  public function editaFoto($usuario_id){
    $usuario = Usuario::find($usuario_id);
    return view('edita_foto')->with('usuario', $usuario);
  }

  public function atualizaFoto(Request $request, $usuario_id){

    if($request->hasFile('fotoPerfil')){
      $imagem = $request->file('fotoPerfil');
      $filename = $usuario_id . '.' . $imagem->getClientOriginalExtension();
      Image::make($imagem)->resize(300,300)->save(public_path('/foto-perfil/' . $filename));

    $usuario = Auth::user();
    $usuario->fotoProfile = $filename;
    $usuario->save();
    }
      return view('profile', array('usuario' => Auth::user()));

      
  }

  public function editaPerfil($usuario_id){
    $usuario = Usuario::find($usuario_id);
    return view('edita_perfil')->with('usuario', $usuario);
  }

  public function atualizaPerfil(Request $request, $usuario_id){
    $usuario = Usuario::find($usuario_id);
    $usuario->nome = $request->nome;
    $usuario->email = $request->email;
    $usuario->password = $request->password;
    $usuario->estado = $request->estado;
    $usuario->cidade = $request->cidade;
    $usuario->save();
    return view('profile');
  }

  public function editaMural($usuario_id){
    $usuario = Usuario::find($usuario_id);
    return view('altera_mural')->with('usuario', $usuario);
  }

  public function atualizaFundo(Request $request, $usuario_id){
    
    if($request->hasFile('fotoMural')){
        $imagem = $request->file('fotoMural');
        $filename = $usuario_id . '.' . $imagem->getClientOriginalExtension();
        Image::make($imagem)->resize(300,300)->save(public_path('/foto-mural/' . $filename));

      $usuario = Auth::user();
      $usuario->fotoMural = $filename;
      $usuario->save();
      }

      return view('profile', array('usuario' => Auth::user()));
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
        
    if($parametro){
      $listUsuarios =  DB::table('usuarios')
      ->where('nome', 'like', "%".$parametro."%") ->get();
      return view('lsUsuariosPesquisa')->with('listUsuarios', $listUsuarios);
    }else{
      return view('lsUsuariosPesquisa')->with('listUsuarios', null);
    }
     
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

    // public function editaFoto($usuario_id){
    //   $usuario = Usuario::find($usuario_id);
    //   return view('edita_foto')->with('usuario', $usuario);
    // }
  
    // public function atualizaFoto(Request $request, $usuario_id){
    //     $usuario = Usuario::find($usuario_id);
  
    //     if(Input::file('fotoPerfil'))
    //     {
    //       $request->file('fotoPerfil')->move('foto-perfil/',$usuario->usuario_id.'.'.$request->file('fotoPerfil')->getClientOriginalExtension());
    //       $usuario->fotoProfile = 'foto-perfil/'.$usuario->usuario_id.'.'.$request->file('fotoPerfil')->getClientOriginalExtension();
   
    //       $usuario->save();


    //     }
  
    //     return view('profile')->with('usuario', $usuario);
    // }

  }
