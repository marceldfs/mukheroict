<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_carta_conducao extends Model
{
    protected $fillable = ['descricao'];
    
    public function Funcionarios()
    {
        return $this->hasMany(Funcionario_efectivo::class,"tipo_carta_conducao");
    }
}
