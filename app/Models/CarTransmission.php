<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarTransmission extends Model
{
    /**
     * @var $fillable
     *
     */
    protected $fillable = [
        'title',
    ];

    /**
     *  Get cars associated with given transmission
     */
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
