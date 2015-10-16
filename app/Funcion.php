<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcion extends Model
{
    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'funciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','id_sede', 'asistencia', 'poster','status','programadopor',
        'id_programa','id_festival','fecha'];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

    // Task model
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    //N a N
    public function peliculas()
    {
        //$this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
        return $this->belongsToMany('App\Pelicula', 'funcion_pelicula','id_funcion','id_pelicula');
    }

    public function patrocinadores()
    {
        //$this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
        return $this->belongsToMany('App\Patrocinador', 'funcion_patrocinador','id_funcion','id_patrocinador');
    }




    // 1 a N
    public  function sedes(){
        return $this->belongsTo('App\Sede','id_sede');
    }


    public  function programas(){
        return $this->belongsTo('App\Programa','id_programa');
    }

    public  function festivales(){
        return $this->belongsTo('App\Festival','id_festival');
    }


    public function scopeTitulo($query ,$titulo)
    {//
        //
        if(trim($titulo) != ""){
            $query->where('Titulo',"LIKE","%$titulo%");
        }
    }
}
