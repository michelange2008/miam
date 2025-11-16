<?php

// app/Http/Controllers/RationController.php
namespace App\Http\Controllers;

use App\Models\{Espece, Production, Race, Physiologie};
use Illuminate\Http\Request;

class RationController extends Controller
{
    function index()
    {
        return view('miam.index');
    }
    public function nouveau()
    {
        $especes = Espece::all();
        return view('miam.nouveau', compact('especes'));
    }

    function setTroupeau(Request $request)
    {
        $validated = $request->validate([
            'espece_id' => 'required|exists:especes,id',
            'production_id' => 'required|exists:productions,id',
            'race_id' => 'required|exists:races,id',
            'physiologie_id' => 'required|exists:physiologies,id',
        ]);

        // Hydratation avec les objets complets
        $troupeau = [
            'espece' => Espece::find($validated['espece_id']),
            'production' => Production::find($validated['production_id']),
            'race' => Race::find($validated['race_id']),
            'physiologie' => Physiologie::find($validated['physiologie_id']),
        ];

        // Stockage en session
        session(['troupeau' => $troupeau]);

        return response()->json([
            'success' => true,
            'message' => 'Troupeau stocké temporairement',
        ]);
    }

    // Pour AJAX
    public function getProductions(Espece $espece)
    {
        return response()->json($espece->productions);
    }

    public function getRaces(Production $production)
    {
        return response()->json($production->races);
    }

    public function getPhysiologies(Race $race)
    {
        return response()->json($race->physiologies);
    }
}
