<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ShippingFee extends Model
{
    //
    protected $table = "shipping_fee";
    public $timestamps = false;
    protected $primaryKey = ['ship_from', 'ship_to'];
    public $incrementing = false;

    public function repository()
    {
        return $this->hasOne('App\Reposi', 'repository_id', 'ship_from');
    }
    public function city(){
        return $this->hasOne('App\City','city_id','ship_to');
    }

    public function productRepository()
    {
        return $this->hasMany('App\ProductRepository', 'ship_from', 'repository_id');
    }

    protected function setKeysForSaveQuery(Builder $query)
    {
        $keys = $this->getKeyName();
        if (!is_array($keys)) {
            return parent::setKeysForSaveQuery($query);
        }

        foreach ($keys as $keyName) {
            $query->where($keyName, '=', $this->getKeyForSaveQuery($keyName));
        }

        return $query;
    }

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null)
    {
        if (is_null($keyName)) {
            $keyName = $this->getKeyName();
        }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
        }

        return $this->getAttribute($keyName);
    }


}
