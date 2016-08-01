<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carreira extends Model
{
    protected $fillable = ['descricao'];
    
    public function ExperienciasEDM()
    {
        return $this->hasMany(Experiencia_edm::class,"carreira");
    }
}
