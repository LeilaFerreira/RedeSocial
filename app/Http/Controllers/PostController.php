<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Usuario;


class PostController extends Controller
{
  public function feed()
  {
     
    $posts = DB::table('posts')
    ->join('usuarios', function ($join) {
        $join->on('usuarios.usuario_id', '=', 'posts.usuario_id');
    })
    ->select('*')
    ->orderBy('posts.data_hora', 'desc')
    ->get();


      return view('feed')->with('posts', $posts);
  }


  public function feedProfile()
  {
    $usuario_id = session('usuario_id');
    $usuario = Usuario::find($usuario_id);
    
      
    $posts = DB::table('posts')
        ->join('usuarios', function ($join) {
            $join->on('usuarios.usuario_id', '=', 'posts.usuario_id')
                 ->where('usuarios.usuario_id', '=', Auth::id()  );
        })
        ->select('posts.*')
        ->orderBy('posts.created_at', 'desc')
        ->get();
    
      return view('profile')->with('posts', $posts)->with('usuario',$usuario);
  }



  public function createpostProfile(Request $request)
  {
      $this->validate($request, [
          'post' => 'required|max:500'
      ]);

      $post = new Post();
      $post->post = $request['post'];
      $usuario_id = session('usuario_id');

       $post = Post::create([
          'post'=>$request['post'],
          'usuario_id'=>$usuario_id
        ]);
       $post->save();
       return redirect()->action('PostController@feedProfile');

  }


  public function createPost(Request $request)
    {
        $this->validate($request, [
            'post' => 'required|max:500'
        ]);

        $post = new Post();
        $post->post = $request['post'];
        $mensagem = '!!!';
        $usuario_id = session('usuario_id');
         // if ($request->usuario()->posts()->save($post)) {
         //     $mensagem = 'Post successfully created!';
         // }
         $post = Post::create([
            'post'=>$request['post'],
            'usuario_id'=>$usuario_id
          ]);
         $post->save();
         return redirect()->action('PostController@feed');
        // return view('feed')->with(['mensagem' => $mensagem]);
    }
    public function editarPost($post_id){
        $post = Post::find($post_id);
        return view('feed_atualiza')->with('post', $post);
    }

    public function atualizar(Request $request, $post_id){
        $this->validate($request, [
            'post' => 'required|max:500'
        ]);
        $post = Post::find($post_id);
        $post->post = $request->post;
        $post->save();
        return redirect()->action('PostController@feed');
    }

    public function deletePost($post_id)
    {
      //$post = Post::where('post_id', $post_id)->first();
      if (Auth::guest()) {
          return redirect('/login');
      }
      $post = Post::find($post_id);
      $post->delete();
      return redirect()->action('PostController@feed');
      //return redirect()->route('feed')->with(['mensagem' => 'Post deletado']);
    }



    // PostPRofile
    public function editarPostProfile($post_id){
        $post = Post::find($post_id);
        return view('feed_atualiza')->with('post', $post);
    }


    public function atualizarProfile(Request $request, $post_id){
        $this->validate($request, [
            'post' => 'required|max:500'
        ]);
        $post = Post::find($post_id);
        $post->post = $request->post;
        $post->save();
        return redirect()->action('PostController@feedProfile');
    }

    public function deletePostProfile($post_id)
    {
    
      if (Auth::guest()) {
          return redirect('/login');
      }
      $post = Post::find($post_id);
      $post->delete();
     
      return redirect()->route('user.profile')->with(['mensagem' => 'Post deletado']);
    }
}
