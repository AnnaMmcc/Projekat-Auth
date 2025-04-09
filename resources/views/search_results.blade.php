@extends("layout")

@section("content")
<div class="d-flex flex-wrap m-4 container"  style="gap: 20px" >

    @if(\Illuminate\Support\Facades\Session::has('error'))
        <p class="text-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}
            <a class="btn btn btn-secondary p-2" href="/login">Uloguj se</a></p>
    @endif

    @foreach($cities as $city)
    @php $icon = \App\Http\ForcastHelper::getIconByWeatherType($city->toDayForecast->weather_type) @endphp
        @if(in_array($city->id, $userFavourites))
                <a href="{{ route("favourite.city", ['city' => $city->id]) }}" style="color: indianred" class="btn btn-outline-primary"><i class="fa-solid fa-heart"></i></a>
            @else
                <a href="{{ route("favourite.city", ['city' => $city->id]) }}" style="color: indianred" class="btn btn-outline-primary"><i class="fa-regular fa-heart"></i></a>
            @endif

            <a href="{{ route("search.permalink", ['city' => $city->name]) }}" class="btn btn-primary"><i class="fa-solid {{ $icon }}"></i> {{ $city->name }}</a>
    @endforeach
</div>
@endsection
