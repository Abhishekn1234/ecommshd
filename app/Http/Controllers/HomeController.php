<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
class HomeController extends Controller
{
  public function index()
{
    $homeData = Http::get('https://app.ecominnerix.com/api/v1/home')->json();
    $products = Http::get('https://app.ecominnerix.com/api/products?shop_id=1&page_size=100&page=1')->json();

    return view('home', [
        'homeData' => $homeData,
        'products' => $products,
    ]);
}

}
