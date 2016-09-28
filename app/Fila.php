<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fila extends Model
{
    protected $fillable = ['descricao', 'departamento', 'nivel'];
    
    public function chamado(){
        return $this->HasMany('App\Chamado');
    }
}
