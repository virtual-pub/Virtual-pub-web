<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estilo;

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
        //
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

    public function ws($id = null) {
        //indica o tipo de retorno do metodo
        header("content-type: application/json; charset=utf-8");
        if ($id == null) {
            $retorno = array(
                "situacao" => "erro",
                "nome" => null);
        } else {
            // obtem o registro do id passado
            $reg = Estilo::find($id);

            //se encontrou
            if (isset($reg)) {
                $retorno = array(
                    "situacao" => "encontrado",
                    "nome" => $reg->nome);
            } else {
                $retorno = array(
                    "situacao" => "inexistente",
                    "nome" => null);
            }
        }
        //converte array para o formato JSON
        echo json_encode($retorno, JSON_PRETTY_PRINT);
    }
}
