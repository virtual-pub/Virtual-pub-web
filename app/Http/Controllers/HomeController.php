<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Cerveja;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {

            $reg = Auth::user();
            $cervejas = Cerveja::where('ativo', 1)->inRandomOrder()->limit(3)->get();
            $users = User::where('isFabricante', 1)->inRandomOrder()->limit(3)->get();
            


            return view('home', compact('reg','cervejas', 'users'));
        } else {
            return redirect('/');
        }
    }
    public function app(){
        return view('aplicativo');
    }
}
