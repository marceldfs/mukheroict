<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tamanho_letra extends Model
{
    protected $fillable = ['descricao'];
    
    public function FuncionariosCamisete()
    {
        return $this->hasMany(Funcionario_efectivo::class,"tamanho_camisete");
    }
    
    public function FuncionariosFato()
    {
        return $this->hasMany(Funcionario_efectivo::class,"tamanho_fato");
    }
}
