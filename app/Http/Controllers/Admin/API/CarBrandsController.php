<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use App\Models\CarBrand;
use Illuminate\Http\Request;

class CarBrandsController extends Controller
{
    /**
    * @param Illuminate\Http\Request
    * @return Response\Json
    */ 
    public function getModels(Request $request)
    {
        $brand = CarBrand::where('id',$request->car_brand_id)->with('brandModels')->first();
        $modelsList = $brand->brandModels->pluck('title', 'id')->all();
        return response()->json(['status'=>200, 'modelsList'=>$modelsList]);
    }
}
