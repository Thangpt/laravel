<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reposi extends Model
{
    //
    protected $table="repository";
    public $timestamps = false;
    protected $primaryKey = 'repository_id';
    public function City(){
        return $this->hasOne('App\City','city_id','city_id');
    }
}
