<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        $data = Product::paginate();
        $categories = DB::table('categories')
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->select('categories.cat_name', 'categories.id')
            ->get();

        return view('products.index', ['products' => $data, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Product::create($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Product $products)
    {
        //
    }

    public function productByCategory($product)
    {
        $categories = DB::table('categories')
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->select('categories.id', 'categories.cat_name')
            ->get();

        $onCategoryName = DB::table('categories')->select('cat_name')
            ->where('id', '=', $product)
            ->get();

        $byCategoryId = Product::where('category_id', '=', $product)->get();
        return view('products.index', ['products' => $byCategoryId, 'categories' => $categories, $onCategoryName]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $products)
    {
        return view('products.edit', ['data' => $products::find($products)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $products)
    {
        $products->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $id)
    {
        $id->delete();
        return redirect()->route('product.index');
    }
}
