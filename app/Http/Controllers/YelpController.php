<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class YelpController extends Controller
{
  public function index()
  {
      $restaurants = []; 

      return view('restaurants.index', [
          'restaurants' => $restaurants,
          'pageTitle' => 'Restaurant Details'
      ]);
  }
    public function fetchRestaurants()
    {
        $url = "https://api.yelp.com/v3/businesses/search";

        $params = [
            'location' => 'San Francisco', 
            'term' => 'restaurants',
            'limit' => 10
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('YELP_API_KEY'),
        ])->get($url, $params);

        if ($response->successful()) {
            $restaurants = $response->json()['businesses'];
        } else {
            $restaurants = [];
        }

        return view('restaurants.index', ['restaurants' => $restaurants]);
    }
}
