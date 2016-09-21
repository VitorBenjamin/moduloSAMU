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
        //dd($request->all());
        $meujson = file_get_contents("php://input");
        
        $json = json_decode($meujson);        
        if ($json != null){
          $dados['latitude']= $json->latiude;
          $dados['longitute']= $json->longitute;
          $dados['status_id']= 1;
          $dados['descricao']= $json->descricao;          
          $dados['clinico']= false;
          if ($json->img != null) {
              $dados['img']= $json->img;
          }else{
            $dados['img']= null;
        }
        $chamado=App\Chamado::create($dados);
        $chamado->save();
          //$base64= base64_encode($json->img);
          //echo '<img src="data:image/jpg;base64,' . $json->img . '" />';
          //echo (<img src="data:image/gif;base64,$json->img">);  
        $teste = DB::select('select data from testes where id = 1');
        echo '<img src="data:image/jpg;base64,' . $teste[0]->data . '" />';
        //dd($teste[0]->data);                
        DB::insert('insert into testes (data) values (?)', [$json->img]);
        return "FIle";
    }else{
        return "Deu Ruim";
    }       
        /*$emp = $json->employees; 
        foreach ($emp as $emps) {
            echo "$emps->firstName";
        }
        */
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
