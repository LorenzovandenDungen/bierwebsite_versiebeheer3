<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BierController;

// Default route to the welcome page
Route::get('/', function () {
    return view('welcome');
});

// Route for displaying the hierarchical tree view of all beers
Route::get('/boom', [BierController::class, 'boom'])->name('bier.boom');

// Route for displaying other beers from the same beer brand based on ID
Route::get('/andere-bieren/{id}', [BierController::class, 'andereBieren'])->name('bier.andereBieren');

// Route for displaying all beers from a specific category based on category ID
Route::get('/categorie/{categorieId}', [BierController::class, 'bierenPerCategorie'])->name('bier.perCategorie');

// Route for displaying brands with sub-brands and the count of sub-brands
Route::get('/submerken', [BierController::class, 'merkenMetSubmerken'])->name('bier.merkenMetSubmerken');
