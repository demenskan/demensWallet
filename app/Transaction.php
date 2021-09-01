<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $keyType="string";


    protected $fillable = [
        'id','resource_id', 'alter_resource_id','description', 'type', 'operation_timestamp', 'amount', 'resultant_balance','category_id', 'operator_id', 'notes'

    ];

    public function resource() {
        return $this->belongsTo('App\Resource');
    }

    public function alter_resource() {
        return $this->belongsTo('App\Resource', 'alter_resource_id');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function labels() {
        return $this->belongsToMany('App\Label');
    }
}
