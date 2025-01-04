<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Fetch Weather According to City</h1>

        @if (isset($data))
            @php
                $decodedData = json_decode($data, true);
            @endphp

            <div class="card mb-4">
                <div class="card-header">
                    <h2>Location</h2>
                </div>
                <div class="card-body">
                    @if (isset($decodedData['location']) && count($decodedData['location']) > 0)
                        <ul class="list-group">
                            @foreach ($decodedData['location'] as $location)
                                <li class="list-group-item">
                                    <strong>City:</strong> {{ $location['city'] }}<br>
                                    <strong>Country:</strong> {{ $location['country'] }}<br>
                                    <strong>Latitude:</strong> {{ $location['latitude'] }}<br>
                                    <strong>Longitude:</strong> {{ $location['longitude'] }}<br>
                                    <strong>Sunrise:</strong> {{$location['sunrise'] }}<br>
                                    <strong>Sunset:</strong> {{ $location['sunset'] }}<br>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>No location data found.</p>
                    @endif
                </div>
            </div>

            @if (isset($decodedData['temperature']) && count($decodedData['temperature']) > 0)
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Temperature</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($decodedData['temperature'] as $temp)
                                <li class="list-group-item">
                                    <strong>Temperature:</strong> {{ $temp['temp'] }}<br>
                                    <strong>Feels Like:</strong> {{ $temp['feels_like'] }}<br>
                                    <strong>Min Temperature:</strong> {{ $temp['min_temp'] }}<br>
                                    <strong>Max Temperature:</strong> {{ $temp['max_temp'] }}<br>
                                    <strong>Weather:</strong> {{ $temp['weather'] }}<br>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <p>No temperature data found.</p>
            @endif

            @if (isset($decodedData['wind']) && count($decodedData['wind']) > 0)
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Wind</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($decodedData['wind'] as $wind)
                                <li class="list-group-item">
                                    <strong>Speed:</strong> {{ $wind['speed'] }}<br>
                                    <strong>Degree:</strong> {{ $wind['deg'] }}<br>
                                    <strong>Gust:</strong> {{ $wind['gust'] }}<br>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <p>No wind data found.</p>
            @endif

            @if (isset($decodedData['atmosphere']) && count($decodedData['atmosphere']) > 0)
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Atmosphere</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($decodedData['atmosphere'] as $atm)
                                <li class="list-group-item">
                                    <strong>Pressure:</strong> {{ $atm['pressure'] }}<br>
                                    <strong>Humidity:</strong> {{ $atm['humidity'] }}<br>
                                    <strong>Visibility:</strong> {{ $atm['visibility'] }}<br>
                                    <strong>Sea Level:</strong> {{ $atm['sea_level'] }}<br>
                                    <strong>Ground Level:</strong> {{ $atm['grnd_level'] }}<br>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <p>No atmosphere data found.</p>
            @endif

        @else
            <form action="{{ route('fetch.form') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="city" class="form-label">Select a City</label>qqqq  
                    <select name="city" id="city" class="form-select">
                        <option value="">-- Select City --</option>
                        @if(isset($cities))
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @endif

        <div class="mt-4">
            <a href="{{ route('index.get') }}" class="btn btn-secondary">Go to Weather Form</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
