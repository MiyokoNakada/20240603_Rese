@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop_manager.css') }}">
@endsection

@section('content')
@component('components.menu2')
@endcomponent

<div class="shop_detail_update">
    <h3>店舗情報編集</h3>
    <a href='/shop_manager' class="return"> &lt; 店舗情報に戻る</a>


    <table class="shop-info__table">
        <form action="/shop_manager/update_detail" method="POST" enctype="multipart/form-data">
            @csrf
            <tr>
                <th>店名</th>
                <td><input type="text" id="name" name="name" value="{{ $shop_info->shop->name }}">
                    <span class="error">@error('name'){{ $message }}@enderror</span>
                </td>
            </tr>
            <tr>
                <th>地域</th>
                <td>
                    <select name="area_id">
                        <option value="{{ $shop_info->shop->area->id }}">{{ $shop_info->shop->area->name }}</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area->id }}" {{ request('area_id') == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                        @endforeach
                    </select>
                    <span class="error">@error('area_id'){{ $message }}@enderror</span>
                </td>
            </tr>
            <tr>
                <th>ジャンル</th>
                <td>
                    <select name="genre_id">
                        <option value="{{ $shop_info->shop->genre->id }}">{{ $shop_info->shop->genre->name }}</option>
                        @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ request('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                    <span class="error">@error('genre_id'){{ $message }}@enderror</span>
                </td>
            </tr>
            <tr>
                <th>詳細</th>
                <td>
                    <textarea name="description" cols="60" rows="5">{{ $shop_info->shop->description }}</textarea>
                    <span class="error">@error('description'){{ $message }}@enderror</span>
                </td>
            </tr>
            <tr>
                <th>店舗写真</th>
                <td>
                    @if($shop_info->shop->image)
                    <img src="{{ asset('storage/image/' . $shop_info->shop->image) }}" width="40%">
                    @endif
                    <input type="file" name="image">
                    <span class="error">@error('image'){{ $message }}@enderror</span>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <button class="shop_detail_update-btn" type="submit">更新</button>
                </td>
            </tr>
        </form>
    </table>

</div>



@endsection