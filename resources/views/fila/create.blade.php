@extends('layouts.app')

@section('content')
 

    <!--Lista de Fila-->
<div class="row">  

<div class="col-md-1">
    </div>
    <div class="col-md-10">
<div class="table-responsive">

<table class="table">
<a href="#!" class="collection-header"><h4>Cadastro Fila de Chamado</h4></a>

    {!! Form::open(['url'=>'fila/store']) !!}
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição:') !!}
            {!! Form::text('descricao', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('departamento', 'Departamento:') !!}
            {!! Form::text('departamento', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nivel', 'Nível:') !!}
            {!! Form::text('nivel', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Criar', ['class'=>'btn btn-primary']) !!} 
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