<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campagne extends Model {
    use HasFactory;

    protected $table = 'campagne';

    protected $fillable = [
        'nom',
        'slug'
    ];

    function souscriptions() {
        return $this->hasMany(Souscription::class, 'campagne_id');
    }
}
