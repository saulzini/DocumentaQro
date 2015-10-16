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

}
