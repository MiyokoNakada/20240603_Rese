@extends('layout.app')

@section('content')

<p>
    <font size="+2">{{ $details['title'] }}</font>
</p>
<p>{!! nl2br(e($details['body'])) !!}</p>

@endsection