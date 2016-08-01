<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Situacao_experiencia extends Model
{
    protected $fillable = ['descricao'];
    
    public function ExperienciasEDM()
    {
        return $this->hasMany(Experiencia_edm::class,"situacao");
    }
}
