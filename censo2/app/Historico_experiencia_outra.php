<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico_experiencia_outra extends Model
{
    protected $fillable = ['data_inicio','data_fim','instituicao','profissao','cargo'];
    
    public function FuncionarioEfectivo()
    {
        return $this->belongsTo(Funcionario_efectivo::class);
    }
}
