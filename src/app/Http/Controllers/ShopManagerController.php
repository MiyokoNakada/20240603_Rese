<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Manager;
use App\Models\Booking;
use App\Models\User;
use App\Models\Shop;
use Carbon\Carbon;

class ShopManagerController extends Controller
{
    public function shopManager(){
        $user = Auth::user();

        if ($user->role == '1') {
            return redirect('admin')->with('access-alart', '管理者は店舗情報にアクセスできません。');
        }
        $shop_info = Manager::with('user','shop', 'shop.area', 'shop.genre')
        ->where('user_id', $user->id)
        ->first();

        $bookings = Booking::with('user')
            ->where('shop_id', $shop_info->shop_id)->get();
        foreach ($bookings as $booking) {
            $booking['formatted_time'] = Carbon::parse($booking->time)->format('H:i');
        }

        return view('shop_manager', compact('shop_info', 'bookings'));
    }

    public function showShopDetail(Request $request){
        $form = $request->all();
        dd($form);
        return view('shop_detail_update');
    }

    public function updateSchoolDetail(){

    }
}
