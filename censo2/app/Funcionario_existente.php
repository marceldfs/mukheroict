<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario_existente extends Model
{
    protected $fillable = ['codigo','nome'];
    
    public function Funcionario()
    {
        return $this->hasOne(Funcionario::class,"codigo");
    }
    
    public function FuncionarioPensionista()
    {
        return $this->hasOne(Funcionario_pensionista::class,"codigo_ex_familiar");
    }
}
