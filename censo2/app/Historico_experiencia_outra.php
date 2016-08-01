<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico_experiencia_outra extends Model
{
    protected $fillable = ['data_inicio','data_fim'];
    
    public function FuncionarioEfectivo()
    {
        return $this->belongsTo(Funcionario_efectivo::class);
    }
    
    public function Instituicao()
    {
        return $this->belongsTo(Instituicao_ensino::class);
    }
    
    public function Profissao()
    {
        return $this->belongsTo(Profissao::class);
    }
    
    public function Cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
}
