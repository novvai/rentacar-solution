<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ColorCreateUpdateRequest;
use App\Models\CarColor;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['colors'] = CarColor::all();
        return view('admin.colors.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorCreateUpdateRequest $request)
    {
        $color = CarColor::create($request->all());
        return redirect()->back()->with('msg', trans('admin.created'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CarColor $color
     * @return \Illuminate\Http\Response
     */
    public function update(ColorCreateUpdateRequest $request, CarColor $color)
    {
        $color->update($request->all());
        return redirect()->back()->with('msg', trans('admin.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CarColor $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarColor $color)
    {
        $color->delete();
        return redirect()->back()->with('msg', trans('admin.destroy'));
    }
}
