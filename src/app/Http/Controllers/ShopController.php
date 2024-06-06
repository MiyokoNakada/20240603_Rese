<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Booking;

class ShopController extends Controller
{
    //飲食店一覧表示
    public function index()
    {
        $areas = Area::all();
        $genres = Genre::all();
        $shops = Shop::with('area')->with('genre')->get();

        return view('index', compact('areas', 'genres', 'shops'));
    }

    //飲食店詳細表示
    public function detail($shop_id)
    {
        $detail = Shop::find($shop_id);
        return view('shop_detail', compact('detail'));
    }

    //予約完了
    public function done(Request $request){
        $booking = $request -> all();
        // dd($booking);
        Booking::create($booking);
        return view('done');
    }
}
