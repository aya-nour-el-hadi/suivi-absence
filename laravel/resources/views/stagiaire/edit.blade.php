@extends('layouts.app')
@section('content')
<h1>Modifier Stagiaire</h1>
  @if ($errors->any())
    <div class="alert alert-danger rounded-3 shadow-sm">
        <h6 class="fw-bold">Errors:</h6>
        <ul class="mb-0">
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
<form action="{{ route('stagiaire.update',$stagiaire->id) }}" method="post"> 
  @csrf
  @method('PUT')
  <div class="form-group">
    <label>Nom</label>
    <input type="text" name="Nom" class="form-control" placeholder="Nom...">
  </div>

  <div class="form-group">
    <label>Prénom</label>
    <input type="text" name="prénom" class="form-control" placeholder="prénom...">
  </div>
  
  <div class="form-group">
      <label>Filière</label>
      <input type="text" name="Filière" class="form-control" placeholder="Filière...">
    </div>
    
    <div class="form-group">
      <label>Nivaux</label>
     <select name="Nivaux" class="form-control">
        <option>Débutant</option>
        <option>Intermédiaire</option>
        <option>Avancé</option>
     </select>
    </div>

    <div class="form-group">
    <label>date_debut</label>
    <input type="date" name="date_debut" class="form-control" placeholder="date_debut...">
  </div>

    <div class="form-group">
    <label>date_fin</label>
    <input type="date" name="date_fin" class="form-control" placeholder="date_fin...">
  </div>

    <div class="form-group">
      <label>group_class</label>
      <input type="text" name="group_class" class="form-control" placeholder="group_class...">
    </div>
  <button type="submit" class="btn btn-primary form-control mt-1" >Ajouter</button>
</form>
@endsection