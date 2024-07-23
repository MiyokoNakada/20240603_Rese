<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Favourite;
use Carbon\Carbon;

class MypageController extends Controller
{
    //Mypage表示
    public function mypage(Request $request)
    {
        $user_id = Auth::user()->id;
        $bookings = Booking::with('shop','rating', 'payment')
            ->where('user_id', $user_id)
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->get();
        foreach ($bookings as $booking) {
            $booking['formatted_time'] = Carbon::parse($booking->time)->format('H:i');
        }
        
        $favourites = favourite::with('shop', 'shop.area', 'shop.genre')
            ->where('user_id', $user_id)->get();

        return view('mypage', compact('bookings','favourites'));
    }

    //お気に入り登録
    public function favourite(Request $request)
    {
        $user_id = $request->user_id;
        $shop_id = $request->shop_id;

        $existingFavourite = Favourite::where('user_id', $user_id)
            ->where('shop_id', $shop_id)
            ->first();

        if (!$existingFavourite) {
            $favourite = new Favourite();
            $favourite->user_id = $user_id;
            $favourite->shop_id = $shop_id;
            $favourite->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

    //お気に入り削除
    public function unfavourite(Request $request)
    {
        $user_id = $request->user_id;
        $shop_id = $request->shop_id;

        $existingFavourite = Favourite::where('user_id', $user_id)
        ->where('shop_id', $shop_id)
        ->first();

        if ($existingFavourite) {
            $existingFavourite->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
