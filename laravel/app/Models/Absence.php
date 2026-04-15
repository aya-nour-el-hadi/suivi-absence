<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $table = 'absences';

    protected $fillable = [
        'stagiaire_id',
        'date',
        'type',
        'justifier'
    ];

    public function stagiaire()
    {
        return $this->belongsTo(Stagiaire::class);
    }
}
