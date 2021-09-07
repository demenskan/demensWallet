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

    public function fluxesMonth($month, $year, $type) {
        //Returns the transactions incoming or outgoing of the resource according to the selected month & year
        // ignoring the internal movenments
        // I used this piece of code in order to make the query SARGable
        // https://stackoverflow.com/questions/32840698/how-to-select-year-and-month-from-the-created-at-attributes-of-database-table-in/32843415
        $date = \Carbon\Carbon::parse($year."-".$month."-01"); // universal truth month's first day is 1
        $start = $date->startOfMonth()->format('Y-m-d H:i:s');
        $end = $date->endOfMonth()->format('Y-m-d H:i:s');
        $alter_resource= ($type == "IN") ? "INCOME" : "OUTCOME";
        return $this->transactions()->whereBetween('operation_timestamp', [ $start, $end] )
                                    ->where('type','=', $type)
                                    ->where('alter_resource_id', '=', $alter_resource);
    }



    public function getIconFileAttribute() {
        // accesor para obtener la ruta del icono, dependiendo del tipo
        if ($this->icon->type=='standard')
            return asset("freepik_icons/".$this->icon->filename);
        else
            return asset('images/custom/'.$this->icon->filename);
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
