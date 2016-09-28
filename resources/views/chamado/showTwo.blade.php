@extends('layouts.app')

@section('content')
<script>
    lat=<?=$chamados->latitude?>;
    lng=<?=$chamados->longitude?>;
</script>
<div class="row">
    <div class="col-md-1">
    </div>
    
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading">Mapa/Rota - Chamado Nº {{$chamados->id}}</div>
            <div class="panel-body">
                <div id="mapa"></div>

                <div id="trajeto-texto"></div>
                <!--Vizualizar o MAPA-->
                <div class="row">
                    <div class="col-md-12">
                        <!--Colocar o Mapa-->                        
                        <form method="post" action="showTwo.blade.php">
                            <fieldset>
                                <legend>Criar rotas</legend>

                                <div>
                                    <label for="txtEnderecoPartida">Endereço de partida:</label>
                                    <input type="text" id="txtEnderecoPartida" name="txtEnderecoPartida" />
                                </div>

                                <div>
                                    <label for="txtEnderecoChegada">Endereço de chegada:</label>
                                    <input type="text" id="txtEnderecoChegada" name="txtEnderecoChegada" />
                                </div>

                                <div>
                                    <input type="submit" id="btnEnviar" name="btnEnviar" value="Enviar" />
                                </div>
                            </fieldset>
                        </form>
                        

                    </div>  
                </div>
                
                <div class="row">   

                    <div class="col-md-10">
                    </div>
                    
                    <div class="col-md-2">
                        <a href="../../chamado/show/{{$chamados->id}}">
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