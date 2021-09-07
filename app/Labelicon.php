<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labelicon extends Model
{
    //
    protected $keyType="string";
    protected $fillable = [ "id", "category" ];

    // The category field was designed to be used on the selectpickers' optgroup to
    // organize all the icons, but due to some selectpicker's bug with the combination
    // of both (optgroup + fontawesome icons) I decided to leave it simple for the moment

}
