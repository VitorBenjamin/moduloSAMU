<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $json = \App\Chamado::all();  

        foreach ($json as $jsons => $value) {
            echo($value);

            //echo($jsons);
        }
        return "flw";

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
    public function store(Request  $request)
    {

        $meujson = file_get_contents("php://input");
        
        $json = json_decode($meujson); 

        if ($json != null){            
            $dado['tipo']="sauve";
            \App\Statu::create($dado); 
            $dados['descricao']= $json->descricao;  
            $dados['latitude']= $json->latitude;
            $dados['longitude']= $json->longitude;
            $dados['status_id']= 1;
            $dados['img']= imap_binary($json->img);

            $dados['clinico']= false;           

            $chamado=\App\Chamado::create($dados);        
            $chamado->save();               
            return "final";
        }else{
            return "Deu Ruim";
        }       
        return "pohha";
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
}
