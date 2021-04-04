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

}
