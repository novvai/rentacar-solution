<?php

namespace App\Http\Controllers\Clientside;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clientside\ReservationCreateRequest;
use App\Models\Reservation;

class ReservationsController extends Controller
{
    /**
     * @param \Http\Requests\Clientside\ReservationCreateRequest
     * @return Http\Response
     */
    public function store(ReservationCreateRequest $request)
    {
        $rentedCar = Reservation::where('car_id', $request->car_id)
            ->where(function ($q) use ($request) {
                $q->where(function ($query) use ($request) {
                    $query->whereDate('reserve_from', "<=", $request->reserve_from)
                        ->whereDate('reserve_to', ">=", $request->reserve_from);
                })->orWhere(function ($query) use ($request) {
                    $query->whereDate('reserve_from', "<=", $request->reserve_to)
                        ->whereDate('reserve_to', ">=", $request->reserve_to);
                })->orWhere(function ($query) use ($request) {
                    $query->whereDate('reserve_from', ">=", $request->reserve_from)
                        ->whereDate('reserve_to', "<=", $request->reserve_to);
                });
            })
            ->first();
        if ($rentedCar) {
            return redirect()->back()
                ->with(
                    'err_msg',
                    trans(
                        'clientside.reservation.failed',
                        ['start-date' => $rentedCar->reserve_from, 'end-date' => $rentedCar->reserve_to]
                    )
                );
        }

        $reservation = Reservation::create($request->all());
        return redirect()->back()->with('msg', trans('clientside.reservation.success'));
    }
}
