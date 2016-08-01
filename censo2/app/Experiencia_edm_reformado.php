<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiencia_edm_reformado extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['data_reforma'];
    
    public function FuncionarioReformado()
    {
        return $this->belongsTo(Funcionario_reformado::class);
    }
    
    public function Direccao()
    {
        return $this->belongsTo(Direccao::class);
    }
}
