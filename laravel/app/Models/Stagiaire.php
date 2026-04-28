<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stagiaire extends Model
{
    use SoftDeletes;
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
