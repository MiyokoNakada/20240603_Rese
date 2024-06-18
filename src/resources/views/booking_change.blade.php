@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
@component('components.menu2')
@endcomponent
<div class="booking_change">

    <div class="my_table">
        <div class="my_bookings-change">
            <a href='/mypage' class="return"> &lt;</a>
            <h3>予約変更</h3>

            <div class="my_bookings__card">
                <p class="my_bookings__table-ttl">
                    <i class="fa-regular fa-clock fa-lg"></i>
                    予約詳細
                </p>
                <p>日時または人数の変更ができます</p>
                <form action="/booking_update" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $booking->id }}">

                    <table class="my_bookings__table">
                        <tr>
                            <th class="my_bookings__table-label">Shop</th>
                            <td class="my_bookings__table-item">{{ $booking->shop->name}}</td>
                        </tr>
                        <tr>
                            <th class="my_bookings__table-label">Date</th>
                            <td class="my_bookings__table-item">
                                <input type="date" name="date" value="{{ $booking->date }}">
                                <span class="error">@error('date'){{ $message }}@enderror</span>
                            </td>
                        </tr>
                        <tr>
                            <th class="my_bookings__table-label">Time</th>
                            <td class="my_bookings__table-item">
                                <select name="time">
                                    <option value="{{ $booking->time }}">{{ $booking->formatted_time }}</option>
                                    @php
                                    $start = new DateTime('10:00');
                                    $end = new DateTime('24:00');
                                    $interval = new DateInterval('PT30M');
                                    @endphp
                                    @for ($time = $start; $time < $end; $time->add($interval))
                                        <option value="{{ $time->format('H:i') }}">{{ $time->format('H:i') }}</option>
                                        @endfor
                                </select>
                                <span class="error">@error('time'){{ $message }}@enderror</span>
                            </td>
                        </tr>
                        <tr>
                            <th class="my_bookings__table-label">Number</th>
                            <td class="my_bookings__table-item">
                                <select class="booking-number" name="people_number">
                                    <option value="{{ $booking->people_number }}">{{ $booking->people_number }}</option>
                                    @for ($i =1; $i <=10 ; $i++ ) <option value="{{ $i}}">{{$i}} </option>
                                        @endfor
                                </select>
                                <span class="error">@error('people_number'){{ $message }}@enderror</span>
                            </td>
                        </tr>
                    </table>
                    <button class="my_bookings__table-change">変更</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection