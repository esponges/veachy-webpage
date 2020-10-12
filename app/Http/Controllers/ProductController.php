<?php

namespace App\Http\Controllers;

use App\Type;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get ($id){

        $parentProduct = Product::find($id);
        $children = $parentProduct->children;
        // $children = Product::get();
        // dd($types,$product);

        return view ('product', compact('children'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    	$bikinis = Product::where('type',1)->get();
    	$coverUps = Product::where('type',2)->get();
    	$enteros = Product::where('type',3)->get();

        $allProducts = Product::whereIn('type', [1,2,3])->get();
        // $allTypes = Type::get();


        return view ('index', compact('allProducts','bikinis','coverUps','enteros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'disponibilidad' => 'required',
            'type' => 'required',
            'total_fotos' => 'required',
        ]);

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->disponibilidad = $request->input('disponibilidad');
        $product->type = $request->input('type');
        $product->total_fotos = $request->input('total_fotos');
        $product->save();

        return redirect('/inventory')->with('success', 'producto creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if (auth()->user()->role == 1) {
            $allBikinis = Product::orderBy('updated_at','desc')->paginate(9);

            return view ('inventory.bikinis', compact('allBikinis'));
        } else {
            return back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view ('inventory.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'disponibilidad' => 'required',
            'type' => 'required',
            'total_fotos' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->disponibilidad = $request->input('disponibilidad');
        $product->type = $request->input('type');
        $product->total_fotos = $request->input('total_fotos');
        $product->save();

        return redirect('/inventory')->with('success', 'producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->role == 1) {
            $product = Product::findOrFail($id);
            $product->delete();

            return redirect('/inventory')->with('success', 'producto eliminado');
        } else {
            return back();
        }
    }
}
