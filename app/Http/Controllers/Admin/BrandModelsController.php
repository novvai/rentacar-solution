<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandModelCreateUpdateRequest;
use App\Models\CarBrand;
use App\Models\CarBrandModel;

class BrandModelsController extends Controller
{
    /**
     * @param BrandModelCreateUpdateRequest $request
     * @param CarBrand $brand
     *
     * @return Illuminate\Http\Response;
     */
    public function store(BrandModelCreateUpdateRequest $request, CarBrand $brand)
    {
        $brand->brandModels()->create($request->all());
        return redirect()->back()->with('msg', trans('admin.created'));
    }

    /**
     * @param BrandModelCreateUpdateRequest $request
     * @param CarBrand $brand
     *
     * @return Illuminate\Http\Response;
     */
    public function update(BrandModelCreateUpdateRequest $request, CarBrand $brand, CarBrandModel $model)
    {
        $model->update($request->all());
        return redirect()->back()->with('msg', trans('admin.updated'));
    }
    /**
     * @param BrandModelCreateUpdateRequest $request
     * @param CarBrand $brand
     *
     * @return Illuminate\Http\Response;
     */
    public function destroy(CarBrand $brand, CarBrandModel $model)
    {
        $model->delete();
        return redirect()->back()->with('msg', trans('admin.destroy'));
    }
}
