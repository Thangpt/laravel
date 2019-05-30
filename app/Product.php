<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table="product";
    public $timestamps = false;
    protected $primaryKey = 'product_id';


    public function getSize(){
        return $this->hasOne('App\Size','id','size');
    }
    public function getColor(){
        return $this->hasOne('App\Color','id','color');
            }
    public function group(){
        return $this->belongsTo('App\Group','product_group','group_id');
    }
}
