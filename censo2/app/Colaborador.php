<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{   
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome','codigo'];
    
        /**
     * Get the user that owns the task.
     */
    public function userSelected()
    {
        return $this->belongsTo(Colaborador::class);
    }
    
    public function userCreated()
    {
        return $this->belongsTo(Colaborador::class);
    }
}
