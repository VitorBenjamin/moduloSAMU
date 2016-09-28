<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prioridade extends Model
{
    protected $fillable = ['descricao'];
    
    public function chamado(){
        return $this->HasMany('App\Chamado');
    }
}
