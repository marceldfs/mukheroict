<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historico_experiencia_edm extends Model
{
    protected $fillable = ['data_inicio','data_fim'];
    
    public function FuncionarioEfectivo()
    {
        return $this->belongsTo(Funcionario_efectivo::class);
    }
    
    public function Direccao()
    {
        return $this->belongsTo(Direccao::class);
    }
    
    public function Departamento()
    {
        return $this->belongsTo(Departamento::class);
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
