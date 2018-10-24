<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Color;
use App\Cerveja;
use Gate;

class ColorController extends Controller
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
                $colors = Color::paginate(5);
                return view('cervejas.colors_list', compact('colors'));
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
                return view('cervejas.colors_form', compact('acao'));
            } else {
                return redirect('/');
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
            'nome' => 'required|unique:colors|min:3|max:100',
            'hex' => 'required|unique:colors|min:3|max:100'
        ]);
        // recupera todos os campos do formulário
        $dados = $request->all();

        // insere os dados na tabela
        $color = Color::create($dados);

        if ($color) {
            return redirect()->route('colors.index')
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
        $reg = Color::find($id);
  
        // indica ao form que será visualizado
        $acao = 3;
  
        return view('cerveja.colors_form', compact('reg', 'acao'));
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
                $reg = Color::find($id);
                $acao = 2;
                return view('cervejas.colors_form', compact('reg', 'acao'));
            }else {
                return redirect('/');
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
            'nome' => 'required|unique:colors,nome,'.$id.'|min:3|max:100'
        ]);
        $reg = Color::find($id);

        $dados = $request->all();

        $alt = $reg->update($dados);

        if ($alt) {
            return redirect()->route('colors.index')
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
        $color = Color::find($id);
        if ($color->delete()) {
            return redirect()->route('colors.index')
                            ->with('status', $color->nome . ' Excluído!');
        }
    }
    
}
