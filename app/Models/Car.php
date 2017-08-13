<?php

namespace App\Models;

use App\Models\CarColor;
use App\Models\CarTransmission;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     *  Append additional information
     */
    protected $appends = ['full_name'];

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'car_brand_model_id',
        'release_date',
        'car_color_id',
        'doors',
        'car_transmission_id',
    ];

    /**
     * @var $with
     */
    protected $with = [
        'reservations', 'brandModel', 'color', 'transmission',
    ];

    /**
     * Retrieve custom attribute
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        $fullName = $this->brandModel->brand->title . " - " . $this->brandModel->title;
        return $fullName;
    }

    /**
     * Get all reservations
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Get the model associated with given car
     */
    public function brandModel()
    {
        return $this->belongsTo(CarBrandModel::class, 'car_brand_model_id');
    }

    /**
     * Get the color associated with given car
     */
    public function color()
    {
        return $this->belongsTo(CarColor::class, 'car_color_id');
    }

    /**
     * Get the color associated with given car
     */
    public function transmission()
    {
        return $this->belongsTo(CarTransmission::class, 'car_transmission_id');
    }
}
