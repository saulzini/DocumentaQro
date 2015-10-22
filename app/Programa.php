<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    //
    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'programas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','poster'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];

    public function funciones(){
        return $this->hasMany('App\Programa', 'id_funcion', 'id');
    }

    public function festivales(){
        return $this->belongsToMany('App\Festival', 'festival_programa','id_programa','id_festival');
    }

    public function patrocinadores(){
        return $this->belongsToMany('App\Patrocinador', 'patrocinador_programa','id_programa','id_patrocinador');
    }

    public function scopeTitulo($query ,$titulo)
    {//
        //
        if(trim($titulo) != ""){
            $query->where('Titulo',"LIKE","%$titulo%");
        }
    }

}
