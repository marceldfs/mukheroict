<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $fillable = ['descricao'];
    
    public function FuncionariosMZN()
    {
        return $this->hasMany(Funcionario::class,"banco_mzn");
    }
    
    public function FuncionariosUSD()
    {
        return $this->hasMany(Funcionario::class,"banco_usd");
    }
}
