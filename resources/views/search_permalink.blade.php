@extends("layout")

@section("content")

@foreach($city->forecast as $forecasttt)

    <p>{{$forecasttt->date  }} : {{ $forecasttt->temperature }}</p>

@endforeach



@endsection
