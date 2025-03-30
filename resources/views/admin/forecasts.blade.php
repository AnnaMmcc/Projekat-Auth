<form method="POST" action="{{ route("save.forecast.create") }}">
    {{csrf_field()}}
<div>
    <select name="city_id">
       @foreach(\App\Models\Cities::all() as $city)
           <option value="{{ $city->id }}">{{ $city->name }}</option>
       @endforeach
    </select>
    <input type="text" name="temperatures" placeholder="Unesite temperaturu">
    <select name="weather_type">
      @foreach(\App\Models\Forecast::WEATHERS as $weather)
          <option>{{ $weather }}</option>
      @endforeach
    </select>
    <input type="text" name="probability" placeholder="Unesite sansu za padavine">
    <input type="date" name="date">
<button>Snimi</button>
</div>
</form>

<div>
    @foreach(\App\Models\Cities::all() as $city)
        <h3>{{ $city->name }}</h3>
    <ul>
        @foreach($city->forecast as $forecastt)
            <li>{{ $forecastt->date }} - {{ $forecastt->temperature }} C</li>
    </ul>
        @endforeach
    @endforeach






</div>
