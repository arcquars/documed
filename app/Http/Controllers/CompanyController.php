<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $companies = App\Models\Company::all();
            return view('companies.index', compact('companies'));
        } catch (\Exception $e) {
            Log::error("Error al obtener el listado de compañías: " . $e->getMessage());
            return redirect()->back()->with('error', 'No se pudo cargar el listado de compañías. Intente de nuevo.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
