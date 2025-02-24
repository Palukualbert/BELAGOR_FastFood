<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

    if (!$user) {
        return redirect()->route('signin')->with('error', 'Veuillez vous connecter pour accéder à votre panier.');
    }

    // Récupérer le panier de l'utilisateur avec les repas
        $panier = $user->panier()->with('repas')->first();

    // Vérifier si le panier existe
    if (!$panier) {
        $repasPanier = [];
        $totalGeneral = 0;
    } else {
        $repasPanier = $panier->repas;
        $totalGeneral = $repasPanier->sum(function ($repas) {
            return $repas->pivot->quantite * $repas->prix;
        });
    }
        
        return view('User.commander', compact('repasPanier', 'totalGeneral'));
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
    public function show(Panier $panier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Panier $panier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Panier $panier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Panier $panier)
    {
        //
    }
}
