@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')

@component('components.menu2')
@endcomponent
<div class="alart">
    {{ session('access-alart') }}
</div>

<div class="admin">
    <h2 class="admin-ttl">管理者用画面</h2>


    <div class="create-manager">
        <h3>店舗代表者作成</h3>
        <form class="create-manager__form" action="/admin/add_manager" method="post">
            @csrf
            <!-- <input type="text" name="shop_name" placeholder="Shop name" value="{{ old('shop_name') }}"> -->
            <input type="text" name="name" placeholder="Manager name" value="{{ old('name') }}">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Password">
            <input type="hidden" name="role" value="2">
            <input type="hidden" name="email_verified_at" value="{{ now() }}">
            <input class="create-manager_submit-btn" type="submit" value="登録">
        </form>
        <div class="create-manager__alart">
            {{ session('message') }}
        </div>
    </div>

    <div class="email">
        <h3>メール送信</h3>
        <form class="email__form" action="/admin/send_email" method="POST">
            @csrf
            <div class="email__form-item">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                <span class="error">@error('email'){{ $message }}@enderror</span>
                <input type="text" name="title" placeholder="Title" value="{{ old('title') }}">
                <span class="error">@error('title'){{ $message }}@enderror</span>
            </div>
            <div class="email__form-item">
                <textarea name="body" rows="5" cols="50" placeholder="本文"></textarea>
                <span class="error">@error('body'){{ $message }}@enderror</span>
            </div>
            <div class="email__form-item">
                <button type="submit">送信</button>
            </div>
        </form>
        @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
        @endif
    </div>


    <div class="manager-table">
        <h3>店舗一覧</h3>
        <table class="manager-table__inner">
            <tr class="manager-table__header_row">
                <th class="manager-table__header_item">店名</th>
                <th class="manager-table__header_item">店舗代表者</th>
            </tr>
            @foreach($managers as $manager)
            <tr class="manager-table__content_row">
                <td class="manager-table__content_item">
                    {{ $manager->shop->name }}
                </td>
                <td class="manager-table__content_item">
                    {{ $manager->user->name }}
                </td>
            </tr>
            @endforeach
        </table>
    </div>




</div>

@endsection