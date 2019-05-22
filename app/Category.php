<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table="product_category";
    public $timestamps = false;
    protected $primaryKey = 'category_id';
    public function Group(){
        return $this->hasMany('App\Group','product_category','category_id');

    }
}
