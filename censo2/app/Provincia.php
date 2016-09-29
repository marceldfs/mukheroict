<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $fillable = ['descricao'];
    
    public function FuncionariosNatural()
    {
        return $this->hasMany(Funcionario::class,"provincia_naturalidade");
    }
    
    public function FuncionariosMorada()
    {
        return $this->hasMany(Funcionario::class,"provincia_morada");
    }
    
    public function Distritos()
    {
        return $this->hasMany(Distrito::class,"provincias_id");
    }
}
