<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamanho_numero extends Model
{
    protected $fillable = ['descricao'];
    
    public function FuncionariosBota()
    {
        return $this->hasMany(Funcionario_efectivo::class,"tamanho_botas");
    }
    
    public function FuncionariosCapacete()
    {
        return $this->hasMany(Funcionario_efectivo::class,"tamanho_capacete");
    }
}
