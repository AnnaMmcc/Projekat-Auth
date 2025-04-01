@php use App\Models\Cities;use App\Models\Forecast; @endphp

@extends("admin.layout")
@section("content")
<form method="POST" action="{{ route("save.forecast.create") }}">
    {{csrf_field()}}
    <div class="container  d-md-flex flex-wrap flex-row justify-center w-50">


        <select name="city_id" class="form-control col mt-2 m-2">
            @foreach(Cities::all() as $city)
                <option class="col" value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>


        <input class="col form-control mt-2 m-2" type="text" name="temperatures" placeholder="Unesite temperaturu">

            <div class="w-100"></div>

        <select name="weather_type" class="col form-control mt-2 m-2">
            @foreach(Forecast::WEATHERS as $weather)
                <option>{{ $weather }}</option>
            @endforeach
        </select>


        <input class="col form-control mt-2 m-2" type="text" name="probability" placeholder="Unesite sansu za padavine">

            <div class="w-100"></div>

        <input class="form-control mt-2 col m-2" type="date" name="date">


        <button class="btn btn-outline-primary col p-2 mt-2 m-2">Snimi</button>


    </div>
</form>

<div class="d-flex flex-wrap container" style="gap: 10px">
    @foreach(Cities::all() as $city)
<div>
        <p class="mb-1">{{ $city->name }}</p>

            <ul class="list-group mb-4">

            @foreach($city->forecast as $forecastt)

                @php $boja = \App\Http\ForcastHelper::getColorByTemperature($forecastt->temperature);
                 $ikonica = \App\Http\ForcastHelper::getIconByWeatherType($forecastt->weather_type)
                @endphp

                <li class="list-group-item">{{ $forecastt->date }} -
                    <i class="fa-solid {{ $ikonica }}"></i>
                    <span style="color: {{ $boja }}"> {{ $forecastt->temperature }} </span> C</li>


    @endforeach
            </ul>
</div>
    @endforeach
</div>
</div>
@endsection



