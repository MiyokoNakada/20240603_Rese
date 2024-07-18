<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RatingController extends Controller
{
    public function showRating(Request $request)
    {
        $booking = Booking::find($request->id);

        return view('rating', compact('booking'));
    }

    public function rating(Request $request)
    {
        $rating = new Rating();
        $rating->user_id = Auth::id();
        $rating->booking_id = $request->input('booking_id');
        $rating->rating = $request->input('rating');
        $rating->comment = $request->input('comment');
        $rating->save();

        return redirect()->route('mypage')->with('success', '評価を投稿しました');
    }
}
