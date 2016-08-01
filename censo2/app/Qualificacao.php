<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualificacao extends Model
{
    protected $fillable = ['curso','data_inicio','data_fim'];
    
    public function FuncionarioEfectivo()
    {
        return $this->belongsTo(Funcionario_efectivo::class);
    }
    
    public function Instituicao()
    {
        return $this->belongsTo(Instituicao_ensino::class);
    }
    
    public function Certificado()
    {
        return $this->belongsTo(Certificado_ensino::class);
    }
}
