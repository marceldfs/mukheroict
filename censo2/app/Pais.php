<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable = ['descricao'];
    
    public function Funcionarios()
    {
        return $this->hasMany(Funcionario::class,"pais_morada");
    }
}
