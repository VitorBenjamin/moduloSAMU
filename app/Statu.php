<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statu extends Model
{
    //
    protected $table = 'status';
    protected $fillable = ['tipo'];

	public function chamado(){

		return $this->hasMany('App\Chamado');
	}
}
