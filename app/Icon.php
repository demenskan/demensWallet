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

    public function getFullPathAttribute() {
        // accesor para obtener la ruta del icono, dependiendo del tipo
        if ($this->type=='standard')
            return '/images/freepik/'.$this->filename;
        else
            return '/images/custom/'.$this->filename;
        //return $this->hasMany('App\Icon');
    }
}
