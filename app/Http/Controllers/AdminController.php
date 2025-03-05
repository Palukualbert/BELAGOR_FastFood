<?php

namespace App\Http\Controllers;

use App\Models\Repas;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $repas = Repas::all();

        // Compter les statistiques
        $totalCommandes = Commande::count();
        $commandesAujourdhui = Commande::whereDate('created_at', today())->count();
        $totalRepas = Repas::count();
        $totalClients = User::count();

        return view('admin.pages.dashboard', compact('repas', 'totalCommandes', 'commandesAujourdhui', 'totalRepas', 'totalClients'));
    }
    public function commandesParDate(Request $request)
    {
        $date = $request->query('date', today()->toDateString()); // Récupère la date ou utilise aujourd'hui
        $commandesAujourdhui = Commande::whereDate('created_at', $date)->count();

        return response()->json(['commandes' => $commandesAujourdhui]);
    }

}
