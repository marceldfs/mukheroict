<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = ['descricao'];
    
    public function ExperienciasEDM()
    {
        return $this->hasMany(Experiencia_edm::class,"cargo");
    }
    
    public function HistoricosExperienciaEDM()
    {
        return $this->hasMany(Historico_experiencia_edm::class,"cargo");
    }
    
    public function HistoricosExperienciaOutra()
    {
        return $this->hasMany(Historico_experiencia_outra::class,"cargo");
    }
}
