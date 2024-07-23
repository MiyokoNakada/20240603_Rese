<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\User;
use App\Models\Shop;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\RegisterRequest;

class AdminController extends Controller
{
    //管理者用画面表示
    public function admin()
    {
        $managers = Manager::with('user', 'shop')->get();
        
        return view('admin', compact('managers'));
    }

    //店舗代表者登録機能
    public function addManager(RegisterRequest $request)
    {
        $form = $request->all();
        User::create($form);
        
        return redirect('admin')->with('message', '店舗代表者を作成しました');
    }

    //メール送信機能
    public function sendEmail(EmailRequest $request)
    {
        $details = [
            'title' => $request->title,
            'body' => $request->body
        ];
        Mail::to($request->email_address)->send(new NotificationMail($details));

        return redirect('admin')->with('success', 'メールが送信されました');
    }
}
