<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    //
    protected $table="order_item";
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function product(){
        return $this->hasOne('App\Product','product_id','product_id');
    }

}
