@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager.css') }}">
@endsection

@section('content')
@component('components.menu2')
@endcomponent

<div class="shop_manager">
    <h2 class="shop_manager-ttl">店舗代表者用画面</h2>

    <div class="create-shop__alart">
        {{ session('message') }}
    </div>

    <div class="shop_manager__inner">
        @if ($shop_info)
        <div class="shop-info">
            <h3>店舗情報</h3>
            <div class="shop-info__update">
                <form action="/shop_manager/update_detail" method="get">
                    <button class="shop-info__update-btn" type="submit">店舗情報編集</button>

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
                    <th></th>
                </tr>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->date }}</td>
                    <td>{{ $booking->formatted_time }}</td>
                    <td>{{ $booking->people_number }}人</td>
                    <td>
                        <form action="/shop_manager/booking_detail" method="get">
                            @csrf
                            <input type="hidden" name="id" value="{{ $booking->id }}">
                            <button>詳細</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

        @else
        <div class="shop-info">
            <p>店舗情報がありません。店舗情報を作成してください。</p>
            <h3>店舗情報作成</h3>
            <div class="shop-info__create">
                <form action="/shop_manager/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="shop-info__table">
                        <tr>
                            <th>店名</th>
                            <td><input type="text" name="name" placeholder="店舗名を入力"></td>
                        </tr>
                        <tr>
                            <th>地域</th>
                            <td>
                                <select name="area_id">
                                    <option value="">地域を選択</option>
                                    @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>ジャンル</th>
                            <td>
                                <select name="genre_id">
                                    <option value="">ジャンルを選択</option>
                                    @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}" {{ request('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>詳細</th>
                            <td><textarea name="description" cols="60" rows="5" placeholder="詳細を入力"></textarea></td>
                        </tr>
                        <tr>
                            <th>店舗写真</th>
                            <td><input type="file" name="image"></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><button class="shop-info_create-btn" type="submit">作成する</button></td>
                        </tr>
                </form>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection