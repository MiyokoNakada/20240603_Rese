@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<div class="payment">
    <a href='/mypage' class="return"> &lt;</a>
    <p>支払い金額：{{ $payment->amount }} 円</p>
    <form action="/payment" method="POST">
        @csrf
        <input type="hidden" name="booking_id" value="{{ $payment->booking_id }}">
        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ env('STRIPE_KEY') }}" data-amount="{{ $payment->amount }}" data-name="Stripe Demo" data-label="決済をする" data-description="Stripe Demo" data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-currency="JPY">
        </script>
    </form>
</div>

@endsection