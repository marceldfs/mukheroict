<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $fillable = ['descricao'];
    
    public function FuncionariosNatural()
    {
        return $this->hasMany(Funcionario::class,"distrito_naturalidade");
    }
    
    public function FuncionariosMorada()
    {
        return $this->hasMany(Funcionario::class,"distrito_morada");
    }
}
