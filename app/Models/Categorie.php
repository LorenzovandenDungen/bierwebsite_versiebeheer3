<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    // Specify the table associated with the Categorie model
    protected $table = 'categorie';

    /**
     * Define a one-to-many relationship.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bieren()
    {
        // Explicitly specify the foreign key if it's not following Laravel's naming convention
        return $this->hasMany(Bier::class, 'categorie_id');
    }
}
