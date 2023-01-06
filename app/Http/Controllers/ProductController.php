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

    public function getCategories()
    {
        try {
            return DB::table('categories')->select('id', 'cat_name')->get();
        } catch (\Throwable $th) {
            return ['error' => 'Lo sentimos se produjo un error inesperado'];
        }
    }

    public function getCategoryName($cat_id)
    {
        return DB::table('categories')->select('id', 'cat_name')->where('id', $cat_id)->get();
    }

    public function getSupplierCodes()
    {
        try {
            return DB::table('suppliers')->select('id', 'sup_code', 'sup_name')->distinct()->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getBandList()
    {
        try {
            return Product::select('pro_brand')->distinct()->where('pro_brand', '!=', 'null')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getSuppliers()
    {
        return DB::table('suppliers')->select('id', 'sup_name')->get();
    }

    public function get_by_brand($brand)
    {
        return Product::where('pro_brand', $brand)->get();
    }

    public function get_by_color($color)
    {
        return Product::where('pro_color', $color)->get();
    }

    public function get_by_cost($cost)
    {
        return Product::where('pro_cost', '<=', $cost)->get();
    }

    public function get_by_supplier($supplier)
    {
        return Product::where('supplier_id', $supplier)->get();
    }

    public function get_by_category_supplier_brand_color($category_id, $supplier, $brand, $color)
    {
        return Product::where('category_id', $category_id)
            ->where('pro_brand', $brand)
            ->where('pro_color', $color)
            ->where('supplier_id', $supplier)
            ->get();
    }

    public function get_by_category_supplier_brand_cost($category_id, $supplier, $brand, $cost)
    {
        return Product::where('category_id', $category_id)
            ->where('pro_brand', $brand)
            ->where('pro_cost', '<=', $cost)
            ->where('supplier_id', $supplier)
            ->get();
    }

    public function get_by_category_supplier_brand($category_id, $supplier, $brand)
    {
        return Product::where('category_id', $category_id)
            ->where('pro_brand', $brand)
            ->where('supplier_id', $supplier)
            ->get();
    }

    public function get_by_category_supplier_color($category_id, $supplier, $color)
    {
        return Product::where('category_id', $category_id)
            ->where('pro_color', $color)
            ->where('supplier_id', $supplier)
            ->get();
    }

    public function get_by_category_supplier_cost($category_id, $supplier, $cost)
    {
        return Product::where('category_id', $category_id)
            ->where('pro_cost', '<=', $cost)
            ->where('supplier_id', $supplier)
            ->get();
    }

    public function get_by_category_supplier($category_id, $supplier)
    {
        return Product::where('category_id', $category_id)
            ->where('supplier_id', $supplier)
            ->get();
    }

    public function get_by_category_brand($category_id, $brand)
    {
        return Product::where('category_id', $category_id)
            ->where('pro_brand', $brand)
            ->get();
    }

    public function get_by_category_color($category_id, $color)
    {
        return Product::where('category_id', $category_id)
            ->where('pro_color', $color)
            ->get();
    }

    public function get_by_category_cost($category_id, $cost)
    {
        return Product::where('category_id', $category_id)
            ->where('pro_cost', '<=', $cost)
            ->get();
    }

    public function get_by_brand_supplier($brand, $supplier)
    {
        return Product::where('prod_brand', $brand)
            ->where('supplier_id', $supplier)
            ->get();
    }

    public function get_by_brand_cost($brand, $cost)
    {
        return Product::where('pro_brand', $brand)->where('pro_cost', '<=', $cost)->get();
    }

    public function get_by_brand_color($brand, $color)
    {
        return Product::where('pro_brand', $brand)->where('pro_color', $color)->get();
    }

    public function get_by_color_cost($color, $cost)
    {
        return Product::where('pro_color', $color)->where('pro_cost', '<=', $cost)->get();
    }

    public function get_by_color_supplier($color, $supplier)
    {
        return Product::where('pro_color', $color)->where('supplier_id', $supplier)->get();
    }

    public function get_by_color_category($color, $category)
    {
        return Product::where('pro_color', $color)->where('category_id', $category)->get();
    }

    public function get_by_cost_supplier($cost, $supplier)
    {
        return Product::where('pro_cost', '<=', $cost)->where('supplier_id', $supplier)->get();
    }

    public function get_by_category($category_id)
    {
        try {
            $category = DB::table('categories')->select('cat_name')
                ->where('id', '=', $category_id)
                ->get();
            return Product::where('category_id', $category_id)->paginate();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getProdByFilters($category = null, $supplier = null, $brand = null, $color = null, $cost = null)
    {
        if (isset($category, $supplier, $brand, $color, $cost)) {
            $products = Product::where('pro_brand', $brand)
                ->where('pro_color', $color)
                ->where('pro_cost', '<=', $cost)
                ->where('category_id', $category)
                ->where('supplier_id', $supplier)
                ->get();
            return $products;
        } elseif (isset($category, $supplier, $brand, $color)) {
            return $this->get_by_category_supplier_brand_color($category, $supplier, $brand, $color);
        } elseif (isset($category, $supplier, $brand, $cost)) {
            return $this->get_by_category_supplier_brand_cost($category, $supplier, $brand, $cost);
        } elseif (isset($category, $supplier, $brand)) {
            return $this->get_by_category_supplier_brand($category, $supplier, $brand);
        } elseif (isset($category, $supplier, $color)) {
            return $this->get_by_category_supplier_color($category, $supplier, $color);
        } elseif (isset($category, $supplier, $cost)) {
            return $this->get_by_category_supplier_cost($category, $supplier, $cost);
        } elseif (isset($category, $supplier)) {
            return $this->get_by_category_supplier($category, $supplier);
        } elseif (isset($category, $brand)) {
            return $this->get_by_category_brand($category, $brand);
        } elseif (isset($category, $color)) {
            return $this->get_by_category_color($category, $color);
        } elseif (isset($category, $cost)) {
            return $this->get_by_category_cost($category, $cost);
        } elseif (isset($brand, $supplier)) {
            return $this->get_by_brand_supplier($brand, $supplier);
        } elseif (isset($brand, $color)) {
            return $this->get_by_brand_color($brand, $color);
        } elseif (isset($brand, $cost)) {
            return $this->get_by_brand_cost($brand, $cost);
        } elseif (isset($color, $supplier)) {
            return $this->get_by_color_supplier($color, $supplier);
        } elseif (isset($color, $category)) {
            return $this->get_by_color_category($color, $category);
        } elseif (isset($cost, $supplier)) {
            return $this->get_by_cost_supplier($cost, $supplier);
        } elseif (isset($brand)) {
            return $this->get_by_brand($brand);
        } elseif (isset($color)) {
            return $this->get_by_color($color);
        } elseif (isset($category)) {
            return $this->get_by_category($category);
        } elseif (isset($cost)) {
            return $this->get_by_cost($cost);
        } else {
            return $this->get_by_supplier($supplier);
        }
    }

    public function searchByFilter(Request $request)
    {
        $productsFiltered = $this->getProdByFilters(
            $request->category_filter,
            $request->supplier_filter,
            $request->brand_filter,
            $request->color_filter,
            $request->price_filter
        );
        return $this->index($productsFiltered);
    }

    public function index($dataFiltered = null)
    {
        $error = "No hay datos para mostrar";
        $categories = $this->getCategories();
        $brandList = $this->getBandList();
        $supplierCodes = $this->getSupplierCodes();
        if ($dataFiltered) {
            $products = $dataFiltered;
            if (count($products) > 0) {
                $cat_name = $this->getCategoryName($products[0]->category_id);
                return view('products.index', compact('products', 'categories', 'brandList', 'supplierCodes', 'cat_name'));
            } else {
                return view('products.index', compact('error', 'categories', 'brandList', 'supplierCodes'));
            }
        }

        $products = Product::paginate();
        if (count($products) > 0) {
            return view('products.index', compact('products', 'categories', 'brandList', 'supplierCodes'));
        }
        
        return view('products.index', compact('error', 'categories', 'brandList', 'supplierCodes'));
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
