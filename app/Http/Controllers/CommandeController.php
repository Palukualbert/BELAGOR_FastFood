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
        $commandes = Commande::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.pages.commandes', compact('commandes'));
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
            'phone' => 'required|string|min:8|max:20',
            'adresse' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        if (!$user) {
            return redirect()->route('signin')->with('error', 'Vous devez être connecté pour passer une commande.');
        }

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

        $commande = Commande::create([
            'user_id' => $user->id,
            'status' => 'en_attente',
            'montant_total' => $montantTotal,
            'repas' => json_encode($repasCommandes),
            'latitude' => $request->latitude ?? '-11.6590',
            'longitude' => $request->longitude ?? '27.4794',

            'adresse' => $request->adresse,
            'phone' => $request->phone,
        ]);

        if (!$commande) {
            return redirect()->route('menu')->with('error', 'Une erreur est survenue lors de la commande. Veuillez réessayer.');
        }

        DB::table('panier_repas')
            ->whereIn('panier_id', function ($query) use ($user) {
                $query->select('id')
                    ->from('paniers')
                    ->where('user_id', $user->id);
            })->delete();

        DB::table('paniers')->where('user_id', $user->id)->delete();

        return redirect()->route('menu')->with('success', 'Commande effectuée avec succès !');
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
    public function updateStatus(Request $request, $id)
    {
        try {
            $commande = Commande::findOrFail($id);
            $commande->status = $request->status;
            $commande->save();

            return response()->json(['success' => 'Statut mis à jour avec succès !', 'new_status' => $commande->status]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la mise à jour : ' . $e->getMessage()], 500);
        }
    }



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
