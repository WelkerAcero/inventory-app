<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use Illuminate\Support\Facades\Auth;
/* use App\Http\Requests\UpdateSupplierRequest; */

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Supplier::with('document_type', 'department')->paginate();
        return view('suppliers.index', compact('data'));
    }

    public function jsFormEvent($countryId)
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
        $data = new Supplier();
        $documentType = DB::table('document_types')->select('id', 'doc_name')->get();
        $countries = DB::table('countries')->select('id', 'cou_name')->get();
        $departments = DB::table('departments')->select('id', 'dep_name')->get();
        return view('suppliers.create', compact('data', 'documentType', 'countries', 'departments'));
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
        try {
            $supplier = Supplier::create($request->validated());
            return redirect()->route('supplier.index');
        } catch (\Throwable $th) {
            return redirect('supplier.create')->withErrors($th, 'error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $provider
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
     * @param  \App\Models\Supplier  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit($supplier, $dep_id)
    {
        $documentType = DB::table('document_types')->get();
        $countries = DB::table('countries')->get();
        $defaultCountry = DB::table('countries')
            ->join('departments', 'departments.country_id', '=', 'countries.id')
            ->where('departments.id', '=', $dep_id)
            ->select('countries.id', 'countries.cou_name')
            ->get();
        $data = Supplier::find($supplier);
        return view('suppliers.edit', compact('data', 'documentType', 'countries', 'defaultCountry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->validated());
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $id)
    {
        $id->delete();
        return redirect()->route('supplier.index');
    }
}
