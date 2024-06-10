@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
@component('components.menu1')
@endcomponent

<div class="done">
    <div class="done-inner">
        <p>会員登録ありがとうございます</p>
        <a href="/login">ログインする</a>
    </div>
</div>

@endsection