<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Bier extends Model
{
    use HasRecursiveRelationships;

    // Define the table associated with the Bier model
    protected $table = 'bier';

    /**
     * Relationship to the Categorie model
     */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    /**
     * Relationship to fetch all direct children (submerken)
     */
    public function children()
    {
        return $this->hasMany(Bier::class, 'valt_onder_id');
    }

    /**
     * Relationship to fetch the parent (the beer this one falls under)
     */
    public function parent()
    {
        return $this->belongsTo(Bier::class, 'valt_onder_id');
    }

    /**
     * Recursive relationship to fetch all children down the hierarchy
     */
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }
}
