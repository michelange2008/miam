<?php

// app/Http/Controllers/RationController.php
namespace App\Http\Controllers;

use App\Models\{Espece, Production, Race, Physiologie};
use Illuminate\Http\Request;

class RationController extends Controller
{
    public function index()
    {
        $especes = Espece::all();
        return view('miam.form', compact('especes'));
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
