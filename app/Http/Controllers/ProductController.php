<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategoriesOnProducts()
    {
        $categories = DB::table('categories')
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->select('categories.cat_name', 'categories.id')
            ->get();
        return $categories;
    }

    public function getCategories()
    {
        $categories = DB::table('categories')->select('id', 'cat_name')->get();
        return $categories;
    }

    public function getSuppliers()
    {
        $suppliers = DB::table('suppliers')->select('id', 'sup_name')->get();
        return $suppliers;
    }

    public function getProdPresentation()
    {
        $obj = new \stdClass();
        $arrayData = array(['unidad', 'libra', 'kilogramo', 'caja', 'paquete', 'lata', 'galon', 'botella', 'tira', 'sobre', 'bolsa', 'saco', 'tarjeta', 'otro']);
        $presentation = array();
        foreach ($arrayData as $value1) {
            [
                $presentation +=
                    [
                        'name' => $value1,
                    ],
            ];
        }

        //convertir un array asociativo a un objeto
        $presentation = json_decode(json_encode($presentation));
        return $presentation;
    }

    public function index()
    {
        $data = Product::paginate();
        if (count($data) > 0) {
            return view('products.index', ['products' => $data, 'categories' => $this->getCategoriesOnProducts()]);
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
        $presentation = $this->getProdPresentation();
        $categories = $this->getCategories();
        $suppliers = $this->getSuppliers();
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
        $categories = $this->getCategoriesOnProducts();
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
    public function edit($id)
    {
        $data = Product::find($id);
        $presentation = $this->getProdPresentation();
        $categories = $this->getCategories();
        $suppliers = $this->getSuppliers();
        /* return $data; */
        return view('products.edit', compact('data', 'suppliers', 'presentation', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $data)
    {
        $data->update($request->validated());
        return redirect()->route('product.index');
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
