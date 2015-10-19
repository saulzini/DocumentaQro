<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    //
    //

    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'paquetes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion', 'costo'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

    //N TO N

    public function caracteristicas(){
        return $this->belongsToMany('App\Caracteristica', 'caracteristica_paquete','id_paquete','id_caracteristica');
    }

    public function scopeDescripcion($query ,$descripcion)
    {//
        //
        if(trim($descripcion) != ""){
            $query->where('Descripcion',"LIKE","%$descripcion%");
        }
    }
}
