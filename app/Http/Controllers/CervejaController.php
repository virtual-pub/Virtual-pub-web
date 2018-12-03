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
use App\Tags;
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
       
  
        return view('cervejas.cerveja_view', compact('reg'));
        

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
        //header("content-type: application/json; charset=utf-8");
        if ($id == null) {
            $retorno = array(
                "situacao" => "erro");
        } else {
            // obtem o registro do id passado
            $reg = Cerveja::find($id);
            
            //se encontrou
            if (isset($reg)) {
                $r = $reg->averageRating;
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
                    "fabricante" => $reg->fabricante->fabricante_name,
                    "avaliacao" => bcadd($r,'0',1),
                    "favoritada" => $reg->favoritadas()->count());
                } else {
                    $retorno = array(
                        "situacao" => "inexistente");
                    }
                }
                //converte array para o formato JSON
                return dd($retorno);
 
        //echo json_encode($retorno, JSON_PRETTY_PRINT);
        
     
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

    public function favoritarCerveja(int $id){
        $reg = cerveja::find($id);
        if(! $reg) {
        return redirect()->back()->with('error', 'User does not exist.'); 
        }
        $reg->favoritadas()->attach(auth()->user()->id);

        $user = Auth::user()->id;
        if($reg->favoritadas()->where('user_id', $user)->first()){

            
            //Verifica se o usuário já favoritou alguma cerveja desse estilo
            if(Tags::where('user_id', $user)->where('estilo_id', $reg->estilo->id)->first()){
                $tag = Tags::where('user_id', $user)->where('estilo_id', $reg->estilo->id)->first();
                //caso o usuário já tenha favoritado alguma cerveja desse estilo apenas incrementa o valor no banco
                Tags::where('user_id', $user)->where('estilo_id', $reg->estilo->id)->increment('valor');
            }else{
                $tag = new Tags;
                $tag->user_id = $user;
                $tag->estilo_id = $reg->estilo->id;
                $tag->valor = $tag->valor + 1;
                $tag->save();
            }



        }
        
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
        $user = Auth::user()->id;
        //Caso o usuario desfavorite a cerveja decrementa no banco até o valor chegar a zero sendo o 
        //valor minimo zero
        if(Tags::where('user_id', $user)->where('estilo_id', $reg->estilo->id)->first()){
            $tag = Tags::where('user_id', $user)->where('estilo_id', $reg->estilo->id)->first();
            if($tag->valor != 0){
                Tags::where('user_id', $user)->where('estilo_id', $reg->estilo->id)->decrement('valor');
            }
            
        }
        return redirect()->back()->with('success', 'Successfully unfollowed the user.');
    }

    public function pesq(Request $request) {

        $dados = Cerveja::where('nome', 'like','%'.$request->palavra.'%')->paginate(3);

        return view('busca.cerveja', ['cervejas' => $dados,
                         'palavra' => $request->palavra]);
    }
    
    public function fav() {
        
        $reg = Auth::user()->favoritas()->paginate(5);

        return view('cervejas.cerveja_fav', ['cervejas' => $reg]);


    }

    public function avaliacao(Request $request)

    {
        

        $this->validate($request, ['rate' => 'required']);

        $reg = Cerveja::find($request->id);

        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rate;
        $rating->user_id = Auth::user()->id;

        if($reg->ratings()->where('user_id', Auth::user()->id)->first()){
            
            $reg->ratings()->where('user_id', Auth::user()->id)->update(['rating' => $request->rate]);
             
            
        }else{
        $reg->ratings()->save($rating);
        }

        return redirect()->back();

    }

    public function estiloShow(){
        $estilos = Estilo::orderBy('nome')->get();
        $dados = Cerveja::paginate(3);
        return view('busca.estilo', ['cervejas' => $dados, 'estilos' => $estilos]);
    }

    public function estiloPesq(Request $request) {
        $estilos = Estilo::orderBy('nome')->get();
        $dados = Cerveja::where('estilo_id', $request->id)->paginate(3);

        return view('busca.estilo', ['estilos' => $estilos,'cervejas' => $dados,
                         'id' => $request->id]);
    }
    public function corShow(){
        $cores = Color::orderBy('nome')->get();
        $dados = Cerveja::get();
        return view('busca.cor', ['cervejas' => $dados, 'cores' => $cores]);
    }

    public function corPesq(Request $request) {
        $cores = Color::orderBy('nome')->get();
        $dados = Cerveja::where('color_id', $request->id)->paginate(3);

        return view('busca.cor', ['cores' => $cores,'cervejas' => $dados,
                         'id' => $request->id]);
    }
    public function copoShow(){
        $copos = Copo::orderBy('nome')->get();
        $dados = Cerveja::get();
        return view('busca.copo', ['cervejas' => $dados, 'copos' => $copos]);
    }

    public function copoPesq(Request $request) {
        $copos = Copo::orderBy('nome')->get();
        $dados = Cerveja::where('copo_id', $request->id)->paginate(3);

        return view('busca.copo', ['copos' => $copos,'cervejas' => $dados,
                         'id' => $request->id]);
    }


        public function ponderacao(){
            if(Auth::user()->favoritas()->count() == 0){
                return -1;
            }
            $reg = Auth::user()->id;
            // selecina os 5 maiores valores de estilo favoritados pelo usúario
            $elementos = DB::select('SELECT valor, estilo_id FROM tags WHERE user_id = :user_id ORDER BY valor DESC LIMIT 5', ['user_id' => $reg]);
            // quantidade total de favoritos dados pelo usuário
            $total = User::find($reg)->favoritas()->count();
            //declara um vetor de ponderação, que retorna a porcentagem de chance de aparecer um determinado
            //estilo de cerveja
            $p = Array(0.0,0.0,0.0,0.0,0.0,0.0);
            $num = 0;
             //declara um vetor com os estilos favoritos do usuário
            $id = Array(0,0,0,0,0);

            //percorre os estilos favoritos
            foreach ($elementos as $e) {
                //função de ponderação
                //o resultado é = ao valor do estilo / pelo valor total
                $p[$num] = $e->valor / $total;
                //p[5] quarda a ponderação dos estilos que não pertencem aos 5 de mais valor
                $p[5] += $e->valor;
                //atribui o id do estilo ao vetor de id's 
                $id[$num] = $e->estilo_id;
                $num++;
            
            }
            //função de complemento
            //retorna os valores do somatorio que não pertencem aos 5 maiores valores:
            //o total - o somatorio dos 5 maiores valores
            $p[5] = $total - $p[5];
            //função de ponderação
            $p[5] /= $total;


            //sorteio ponderado
            $r = rand(0,100)/100;

            $sum = 0;

            for($i = 0; $i < 5; $i++){
                if($r < $p[$i] + $sum){
                    //retorna o id do estilo a ser mostrado
                    return $id[$i];
                    
                }
                $sum += $p[$i];
            }
            //retornar -1 significa mostrar qualquer estilo
            return -1;
        
        
        }

        public function recomendCerv(){
            
            $id1 = $this->ponderacao();
            $id2 = $this->ponderacao();
            $id3 = $this->ponderacao();
            $estilo = Estilo::all()->count();

            if($id1 == -1){
                do{
                    $random = rand(1, $estilo);
                    $id1 = $random;
                }while(Cerveja::where('estilo_id', $id1)->exists() == false);
            }
            if($id2 == -1){
                do{
                $random = rand(1, $estilo);
                $id2 = $random;
                }while(Cerveja::where('estilo_id', $id2)->exists() == false);
            }
            if($id3 == -1){
            do{
                $random = rand(1, $estilo);
                $id3 = $random;
                }while(Cerveja::where('estilo_id', $id3)->exists() == false);
            }
            
            $cervejas = Array( 
                Cerveja::where('ativo', 1)->where('estilo_id', $id1)->inRandomOrder()->first(),
                Cerveja::where('ativo', 1)->where('estilo_id', $id2)->inRandomOrder()->first(),
                Cerveja::where('ativo', 1)->where('estilo_id', $id3)->inRandomOrder()->first()
            );
            

            
            //fazer função para não repetir elementos do vetor
            return view('testeview', compact('cervejas'));
        }
        
    }
    
