<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 17/10/2015
 * Time: 04:06 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;


class Caracteristica extends Model
{
    //
    //

    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'caracteristicas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    //N to 1

    public function patrocinador(){
        return $this->hasMany('App\Caracteristica', 'id_caracteristica', 'id');
    }

    public function scopeNombre($query ,$nombre)
    {//
        //
        if(trim($nombre) != ""){
            $query->where('nombre',"LIKE","%$nombre%");
        }
    }
}