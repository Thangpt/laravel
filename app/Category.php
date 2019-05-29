<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table="product_category";
    public $timestamps = false;
    protected $primaryKey = 'category_id';
    public function group(){
        return $this->hasMany('App\Group','category_id','product_category');

    }
}
