<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_documento extends Model
{
    protected $fillable = ['descricao'];
    
    public function Funcionarios()
    {
        return $this->hasMany(Funcionario::class,"tipo_documento");
    }
    
    public function Familiares()
    {
        return $this->hasMany(Familiar::class,"tipo_documento");
    }
}
