<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Festival_Programa extends Model
{

    //
    //
    //

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'festival_programa';

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
