@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
@component('components.menu1')
@endcomponent

<div class="auth">
    <div class="auth-inner">
        <p>Registration</p>
        <div class="auth-form">
            <form class="auth-form__form" action="/register" method="post">
                @csrf
                <div class="auth-form__item">
                    <div class="auth-form__item-name">
                        <input type="text" name="name" placeholder="Username" value="{{ old('name') }}">
                        <div class="form__error">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="auth-form__item">
                    <div class="auth-form__item-email">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="auth-form__item">
                    <div class="auth-form__item-password">
                        <input type="password" name="password" placeholder="Password">
                        <div class="form__error">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="auth-form__submit">
                    <input class="auth-form__btn" type="submit" value="登録">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection