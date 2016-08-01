<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    protected $fillable = ['descricao'];
    
    public function Familiares()
    {
        return $this->hasMany(Familiar::class,"parentesco");
    }
    
    public function FuncionariosPensionista()
    {
        return $this->hasMany(Funcionario_pensionista::class,"parentesco");
    }
}
