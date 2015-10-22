<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patrocinador_Programa extends Model
{
    //
    //
    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patrocinador_programa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];
}
