<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbsenceRequest;
use App\Models\Absence;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
public function index(Request $request)
{
    $query = Absence::with('stagiaire');

    if ($request->filled('stagiaire')) {
        $query->whereHas('stagiaire', function($q) use ($request) {
            $q->where('Nom', 'like', '%'.$request->stagiaire.'%')
              ->orWhere('prénom', 'like', '%'.$request->stagiaire.'%');
        });
    }

    if ($request->filled('date')) {
        $query->where('date', $request->date);
    }

    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    $absence = $query->get();

    return view('absences.index', compact('absence'));
}

    public function create()
    {
        $stagiaire = Stagiaire::all();
        return view('absences.create',compact('stagiaire'));
    }

    public function store(AbsenceRequest $request)
    {
       $validate = $request->validated();
       
       Absence::create($validate);

       return redirect()->route('absence.index')->with('success','Ajouter absence.');
    }

    public function edit(Absence $absence)
    {
       return view('absences.edit',compact('absence'));
    }

    public function update(AbsenceRequest $request , Absence $absence)
    {
        $validate = $request->validated();
        $absence->fill($validate)->save();
   
        return redirect()->route('absence.index')->with('success','Modifier Absence');
    }

    public function destroy(Absence $absence)
    {
        $absence->delete();

        return redirect()->route('absence.index')->with('success','supprimer cette Absence.');
    }
}