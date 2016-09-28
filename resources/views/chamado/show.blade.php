@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-1">
    </div>
    
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading">Chamado Nº {{$chamados->id}}</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-5">
                    </div>
                    
                    <div class="col-md-1">

                        @if($chamados->users_id != 2)
                        <a href="../showTwo/{{$chamados->id}}">
                            <button type="button" class="btn btn-success" aria-label="Right Align">
                                Ver Mapa
                            </button>
                        </a>
                        @endif
                    </div>
                    
                    <div class="col-md-2">
                        @if($chamados->status_id != 2 and $chamados->users_id != 2)
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria haspopup="true" aria-expanded="false">
                            Atribuir Prioridade <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                              @foreach($prioridades as $prioridade)
                                <li><a href="../updateFive/{{$prioridade->id}}/{{$chamados->id}}">{{$prioridade->descricao}}</a></li>
                              @endforeach
                          </ul>
                        </div>
                        @endif
                    </div>
                    
                    <div class="col-md-2">
                        @if($chamados->status_id != 2 and $chamados->users_id != 2)
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria haspopup="true" aria-expanded="false">
                            Direcionar para Fila <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                              @foreach($filas as $fila)
                                <li><a href="../updateTwo/{{$fila->id}}/{{$chamados->id}}">{{$fila->descricao}}</a></li>
                              @endforeach
                          </ul>
                        </div>
                        @endif
                    </div>
                    
                    <div class="col-md-2">
                        @if($chamados->users_id == 2)
                        <a href="../updateTree/{{Auth::user()->id}}/{{$chamados->id}}">
                            <button type="button" class="btn btn-success" aria-label="Right Align">
                                Assumir
                            </button>
                        </a>
                        @endif
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-md-5">
                        <h4><b>Descrição:</b> {{$chamados->descricao}}</h4>
                    </div>  
                    <div class="col-md-7">
                        <h4><b>Data:</b> {{date('d/m/Y H:i:s', strtotime($chamados->created_at))}}</h4>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-5">
                        @if($chamados->users_id == 0)
                            <h4><b>Solucionador:</b> Sem Solucionador</h4>
                        @else
                            
                                @if($users->id == $chamados->users_id)
                                    <h4><b>Solucionador:</b> {{$users->name}}</h4>
                                @endif
                           
                        @endif
                    </div>  
                    <div class="col-md-7">
                    @foreach($filas as $fila)
                        @if($fila->id == $chamados->filas_id)
                            <h4><b>Fila:</b> {{$fila->descricao}}</h4>
                        @endif
                    @endforeach
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-5">
                        @foreach($prioridades as $prioridade)
                            @if($prioridade->id == $chamados->prioridades_id)
                                <h4><b>Prioridade:</b> {{$prioridade->descricao}}</h4>
                            @endif
                        @endforeach
                    </div>  
                    <div class="col-md-7">
                        <h4><b>Status:</b> {{$status->tipo}}</h4>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <h4><b>Endereço:</b> Rua São João, 500 - Pequi - Eunápolis/BA - CEP:45820-000</h4>
                    </div>  
                </div>
                
                
                <!--Exibir a imagem do acidente-->
                <div class="row">
                    <div class="col-md-12">
                        <!--Colocar a imagem-->                        
                        <img src="data:image/jpg;base64, {{$chamados->img}}"/>
                    </div>  
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        .
                    </div>  
                </div>
                
                                      
                               
                <div class="row">
                    <div class="col-md-12">
                        @if($chamados->users_id != 2 and $chamados->status_id != 2)
                        
                         {!! Form::open(['url'=>"chamado/update/$chamados->id"]) !!}
                            <div class="form-group">
                                {!! Form::label('resolucao', 'Resolução:') !!}
                                {!! Form::textarea('resolucao', NULL, ['class'=>'form-control']) !!}
                                {!! Form::hidden('status_id', 2, ['class'=>'form-control']) !!}
                            </div>
                            
                            <div class="form-group">
                                {!! Form::submit('Resolver Chamado', ['class'=>'btn btn-primary']) !!} 
                            </div>
                        {!! Form::close() !!}

                        @endif
                        <a href="../../chamado">
                            <button type="button" class="btn btn-primary" aria-label="Right Align">
                                Voltar
                            </button>
                        </a>
                    </div>
                    
                    
                
                </div>
                
            </div>
        </div>
    </div>
    
    <div class="col-md-1">
    </div>
</div>
@endsection