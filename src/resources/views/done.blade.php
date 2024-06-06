@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
@component('components.menu2')
@endcomponent

<div class="done">
    <div class="done-inner">
        <p>ご予約ありがとうございます</p>
        <a href="/">戻る</a>
    </div>
</div>

@endsection