@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
@component('components.menu2')
@endcomponent

<div class="search">
    <form class="search__form" action="/search" method="get">
        @csrf
        <select class="search__option" name="area_id">
            <option value="">All area</option>
            @foreach ($areas as $area)
            <option value="{{ $area->id }}" {{ request('area_id') == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
            @endforeach
        </select>
        <select class="search__option" name="genre_id">
            <option value="">All genre</option>
            @foreach ($genres as $genre)
            <option value="{{ $genre->id }}" {{ request('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
            @endforeach
        </select>
        <button class="search__submit" type=" submit"><i class="search__submit_icon fa-solid fa-magnifying-glass fa-lg"></i></button>
        <input class="search__option" type="text" name="keyword" placeholder="Search..." value="{{ request('keyword') }}">
    </form>
</div>

<div class="shops">
    @foreach($shops as $shop)
    <div class="shops-cards">
        @if(app()->environment('local'))
        <img class="shops-cards__img" src="{{ asset('storage/image/' . $shop->image) }}" alt="">
        @else
        <img class="shops-cards__img" src="{{ Storage::disk('s3')->url('images/' . $shop->image) }}" alt="">
        @endif
        <div class="shops-cards__contents">
            <h2>{{ $shop->name }}</h2>
            <p>#{{ $shop->area->name }} #{{ $shop->genre->name }}</p>
            <div class="shops-cards__button">
                <a class="shops-cards__button-detail" href="{{ url('/detail/' . $shop->id) }}">詳しくみる</a>
                <form class="shops-cards__favourite-form">
                    @if($shop->favourites->contains('user_id', Auth::id()))
                    <i class="shops-cards__favourite fa-solid fa-heart fa-2xl favourited" data-user-id="{{ Auth::user()->id }}" data-shop-id="{{ $shop->id }}"></i>
                    @else
                    <i class="shops-cards__favourite fa-solid fa-heart fa-2xl" data-user-id="{{ Auth::user()->id }}" data-shop-id="{{ $shop->id }}"></i>
                    @endif
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection