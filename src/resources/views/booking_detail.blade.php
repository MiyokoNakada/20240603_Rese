@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
@component('components.menu2')
@endcomponent
<div class="booking_detail">

    <div class="my_bookings ">
        <a href='/shop_manager' class="return"> &lt;</a>
        <h3>来店確認</h3>
        <div class="alart">
            {{ session('message') }}
        </div>

        <div class="my_bookings__card">
            <p class="my_bookings__table-ttl">
                <i class="fa-regular fa-clock fa-lg"></i>
                予約詳細
            </p>

            <table class="my_bookings__table">
                <tr>
                    <th class="my_bookings__table-label">Name</th>
                    <td class="my_bookings__table-item">{{ $booking->user->name}}</td>
                </tr>
                <tr>
                    <th class="my_bookings__table-label">Date</th>
                    <td class="my_bookings__table-item">{{ $booking->date }}</td>
                </tr>
                <tr>
                    <th class="my_bookings__table-label">Time</th>
                    <td class="my_bookings__table-item">{{ $booking->formatted_time }}</td>
                </tr>
                <tr>
                    <th class="my_bookings__table-label">Number</th>
                    <td class="my_bookings__table-item">{{ $booking->people_number }}</td>
                </tr>
            </table>
            @if($booking->visit_at)
            <button class="my_bookings__table-change">確認済み</button>
            @else
            <form action="/shop_manager/booking_detail" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $booking->id }}">
                <button class="my_bookings__table-change">来店確認</button>
            </form>
            @endif
            @if($booking->visit_at)
            <p>お会計</p>
            <form action="/shop_manager/payment_amount" method="POST">
                @csrf
                <div>
                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                    <label for="amount">金額（円）:</label>
                    <input type="number" name="amount">
                </div>
                <button type="submit">金額を決定</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection