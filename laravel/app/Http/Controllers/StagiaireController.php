<?php

namespace App\Http\Controllers;

use App\Http\Requests\StagiaireRequest;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
public function index(Request $request)
{
    $query = Stagiaire::query();

    if ($request->filled('nom')) {
        $query->where('Nom', 'like', '%'.$request->nom.'%');
    }

    if ($request->filled('filiere')) {
        $query->where('Filière', 'like', '%'.$request->filiere.'%');
    }

    if ($request->filled('group_class')) {
        $query->where('group_class', 'like', '%'.$request->group_class.'%');
    }

    $stagiaire = $query->get();

    return view('stagiaire.index', compact('stagiaire'));
}

    public function create()
    {
        return view('stagiaire.create');
    }
    public function store(StagiaireRequest $request)
    {
      $validate = $request->validated();
      Stagiaire::create($validate);

      return redirect()->route('stagiaire.index')->with('success','ajouter un stagiaire.');
    }

    public function edit(Stagiaire $stagiaire)
    {
        return view('stagiaire.edit',compact('stagiaire'));
    }

    public function update(StagiaireRequest $request,Stagiaire $stagiaire)
    {
       $validate = $request->validated();
       $stagiaire->fill($validate)->save();

       return redirect()->route('stagiaire.index')->with('success','modifier un stagiaire.');
    }

    public function destroy(Stagiaire $stagiaire)
    {
      $stagiaire->delete();

      return redirect()->route('stagiaire.index')->with('success','un Stagiaire est supprimer.');
    }
}
