<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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

    //予約変更画面表示
    public function bookingChange(Request $request)
    {
        $user_id = Auth::user()->id;
        $booking = Booking::with('shop')->find($request->id);
        $booking['formatted_time'] = Carbon::parse($booking->time)->format('H:i');
        return view('booking_change', compact('booking'));
    }

    //予約変更機能
    public function bookingUpdate(BookingRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Booking::find($request->id)->update($form);
    
        return redirect('/mypage')->with('message', '予約を変更しました');
    }

    //予約削除
    public function bookingDelete(Request $request)
    {
        Booking::find($request->id)->delete();

        return redirect('/mypage')->with('message', '予約を取消しました');
    }
}
