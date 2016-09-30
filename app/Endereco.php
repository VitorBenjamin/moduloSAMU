<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    //
	protected $fillable = ['rua','numero','bairro','cidade'];

	public function chamado(){
		return $this->HasOne('App\Chamado');
	}
}
