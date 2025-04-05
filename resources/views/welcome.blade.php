@extends("layout")

@section("content")

    <form method="GET" action="{{ route("search.city") }}">
        <div class="container">
        <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <h3><i class="fa-solid fa-city"></i> Pronadji svoj grad</h3>

            @if(\Illuminate\Support\Facades\Session::has("error"))
                <p class="text-danger">{{ \Illuminate\Support\Facades\Session::get("error") }}</p>
            @endif

        <div class="search-container">
            <input class="form-control search-input" type="text" name="city"  placeholder="Unesite ime grada">
        </div>
            <button class="mt-3 btn btn-primary">Pretrazi</button>
        </div>
        </div>
        </div>
    </form>

@endsection
