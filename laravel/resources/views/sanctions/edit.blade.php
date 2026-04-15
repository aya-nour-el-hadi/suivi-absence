@extends('layouts.app')
@section('content')
<h1>Modifier Sanction</h1>
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
    
<form action="{{ route('sanction.update',$sanction->id) }}" method="post">
  @csrf
  @method('PUT')
    <div class="form-group">
       <label>Stagiaire</label>
       <select name="stagiaire_id" class="form-control">
        @foreach ($stagiaire as $s)
         <option value="{{ $s->id }}">
            {{ $s->Nom }} {{ $s->prénom }}
         </option>
        @endforeach
       </select>
    </div>
    <div class="form-group">
    <label>type de sanction</label>
    <select name="type_sanction" class="form-control">
        <option value="Normal">Normal</option>
        <option value="1er Mise en garde">1er Mise en garde</option>
        <option value="2éme Mise en garde">2éme Mise en garde</option>
        <option value="1er avertissement">1er avertissement</option>
        <option value="2éme avertissement">2éme avertissement</option>
        <option value="Blâme">Blâme</option>
        <option value="Exclusion de 2 jours">Exclusion de 2 jours</option>
        <option value="Exclusion Temporaire<">Exclusion Temporaire</option>
        <option value="Exclusion Définitive">Exclusion Définitive</option>
    </select>

  </div>

  <div class="form-group">
    <label>Motif</label>
    <input type="text" name="Motif" class="form-control" placeholder="Motif...">
  </div>
  <div class="form-group">
    <input type="date" name="date" class="form-control">
  </div>

  <div class="form-group">
    <label>points_déduire</label>
    <input type="number" name="points_déduire" class="form-control" placeholder="points_déduire...">
  </div>
    
    <div class="form-group">
      <label>Autorité de décision :</label>
      <div>
          <input type="radio" name="Autorite" value="SG">SG
      </div>
        <div>
          <input type="radio" name="Autorite" value="Directeur">Directeur
      </div>
        <div>
          <input type="radio" name="Autorite" value="Conseil de Discipline">Conseil de Discipline
      </div>
    </div>
  <button type="submit" class="btn btn-primary form-control mt-1" >Modifier</button>
</form>
@endsection