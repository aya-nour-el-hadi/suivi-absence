<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cef extends Model
{
    protected $table = 'cefs';

    protected $fillable = [
        'stagiaire_id',
        'total_abssance',
        'total_retard',
        'sanction',
        'evaluation_final',
        'signature'
    ];

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }
}
