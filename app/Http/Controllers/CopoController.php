<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Copo;
use App\Cerveja;
use Gate;

class CopoController extends Controller
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
                $copos = Copo::paginate(5);
                return view('cervejas.copos_list', compact('copos'));
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
            if(Gate::allows('isMantenedor')){
                $acao = 1;
                return view('cervejas.copos_form', compact('acao'));
            } else if(Gate::allows('isFabricante')){
                $acao = 1;
                return view('cervejas.copos_form', compact('acao'));
            }
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
            'nome' => 'required|unique:copos|min:3|max:100',
            'descricao' => 'required'
        ]);
        // recupera todos os campos do formulário
        $dados = $request->all();

        // insere os dados na tabela
        $copo = Copo::create($dados);

        if ($copo) {
            return redirect()->route('copos.index')
                            ->with('status', $request->nome . ' Incluído!');
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
        $reg = Copo::find($id);
  
        // indica ao form que será visualizado
        $acao = 3;
  
        return view('cerveja.copos_form', compact('reg', 'acao'));
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
            if(Gate::allows('isMantenedor')){
                $reg = Copo::find($id);
                $acao = 2;
                return view('cervejas.copos_form', compact('reg', 'acao'));
            }
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
            'nome' => 'required|unique:copos,nome,'.$id.'|min:3|max:100'
        ]);
        $reg = Copo::find($id);

        $dados = $request->all();

        $alt = $reg->update($dados);

        if ($alt) {
            return redirect()->route('copos.index')
                            ->with('status', $request->nome . ' Alterado!');
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
        $copo = Copo::find($id);
        if ($copo->delete()) {
            return redirect()->route('copos.index')
                            ->with('status', $copo->nome . ' Excluído!');
        }
    }

    public function foto($id) {
        // se não estiver autenticado, redireciona para login
        if(Auth::check()){
            if(Gate::allows('isMantenedor')){
                $reg = Copo::find($id);;
                return view('cervejas.copos_foto', compact('reg'));
            }else{
                return redirect('/');
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
            $request->foto->move(public_path('coposimg'), $fotoId);
        }

        return redirect()->route('copos.index')
                        ->with('status', $request->nome . ' com Foto Cadastrada!');
    }

    public function categoriaCopo($id){
        $dados = Cerveja::where('copo_id', $id)->get();
        return view('busca.cerveja', ['cervejas' => $dados]);
    }
    public function lista(){
        $dados = Copo::orderBy('nome')->get();
        return view('busca.categoria_copo', ['dados' => $dados]);
    }
}
