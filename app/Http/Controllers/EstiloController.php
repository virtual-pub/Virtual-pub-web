<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Estilo;
use Gate;

class EstiloController extends Controller
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
                $estilos = Estilo::all();
                return view('cervejas.estilos_list', compact('estilos'));
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
                return view('cervejas.estilos_form', compact('acao'));
            } else if(Gate::allows('isFabricante')){
                $acao = 1;
                return view('cervejas.estilos_form', compact('acao'));
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
            'nome' => 'required|unique:estilos|min:3|max:100'
        ]);
        // recupera todos os campos do formulário
        $dados = $request->all();

        // insere os dados na tabela
        $estilo = Estilo::create($dados);

        if ($estilo) {
            return redirect()->route('estilos.index')
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
        $reg = Estilo::find($id);
  
        // indica ao form que será visualizado
        $acao = 3;
  
        return view('cerveja.estilos_form', compact('reg', 'acao'));
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
                $reg = Estilo::find($id);
                $acao = 2;
                return view('cervejas.estilos_form', compact('reg', 'acao'));
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
            'nome' => 'required|unique:estilos,nome,'.$id.'|min:3|max:100'
        ]);
        $reg = Estilo::find($id);

        $dados = $request->all();

        $alt = $reg->update($dados);

        if ($alt) {
            return redirect()->route('estilos.index')
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
        $estilo = Estilo::find($id);
        if ($estilo->delete()) {
            return redirect()->route('estilos.index')
                            ->with('status', $estilo->nome . ' Excluído!');
        }
    }
}
