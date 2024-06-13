@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
@component('components.menu2')
@endcomponent

<div class="admin">
    店舗代表者用画面

</div>

@endsection