<?php

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
    protected $hidden = ['remember_token'];

    //N TO N

    public function paquetes(){
        return $this->belongsToMany('App\Paquete', 'caracteristica_paquete','id_caracteristica','id_paquete');
    }

}
