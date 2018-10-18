<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Cerveja;
use App\Estilo;
use App\Copo;
use App\Color;
use App\User;
use Gate;

class CervejaController extends Controller
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
                $estilos = Estilo::orderBy('nome')->get();
                $cervejas = Cerveja::paginate(5);
                return view('cervejas.cervejas_list', compact('cervejas', 'estilos'));
            }else if(Gate::allows('isFabricante')){
                $id = Auth::user()->id;
                $cervejas = Cerveja::where('fabricante_id', $id)->paginate(5);
                $estilos = Estilo::orderBy('nome')->get();
                return view('cervejas.cervejas_list', compact('cervejas', 'estilos'));
            }else if(Gate::allows('isUser')){
                $cervejas = Cerveja::where('ativo', 1)->paginate(2);
                $estilos = Estilo::orderBy('nome')->get();
                return view('cervejas.cervejas_list', compact('cervejas', 'estilos'));
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
                $copos = Copo::orderBy('nome')->get();
                $estilos = Estilo::orderBy('nome')->get();
                $colors = Color::orderBy('id', 'asc')->get();
                $fabricantes = User::orderBy('fabricante_name')->get();
                return view('cervejas.cervejas_form', compact('acao', 'copos', 'estilos', 'colors', 'fabricantes'));
            } else if(Gate::allows('isFabricante')){
                $acao = 1;
                $copos = Copo::orderBy('nome')->get();
                $estilos = Estilo::orderBy('nome')->get();
                $colors = Color::orderBy('id', 'asc')->get();
                $fabricante = Auth::user();
                return view('cervejas.cervejas_form', compact('acao', 'copos','estilos','colors', 'fabricante'));
            }else{
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
            'nome' => 'required|unique:cervejas|min:3|max:100',
            'IBU' => 'required|numeric|min:0|max:60',
            'ABV' => 'required|numeric|min:0|max:60',
            'EBC' => 'required|numeric|min:0|max:90',
            'SRM' => 'required',
            'descricao' => 'required'
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
        if(!$reg->ativo){
                return redirect('/');
        }

        // obtém as marcas para exibir no form de consulta
        $copos = Copo::orderBy('nome')->get();
        $estilos = Estilo::orderBy('nome')->get();
        $colors = Color::orderBy('id', 'asc')->get();
        $fabricantes = User::orderBy('fabricante_name')->get();
  
        return view('cervejas.cerveja_view', compact('reg', 'copos', 'estilos', 'colors', 'fabricantes'));
        

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
                $reg = Cerveja::find($id);
                $copos = Copo::orderBy('nome')->get();
                $estilos = Estilo::orderBy('nome')->get();
                $colors = Color::orderBy('nome')->get();
                $fabricantes = User::orderBy('fabricante_name')->get();
                $acao = 2;
                if($fabricantes != null){
                    return view('cervejas.cervejas_form', compact('reg', 'acao', 'copos', 'estilos', 'colors', 'fabricantes'));
                }else {
                    return redirect('/');
                }

            }else if(Gate::allows('isFabricante')){
                $reg = Cerveja::where('fabricante_id', Auth::user()->id)->find($id);
                $copos = Copo::orderBy('nome')->get();
                $estilos = Estilo::orderBy('nome')->get();
                $colors = Color::orderBy('nome')->get();
                $fabricante = Auth::user();
                $acao = 2;
                return view('cervejas.cervejas_form', compact('reg', 'acao', 'copos', 'estilos', 'colors', 'fabricante'));
            }else{
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
            'nome' => 'required|unique:cervejas,nome,'.$id.'|min:3|max:100',
            'IBU' => 'required|numeric|min:0|max:60',
            'ABV' => 'required|numeric|min:0|max:60',
            'EBC' => 'required|numeric|min:0|max:90',
            'SRM' => 'required',
            'descricao' => 'required'

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

    public function ativar($id) {
        

        $reg = Cerveja::find($id);

        $reg->ativo = ($reg->ativo == 0) ? 1 : 0;
        $estado = ($reg->ativo == 1) ? 'Ativado' : 'Desativado';

        $reg->save();

        if ($reg) {
            return redirect()->route('cervejas.index')
                            ->with('status', $reg->nome . ' ' . $estado . '!');
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
                    "id" => $reg->id,
                    "nome" => $reg->nome,
                    "IBU" => $reg->IBU,
                    "ABV" => $reg->ABV,
                    "SRM" => $reg->SRM,
                    "EBC" => $reg->EBC,
                    "descricao" => $reg->descricao,
                    "copo_id" =>$reg->copo->id,
                    "copo" => $reg->copo->nome,
                    "copo_descricao" => $reg->copo->descricao,
                    "estilo" => $reg->estilo->nome,
                    "estilo_descricao" => $reg->estilo->descricao,
                    "cor" => $reg->color->nome,
                    "cor_hex" => $reg->color->hex,
                    "fabricante" => $reg->fabricante->fabricante_name);
            } else {
                $retorno = array(
                    "situacao" => "inexistente");
            }
        }
        //converte array para o formato JSON
 
        echo json_encode($retorno, JSON_PRETTY_PRINT);
     
    }

    public function foto($id) {
        // se não estiver autenticado, redireciona para login
        if(Auth::check()){
            if(Gate::allows('isMantenedor')){
                $reg = Cerveja::find($id);
                $copos = Copo::orderBy('nome')->get();
                $estilos = Estilo::orderBy('nome')->get();
                $colors = Color::orderBy('nome')->get();
                return view('cervejas.cervejas_foto', compact('reg', 'copos', 'estilos', 'colors'));
            }else if(Gate::allows('isFabricante')){
                $reg = Cerveja::where('fabricante_id', Auth::user()->id)->find($id);
                $copos = Copo::orderBy('nome')->get();
                $estilos = Estilo::orderBy('nome')->get();
                $colors = Color::orderBy('nome')->get();
                return view('cervejas.cervejas_foto', compact('reg', 'copos', 'estilos', 'colors'));
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
            $request->foto->move(public_path('fotos'), $fotoId);
        }

        return redirect()->route('cervejas.index')
                        ->with('status', $request->nome . ' com Foto Cadastrada!');
    }

    public function favoritarCerveja(int $profileId){
        $reg = cerveja::find($profileId);
        if(! $reg) {
        return redirect()->back()->with('error', 'User does not exist.'); 
        }
        $reg->favoritadas()->attach(auth()->user()->id);
        return redirect()->back()->with('success', 'Successfully followed the user.');
    }

    /**
    * Follow the user.
    *
    * @param $profileId
    *
    */
    public function desfazerFavoritar(int $profileId){
        $reg = Cerveja::find($profileId);
        if(! $reg) {
            return redirect()->back()->with('error', 'User does not exist.'); 
        }
        $reg->favoritadas()->detach(auth()->user()->id);
        return redirect()->back()->with('success', 'Successfully unfollowed the user.');
    }

    
}
