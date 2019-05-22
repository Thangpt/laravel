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

    public function Reposi()
    {
        return $this->hasOne('App\Reposi', 'ship_from', 'repository_id');
    }

    public function City()
    {
        return $this->hasOne('App\City', 'ship_to', 'city_id');
    }

    public function ProductRepository()
    {
        return $this->hasMany('App\ProductRepository', 'ship_from', 'repository_id');
}
}
