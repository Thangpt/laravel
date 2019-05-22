<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table="order";
    public $timestamps = false;
    protected $primaryKey = 'order_id';
    public function orderUser(){
        return $this->belongsTo('App\User','user_id');

    }
    public function OrderItem(){
        return $this->hasMany('App\Order_item','order_id','order_id');
    }

}
