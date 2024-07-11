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
        $form = $request->all();
        User::create($form);

        
        return redirect('admin')->with('message', '店舗代表者を作成しました');
    }
}
