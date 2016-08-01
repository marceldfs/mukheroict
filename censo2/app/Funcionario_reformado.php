<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario_reformado extends Model
{
    protected $fillable = ['pensao_reforma_mzn','pensao_reforma_usd'];
    
    public function Funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
    
    public function Familiares()
    {
        return $this->hasMany(Familiar::class,"funcionario_id");
    }
    
    public function ExperienciaEDMReformado()
    {
        return $this->hasOne(Experiencia_edm_reformado::class,"funcionario_id");
    }
}
