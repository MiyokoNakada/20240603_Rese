<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;


class BookingController extends Controller
{
    //予約登録+予約完了画面表示
    public function bookingDone(BookingRequest $request)
    {
        $booking = $request->all();
        Booking::create($booking);
        $shop_id = $booking['shop_id'];

        return view('done', compact('shop_id'));
    }

    //予約削除
    public function bookingDelete(Request $request){
        Booking::find($request->id)->delete();

        return redirect('/mypage');
    }

}
