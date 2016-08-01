<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profissao extends Model
{
    protected $fillable = ['descricao'];
    
    public function ExperienciasEDM()
    {
        return $this->hasMany(Experiencia_edm::class,"profissao");
    }
    
    public function ExperienciasEDMReformado()
    {
        return $this->hasMany(Experiencia_edm_reformado::class,"profissao");
    }
    
    public function HistoricosExperienciaEDM()
    {
        return $this->hasMany(Historico_experiencia_edm::class,"profissao");
    }
    
    public function HistoricosExperienciaOutras()
    {
        return $this->hasMany(Historico_experiencia_outra::class,"profissao");
    }
}
