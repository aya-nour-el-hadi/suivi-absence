<?php 

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use App\Models\Absence;
use App\Models\Sanction;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Total stagiaires
        $totalStagiaires = Stagiaire::count();

        // Total absences
        $totalAbsences = Absence::where('type', 'Absence')->count();

        // Total retards
        $totalRetards = Absence::where('type', 'Retard')->count();

        // Total sanctions
        $totalSanctions = Sanction::count();

        // Dernières absences / retards
        $lastAbsences = Absence::with('stagiaire')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboardAdmin', compact(
            'totalStagiaires',
            'totalAbsences',
            'totalRetards',
            'totalSanctions',
            'lastAbsences'
        ));
    }
}
