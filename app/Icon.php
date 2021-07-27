<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    //
    protected $fillable = [ 'id', 'filename', 'tag', 'type', 'user_id'  ];
    protected $keyType="string";
    public $incrementing=false; // Para que la funcion que devuelve el ID no regrese cero (por ser llave string)

    /*
     */
    public function resource() {
        return $this->hasMany('App\Resource','icon');
    }
}
