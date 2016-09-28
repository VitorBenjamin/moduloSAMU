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
                    <div class="col-md-2">Descricao</div>
                    <div class="col-md-1">Prioridade</div>
                    <div class="col-md-2">Status</div>
                    <div class="col-md-2">Data / Hora</div>
                </div>
            </ul>
            
            <!--Linha de cada chamado-->
            
            @foreach($chamados as $chamado)
                @if($chamado->status_id == 2)
                    <a href="chamado/show/{{$chamado->id}}" class="list-group-item list-group-item-success">
                @else
                    <a href="chamado/show/{{$chamado->id}}" class="list-group-item">
                @endif
               
                <div class="row">
                    <div class="col-md-1">{{$chamado->id}}</div>
                    @foreach($users as $user)
                        @if($user->id == $chamado->users_id)
                            <div class="col-md-2">{{$user->name}}</div>  
                        @endif
                    @endforeach
                        
                    @foreach($filas as $fila)
                        @if($fila->id == $chamado->fila_id)
                            <div class="col-md-2">{{$fila->descricao}} / {{$fila->departamento}}</div>  
                        @endif
                    @endforeach
                    
                    <div class="col-md-2">{{$chamado->descricao}}</div>
                    
                    @foreach($prioridades as $prioridade)
                        @if($prioridade->id == $chamado->prioridades_id)
                            <div class="col-md-1">{{$prioridade->descricao}}</div> 
                        @endif
                    @endforeach
                    
                    @foreach($status as $statu)
                        @if($statu->id == $chamado->status_id)
                            <div class="col-md-2">{{$statu->descricao}}</div>
                        @endif
                    @endforeach
                    
                    
                    <div class="col-md-2">{{date('d/m/Y H:i:s', strtotime($chamado -> created_at))}}</div>
                </div>
            </a>
                
            @endforeach
        </div>
    </div>
    
    
    <div class="col-md-1">
    </div>
    
</div>

@endsection

