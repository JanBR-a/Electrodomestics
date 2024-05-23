<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class HomeController extends Controller{
    public function index(){
        $response = Http::get('http://127.0.0.1:8000/api/electrodomestics/');

        $electrodomestics = $response->json()['data'];

        return view('home', ['electrodomestics' => $electrodomestics]);
    }

    public function store(Request $request){

        $Name = $request->input('name');
        $Price = $request->input('price');
        $Image = $request->input('image');
        $Description = $request->input('description');
        $Category = $request->input('category');
        $Brand = $request->input('brand');
        $token = $request->session()->get('api_token');

        $response = Http::withToken($token)->post('http://127.0.0.1:8000/api/electrodomestics/', [
            'name' => $Name,
            'price' => $Price,
            'image' => $Image,
            'description' => $Description,
            'category' => $Category,
            'brand' => $Brand        ]);


            return redirect('/');
    }
}
