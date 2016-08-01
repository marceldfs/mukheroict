<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccao extends Model
{
    protected $fillable = ['descricao'];
    
    public function ExperienciasEDM()
    {
        return $this->hasMany(Experiencia_edm::class,"direccao");
    }
    
    public function ExperienciasEDMReformado()
    {
        return $this->hasMany(Experiencia_edm_reformado::class,"direccao");
    }
    
    public function HistoricosExperienciaEDM()
    {
        return $this->hasMany(Historico_experiencia_edm::class,"direccao");
    }
}
