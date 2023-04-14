<?php

namespace App\Http\Controllers\ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public $dbAttri = array(
        'pro_img',
        'pro_cost',
        'pro_brand',
        'pro_name',
        'pro_color',
        'pro_discount',
        'pro_model',
        'pro_state'
    );
    /**
     * Display a listing of the resource.
     *
     * 
     */

    public function getProducts(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['products' => Product::select($this->dbAttri)->paginate()]);
    }

    public function getProductsTest()
    {
        return ProductCollection::make(Product::all()->keyBy->id);
    }

    public function getProdPresentation()
    {
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

    public function getCategoryList(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = DB::table('categories')->select('id', 'cat_name')->get();
            return response()->json(['categories' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function getBandList(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Product::select('pro_brand')->distinct()->where('pro_brand', '!=', 'null')->get();
            return response()->json(['brands' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function getColorList(): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Product::select('pro_color')->distinct()->where('pro_color', '!=', 'null')->get();
            return response()->json(['colors' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function get_by_brand($brand): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Product::select($this->dbAttri)
                ->where('pro_brand', $brand)
                ->paginate(8);
            return response()->json(['products' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function get_by_color($color): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Product::select($this->dbAttri)
                ->where('pro_color', $color)
                ->paginate(8);
            return response()->json(['products' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function get_by_cost($cost): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Product::select($this->dbAttri)
                ->where('pro_cost', '<=', $cost)
                ->paginate(8);
            return response()->json(['products' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function get_by_category_brand_color($category_id, $brand, $color): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Product::select($this->dbAttri)
                ->where('category_id', $category_id)
                ->where('pro_color', $color)
                ->where('pro_brand', $brand)
                ->paginate(8);
            return response()->json(['products' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }


    public function get_by_category_brand($category_id, $brand): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Product::select($this->dbAttri)
                ->where('category_id', $category_id)
                ->where('pro_brand', $brand)
                ->paginate(8);
            return response()->json(['products' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function get_by_category_color($category_id, $color): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Product::select($this->dbAttri)
                ->where('category_id', $category_id)
                ->where('pro_color', $color)
                ->paginate(8);
            return response()->json(['products' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function get_by_category_cost($category_id, $cost): \Illuminate\Http\JsonResponse
    {

        try {
            $data = Product::select($this->dbAttri)
                ->where('category_id', $category_id)
                ->where('pro_cost', '<=', $cost)
                ->paginate(8);
            return response()->json(['products' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }


    public function get_by_brand_cost($brand, $cost): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Product::select($this->dbAttri)
                ->where('pro_brand', $brand)
                ->where('pro_cost', '<=', $cost)
                ->paginate(8);
            return response()->json(['products' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function get_by_brand_color($brand, $color): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Product::select($this->dbAttri)
                ->where('pro_brand', $brand)
                ->where('pro_color', $color)
                ->paginate(8);
            return response()->json(['products' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function get_by_color_cost($color, $cost): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Product::select($this->dbAttri)
                ->where('pro_color', $color)
                ->where('pro_cost', '<=', $cost)
                ->paginate(8);
            return response()->json(['products' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function get_by_color_category($color, $category): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Product::select($this->dbAttri)
                ->where('pro_color', $color)
                ->where('category_id', $category)
                ->paginate(8);
            return response()->json(['products' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }


    public function get_by_category($category_id): \Illuminate\Http\JsonResponse
    {
        try {
            $data = Product::select($this->dbAttri)
                ->where('category_id', $category_id)
                ->paginate(8);
            return response()->json(['products' => $data]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 400);
        }
    }

    public function getProdByFilters($category = null, $brand = null, $color = null, $cost = null): \Illuminate\Http\JsonResponse
    {
        if (isset($category, $brand, $color, $cost)) {
            $data = Product::where('pro_brand', $brand)
                ->where('pro_color', $color)
                ->where('pro_cost', '<=', $cost)
                ->where('category_id', $category)
                ->get();
            return response()->json(['products' => $data]);
        } elseif (isset($category, $brand)) {
            return $this->get_by_category_brand($category, $brand);
        } elseif (isset($category, $color)) {
            return $this->get_by_category_color($category, $color);
        } elseif (isset($category, $cost)) {
            return $this->get_by_category_cost($category, $cost);
        } elseif (isset($brand, $color)) {
            return $this->get_by_brand_color($brand, $color);
        } elseif (isset($brand, $cost)) {
            return $this->get_by_brand_cost($brand, $cost);
        } elseif (isset($color, $category)) {
            return $this->get_by_color_category($color, $category);
        } elseif (isset($brand)) {
            return $this->get_by_brand($brand);
        } elseif (isset($color)) {
            return $this->get_by_color($color);
        } elseif (isset($category)) {
            return $this->get_by_category($category);
        } elseif (isset($cost)) {
            return $this->get_by_cost($cost);
        } else {
            return "algo más";
        }
    }

    public function searchByFilter(Request $request)
    {
        $productsFiltered = $this->getProdByFilters(
            $request->category_filter,
            $request->brand_filter,
            $request->color_filter,
            $request->price_filter
        );
        return $this->index($productsFiltered);
    }

    public function index($dataFiltered = null)
    {
        $categories = $this->getCategories();
        $brandList = $this->getBandList();
        $supplierCodes = $this->getSupplierCodes();
        if ($dataFiltered && count($dataFiltered) > 0) {
            $products = $dataFiltered;
            $cat_name = $this->getCategoryName($products[0]->category_id);
            return response()->json(compact('products', 'categories', 'brandList', 'supplierCodes', 'cat_name'));
        }

        $products = Product::paginate();
        if (count($products) > 0) {
            return response()->json(compact('products', 'categories', 'brandList', 'supplierCodes'));
        }

        return response()->json(['error' => "No hay datos para mostrar"]);
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
