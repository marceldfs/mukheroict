<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['descricao'];
    
    public function ExperienciasEDM()
    {
        return $this->hasMany(Experiencia_edm::class,"departamento");
    }
    
    public function HistoricosExperienciaEDM()
    {
        return $this->hasMany(Historico_experiencia_edm::class,"departamento");
    }
    
}
