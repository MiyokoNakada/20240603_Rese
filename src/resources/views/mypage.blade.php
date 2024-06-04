@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    @component('components.menu2')
    @endcomponent

    <div class="user">
        <h2>test さん</h2>
    </div>
    <div class="my_table">
        <div class="my_bookings">

        </div>

        <div class="my_favourites">

        </div>
    </div>
@endsection