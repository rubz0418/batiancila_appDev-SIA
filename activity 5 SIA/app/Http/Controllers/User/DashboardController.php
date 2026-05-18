<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // 1. Get users with search filter (regular user can see all users)
        $search = $request->input('search');
        if ($search) {
            $users = User::where('name', 'like', '%' . $search . '%')
                         ->orWhere('full_name', 'like', '%' . $search . '%')
                         ->get();
        } else {
            $users = User::all();
        }

        // 2. Fetch weather API (external data) with improved error handling
        $weather = [];
        $apiError = null;
        try {
            $apiKey = 'b1b15e88fa797225412429c1c50c122a1';
            $city = 'London';
            $response = Http::timeout(10)->get("https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric");
            
            if ($response->failed()) {
                $apiError = "Weather API Error: " . $response->status();
            } else {
                $weatherData = $response->json();
                $weather = [
                    'city' => $weatherData['name'] ?? 'Unknown',
                    'country' => $weatherData['sys']['country'] ?? 'Unknown',
                    'temperature' => round($weatherData['main']['temp'] ?? 0),
                    'feels_like' => round($weatherData['main']['feels_like'] ?? 0),
                    'humidity' => $weatherData['main']['humidity'] ?? 0,
                    'description' => $weatherData['weather'][0]['description'] ?? 'No description',
                    'icon' => $weatherData['weather'][0]['icon'] ?? '01d',
                    'wind_speed' => $weatherData['wind']['speed'] ?? 0,
                    'pressure' => $weatherData['main']['pressure'] ?? 0
                ];
            }
        } catch (\Exception $e) {
            $apiError = "Weather API Error: " . $e->getMessage();
            Log::error('Failed to fetch weather: ' . $e->getMessage());
        }

        // 3. Send data to Blade view
        return view('user.dashboard', compact('users', 'weather', 'search', 'apiError'));
    }
}
