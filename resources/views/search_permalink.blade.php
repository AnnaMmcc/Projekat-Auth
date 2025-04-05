@extends("layout")

@section("content")

@foreach($city as $weather)

    <p>{{ $weather->forecast->date }}</p>

@endforeach



@endsection
