<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;
use App\Estilo;
use Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            if(Gate::allows('isMantenedor')){
                $posts = Post::paginate(5);
                return view('posts.posts_list', compact('posts'));
            }else if(Gate::allows('isFabricante') || Gate::allows('isUser')){
                $id = Auth::user()->id;
                $posts = Post::where('user_id', $id)->paginate(5);
                return view('posts.posts_list', compact('posts'));
            }else{
                return redirect('/');
            }
        }
        
        return redirect('/');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
                $acao = 1;
                $user = Auth::user();
                return view('posts.posts_form', compact('acao', 'user'));
        }else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'user_id' => 'required'
        ]);
        // recupera todos os campos do formulário
        $dados = $request->all();

        // insere os dados na tabela
        $post = Post::create($dados);

        if ($post) {
            return redirect()->route('posts.index')
                            ->with('status', $request->id . ' Incluído!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
            $reg = Post::find($id);
            return view('posts/post_view', compact('reg'));
        }else{
            return redirect('/');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check()){
                $acao = 2;
                $user = Auth::user();
                $reg = Post::where('user_id', $user->id)->find($id);
                return view('posts.posts_form', compact('reg','user', 'acao'));
        }else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required'
            
        ]);
        $reg = Post::find($id);

        $dados = $request->all();

        $alt = $reg->update($dados);

        if ($alt) {
            return redirect()->route('posts.index')
                            ->with('status', $request->id . ' Alterado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->delete()) {
            return redirect()->route('posts.index')
                            ->with('status', $post->id . ' Excluído!');
        }
    }

    public function foto($id) {
        // se não estiver autenticado, redireciona para login
        if(Auth::check()){
            if(Gate::allows('isMantenedor')){
                $reg = Post::find($id);
                return view('posts.posts_foto', compact('reg'));
            }else if(Gate::allows('isFabricante') || Gate::allows('isUser')){
                $reg = Post::where('user_id', Auth::user()->id)->find($id);
                return view('posts.posts_foto', compact('reg'));
            }
        }else {
            return redirect('/');
        }
    }

    public function storefoto(Request $request) {

        // recupera todos os campos do formulário
        $dados = $request->all();

        $id = $dados['id'];

        if (isset($dados['foto'])) {
            $fotoId = $id . '.jpg';
            $request->foto->move(public_path('postimages'), $fotoId);
        }

        return redirect()->route('posts.index')
                        ->with('status', $request->id . ' com Foto Cadastrada!');
    }

    public function indexP(){
        $posts = Post::orderBy('created_at', 'desc')->get();
          return view('posts.index', ['posts' => $posts]);
    }

    

    public function feed(){
        $user = Auth::user()->id;

        $posts = DB::table('amizades')
        ->join('posts', 'posts.user_id', '=', 'amizades.seguidor_id')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.id as id', 'posts.user_id as userId', 'posts.description as desc', 'posts.created_at as data', 'users.name as nome', 'users.avatar as userimg')
        ->where('amizades.user_id', '=', $user)
        ->orderBy('data', 'desc')
        ->get();

        return view('feed', compact('posts'));
    }
}
