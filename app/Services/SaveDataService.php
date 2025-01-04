<?php

namespace App\Services;

use App\Models\City;

class SaveDataService
{
    public function saveData($data)
    {
        try {
            
            $city = City::updateOrCreate(
                ['uid' => $data['id']],
                [
                    'name' => $data['name'],
                ]
            );

            $city->temperatures()->updateOrCreate(
                ['city_id' => $city->id], 
                [
                    'temp' => $data['main']['temp'],
                    'feels_like' => $data['main']['feels_like'],
                    'min_temp' => $data['main']['temp_min'],
                    'max_temp' => $data['main']['temp_max'],
                    'weather' => $data['weather'][0]['main'],
                ]
            );

            $city->atmospheres()->updateOrCreate(
                ['city_id' => $city->id],
                [
                    'pressure' => $data['main']['pressure'],
                    'humidity' => $data['main']['humidity'],
                    'visibility' => $data['visibility'],
                    'sea_level' => $data['main']['sea_level'],
                    'grnd_level' => $data['main']['grnd_level'],
                ]
            );

            $city->winds()->updateOrCreate(
                ['city_id' => $city->id], 
                [
                    'speed' => $data['wind']['speed'],
                    'deg' => $data['wind']['deg'],
                    'gust' => $data['wind']['gust'],
                ]
            );

            $city->locations()->updateOrCreate(
                ['city_id' => $city->id],
                [
                    'latitude' => $data['coord']['lat'],
                    'longitude' => $data['coord']['lon'],
                    'country' => $data['sys']['country'],
                    'sunrise' => $data['sys']['sunrise'],
                    'sunset' => $data['sys']['sunset'],
                    'city' => $data['name'],
                ]
            );

            return response()->json(['message' => 'Data saved successfully', 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
