<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    //

    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'integrantes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'telefono', 'puesto','email'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];


    //N to 1

    public function traficos(){
        return $this->hasMany('App\Integrante', 'id_integrante', 'id');
    }

    public function scopeNombre($query ,$nombre)
    {//
        //
        if(trim($nombre) != ""){
            $query->where('Nombre',"LIKE","%$nombre%");
        }
    }

}
