<?php

namespace App\Http\Controllers;

use App\Http\Requests\SanctionRequest;
use App\Models\Sanction;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class SanctionController extends Controller
{
public function index(Request $request)
{
    $query = Sanction::with('stagiaire');

    if ($request->filled('stagiaire')) {
        $query->whereHas('stagiaire', function($q) use ($request) {
            $q->where('Nom', 'like', '%'.$request->stagiaire.'%')
              ->orWhere('prénom', 'like', '%'.$request->stagiaire.'%');
        });
    }

    if ($request->filled('type_sanction')) {
        $query->where('type_sanction', $request->type_sanction);
    }

    if ($request->filled('autorite')) {
        $query->where('Autorite', $request->autorite);
    }

    $sanctions = $query->get();

    return view('sanctions.index', compact('sanctions'));
    }

    public function create()
    {
        $stagiaire = Stagiaire::all();
        return view('sanctions.create',compact('stagiaire'));
    }

    public function store(SanctionRequest $request)
    {
    $validate = $request->validated();
    Sanction::create($validate);

    return redirect()->route('sanctions.index')->with('success','Ajouter sanction.');
    }

    public function edit(Sanction $sanction)
    {  
        $stagiaire = Stagiaire::all();

        return view('sanctions.edit',compact('sanction','stagiaire')); 
    }

    public function update(SanctionRequest $request , Sanction $sanction)
    {

        $validate = $request->validated();
        $sanction->fill($validate)->save();

        return redirect()->route('sanctions.index')->with('success','Modifier Sanction.');

    }
    public function destroy(Sanction $sanction)
    {
     $sanction->delete();
     return redirect()->route('sanctions.index')->with('success','supprimer sanction.');
     
    }


}
