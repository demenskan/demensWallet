<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAppliance extends Model
{
    //
    protected $keyType="string";
    protected $fillable = [
        'id', 'first_name', 'last_name', 'email', 'reason_to_use', 'login_method'
    ];

}
