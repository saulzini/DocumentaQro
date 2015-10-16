<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany('App\Festival', 'id_funcion', 'id');
    }
}
