<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    protected $keyType='string';

    protected $fillable=[ 'id', 'owner_id', 'resource_type_id', 'alias', 'currency_id', 'balance', 'icon_id' ];

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }


    public function getIconFileAttribute() {
        // accesor para obtener la ruta del icono, dependiendo del tipo
        if ($this->icon->type=='standard')
            return '/images/freepik/'.$this->icon->filename;
        else
            return '/images/custom/'.$this->icon->filename;
        //return $this->hasMany('App\Icon');
    }
    /*
    */
    public function icon() {
        return $this->hasOne('App\Icon','id','icon_id');
    }

    public function currency() {
        return $this->hasOne('App\Currency','id','currency_id');
    }

    public function resource_type() {
        return $this->hasOne('App\Resource_type','id','resource_type_id');
    }

}
