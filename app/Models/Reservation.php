<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
    * @var $appends
    * 
    */    
    protected $appends = ['period'];
    /**
     * @var $fillable
     */
    protected $fillable = [
        'car_id', 'first_name', 'last_name', 'phone', 'email', 'reserve_from', 'reserve_to', 'work_days', 'fee',
    ];

    /**
    * @param
    * @return
    */ 
    public function getPeriodAttribute()
    {
        return $this->reserve_from . ' <> ' . $this->reserve_to;
    }

    /**
     * Get the associated car
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
