@extends("layout")

@section("content")

    <form>
        <div class="container">
        <div class="row justify-content-center mt-5">
        <div class="col-md-4">
        <div class="search-container">
            <input class="form-control search-input" type="text" name="city" placeholder="Unesite ime grada">
        </div>
            <button class="mt-3 btn btn-primary">Pretrazi</button>
        </div>
        </div>
        </div>
    </form>

@endsection
