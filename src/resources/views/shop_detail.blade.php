@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_detail.css') }}">
@endsection

@section('content')
@component('components.menu2')
@endcomponent


<div class="details">
    <div class="shop-detail">
        <button class="return"> &lt;</button>
        <h2 class="shop-name">{{ $detail->name }}</h2>
        <img class="shop-img" src="{{ asset('storage/image/' . $detail->image) }}" alt="">
        <p>#{{ $detail->area->name }} #{{ $detail->genre->name }}</p>
        <p>{{ $detail->description }}</p>
    </div>

    <div class="booking">
        <div class="booking-card">
            <form class="booking-form">
                <h2 class="booking-ttl">予約</h2>
                <input type="date">
                <input type="time" name="time" min="10:00" max="23:00" step="1800">
                <input type="number">
                <div class="booking-confirm">
                    <table class="my_bookings__table">
                        <tr>
                            <th class="my_bookings__table-label">Shop</th>
                            <td class="my_bookings__table-item">店名</td>
                        </tr>
                        <tr>
                            <th class="my_bookings__table-label">Date</th>
                            <td class="my_bookings__table-item">日付</td>
                        </tr>
                        <tr>
                            <th class="my_bookings__table-label">Time</th>
                            <td class="my_bookings__table-item">何時</td>
                        </tr>
                        <tr>
                            <th class="my_bookings__table-label">Number</th>
                            <td class="my_bookings__table-item">何人</td>
                        </tr>
                    </table>
                </div>
                <button type="submit">予約する</button>
            </form>
        </div>
    </div>
</div>

@endsection