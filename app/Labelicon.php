<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labelicon extends Model
{
    //
    protected $keyType="string";
    protected $fillable = [ "id", "description" ];
}
