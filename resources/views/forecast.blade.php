@foreach ($city->forecast as $weather)

    <p>Sunrise: {{$sunrise}}</p>
    <p>Sunset: {{$sunset}}</p>
    <p>Datum: {{ $weather->date }} - Temperatura: {{ $weather->temperature }} </p>
@endforeach
