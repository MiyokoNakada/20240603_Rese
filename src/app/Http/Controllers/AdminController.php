<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\User;
use App\Models\Shop;

class AdminController extends Controller
{
    //管理者用画面表示
    public function admin()
    {
        $managers = Manager::with('user', 'shop')->get();

        return view('admin', compact('managers'));
    }

    //店舗代表者登録機能
    public function addManager(Request $request)
    {
        $user = $request->only(['name','email','password']);
        $shop = $request->only(['shop_name']);

        // Users,Shopsテーブルに登録
        $new_user = new User;
        $new_user->name = $user['name'];
        $new_user->email = $user['email'];
        $new_user->password = $user['password'];
        $new_user->role = 2;
        $new_user->save();
        
        $new_shop = new Shop;
        $new_shop->name = $shop['shop_name'];
        $new_shop->area_id = 1;
        $new_shop->genre_id = 1;
        $new_shop->save();
        
        // Managersテーブルに登録
        $new_manager = new Manager;
        $new_manager->user_id = $new_user->id;
        $new_manager->shop_id = $new_shop->id;
        $new_manager->save();

        return redirect('admin')->with('message', '店舗代表者を作成しました');
    }
}
