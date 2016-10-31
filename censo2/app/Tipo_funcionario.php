<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_funcionario extends Model
{
    protected $table = 'tipo_funcionario';
    
    protected $fillable = ['codigo','tipo'];
}
