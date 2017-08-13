<?php

namespace App\Http\Controllers\Clientside;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Price;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
    * @return Illuminate\Http\Response
    */ 
    public function index()
    {
        $cars = Car::all();
        $data['prices'] = Price::all();
        foreach ($cars as $car) {
            $data['carsList'][$car->id] = $car->full_name;
        }
        return view('clientside.home', $data);
    }
}
