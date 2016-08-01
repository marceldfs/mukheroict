<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_civil extends Model
{
    protected $fillable = ['descricao'];
    
    public function Funcionarios()
    {
        return $this->hasMany(Funcionario::class,"estado_civil");
    }
}
