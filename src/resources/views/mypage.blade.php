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
        <h2>test さん</h2>
    </div>
    <div class="my_table">
        <div class="my_bookings">
            <h3>予約状況</h3>
            <div class="my_bookings__card">
                <p class="my_bookings__table-ttl">予約1</p>
                <button class="my_bookings__table-close">×</button>
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
        </div>

        <div class="my_favourites">
            <h3>お気に入り店舗</h3>
            <div class="shops">
                <div class="shops-cards">
                    <img class="shops-cards__img" src="{{ asset('storage/image/sushi.jpg') }}" alt="">
                    <div class="shops-cards__contents">
                        <h2>shopname</h2>
                        <p>#area #genre</p>
                        <div class="shops-cards__button">
                            <button class="shops-cards__button-detail">詳しくみる</button>
                            <img class="shops-cards__favourite" src="{{ asset('img/favourite_heart.png') }}">
                        </div>
                    </div>
                </div>
                <div class="shops-cards">
                    <img class="shops-cards__img" src="{{ asset('storage/image/sushi.jpg') }}" alt="">
                    <div class="shops-cards__contents">
                        <h2>shopname</h2>
                        <p>#area #genre</p>
                        <div class="shops-cards__button">
                            <button class="shops-cards__button-detail">詳しくみる</button>
                            <img class="shops-cards__favourite" src="{{ asset('img/favourite_heart.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection