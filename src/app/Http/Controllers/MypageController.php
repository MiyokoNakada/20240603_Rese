<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;

class MypageController extends Controller
{
     //Mypage表示
    public function mypage(Request $request){
        $user_id = Auth::user()->id;
        $bookings = Booking::with('shop')
        ->where('user_id', $user_id)->get(); 
        foreach ($bookings as $booking) {
            $booking['formatted_time'] = Carbon::parse($booking->time)->format('H:i') ;
        }
        
        // $shops = Shop::with('area')->with('genre')->get();

        return view('mypage',compact('bookings'));    
    }
}
