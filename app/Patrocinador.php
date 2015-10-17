<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patrocinador extends Model
{
    //
    //

    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patrocinadores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'puesto', 'email','telefono','tipo'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];


    public function funciones()
    {
        //$this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
        return $this->belongsToMany('App\Funcion', 'funcion_patrocinador','id_patrocinador','id_funcion');
    }
    public function scopeNombre($query ,$nombre)
    {//
        //
        if(trim($nombre) != ""){
            $query->where('nombre',"LIKE","%$nombre%");
        }
    }

    public  function paquetes()
    {
        return $this->belongsTo('App\Paquete','id_paquete');
    }


}
