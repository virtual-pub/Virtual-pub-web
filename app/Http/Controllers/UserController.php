<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::paginate(5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function isMantenedor($id) {
        

        $reg = User::find($id);

        $reg->isMantenedor = ($reg->isMantenedor == 0) ? 1 : 0;
        $estado = ($reg->isMantenedor == 1) ? 'é mantenedor' : 'não é mantenedor';

        $reg->save();

        if ($reg) {
            return redirect()->route('user.index')
                            ->with('status', $reg->name . ' ' . $estado . '!');
        }
    }
    public function isFabricante($id) {
        

        $reg = User::find($id);

        $reg->isFabricante = ($reg->isFabricante == 0) ? 1 : 0;
        $estado = ($reg->isFabricante == 1) ? 'é Fabricante' : 'não é Fabricante';

        $reg->save();

        if ($reg) {
            return redirect()->route('user.index')
                            ->with('status', $reg->name . ' ' . $estado . '!');
        }
    }
    public function isUser($id) {
        

        $reg = User::find($id);

        $reg->isUser = ($reg->isUser == 0) ? 1 : 0;
        $estado = ($reg->isUser == 1) ? 'é Usuário' : 'não é Usuário';

        $reg->save();

        if ($reg) {
            return redirect()->route('user.index')
                            ->with('status', $reg->name . ' ' . $estado . '!');
        }
    }
    
 

}
