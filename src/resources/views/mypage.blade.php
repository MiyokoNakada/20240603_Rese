@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
@component('components.menu2')
@endcomponent
<div class="mypage">
    <div class="user">
        <h2>{{ Auth::user()->name }} さん</h2>
    </div>
    <div class="my_table">
        <div class="my_bookings">
            <h3>予約状況</h3>
            <div class="booking_change__alart">
                {{ session('message') }}
            </div>

            @foreach($bookings as $index => $booking)
            <div class="my_bookings__card">
                <p class="my_bookings__table-ttl">
                    <i class="fa-regular fa-clock fa-lg"></i>
                    予約{{ $index + 1 }}
                </p>
                <div class="my_bookings__btn">
                    <form action="/booking_change" method="get">
                        @csrf
                        <input type="hidden" name="id" value="{{ $booking->id }}">
                        <button class="my_bookings__table-change">変更</button>
                    </form>
                    <form action="/booking_delete" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $booking->id }}">
                        <button class="my_bookings__table-delete">取消し</button>
                    </form>
                </div>
                <table class="my_bookings__table">
                    <tr>
                        <th class="my_bookings__table-label">Shop</th>
                        <td class="my_bookings__table-item">{{ $booking->shop->name}}</td>
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

            </div>
            @endforeach
        </div>

        <div class="my_favourites">
            <h3>お気に入り店舗</h3>
            <div class="shops">
                @foreach($favourites as $favourite)
                <div class="shops-cards">
                    <img class="shops-cards__img" src="{{ asset('storage/image/' . $favourite->shop->image) }}" alt="">
                    <div class="shops-cards__contents">
                        <h2>{{ $favourite->shop->name }}</h2>
                        <p>#{{ $favourite->shop->area->name }} #{{ $favourite->shop->genre->name }}</p>
                        <div class="shops-cards__button">
                            <a class="shops-cards__button-detail" href="{{ url('/detail/' . $favourite->shop->id) }}">詳しくみる</a>
                            <form class="shops-cards__favourite-form">
                                @if($favourite->user_id == Auth::id())
                                <i class="shops-cards__favourite fa-solid fa-heart fa-2xl favourited" data-user-id="{{ Auth::user()->id }}" data-shop-id="{{ $favourite->shop->id }}"></i>
                                @else
                                <i class="shops-cards__favourite fa-solid fa-heart fa-2xl" data-user-id="{{ Auth::user()->id }}" data-shop-id="{{ $favourite->shop->id }}"></i>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection