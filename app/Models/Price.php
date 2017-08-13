<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * @var $fillable
     */
    protected $fillable = [
        'title', 'days', 'price',
    ];
}
