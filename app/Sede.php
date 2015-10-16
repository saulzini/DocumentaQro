<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    //
    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sedes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['descripcion'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

    public function funciones(){
        return $this->hasMany('App\Funcion', 'id_sede', 'id')->orderBy('fecha','asc');;
    }

    public function scopeTitulo($query ,$titulo)
    {//
        //
        if(trim($titulo) != ""){
            $query->where('descripcion',"LIKE","%$titulo%");
        }
    }
}
