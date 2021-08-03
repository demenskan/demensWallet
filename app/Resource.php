<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    //
    protected $keyType='string';

    protected $fillable=[ 'id', 'owner_id', 'resource_type_id', 'alias', 'currency_id', 'balance', 'icon_id' ];

    public function transactions() {
        return $this->hasMany('App\Transaction')->orderBy('operation_timestamp');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function transactionsBefore($timestamp) {
        //Returns the transaction elements which 'operation_timestamp' value is earlier than the timestamp parameter
        return $this->transactions()->where('operation_timestamp','<',$timestamp);
    }

    public function transactionsAfter($timestamp) {
        //Returns the transaction elements which 'operation_timestamp' value is later than the timestamp parameter
        return $this->transactions()->where('operation_timestamp','>',$timestamp);
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
