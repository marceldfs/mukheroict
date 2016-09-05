<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_utilizador extends Model
{
    protected $table = 'tipo_utilizadores';
    
    protected $fillable = ['descricao'];
    
    public function Utilizadores()
    {
        return $this->hasMany(User::class,"tipo_utilizador");
    }
}

