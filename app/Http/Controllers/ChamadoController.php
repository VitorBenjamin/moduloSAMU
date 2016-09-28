<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Chamado;
use App\User;
use App\Fila;
use App\Prioridade;
use App\Statu;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    

    public function index()
    {
        $chamados = Chamado::all();       
        $filas = Fila::all();
        $users = User::all();
        $prioridades = Prioridade::all();
        $status = Statu::all();

        return view('chamado.index', compact('chamados', 'filas', 'users', 'prioridades', 'status'));
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
    public function store()
    {

        $meujson = file_get_contents("php://input");        
        $json = json_decode($meujson);
        if ($json != null){            
            $dados['descricao']= $json->descricao;  
            $dados['latitude']= $json->latitude;
            $dados['longitude']= $json->longitude;
            $dados['status_id']= 1;
            $dados['img']= $json->img;
            $dados['clinico']= $json->clinico;
            $dados['referencia']=$json->ref;
            $chamado=\App\Chamado::create($dados);        
            $chamado->save();               
            
            return "Chamado Enviados com Sucesso!!";
        } 
        return "Chamado Falhou tente novamente!!";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($id)
    {

        $chamados = Chamado::find($id);  
        $filas = Fila::get(); //tem que passar todas as filas
        $users = User::find($chamados->users_id);
        $prioridades = Prioridade::all();
        $status = Statu::find($chamados->status_id);
        
        return view('chamado.show', compact('chamados', 'filas', 'users', 'prioridades', 'status'));
    }
    public function showTwo($id)
    {
        $chamados = Chamado::find($id);

        return view('chamado.showTwo', compact('chamados'));
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
    //Alterar a fila dos chamados
    public function update(Request $request, $id)
    {
        Chamado::find($id)->update($request->all());
        return redirect('chamado');
    }
    
    //Alterar a fila dos chamados
    public function updateTwo($fila, $id)
    {
        //altera no banco de dados
        DB::update('update chamados set filas_id = ?, users_id = ? where id = ?', [$fila, 2, $id]);
        return redirect('chamado');
    }
    
    //Alterar o Resolvedor dos chamados
    public function updateTree($resolvedor, $id)
    {
        //altera no banco de dados
        DB::update('update chamados set users_id = ? where id = ?', [$resolvedor, $id]);

        return redirect('chamado');
    }
    
    //Alterar o Status do Chamado
    public function updateFour($statuscham, $id)
    {

        //altera no banco de dados
        DB::update('update chamados set status_id = ? where id = ?', [$statuscham, $id]);
        
        return redirect('chamado');
    }
    
     //Alterar o Status do Chamado
    public function updateFive($prioridade, $id)
    {

        //altera no banco de dados
        DB::update('update chamados set prioridades_id = ? where id = ?', [$prioridade, $id]);
        
        return redirect('chamado');
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