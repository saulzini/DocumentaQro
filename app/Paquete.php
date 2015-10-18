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

    //N to 1

    public function patrocinadores(){
        return $this->hasMany('App\Patrocinador', 'id_paquete','id');
    }
}
