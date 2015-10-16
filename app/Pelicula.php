<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'peliculas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo', 'director', 'pais','anio','duracion','subtitulos','trailer','material'
        ,'sinopsis','notas','poster'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];


    /** funcion para decir que pertenece a funcion y es N
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function funciones()
    {
        //$this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
        return $this->belongsToMany('App\Funcion', 'funcion_pelicula','id_pelicula','id_funcion');
    }

    public function trafico()
    {
        //$this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
        return $this->belongsToMany('App\Trafico', 'pelicula_trafico','id_pelicula','id_trafico');
    }

    public function scopeTitulo($query ,$titulo)
    {//
        //
        if(trim($titulo) != ""){
            $query->where('Titulo',"LIKE","%$titulo%");
        }
    }

}
