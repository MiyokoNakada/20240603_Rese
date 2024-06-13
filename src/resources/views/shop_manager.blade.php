@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager.css') }}">
@endsection

@section('content')
@component('components.menu2')
@endcomponent

<div class="shop_manager">
    <h2 class="shop_manager-ttl">店舗代表者用画面</h2>

    <div class="shop_manager__inner">
        <div class="shop-info">
            <h3>店舗情報</h3>
            <div class="shop-info__update">
                <form action="/shop_manager/update_detail" method="get">
                    <button type="submit">店舗情報編集</button>

                    <table class="shop-info__table">
                        <tr>
                            <th>店名</th>
                            <td>{{ $shop_info->shop->name }}</td>
                        </tr>
                        <tr>
                            <th>地域</th>
                            <td>{{ $shop_info->shop->area->name }}</td>
                        </tr>
                        <tr>
                            <th>ジャンル</th>
                            <td>{{ $shop_info->shop->genre->name }}</td>
                        </tr>
                        <tr>
                            <th>詳細</th>
                            <td>{{ $shop_info->shop->description }}</td>
                        </tr>
                        <tr>
                            <th>店舗写真</th>
                            <td>
                                <img class="shop-img" src="{{  asset('storage/image/' . $shop_info->shop->image)  }}" alt="" width="60%">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>

        <div class="booking-info">
            <h3>予約一覧</h3>
            <table class="booking-info__table">
                <tr>
                    <th>予約氏名</th>
                    <th>日付</th>
                    <th>時間</th>
                    <th>人数</th>
                </tr>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->date }}</td>
                    <td>{{ $booking->formatted_time }}</td>
                    <td>{{ $booking->people_number }}人</td>
                </tr>
                @endforeach

            </table>

        </div>

    </div>
</div>
@endsection