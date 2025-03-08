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
  <div>
    <table class="table table-striped">
        <thead>
        <tr class="col-10">
            <th>City</th>
            <th>Temperature</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allTemperatures as $temperature)

            <tr><td>{{$temperature->city}} </td>
                <td>{{$temperature->temperatures}} C</td>
            </tr>
        @endforeach
  </div>
</body>
</html>
