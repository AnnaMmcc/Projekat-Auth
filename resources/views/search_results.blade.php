@extends("layout")

@section("content")
<div class="d-flex flex-wrap m-4 container"  style="gap: 20px" >
    @foreach($cities as $city)
    @php $icon = \App\Http\ForcastHelper::getIconByWeatherType($city->toDayForecast->weather_type) @endphp
        <p> <a href="{{ route("search.permalink", ['city' => $city->name]) }}" class="btn btn-primary"><i class="fa-solid {{ $icon }}"></i> {{ $city->name }}</a></p>
    @endforeach
</div>
@endsection
