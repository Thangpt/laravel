<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table="product";
    public $timestamps = false;
    protected $primaryKey = 'product_id';
    public function Group(){
        return $this->belongsTo('App\Group','product_group','group_id');
    }
}