<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use App\Models\Absence;
use App\Models\Sanction;

class DashboardController extends Controller
{
    public function index()
    {
        $totalStagiaires = Stagiaire::count();

        $totalAbsences = Absence::where('type', 'Absence')->count();

        $totalRetards = Absence::where('type', 'Retard')->count();

        $totalSanctions = Sanction::count();

        $lastAbsences = Absence::with('stagiaire')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalStagiaires',
            'totalAbsences',
            'totalRetards',
            'totalSanctions',
            'lastAbsences'
        ));
    }
}