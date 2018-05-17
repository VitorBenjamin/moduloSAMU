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

class CalculadoraController extends Controller
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
    public function soma()
    {
        $meujson = file_get_contents("php://input");        
        $json = json_decode($meujson);
        if ($json != null) {
            return $json->valor1 + $json->valor2;
        }
    }
    public function subtracao()
    {
        $meujson = file_get_contents("php://input");        
        $json = json_decode($meujson);
        if ($json != null) 
        {
            return $json->valor1 - $json->valor2;
        }
    }
    public function multiplicao()
    {
        $meujson = file_get_contents("php://input");        
        $json = json_decode($meujson);
        if ($json != null) 
        {
            return $json->valor1 * $json->valor2;
        }
    }
    public function divisao()
    {
        $meujson = file_get_contents("php://input");        
        $json = json_decode($meujson);
        if ($json != null) 
        {
            return $json->valor1 / $json->valor2;
        }
    }
    public function resto()
    {
        $meujson = file_get_contents("php://input");        
        $json = json_decode($meujson);
        if ($json != null) 
        {
            return $json->valor1 % $json->valor2;
        }
    }
    public function potenciacao()
    {
        $meujson = file_get_contents("php://input");        
        $json = json_decode($meujson);

        if ($json != null) 
        {
            return pow($json->valor1,$json->valor2);
        }
    }
    public function raiz()
    {
        $meujson = file_get_contents("php://input");        
        $json = json_decode($meujson);

        if ($json != null) 
        {
            return sqrt($json->valor);
        }
    }
    public function con()
    {
        $meujson = file_get_contents("php://input");        
        $json = json_decode($meujson);
        if ($json) {
            return cos($json->valor);
        }
    }
    public function seno()
    {
        $meujson = file_get_contents("php://input");        
        $json = json_decode($meujson);
        if ($json) {
            return sis($json->valor);
        }
    }
    public function tan()
    {
        $meujson = file_get_contents("php://input");        
        $json = json_decode($meujson);
        if ($json) {
            return tan($json->valor);
        }
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
            try {
                $dados['nome']="teste";
                $dados['descricao']= $json->descricao;  
                $dados['latitude']= $json->latitude;
                $dados['longitude']= $json->longitude;
                $dados['status_id']= 2;
                $dados['img']= $json->img;
                $dados['referencia']=$json->ref;  
                $dados['clinico']= $json->clinico;
                if (!$json->clinico) {
                 $end['rua']=$json->rua;
                 $end['numero']=$json->numero;
                 $end['bairro']=$json->bairro;
                 $end['cidade']=$json->cidade;
                 $endereco=\App\Endereco::create($end);
                 $endereco->save();
                 $dados['enderecos_id']=$endereco->id;
                 $chamado=\App\Chamado::create($dados);        
                 $chamado->save();
             }          
             $chamado=\App\Chamado::create($dados);

             $chamado->save();


             return "Chamado Enviados com Sucesso!!";
         } catch (Exception $e) {
            return "Chamado Falhou tente novamente!!";
        }
    } 
    return "Seu chamado Está sem conteudo";
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
        return redirect()->back();
    }
    
    //Alterar a fila dos chamados
    public function updateTwo($fila, $id)
    {
        //altera no banco de dados
        DB::update('update chamados set filas_id = ?, users_id = ? where id = ?', [$fila, 2, $id]);
        return redirect()->back();
    }
    
    //Alterar o Resolvedor dos chamados
    public function updateTree($resolvedor, $id)
    {
        //altera no banco de dados
        DB::update('update chamados set users_id = ? where id = ?', [$resolvedor, $id]);

        return redirect()->back();
    }
    
    //Alterar o Status do Chamado
    public function updateFour($statuscham, $id)
    {

        //altera no banco de dados
        DB::update('update chamados set status_id = ? where id = ?', [$statuscham, $id]);
        
        return redirect()->back();
    }
    
     //Alterar o Status do Chamado
    public function updateFive($prioridade, $id)
    {

        //altera no banco de dados
        DB::update('update chamados set prioridades_id = ? where id = ?', [$prioridade, $id]);
        
        return redirect()->back();
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