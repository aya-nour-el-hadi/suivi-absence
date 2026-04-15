<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    protected $table = 'stagiaires';

    protected $fillable = [
        'Nom',
        'prénom',
        'Nivaux',
        'Filière',
        'date_debut',
        'date_fin',
        'group_class'
    ];

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
    public function sanctions()
    {
        return $this->hasMany(Sanction::class);
    }
    public function cef()
    {
        return $this->hasOne(Cef::class);
    }
}
