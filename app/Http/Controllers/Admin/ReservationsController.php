<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarColor;
use App\Models\CarTransmission;
use App\Models\Reservation;
use Illuminate\Support\Facades\Input;

class ReservationsController extends Controller
{
    /**
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->buildSearchData();
        return view('admin.reservations.index', $data);
    }
    /**
     * @return Illuminate\Http\Response
     */
    public function search()
    {
        $data      = $this->buildSearchData();
        $queryData = Input::all();
        if (is_null($queryData['reserve_from']) || is_null($queryData['reserve_to'])) {
            return redirect()->back()->with('err_msg', trans('admin.period'));
        }
        // build the query
        $query = Reservation::with(['car', 'car.brandModel', 'car.brandModel.brand', 'car.transmission', 'car.color'])
            ->whereDate('reserve_from', '>=', $queryData['reserve_from'])
            ->whereDate('reserve_from', '<=', $queryData['reserve_to']);
        // selected brand - model
        if (!is_null($queryData['car_brand_model_id'])) {
            $query->whereHas('car.brandModel', function ($qu) use ($queryData) {
                $qu->where('id', $queryData['car_brand_model_id']);
            });
        }
        // selected transmission
        if (!is_null($queryData['car_transmission_id'])) {
            $query->whereHas('car.transmission', function ($qu) use ($queryData) {
                $qu->where('id', $queryData['car_transmission_id']);
            });
        }
        // selected release date
        if (!is_null($queryData['release_date'])) {
            $query->whereHas('car', function ($qu) use ($queryData) {
                $qu->where('release_date', $queryData['release_date']);
            });
        }
        // selected car color
        if (!is_null($queryData['car_color_id'])) {
            $query->whereHas('car.color', function ($qu) use ($queryData) {
                $qu->where('id', $queryData['car_color_id']);
            });
        }
        // selected doors
        if (!is_null($queryData['doors'])) {

            $query->whereHas('car', function ($qu) use ($queryData) {
                $qu->where('doors', $queryData['doors']);
            });
        }
        $data['queryData'] = $queryData;
        $data['result']    = $query->get();
        // dd($data['result'], $queryData);
        return view('admin.reservations.index', $data);
    }

    /**
     * @return Array
     */
    public function buildSearchData()
    {
        // generate List of all available Car realease dates
        $data['carReleaseDates'][""] = "None";
        $cars                        = Car::all();
        foreach ($cars as $car) {
            $data['carReleaseDates'][$car->release_date] = $car->release_date;
        }
        // generate List of all Car transmissions
        $data['carTransmissionsList'] = ['' => 'None'] + CarTransmission::pluck('title', 'id')->all();

        // generate List of all available Car colors
        $data['carColorsList'] = ['' => 'None'] + CarColor::pluck('title', 'id')->all();

        // generate List of all available Car Brands - models
        $brands                      = CarBrand::all();
        $data['brandModelsList'][""] = 'None';
        foreach ($brands as $brand) {
            foreach ($brand->brandModels as $model) {
                $data['brandModelsList'][$model->id] = $brand->title . ' - ' . $model->title;
            }
        }

        return $data;
    }

}
