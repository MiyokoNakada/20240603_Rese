<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class MypageController extends Controller
{
     //Mypage表示
    public function mypage(){
        $shops = Shop::with('area')->with('genre')->get();
        return view('mypage',compact('shops'));    
    }
}
