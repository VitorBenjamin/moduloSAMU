@extends('layouts.app')

@section('content')
 

    <!--Lista de Fila-->
<div class="row">  

<div class="col-md-1">
    </div>
    <div class="col-md-10">
<div class="table-responsive">

<table class="table">
    
<a href="#!" class="collection-header"><h4>Alterar Fila Chamado</h4></a>
    {!! Form::open(['url'=>"fila/update/$filas->id"]) !!}
        <div class="form-group">
            {!! Form::label('cod', 'Código:') !!}
            <input class="form-control" id="disabledInput" type="text" value={{$filas->id}} disabled>
        </div>
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição:') !!}
            {!! Form::text('descricao', $filas->descricao, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('departamento', 'Departamento:') !!}
            {!! Form::text('departamento', $filas->departamento, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nivel', 'Nível:') !!}
            {!! Form::text('nivel', $filas->nivel, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Alterar', ['class'=>'btn btn-primary']) !!} 
            
        <a href="../../fila">
            <button type="button" class="btn btn-primary">Voltar</button>
        </a>
        </div>
       
    {!! Form::close() !!}

</table>
</div>
</div>
</div>

@endsection