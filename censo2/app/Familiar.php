<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $fillable = ['nome','data_nascimento','contacto',
        'numero_documento'];
    
    public function FuncionarioEfectivo()
    {
        return $this->belongsTo(Funcionario_efectivo::class);
    }
    
    public function FuncionarioReformado()
    {
        return $this->belongsTo(Funcionario_reformado::class);
    }
    
    public function Parentesco()
    {
        return $this->belongsTo(Parentesco::class);
    }
    
    public function TipoDocumento()
    {
        return $this->belongsTo(Tipo_documento::class);
    }
    
}
