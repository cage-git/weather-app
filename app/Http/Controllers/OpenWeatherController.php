<?php
namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Services\SaveDataService;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;

class OpenWeatherController extends Controller
{
    protected $saveDataService;

    public function __construct(SaveDataService $saveDataService)
    {
        $this->saveDataService = $saveDataService;
    }

    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $city = $request->input('city');

            if (!$city) {
                return view('weather', ['error' => 'City is required']);
            }

            try {
                $response = Http::withHeaders([
                    "x-rapidapi-host" => "open-weather13.p.rapidapi.com",
                    "x-rapidapi-key" => "49c9a08feemshb5cc67766e0a238p1497f0jsn1a831a4d236a"
                ])->get("https://open-weather13.p.rapidapi.com/city/{$city}/EN");

                if ($response->failed()) {
                    return view('weather', ['error' => 'Failed to fetch weather data']);
                }

                $data = $response->json();

                if (isset($data['cod']) && $data['cod'] != 200) {
                    return view('weather', ['error' => $data['message'] ?? 'City not found']);
                }

                if (empty($data)) {
                    return view('weather', ['error' => 'No weather data found for the given city']);
                }

                $this->saveDataService->saveData($data);

                return view('weather', ['data' => $data]);

            } catch (RequestException $e) {
                // Handle errors during API request
                return view('weather', ['error' => 'API request failed: ' . $e->getMessage()]);
            } catch (\Exception $e) {
                // Handle any other errors
                return view('weather', ['error' => 'An error occurred: ' . $e->getMessage()]);
            }
        }
        return view('weather');
    }



    public function showCities()
    {
        $cities = City::all();
        // $city = json_decode($cities,true);
        // print_r($city);die;
        return view('fetchedData', compact('cities'));
    }

    public function fetchForm(Request $request)
    {
        if ($request->isMethod('post')) {
            $cityId = $request->input('city');

            // print_r($cityId);die;

            $city = City::find($cityId);

            if (!$city) {
                // return response()->json(['error' => 'City not found'], 404);
                return view('weather', ['error' => 'City not found']);
            }
            $data = [
                'city' => $city,
                'location' => $city->locations()->get()->toArray(),
                'temperature' => $city->temperatures()->get()->toArray(),
                'wind' => $city->winds()->get()->toArray(),
                'atmosphere' => $city->atmospheres()->get()->toArray(),
            ];
            return view('fetchedData', [
                'data' => json_encode($data),
            ]);
        }
        return view('fetchedData');

    }
}
