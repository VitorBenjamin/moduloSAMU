<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Chamado extends Model
{
    //
	use SoftDeletes;

	protected $table = 'chamados';
	protected $fillable = 'json';

	public function status(){

		return $this->belongTo('App\Status');	
	}

}
