<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sanction extends Model
{
    protected $table = 'sanctions';

    protected $fillable = [
        'stagiaire_id',
        'date',
        'type_sanction',
        'Motif',
        'points_déduire',
        'Autorite'
    ];

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }
}