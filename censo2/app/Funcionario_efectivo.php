<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario_efectivo extends Model
{
    protected $fillable = ['numero_inss','numero_carta_conducao'];
    
    public function Funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
    
    public function TamanhoCamisete()
    {
        return $this->belongsTo(Funcionario_efectivo::class);
    }
    
    public function TamanhoBotas()
    {
        return $this->belongsTo(Funcionario_efectivo::class);
    }
    
    public function TamanhoFato()
    {
        return $this->belongsTo(Funcionario_efectivo::class);
    }
    
    public function TamanhoCapacete()
    {
        return $this->belongsTo(Funcionario_efectivo::class);
    }
    
    public function TipoSanguineo()
    {
        return $this->belongsTo(Tipo_sanguineo::class);
    }
    
    public function TipoCartaConducao()
    {
        return $this->belongsTo(Tipo_carta_conducao::class);
    }
}
