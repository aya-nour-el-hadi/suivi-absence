<?php

namespace App\Http\Controllers;

use App\Http\Requests\CEFRequest;
use App\Models\Cef;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class CEFController extends Controller
{
public function index()
{
    $stagiaires = Stagiaire::with(['absences', 'sanctions'])->get();

    foreach ($stagiaires as $s) {

        $totalAbsence = $s->absences->where('type', 'Absence')->count();
        $totalRetard = $s->absences->where('type', 'Retard')->count();

        $lastSanction = $s->sanctions->sortByDesc('date')->first();
        $sanctionFinal = $lastSanction ? $lastSanction->type_sanction : 'Normal';

        Cef::updateOrCreate(
            ['stagiaire_id' => $s->id],
            [
                'evaluation_final' => $evaluation ?? 'Intermédiaire',
                'signature' => 'Non',

                'total_abssance' => $totalAbsence,
                'total_retard' => $totalRetard,

                'sanction' => $sanctionFinal, 
            ]
        );
    }

    $cef = Cef::with('stagiaire')->get();

    return view('CEF.index', compact('cef'));
}

public function update(Cef $cef, Request $request)
{
    $request->validate([
        'evaluation_final' => 'required|string|in:Très bien,Bien,Intermédiaire',
        'signature' => 'required|string|in:Oui,Non',
    ]);

    $cef->update([
        'evaluation_final' => $request->evaluation_final,
        'signature' => $request->signature,
    ]);

    return redirect()->route('CEF.index');
}
}