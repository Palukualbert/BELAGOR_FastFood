<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\PanierRepas;
use App\Models\Repas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanierRepasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function ajouterRepas(Request $request){
        $user = Auth::user();
    if (!$user) {
        return response()->json(['success' => false, 'message' => 'Vous devez être connecté'], 401);
    }

    $repasId = $request->input('repas_id');
    $quantite = $request->input('quantite', 1);

    $repas = Repas::find($repasId);
    if (!$repas) {
        return response()->json(['success' => false, 'message' => 'Repas introuvable'], 404);
    }

    // Vérifier si l'utilisateur a déjà un panier "en cours"
    $panier = Panier::where('user_id', $user->id)->where('statut', 'en cours')->first();

    if (!$panier) {
        $panier = Panier::create(['user_id' => $user->id, 'statut' => 'en cours']);
    }

    // Vérifier si le repas est déjà dans le panier
    $panierRepas = $panier->repas()->where('repas_id', $repasId)->first();

    if ($panierRepas) {
        return response()->json([
            'success' => false,
            'message' => 'Ce repas est déjà dans votre panier.'
        ]);
    }

    // Ajouter un nouvel élément dans le panier
    $panier->repas()->attach($repasId, [
        'quantite' => $quantite,
        'prix_unitaire' => $repas->prix,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Repas ajouté au panier !',
        'cart_count' => $panier->repas()->sum('panier_repas.quantite')
    ]);
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
    public function show(PanierRepas $panierRepas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PanierRepas $panierRepas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PanierRepas $panierRepas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PanierRepas $panierRepas)
    {
        //
    }
}
