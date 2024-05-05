<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bier;

class BierController extends Controller
{
    /**
     * Display a tree view of all beers with their underlying brands.
     */
    public function boom()
    {
        // Retrieve all beers with their recursive sub-brands
        $bieren = Bier::with('childrenRecursive')->whereNull('valt_onder_id')->get();
        
        // Return the view with the data
        return view('boom', ['bieren' => $bieren]);
    }

    /**
     * Display other beers from the same beer brand.
     */
    public function andereBieren($id)
    {
        // Retrieve the main beer based on ID and load other sub-brands
        $bier = Bier::with('siblings')->findOrFail($id);

        // If there are no other sub-brands, return a message
        if ($bier->siblings->isEmpty()) {
            return response()->json(['message' => 'Geen andere submerken gevonden voor dit bier.'], 404);
        }

        // Return the view with the data
        return view('bieren.andere', ['bier' => $bier]);
    }

    /**
     * Display beers by category.
     */
    public function bierenPerCategorie($categorieId)
    {
        // Retrieve all beers that belong to the specified category
        $bieren = Bier::where('categorie_id', $categorieId)->get();

        // Return a message if no beers are found
        if ($bieren->isEmpty()) {
            return response()->json(['message' => 'Geen bieren gevonden in deze categorie.'], 404);
        }

        // Return the view with the data
        return view('bieren.per_categorie', ['bieren' => $bieren]);
    }

    /**
     * Display brands with sub-brands.
     */
    public function merkenMetSubmerken()
    {
        // Retrieve all main brands that have sub-brands
        $merken = Bier::has('children')->withCount('children as submerken_count')->get();

        // Return a message if no main brands with sub-brands are found
        if ($merken->isEmpty()) {
            return response()->json(['message' => 'Geen hoofdmerken met submerken gevonden.'], 404);
        }

        // Return the view with the data
        return view('bieren.met_submerken', ['merken' => $merken]);
    }
}
