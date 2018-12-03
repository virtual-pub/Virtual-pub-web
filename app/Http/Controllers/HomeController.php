<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Cerveja;
use App\Estilo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ponderacao(){
        if(Auth::user()->favoritas()->first() == 0){
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {

            $reg = Auth::user();
            $seguidos = $reg->followings;
            $seguidores = $reg->followers;
            
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

            return view('home', compact('reg', 'seguidos', 'seguidores', 'cervejas'));
        } else {
            return redirect('/');
        }
    }
    public function app(){
        return view('aplicativo');
    }
}
