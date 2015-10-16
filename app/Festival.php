<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Festival extends Model
{
    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'festivales';

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
        return $this->hasMany('App\Funcion','id_festival','id')->orderBy('fecha','asc');
    }

    public function scopeTitulo($query ,$titulo)
    {//
        //
        if(trim($titulo) != ""){
            $query->where('Titulo',"LIKE","%$titulo%");
        }
    }

    public function patrocinadores()
    {
        //$this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
        return $this->belongsToMany('App\Patrocinador', 'festival_patrocinador','id_festival','id_patrocinador');
    }

    public function programas()
    {
        //$this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
        return $this->belongsToMany('App\Programa', 'festival_programa','id_festival','id_programa');
    }
}
