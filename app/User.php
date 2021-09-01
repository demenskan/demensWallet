<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    //Tells Laravel the key's model is a string
    protected $keyType='string';




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function resources() {
        return $this->hasMany('App\Resource', 'owner_id');   //<-- 2nd parameter is the foreign key. by default is model_name + '_id'
    }

    public function categories() {
        return $this->hasMany('App\Category');
    }

    public function categoriesIncome() {
        return $this->hasMany('App\Category')->where('type', 'IN');
    }

    public function categoriesOutcome() {
        return $this->hasMany('App\Category')->where('type', 'OUT');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }

    public function icons() {
        return $this->hasMany('App\Icon');
    }

    public function labels() {
        return $this->hasMany('App\Label');
    }

}
