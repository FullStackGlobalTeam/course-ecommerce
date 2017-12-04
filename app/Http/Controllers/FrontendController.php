<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;

class FrontendController extends Controller
{
    public function index()
    {
        return view('index', ['products'=> products::paginate(3)]);
    }

    public function singleProduct($id)
    {
        $product = products::find($id);

        return view('single', ['product'=>$product]);
    }
}
