<?php

namespace App\Http\Controllers;

use App\Models\Repas;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RepasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $repas = Repas::all();
        return View('menu', compact('repas'));
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
    public function show(Repas $repas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Repas $repas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Repas $repas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Repas $repas)
    {
        //
    }
}
