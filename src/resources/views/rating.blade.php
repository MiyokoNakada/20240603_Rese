@extends('layout.app')

@section('content')
<div class="rating">
    <h2>{{ $booking->shop->name }}の評価</h2>

    <form action="/rating" method="POST">
        @csrf
        <input type="hidden" name="booking_id" value="{{ $booking->id }}">

        <div class="form-group">
            <label for="rating">評価</label>
            <select name="rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div class="form-group">
            <label for="comment">コメント</label>
            <textarea name="comment"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">送信</button>
    </form>
</div>
@endsection