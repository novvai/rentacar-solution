<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarColor extends Model
{
    /**
     * @var $fillable
     */
    protected $fillable = ['title'];

    /**
     *  Get cars associated with given color
     */
    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
