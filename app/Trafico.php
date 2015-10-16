<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trafico extends Model
{
    //
    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'traficos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ubicacion','formato_material','status','costo','tipo'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

    public function peliculas()
    {
        //$this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
        return $this->belongsToMany('App\Trafico', 'pelicula_trafico','id_trafico','id_pelicula');
    }

    public function scopeTitulo($query ,$titulo)
    {//
        //
        if(trim($titulo) != ""){
            $query->where('Titulo',"LIKE","%$titulo%");
        }
    }

    //1 a N

    public  function integrantes(){
        return $this->belongsTo('App\Integrante','id_integrante');
    }

    public  function realizadores(){
        return $this->belongsTo('App\Realizador','id_realizador');
    }


}
