
<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body class="container">

<form method="POST" action="{{route('saveEdit', ['id' => $singleTemperature->id])}}">
    {{csrf_field()}}
    <div class="container col-4">
    <div class="mb-3">
        <label for="city" class="form-label">City:</label>
        <input type="text" name="city" class="form-control" id="city" value="{{$singleTemperature->city->name}}">
    </div>

    <div class="mb-3">
        <label for="temperatures" class="form-label">Temperature:</label>
        <input type="text" name="temperatures" class="form-control" id="temperatures" value="{{$singleTemperature->temperatures}}" >
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</body>
</html>
