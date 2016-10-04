<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    //protected $table = "nombretabla";
    
    protected $fillable = array('nombre','apellido','email', 'dni', 'tipo', 'password');
    
    
    public function reserva()
    {
        return $this->hasMany('App\Reserva', 'id_usuario');
    }
	
	
    public function domicilios()
    {
        return $this->hasMany('App\Domicilio', 'id_usuario');
    }
	
    public function clase()
    {
        return $this->hasMany('App\Clase', 'id_tutor');
    }
	
    public function reputacion()
    {
        return $this->hasMany('App\Reputacion', 'id_calificado');
    }
    
    public function reputaciondada()
    {
        return $this->hasMany('App\Reputacion', 'id_calificador');
    }
    
    public function materias(){
        return $this->belongsToMany('App\Materia', 'user_materia', 'id_usuario', 'id_materia')
                ->withTimestamps();
    }
    
    public function zonas(){
        return $this->belongsToMany('App\Zona', 'user_zona', 'id_usuario')
                ->withTimestamps();
    }
}
