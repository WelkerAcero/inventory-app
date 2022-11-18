<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Supplier::paginate();
        $cities_id = array();
        $cities = array();
        foreach ($data as $key => $value) {
            array_push($cities_id, $value['department_id']);
            $city_name = DB::table('departments')->select('dep_name')->where('id', '=', $value['department_id'])->get();
            array_push($cities, $city_name);
        }
        return view('suppliers.index', compact('data'), compact('cities'));
        /* return response()->json($suppliers); */
    }

    public function departmentsByCountryId($countryId)
    {
        try {
            return DB::table('departments')->where('country_id', $countryId)->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentType = DB::table('document_types')->select('id', 'doc_name')->get();
        $countries = DB::table('countries')->select('id', 'cou_name')->get();
        $departments = DB::table('departments')->select('id', 'dep_name')->get();
        return view('suppliers.create', compact('documentType'), compact('countries', 'departments'));
        /* return $documentType; */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        
        $supplier = Supplier::create($request->all());
        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        $data = Supplier::find($supplier);
        return view('suppliers.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit($supplier)
    {
        $data = Supplier::find($supplier);
        return view('suppliers.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {

        $supplier->update($request->all());
        return redirect()->route('suppliers.show', $supplier->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index');
    }
}
