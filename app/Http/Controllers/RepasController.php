<?php

namespace App\Http\Controllers;

use App\Models\PanierRepas;
use App\Models\Repas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RepasController extends Controller
{
    /**
     * Afficher la liste des repas.
     */
    public function index(): View
    {
        $repas = Repas::all();
    
    // Récupérer le panier depuis la session (ou 0 si vide)
    $nombreRepasPanier = Session::get('panier') ? count(Session::get('panier')) : 0;if (Auth::check()) { // Vérifier si l'utilisateur est connecté
        $userId = Auth::id();

        // Récupérer le panier actif (statut "en cours")
        $panier = DB::table('paniers')
                    ->where('user_id', $userId)
                    ->where('statut', 'en cours')
                    ->first();

        if ($panier) {
            // Calculer la somme des quantités des repas dans le panier
            $nombreRepasPanier = DB::table('panier_repas')
                                    ->where('panier_id', $panier->id)
                                    ->sum('quantite');
        }
    }

    return view('menu', compact('repas', 'nombreRepasPanier'));
    }

    /**
     * Afficher le formulaire d'ajout d'un repas.
     */
    public function create(): View
    {
        return view('admin.add');
    }

    /**
     * Enregistrer un nouveau repas.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'categorie' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.Str::random(10).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('img'), $imageName); // Déplace l'image dans public/img
            $imagePath = 'img/'.$imageName; // Chemin à enregistrer en BD
        } else {
            $imagePath = null;
        }

        Repas::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'image' => $imagePath,
            'categorie' => $request->categorie,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Repas ajouté avec succès !');
    }

    /**
     * Afficher le formulaire d'édition.
     */
    public function edit(Repas $repas): View
    {
        return view('admin.edit', compact('repas'));
    }

    /**
     * Mettre à jour un repas.
     */
    public function update(Request $request, Repas $repas)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'categorie' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image uniquement si elle existe
            if ($repas->image && file_exists(public_path($repas->image))) {
                unlink(public_path($repas->image));
            }

            // Sauvegarde de la nouvelle image
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $imagePath = 'img/'.$imageName;

            // Mise à jour de l'image dans la base de données
            $repas->image = $imagePath;
        }

        // Mise à jour des autres champs
        $repas->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'categorie' => $request->categorie,
            'image' => $repas->image, // Met à jour l'image dans la BDD
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Repas mis à jour avec succès !');
    }

    /**
     * Supprimer un repas.
     */
    public function destroy(Repas $repas)
    {
        if ($repas->image) {
            Storage::disk('public')->delete($repas->image);
        }
        $repas->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Repas supprimé avec succès !');
    }
}
