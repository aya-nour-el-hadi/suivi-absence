<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absence extends Model
{
    use SoftDeletes;
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
