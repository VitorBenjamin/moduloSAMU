<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Chamado extends Model
{
    //
	use SoftDeletes;

	protected $table = 'chamados';
	protected $fillable = ['latitude','longitude','descricao','statusVitima','clinico','img','status_id','prioridades_id','filas_id','users_id','referencia','enderecos_id'];

	public function status(){

		return $this->belongsTo('App\Statu','status_id');	
	}
	public function endereco(){

		return $this->hasOne('App\Endereco','enderecos_id');	
	}
	public function prioridade(){

		return $this->belongsTo('App\Prioridade','prioridades_id');	
	}
	public function fila(){

		return $this->belongsTo('App\Fila','filas_id');	
	}
	public function users(){
		return $this->belongsTo('App\User','users_id');
	}

}