<?php

namespace App\Http\Controllers;

use App\IgData;
use App\Type;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get($id)
    {

        $parentProduct = Product::find($id);
        $children = $parentProduct->children;
        // dd ($children);
        // $children = Product::get();
        // dd($types,$product);

        return view('product', compact('children'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $bikinis = Product::where('type', 1)->get();
        $coverUps = Product::where('type', 2)->get();
        $enteros = Product::where('type', 3)->get();

        $allProducts = Product::whereIn('type', [1, 2, 3])->get();

        $igLinks = IgData::get();
        // dd($igLinks[0]->ig_link);
        $arrSize = sizeof($igLinks);

        return view('index', compact('allProducts', 'bikinis', 'coverUps', 'enteros', 'igLinks', 'arrSize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::whereIn('type', [1, 2, 3])->get();
        // dd ($products);
        return view('inventory.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'disponibilidad' => 'required',
            'type' => 'required',
        ]);

        // dd (count($request->file('files')));
        // !empty($request->file('files')) ?
        //     $this->validate($request, [
        //         'files' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        //     ]) : dd('empty');
        $files = $request->file('files') ? $request->file('files') : null;

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->disponibilidad = $request->input('disponibilidad');
        $product->type = $request->input('type') == 4 ? 4 : $request->input('type_detail');
        $product->total_fotos = $files != null ? count($files) : 0;
        $product->parent_id = $request->input('parent_id');
        $product->size = $request->input('size');
        $product->color = $request->input('color');
        // dd($product);
        $product->save();

        $fileName = $product->type == 4 ? $product->id : $product->name;

        if ($product->type == 1) {
            $file_path = public_path('img\bikini');
        } elseif ($product->type == 2) {
            $file_path = public_path('img\cover_up');
        } elseif ($product->type == 3) {
            $file_path = public_path('img\entero');
        } else {
            $file_path = public_path('img\product');
        }

        if (!empty($files) && count($files) > 1 && $product->type != 4) {
            $i = 1;
            foreach ($files as $file) {
                $file->move($file_path, $fileName . $i . '.jpg');
                $i++;
            }
        } elseif (!empty($files)) {
            $files[0]->move($file_path, $fileName . ($product->type != 4 ? '1.jpg' : '.jpg'));
        }

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
            $allBikinis = Product::orderBy('updated_at', 'desc')->paginate(9);

            return view('inventory.bikinis', compact('allBikinis'));
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

        return view('inventory.edit')->with('product', $product);
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
