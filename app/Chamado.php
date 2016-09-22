<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Chamado extends Model
{
    //
	use SoftDeletes;

	protected $table = 'chamados';
	protected $fillable = ['latitude','longitude','descricao','clinico','img','status_id'];

	public function status(){

		return $this->belongsTo('App\Status');	
	}
	public function users(){
		return $this->belongsTo('App\User','chamado_user','chamado_id','user_id');
	}

}
