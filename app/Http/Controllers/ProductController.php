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
        // dd(  $request);
        // dd(   $data_comic);
        $request->validate([
            'title' => 'required|min:5|max:150',
            'description'  => 'required|min:2',
            'thumb'  => 'min:5|required|max:255',
            'price'  => 'required',
            'series' => 'min:2|required|max:255',
            'sale_date' => 'required',
             'type' => 'required',
        ],
        [
            'title.required' => 'Mio caro utente inserisci almeno 5 parole , altrimenti come lo chiamo il fumetto?' , 
            'title.min' => 'Mio caro utente inserisci almeno 5 parole , altrimenti come lo chiamo il fumetto?' ,
            'title.max' => 'Mio caro utente ora stiamo esagerando, massimo 150 words' ,
            'description.required' => 'Mio caro utente inserisci almeno una piccola descrizione di 5 parole', 
            'description.min' => 'Mio caro utente inserisci almeno una piccola descrizione di 5 parole' ,
            'thumb.required' => 'Carissimo utente campo obbligatorio, dammi un link' ,
            'thumb.min' => 'Carissimo utente inserisci piu di 5 parole' ,
            'thumb.max' => 'Carissimo utente massimo 255 words' , 
            'price.required' => 'Carissimo utente campo obbligatorio, gratis? mmhh non credo' , 
            'series.required' => 'Carissimo utente campo obbligatorio' , 
            'sale_date.required' => 'Carissimo utente campo obbligatorio' , 
            'type.required' => 'Carissimo utente campo obbligatorio' , 
        ],
    );
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
        return view('products.edit', compact('product'));
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
