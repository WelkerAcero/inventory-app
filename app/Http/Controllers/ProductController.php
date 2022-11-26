<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use stdClass;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories()
    {
        $categories = DB::table('categories')
        ->join('products', 'products.category_id', '=', 'categories.id')
        ->select('categories.cat_name', 'categories.id')
        ->get();
        return $categories;
    }

    public function index()
    {
        $data = Product::paginate();
        if (count($data) > 0) {
            return view('products.index', ['products' => $data, 'categories' => $this->getCategories()]);
        }
        $error = "No hay datos para mostrar";
        return view('products.index', ['error' => $error]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Product();
        $obj = new stdClass();
        $presentation = new stdClass();
        $arrayData = array();

        //proceso para lista de presentación del producto
        $obj->name = ['unidad', 'libra', 'kilogramo', 'caja', 'paquete', 'lata', 'galon', 'botella', 'tira', 'sobre', 'bolsa', 'saco', 'tarjeta', 'otro'];
        foreach ($obj as $key => $value) {
            array_push($arrayData, $presentation->data = ['name' => $value]);
        }
        //convertir un array asociativo a un objeto
        $presentation = json_decode(json_encode($presentation));
        
        $suppliers = DB::table('suppliers')->select('id', 'sup_code', 'sup_name')->get();
        $categories = DB::table('categories')->select('id', 'cat_name')->get();
        return view('products.create', compact('suppliers', 'categories', 'presentation', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        /* return $request->all(); */
        $data = Product::create($request->validated());
        return redirect()->route('product.index');
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
        return view('products.index', ['products' => $byCategoryId, 'categories' => $categories, 'onCategoryName' => $onCategoryName]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $id)
    {
        $data = Product::find($id);
        /* return $data; */
        return view('products.edit', compact('data'));
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
