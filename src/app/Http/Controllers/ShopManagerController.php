<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopManagerController extends Controller
{
    public function shopManager(){
        return view('shop_manager');
    }
}
