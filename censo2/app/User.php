<?php

namespace App;

use App\Colaborador;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all of the tasks for the user.
     */
    public function Colaboradores()
    {
        return $this->hasMany(Colaborador::class,"codigo");
    }
    
    /**
     * Get all of the tasks for the user.
     */
    public function Colaboradores2()
    {
        return $this->hasMany(Colaborador::class,"user_id");
    }
    
    public function FuncionariosCreated()
    {
        return $this->hasMany(Funcionario::class,"user_created");
    }
    
    public function FuncionariosCreatedAt($creationDate)
    {
        return Funcionario::whereDate('created_at', '=' , $creationDate)->where('user_created',$this->id) ->get();
    }
    
    /**
     * Get all of the tasks for the user.
     */
    public function FuncionariosUpdated()
    {
        return $this->hasMany(Funcionario::class,"user_updated");
    }
    
    public function TipoUtilizador()
    {
        return $this->belongsTo(User::class);
    }
    
    public function TipoUtilizadorUser($tipo_utilizador)
    {
        return Tipo_utilizador::where('id', $tipo_utilizador)->first();
    }
}
