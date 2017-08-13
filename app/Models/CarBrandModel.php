<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarBrandModel extends Model
{
    /**
     * @var array $fillable
     *
     */
    protected $fillable = [
        'title', 'car_brand_id',
    ];

    /**
     * @var array $with
     */
    protected $with = ['brand'];

    /**
     *  Get the brand associated with given model
     */
    public function brand()
    {
        return $this->belongsTo(CarBrand::class, 'car_brand_id');
    }
}
