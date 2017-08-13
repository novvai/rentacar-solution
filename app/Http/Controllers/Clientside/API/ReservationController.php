<?php

namespace App\Http\Controllers\Clientside\API;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
    * @param
    * @return
    */ 
    public function calculateReservation(Request $request)
    {
        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);
        $workDays = 0;
        while (true) {
            if ($startDate->isWeekDay()) {
                $workDays++;
            }
            if ($startDate == $endDate) {
                break;
            }
            $startDate->addDay();
        }
        $data['workDays'] = $workDays;
        $priceRecord = Price::where('days', '>=', $workDays)->first();
        if (!$priceRecord) {
            $priceRecord = Price::whereNull('days')->first();
        }
        $data['rentFee'] = $priceRecord->price * $workDays;
        // dd($priceRecord->price, $workDays);
        return response()->json($data);
    }
}
