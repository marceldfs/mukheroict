<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia_edm extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['data_admissao','data_integracao'];
    
    public function FuncionarioEfectivo()
    {
        return $this->belongsTo(Funcionario_efectivo::class);
    }
    
    public function Situacao()
    {
        return $this->belongsTo(Situacao::class);
    }
    
    public function Direccao()
    {
        return $this->belongsTo(Direccao::class);
    }
    
    public function Carreira()
    {
        return $this->belongsTo(Carreira::class);
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
