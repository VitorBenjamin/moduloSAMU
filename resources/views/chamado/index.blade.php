@extends('layouts.app')

@section('content')

<!--Lista de chamados-->
<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-10">
        <div class="list-group">
            <a href="#!" class="collection-header"><h4>Chamados</h4></a>
            
            <!--Cabeçalho do Chamado-->
            <ul class="list-group-item active">
                <div class="row">
                    <div class="col-md-1">Código</div>
                    <div class="col-md-2">Proprietário</div>
                    <div class="col-md-2">Fila</div>
                    <div class="col-md-2">Descrição</div>
                    <div class="col-md-1">Prioridade</div>
                    <div class="col-md-2">Status</div>
                    <div class="col-md-2">Data / Hora</div>
                </div>
            </ul>
            <!--Linha de cada chamado-->
            @foreach($chamados as $chamado)
            <a href="chamado/show/{{$chamado->id}}" class="list-group-item {{$chamado->status_id == 2 ? 'list-group-item-success' : ''}}">
                <div class="row">
                    <div class="col-md-1">{{$chamado->id}}</div>
                    <div class="col-md-2">{{$chamado->users->name}}</div> 
                    <div class="col-md-2">{{$chamado->fila ? $chamado->fila->descricao : 'VAZIO' }} / {{$chamado->fila ? $chamado->fila->departamento : 'VAZIO'}}</div>
                    <div class="col-md-2">{{$chamado->descricao ? $chamado->descricao : 'VAZIO'}}</div>
                    <div class="col-md-1">{{$chamado->prioridade ? $chamado->prioridade->descricao : 'VAZIO'}}</div>
                    <div class="col-md-2">{{$chamado->status->tipo}}</div>
                    <div class="col-md-2">{{$chamado->created_at ? date('d/m/Y H:i:s', strtotime($chamado->created_at)) : 'VAZIO'}}</div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

</div>

@endsection

