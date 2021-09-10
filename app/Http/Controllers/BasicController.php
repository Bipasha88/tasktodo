<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BasicController extends Controller
{
    public function index ()
    {
        // Fetching the Rick n Morty data here, we need to convert it into json to get the response from the server
        $api_data = "hello world";
        $api_data2 = "vue component props";

        // Then we send our data to the view
        return view('vuefile',compact('api_data','api_data2'));
    }
}
