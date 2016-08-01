<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $fillable = ['descricao'];
    
    public function Funcionarios()
    {
        return $this->hasMany(Funcionario::class,"genero");
    }
}
