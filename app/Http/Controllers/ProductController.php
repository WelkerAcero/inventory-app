<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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

    public function getProdByBrand($brand)
    {
        return Product::where('pro_brand', $brand)->get();
    }

    public function getProdByColor($color)
    {
        return Product::where('pro_color', $color)->get();
    }

    public function getProdByCost($cost)
    {
        return Product::where('pro_cost', '<=', $cost)->get();
    }

    public function getProdByBrandCost($brand, $cost)
    {
        return Product::where('pro_brand', $brand)->where('pro_cost', '<=', $cost)->get();
    }

    public function getProdByBrandColor($brand, $color)
    {
        return Product::where('pro_brand', $brand)->where('pro_cost', $color)->get();
    }

    public function getProdByColorCost($color, $cost)
    {
        return Product::where('pro_color', $color)->where('pro_cost', '<=', $cost)->get();
    }

    public function getProdByFilters($brand = null, $color = null, $cost = null)
    {
        if (isset($brand, $color, $cost)) {
            $products_by_all_filters = Product::where('pro_brand', $brand)
                ->where('pro_color', $color)
                ->where('pro_cost', '<=', $cost)
                ->get();
            return $products_by_all_filters;
        } elseif (isset($brand, $color)) {
            return $this->getProdByBrandColor($brand, $color);
        } elseif (isset($brand, $cost)) {
            return $this->getProdByBrandCost($brand, $cost);
        } elseif (isset($brand)) {
            return $this->getProdByBrand($brand);
        } elseif (isset($color)) {
            return $this->getProdByColor($color);
        } else {
            return $this->getProdByCost($cost);
        }
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

    public function getBandList()
    {
        try {
            $brand = Product::select('pro_brand')->distinct()->where('pro_brand', '!=', 'null')->get();
            return $brand;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function searchByFilter(Request $request)
    {

        $productsFiltered = $this->getProdByFilters($request->brand_filter, $request->color_filter, $request->price_filter);
        return $this->index($productsFiltered);
    }

    public function index($dataFiltered = null)
    {
        $categories = $this->getCategories();
        $brandList = $this->getBandList();
        if ($dataFiltered) {
            $products = $dataFiltered;
            if (count($products) > 0) {
                return view('products.index', compact('products', 'categories', 'brandList'));
            }
        }

        $products = Product::paginate();
        if (count($products) > 0) {
            return view('products.index', compact('products', 'categories', 'brandList'));
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
        try {
            $brandList = $this->getBandList();
            $onCategoryName = DB::table('categories')->select('cat_name')
                ->where('id', '=', $product)
                ->get();
            $byCategoryId = Product::where('category_id', $product)->get();
            return view('products.index', ['products' => $byCategoryId, 'categories' => $this->getCategories(), 'onCategoryName' => $onCategoryName, 'brandList' => $brandList]);
        } catch (\Throwable $th) {
            throw $th;
        }
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
