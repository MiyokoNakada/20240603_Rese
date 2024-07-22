<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Booking;
use App\Models\Payment;

class PaymentController extends Controller
{
    //支払金額設定
    public function setAmount(Request $request)
    {
        $payment = $request->all();
        Payment::create($payment);

        return redirect('/shop_manager/booking_detail?booking_id=' . $request->booking_id)->with('message', '金額を設定しました');
    }

    //支払い画面表示
    public function paymentPage(Request $request)
    {
        $payment = Payment::where('booking_id', $request->booking_id)->first();
        if (!$payment || !$payment->amount) {
            return redirect()->back()->with('message', '支払金額が設定されていません。');
        }

        return view('payment.payment', compact('payment'));
    }

    //支払い機能(Stripe)
    public function payment(Request $request)
    {
        $payment = Payment::where('booking_id', $request->booking_id)->firstOrFail();
        if (!$payment || !$payment->amount) {
            return redirect('mypage')->with('message', '支払金額が設定されていません。');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create([
            'amount' => $payment->amount,
            'currency' => 'jpy',
            'source' => $request->stripeToken,
            'description' => 'Test payment',
        ]);

        $payment = Payment::where('booking_id', $request->booking_id)->firstOrFail();
        $payment->status = 'completed';
        $payment->save();

        return redirect('mypage')->with('message', '支払いが完了しました');
    }
}
