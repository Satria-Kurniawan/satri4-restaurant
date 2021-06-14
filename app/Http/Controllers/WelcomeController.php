<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){

        $dataproducts = Product::all();

        return view('welcome')->with('dataproducts', $dataproducts);
    }
}
