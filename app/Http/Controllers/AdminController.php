<?php

namespace App\Http\Controllers;

use App\Models\Repas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Récupérer tous les repas
        $repas = Repas::all();

        // Retourner la vue avec les repas
        return view('admin.pages.dashboard', compact('repas'));
    }
}
