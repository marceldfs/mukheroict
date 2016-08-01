<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificado_ensino extends Model
{
    protected $fillable = ['descricao'];
    
    public function Qualificacoes()
    {
        return $this->hasMany(Qualificacao::class,"certificado");
    }
}
