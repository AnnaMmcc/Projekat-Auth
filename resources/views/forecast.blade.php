@foreach ($prognoza as $weather)
    <p>Datum: {{ $weather->date }} - Temperatura: {{ $weather->temperature }} </p>
@endforeach
