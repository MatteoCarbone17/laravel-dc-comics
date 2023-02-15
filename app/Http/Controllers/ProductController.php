<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
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
        $data_comic =  $request->all();
        $newComic = new Product();
        $newComic->title =  $data_comic['title'];
        $newComic->description =  $data_comic['description'];
        $newComic->thumb =  $data_comic['thumb'];
        $newComic->price =  $data_comic['price'];
        $newComic->series = $data_comic['series'];
        $newComic->sale_data =  $data_comic['sale_date'];
        $newComic->type =  $data_comic['type'];
        $newComic->save();

        return redirect()->route('products.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit',compact('product'));
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
        $form_data_comic = $request->all();
        $newComic = Product::findOrFail($id);
        // $newComic->title = $form_data_comic['title'];
        // $newComic->description =$form_data_comic['description'];
        // $newComic->thumb = $form_data_comic['thumb'];
        // $newComic->price = $form_data_comic['price'];
        // $newComic->series = $form_data_comic['series'];
        // $newComic->sale_data = $form_data_comic['sale_date'];
        // $newComic->type = $form_data_comic['type'];
        
        $newComic->update($form_data_comic);

        return redirect()->route('products.show', $newComic->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
