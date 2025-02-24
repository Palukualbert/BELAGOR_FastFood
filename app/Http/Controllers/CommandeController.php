<?php

namespace App\Http\Controllers;


use App\Models\Commande;
use App\Models\Repas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    $request->validate([
        'quantites' => 'required|array',
        'quantites.*' => 'required|integer|min:1',
        'latitude' => 'nullable|string',
        'longitude' => 'nullable|string',
    ]);

    $user = Auth::user();
    $repasCommandes = [];
    $montantTotal = 0;

    foreach ($request->quantites as $repasId => $quantite) {
        $repasModel = Repas::find($repasId);
        if ($repasModel) {
            $repasCommandes[] = [
                'id' => $repasModel->id,
                'nom' => $repasModel->nom,
                'quantite' => $quantite,
                'prix_unitaire' => $repasModel->prix,
                'total' => $repasModel->prix * $quantite
            ];
            $montantTotal += $repasModel->prix * $quantite;
        }
    }

    // 🔹 Création de la commande
    $commande = Commande::create([
        'user_id' => $user->id,
        'status' => 'en_attente',
        'montant_total' => $montantTotal,
        'repas' => json_encode($repasCommandes),
        'latitude' => $request->latitude ?? '5.336556',
        'longitude' => $request->longitude ?? '-4.030769',
    ]);

    // 🔥 Vider le panier de l'utilisateur
    DB::table('panier_repas')
        ->whereIn('panier_id', function ($query) use ($user) {
            $query->select('id')
                  ->from('paniers')
                  ->where('user_id', $user->id);
        })->delete();

    // 🔹 Supprimer le panier de l'utilisateur
    DB::table('paniers')->where('user_id', $user->id)->delete();

    return response()->json([
        'message' => 'Commande enregistrée avec succès et panier vidé',
        'commande' => $commande
    ], 201);
}
    


    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
