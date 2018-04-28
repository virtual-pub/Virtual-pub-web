<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cerveja;
use App\Estilo;
use App\Copo;
use App\Color;

class CervejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cervejas = Cerveja::paginate(3);
        return view('cervejas_list', compact('cervejas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acao = 1;
        $copos = Copo::orderBy('nome')->get();
        $estilos = Estilo::orderBy('nome')->get();
        $colors = Color::orderBy('nome')->get();

        return view('cervejas_form', compact('acao', 'copos','estilos','colors'));
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
            'nome' => 'required|unique:cervejas|min:3|max:100',
            'IBU' => 'required|numeric|min:0|max:60',
            'ABV' => 'required|numeric|min:0|max:60',
            'EBC' => 'required|numeric|min:0|max:90',
            'SRM' => 'required'
        ]);
        // recupera todos os campos do formulário
        $dados = $request->all();

        // insere os dados na tabela
        $cerveja = Cerveja::create($dados);

        if ($cerveja) {
            return redirect()->route('cervejas.index')
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
        $reg = Cerveja::find($id);

        // obtém as marcas para exibir no form de consulta
        $copos = Copo::orderBy('nome')->get();
        $estilos = Estilo::orderBy('nome')->get();
        $colors = Color::orderBy('nome')->get();
  
        // indica ao form que será visualizado
        $acao = 3;
  
        return view('cervejas_form', compact('reg', 'acao', 'copos', 'estilos', 'colors'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // obtém os dados do registro a ser editado 
        $reg = Cerveja::find($id);

        // obtém as marcas para exibir no form de cadastro
        $copos = Copo::orderBy('nome')->get();
        $estilos = Estilo::orderBy('nome')->get();
        $colors = Color::orderBy('nome')->get();

        // indica ao form que será alteração
        $acao = 2;

        return view('cervejas_form', compact('reg', 'acao', 'copos', 'estilos', 'colors'));
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
            'nome' => 'required|unique:cervejas,nome,'.$id.'|min:3|max:100',
            'IBU' => 'required|numeric|min:0|max:60',
            'ABV' => 'required|numeric|min:0|max:60',
            'EBC' => 'required|numeric|min:0|max:90',
            'SRM' => 'required'
        ]);
        $reg = Cerveja::find($id);

        $dados = $request->all();

        $alt = $reg->update($dados);

        if ($alt) {
            return redirect()->route('cervejas.index')
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
        $cerveja = Cerveja::find($id);
        if ($cerveja->delete()) {
            return redirect()->route('cervejas.index')
                            ->with('status', $cerveja->nome . ' Excluído!');
        }
    }

    public function webServiceId($id = null) {
        //indica o tipo de retorno do metodo
        header("content-type: application/json; charset=utf-8");
        if ($id == null) {
            $retorno = array(
                "situacao" => "erro");
        } else {
            // obtem o registro do id passado
            $reg = Cerveja::find($id);

            //se encontrou
            if (isset($reg)) {
                $retorno = array(
                    "nome" => $reg->nome,
                    "IBU" => $reg->IBU,
                    "ABV" => $reg->ABV,
                    "SRM" => $reg->SRM,
                    "EBC" => $reg->EBC,
                    "copo_id" => $reg->copo_id,
                    "estilo_id" => $reg->estilo_id,
                    "color_id" => $reg->color_id);
            } else {
                $retorno = array(
                    "situacao" => "inexistente");
            }
        }
        //converte array para o formato JSON
        echo "<pre>";
        echo json_encode($retorno, JSON_PRETTY_PRINT);
        echo "</pre>";
    }

    public function foto($id) {
    
        // obtém os dados do registro a ser exibido
        $reg = Cerveja::find($id);

        // obtém as marcas para exibir no form de cadastro
        $copos = Copo::orderBy('nome')->get();
        $estilos = Estilo::orderBy('nome')->get();
        $colors = Color::orderBy('nome')->get();

        return view('cervejas_foto', compact('reg', 'copos', 'estilos', 'colors'));
    }

    public function storefoto(Request $request) {

        // recupera todos os campos do formulário
        $dados = $request->all();

        $id = $dados['id'];

        if (isset($dados['foto'])) {
            $fotoId = $id . '.jpg';
            $request->foto->move(public_path('fotos'), $fotoId);
        }

        return redirect()->route('cervejas.index')
                        ->with('status', $request->nome . ' com Foto Cadastrada!');
    }
    
}
