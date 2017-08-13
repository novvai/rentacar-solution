<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarCreateUpdateRequest;
use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarColor;
use App\Models\CarTransmission;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['cars'] = Car::all();
        return view('admin.cars.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['brandsList']        = CarBrand::pluck('title', 'id')->all();
        $data['transmissionsList'] = CarTransmission::pluck('title', 'id')->all();
        $data['colorsList']        = CarColor::pluck('title', 'id')->all();
        return view('admin.cars.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarCreateUpdateRequest $request)
    {
        Car::create($request->all());
        return redirect()->back()->with('msg', trans('admin.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Car $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $data['brandsList']        = CarBrand::pluck('title', 'id')->all();
        $data['transmissionsList'] = CarTransmission::pluck('title', 'id')->all();
        $data['colorsList']        = CarColor::pluck('title', 'id')->all();
        $data['car'] = $car;
        return view('admin.cars.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Car $car
     * @return \Illuminate\Http\Response
     */
    public function update(CarCreateUpdateRequest $request, Car $car)
    {
        $car->update($request->all());
        return redirect()->back()->with('msg', trans('admin.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Car $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->back()->with('msg', trans('admin.destroy'));
    }
}
