@extends('layout.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/rating.css') }}">
@endsection

@section('content')
@component('components.menu2')
@endcomponent
<div class="rating">
    <a href='/mypage' class="return"> &lt;</a>
    <h3>{{ $booking->shop->name }}の評価</h3>

    <div class="rating-card">
        <table class="rating__table">
            <form action="/rating" method="POST">
                @csrf
                <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                <tr class="rating__table_row">
                    <th>全体の評価</th>
                    <td>
                        <div class="rating__table_star">
                            <input id="star01" type="radio" name="rating" value="5"><label for="star01">★</label>
                            <input id="star02" type="radio" name="rating" value="4"><label for="star02">★</label>
                            <input id="star03" type="radio" name="rating" value="3"><label for="star03">★</label>
                            <input id="star04" type="radio" name="rating" value="2"><label for="star04">★</label>
                            <input id="star05" type="radio" name="rating" value="1"><label for="star05">★</label>
                        </div>
                    </td>
                </tr>
                <tr class="rating__table_row">
                    <th>コメント</th>
                    <td><textarea name="comment" rows="5" cols="50">{{ old('comment') }}</textarea></td>
                </tr>
                <tr class="rating__table_row">
                    <th></th>
                    <td>
                        <button class="rating__table_btn" type="submit" class="btn btn-primary">送信</button>
                    </td>
                </tr>
            </form>
        </table>

    </div>
</div>
@endsection