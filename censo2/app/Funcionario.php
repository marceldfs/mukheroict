<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['nome','codigo','nome_completo','numero_documento','nuit',
        'data_nascimento','numero_conta_mzn','nib_mzn','numero_conta_usd',
        'nib_usd','localidade','celular','celular_alternativo','morada',
        'email'];
    
    public function FuncionarioExistente()
    {
        return $this->belongsTo(Funcionario_existente::class);
    }
    
    public function FuncionarioEfectivo()
    {
        return $this->hasOne(Funcionario_efectivo::class,"funcionario_id");
    }
    
    public function FuncionarioReformado()
    {
        return $this->hasOne(Funcionario::class,"funcionario_id");
    }
    
    public function FuncionarioPensionista()
    {
        return $this->hasOne(Funcionario::class,"funcionario_id");
    }
    
    public function BancoMZN()
    {
        return $this->belongsTo(Banco::class);
    }
    
    public function BancoUSD()
    {
        return $this->belongsTo(Banco::class);
    }
    
    public function EstadoCivil()
    {
        return $this->belongsTo(Estado_civil::class);
    }
    
    public function Genero()
    {
        return $this->belongsTo(Genero::class);
    }
    
    public function TipoDocumento()
    {
        return $this->belongsTo(Tipo_documento::class);
    }
    
    public function ProvinciaNaturalidade()
    {
        return $this->belongsTo(Provincia::class);
    }
    
    public function ProvinciaMorada()
    {
        return $this->belongsTo(Provincia::class);
    }
    
    public function Pais()
    {
        return $this->belongsTo(Pais::class);
    }
    
    public function UserCreated()
    {
        return $this->belongsTo(User::class);
    }
    
    public function UserUpdated()
    {
        return $this->belongsTo(User::class);
    }
}
