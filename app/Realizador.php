<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Realizador extends Model
{
    //
    //

    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'realizadores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'vinculo', 'email','telefono'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    //N to 1

    public function traficos(){
        return $this->hasMany('App\Integrante', 'id_integrante', 'id');
    }
}
