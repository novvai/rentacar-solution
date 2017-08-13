<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    /**
     * @var array $fillable
     */
    protected $fillable = ['title'];

    /**
     *  Get all models associated with given brand
     */
    public function brandModels()
    {
        return $this->hasMany(CarBrandModel::class);
    }
}
