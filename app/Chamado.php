<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Chamado extends Model
{
    //
	use SoftDeletes;

	protected $table = 'chamados';
	protected $fillable = ['latitude','longitude','descricao','clinico','img','status_id','prioridades_id','filas_id','users_id','referencia','enederecos_id'];

	public function status(){

		return $this->belongsTo('App\Status');	
	}
	public function prioridade(){

		return $this->belongsTo('App\Prioridade');	
	}
	public function fila(){

		return $this->belongsTo('App\Fila');	
	}
	public function users(){
		return $this->belongsTo('App\User');
	}

}