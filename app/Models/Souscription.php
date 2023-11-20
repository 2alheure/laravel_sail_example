<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Souscription extends Model {
    use HasFactory;

    protected $table = 'souscription';

    protected $fillable = [
        'email',
        'token',
        'campagne_id'
    ];

    function campagne() {
        return $this->belongsTo(Campagne::class, 'campagne_id');
    }
}
