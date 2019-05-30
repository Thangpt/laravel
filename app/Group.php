<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //
    protected $table="product_group";
    public $timestamps = false;
    protected $primaryKey = 'group_id';
    public function product(){
        return $this->hasMany('App\Product','product_group','group_id');
    }
    public function category(){
        return $this->belongsTo('App\Category','product_category','category_id');
    }
}
