<form method="POST" action="{{ route("update") }}">
    {{ csrf_field() }}
    <input type="text" name="temperatures" placeholder="Unesite temperaturu">
    <select name="city_id">
        @foreach(\App\Models\Cities::all() as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
        @endforeach
    </select>
    <button>Snimi</button>
</form>

<div>
    @foreach(\App\Models\cityTemperatures::all() as $weather)
        <p>{{ $weather->city->name }} - {{ $weather->temperatures }}</p>
    @endforeach
</div>
