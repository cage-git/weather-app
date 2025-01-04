<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Insights</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9f7fa;
            margin-bottom: 80px;
        }

        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #0078d7;
        }

        .card {
            border: none;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #0056b3;
        }

        .btn-primary {
            background-color: #0078d7;
            border-color: #0078d7;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        select.form-select {
            min-width: 200px;
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">Weather Insights</a>
        </div>
    </nav>

    @if(isset($error))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container mt-5">
        <h1 class="text-center mb-4">Check Your Weather</h1>
        <div class="d-flex justify-content-center mb-4">
            <form action="{{ route('index.form') }}" method="post" class="d-flex align-items-center">
                @csrf
                <input type="text" class="form-control me-3" name="city" id="city" placeholder="Enter Your City">
                <button type="submit" class="btn btn-primary">Get Weather</button>
            </form>
        </div>

        <div class="d-flex justify-content-center mb-4">
            <form action="{{ route('fetchedData') }}" method="get" class="d-flex align-items-center">
                @csrf
                <button type="submit" class="btn btn-primary">Get Stored Data</button>
            </form>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Weather Condition</h5>
                        <p class="card-text fs-5">
                            @if(isset($data['weather'][0]['main']))
                                <b>{{$data['weather'][0]['main']}}</b>
                            @else
                                <b>--</b>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Location Details</h5>
                        <ul class="list-unstyled">
                            <li>Country: 
                                @if(isset($data['sys']['country']))
                                    <b>{{$data['sys']['country']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                            <li>City: 
                                @if(isset($data['name']))
                                    <b>{{$data['name']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                            <li>Latitude: 
                                @if(isset($data['coord']['lat']))
                                    <b>{{$data['coord']['lat']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                            <li>Longitude: 
                                @if(isset($data['coord']['lon']))
                                    <b>{{$data['coord']['lon']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                            <li>Sunrise: 
                                @if(isset($data['sys']['sunrise']))
                                    <b>{{$data['sys']['sunrise']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                            <li>Sunset: 
                                @if(isset($data['sys']['sunset']))
                                    <b>{{$data['sys']['sunset']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Temperature Details</h5>
                        <ul class="list-unstyled">
                            <li>Temperature: 
                                @if(isset($data['main']['temp']))
                                    <b>{{$data['main']['temp']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                            <li>Min Temp: 
                                @if(isset($data['main']['temp_min']))
                                    <b>{{$data['main']['temp_min']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                            <li>Max Temp: 
                                @if(isset($data['main']['temp_max']))
                                    <b>{{$data['main']['temp_max']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                            <li>Feels Like: 
                                @if(isset($data['main']['feels_like']))
                                    <b>{{$data['main']['feels_like']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Atmospheric Details</h5>
                        <ul class="list-unstyled">
                            <li>Humidity: 
                                @if(isset($data['main']['humidity']))
                                    <b>{{$data['main']['humidity']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                            <li>Pressure: 
                                @if(isset($data['main']['pressure']))
                                    <b>{{$data['main']['pressure']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                            <li>Sea Level: 
                                @if(isset($data['main']['sea_level']))
                                    <b>{{$data['main']['sea_level']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                            <li>Ground Level: 
                                @if(isset($data['main']['grnd_level']))
                                    <b>{{$data['main']['grnd_level']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                            <li>Visibility: 
                                @if(isset($data['visibility']))
                                    <b>{{$data['visibility']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Wind Info</h5>
                        <ul class="list-unstyled">
                            <li>Speed: 
                                @if(isset($data['wind']['speed']))
                                    <b>{{$data['wind']['speed']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                            <li>Direction: 
                                @if(isset($data['wind']['deg']))
                                    <b>{{$data['wind']['deg']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                            <li>Gust: 
                                @if(isset($data['wind']['gust']))
                                    <b>{{$data['wind']['gust']}}</b>
                                @else
                                    <b>--</b>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
