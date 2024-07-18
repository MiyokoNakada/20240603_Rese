<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RatingController extends Controller
{
    //評価用画面表示
    public function showRating(Request $request)
    {
        $booking = Booking::find($request->booking_id);

        return view('rating', compact('booking'));
    }

    //評価機能
    public function rating(Request $request)
    {
        $form = $request->all();
        Rating::create($form);

        return redirect('mypage')->with('message', '評価を投稿しました');
    }
}
