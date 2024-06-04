@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    @component('components.menu2')
    @endcomponent

<div class="search">
        <select class="search__option" name="area">
            <option value="">All area</option>
            @foreach ($areas as $area)
            <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
        <select class="search__option" name="area">
            <option value="">All genre</option>
            @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach   
        </select>
        <input class="search__option" type="text" placeholder="Search...">  
</div>

<div class="shops">    
    @foreach($shops as $shop)
    <div class="shops-cards">
        <img class="shops-cards__img" src="{{ asset('storage/image/' . $shop->image) }}" alt="">
        <div class="shops-cards__contents">
            <h2>{{ $shop->name }}</h2>
            <p>#{{ $shop->area->name }}   #{{ $shop->genre->name }}</p>
            <div class="shops-cards__button">
            <a class="shops-cards__button-detail" href="{{ url('/detail/' . $shop->id) }}">詳しくみる</a>
            <img class="shops-cards__favourite" src="{{ asset('img/favourite_heart.png') }}">
            </div>
        </div>
    </div>     
    @endforeach   
</div>

@endsection