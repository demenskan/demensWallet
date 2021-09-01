<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    //
    protected $keyType="string";

    protected $fillable= [ "id", "user_id", "name", "foreground_color", "background_color", "fontawesome_id" ];

    public function transactions() {
        return $this->belongsToMany(Transaction::class);
    }

    public function labels() {
        return $this->belongsTo(User::class);
    }
}
