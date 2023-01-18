<?php

namespace App\Http\Controllers\Admin;
use App\Models\Type;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Material;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderByDesc('id')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $materials = Material::all();
        return view('admin.products.create', compact('types','materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $val_data = $request->validated();

        $product = Product::create($val_data);
        if ($request->has('materials')) {
            $product->materials()->attach($val_data['materials']);
        }
        return to_route('admin.products.index')->with('message', "$product->name add successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $types = Type::all();
        $materials = Material::all();
        return view('admin.products.edit', compact('product','types','materials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        /*$data = [
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
        ];
        $product->update($data);*/
        $val_data = $request->validated();
        $product -> update($val_data);
        if ( $product->has('materials')) {
            $product->materials()->sync($val_data['materials']);
        } else {
            $product->materials()->sync([]);
        }
        return to_route('admin.products.index')->with('message', "$product->name update successfully");;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('admin.products.index');
    }
}
