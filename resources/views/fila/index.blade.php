@extends('layouts.app')

@section('content')
    <!--Lista de Fila-->
<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">

        <a href="{{ url('fila/create') }}"><button type="button" class="btn btn-primary">Cadastrar</button></a>
        
        <div class="list-group">

            <a href="#!" class="collection-header"><h4>FILA - Ordem De Atendimento</h4></a>

            <ul class="list-group-item active">
                <div class="row">
                    <div class="col-md-1">Código</div>
                    <div class="col-md-3">Descrição</div>
                    <div class="col-md-3">Departamento</div>
                    <div class="col-md-1">Nivel</div>
                </div>
            </ul>
            
            @forelse($filas as $fila)
            
                
                    <ul class="list-group-item">
                        <div class="row">
                            <div class="col-md-1">{{$fila->id}}</div>
                            <div class="col-md-3">{{$fila->descricao}}</div>
                            <div class="col-md-3">{{$fila->departamento}}</div>
                            <div class="col-md-1">{{$fila->nivel}}</div>

                            <div class="col-md-1">
                                <a href="fila/edit/{{$fila->id}}">
                                     <button type="button" class="btn btn-primary">Alterar</button>
                                </a>
                            </div>
                            
                            <div class="col-md-1">
                                <a href="fila/destroy/{{$fila->id}}">
                                     <button type="button" class="btn btn-danger">Excluir</button>
                                </a>
                            </div>
                            
                        </div>
                    </ul>
                
                        
            @empty
                <div class="col-md-2">Lista Vazia</div>
            @endforelse
            
        </div>
    </div>

    <div class="col-md-1">
    </div>

</div>
    

@endsection

