@extends('layout.app')

@section('content')


<p>
    こんにちは、{{ $booking->user->name }}様 <br><br>
    ご予約いただき誠にありがとうございます。予約当日となりましたので、ご案内いたします。<br>
    　店名: {{ $booking->shop->name }} <br>
    　日時: {{ $booking->date }} {{ \Carbon\Carbon::parse($booking->time)->format('H:i') }} <br>
</p>
<p>
    ご予約内容確認のため、来店時に以下のQRコードをご提示ください。<br>
    {!! QrCode::size(100)->generate('http://localhost/shop_manager/booking_detail?booking_id=' . $booking->id); !!}
</p>
<p>
    ※このメールアドレスは配信用です※ <br>
    もしご都合がつかなくなった場合や、ご予約時間に遅れそうな場合、お早めに店舗までご連絡をいただきますようお願い申し上げます。 <br>
    それでは、本日お気をつけてお越しくださいませ。
</p>

@endsection