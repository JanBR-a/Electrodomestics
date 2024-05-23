<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ElectrodomesticController extends Controller
{
    public function show($id)
    {
        $response = Http::get('http://127.0.0.1:8000/api/electrodomestics/' . $id);

        $electrodomestic = $response->json()[0];

        return view('electrodomestic', ['electrodomestic' => $electrodomestic]);
    }

    public function update(Request $request, $id)
    {
        $newName = $request->input('name');
        $newPrice = $request->input('price');
        $newImage = $request->input('image');
        $newDescription = $request->input('description');
        $newCategory = $request->input('category');
        $newBrand = $request->input('brand');
        $token = $request->session()->get('api_token');

        $response = Http::withToken($token)->put('http://127.0.0.1:8000/api/electrodomestics/' . $id, [
            'name' => $newName,
            'price' => $newPrice,
            'image' => $newImage,
            'description' => $newDescription,
            'category' => $newCategory,
            'brand' => $newBrand
        ]);


        return redirect('/electrodomestics/' . $id);
    }

    public function destroy(Request $request, $id)
    {
        $token = $request->session()->get('api_token');

        $response = Http::withToken($token)->delete('http://127.0.0.1:8000/api/electrodomestics/' . $id);

        return redirect('/');
    }
}
