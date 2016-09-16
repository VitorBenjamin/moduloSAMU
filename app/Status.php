<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
	protected $table = 'status';

	public function chamado(){

		return $this->hasMany('App\Chamado');
	}
}

