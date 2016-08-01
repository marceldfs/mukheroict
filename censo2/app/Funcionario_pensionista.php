<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario_pensionista extends Model
{
    protected $fillable = ['pensao_mzn','pensao_usd','nome_ex_familiar'];
    
    public function Funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
    
    public function FuncionarioExistente()
    {
        return $this->belongsTo(Funcionario_existente::class);
    }
    
    public function Parentesco()
    {
        return $this->belongsTo(Parentesco::class);
    }
}
