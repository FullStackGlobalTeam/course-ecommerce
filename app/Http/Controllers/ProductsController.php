<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use Session;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index',['products'=>products::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
           'name' => 'required',
           'image' => 'required',
           'price' => 'required',
        ]);

        $image = request()->image;
        $imageNewName = time().'_'.$image->getClientOriginalName();
        $image->move('products/', $imageNewName);

        products::create([
           'name' => request()->name,
            'image' => 'products/'.$imageNewName,
           'price' => request()->price,
           'description' => request()->description
        ]);

        Session::flash('success', 'Se ha creado el producto');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = products::find($id);

        return view('products.edit', ['product'=> $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = products::find($id);

        $this->validate(request(), [
            'name' => 'required',
            'price' => 'required',
        ]);

        if (request()->hasFile('image')){
            $image = request()->image;
            $imageNewName = time().'_'.$image->getClientOriginalName();
            $image->move('products/', $imageNewName);

            $product->image = 'products/'. $imageNewName;
        }

        $product->name = request()->name;
        $product->price = request()->price;
        $product->description = request()->description;
        $product->save();

        Session::flash('success', 'Se ha editado el producto');

        return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = products::find($id);

        if (file_exists($product->image)){
            unlink($product->image);
        }

        $product->delete();

        Session::flash('success', 'Se ha eliminado el producto');

        return redirect()->back();

    }
}
