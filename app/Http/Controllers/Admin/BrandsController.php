<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandCreateUpdateRequest;
use App\Models\CarBrand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['brands'] = CarBrand::all();
        return view('admin.brands.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandCreateUpdateRequest $request)
    {
        $brand = CarBrand::create($request->all());
        return redirect()->back()->with('msg', trans('admin.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarBrand $brand)
    {
        $data['brand'] = $brand;
        return view('admin.brands.show', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandCreateUpdateRequest $request, CarBrand $brand)
    {
        $brand->update($request->all());
        return redirect()->back()->with('msg', trans('admin.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarBrand $brand)
    {
        $brand->delete();
        return redirect()->back()->with('msg', trans('admin.destroy'));
    }
}
