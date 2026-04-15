@extends('layouts.app')
@section('content')
  <h1>Modifier Absence</h1>
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

<form action="{{ route('absence.update',$absence->id) }}" method="post">
  @csrf
  @method('PUT')

    <div class="form-group">
    <label>CIN_Stagiaire</label>
    <input type="number" name="stagiaire_id" class="form-control" placeholder="CIN...">
  </div>

  <div class="form-group">
    <label>date</label>
    <input type="date" name="date" class="form-control" placeholder="date...">
  </div>

  <div class="form-group">
    <label>type</label>
    <select name="type" class="form-control">
        <option>Absence</option>
        <option>Retard</option>
    </select>
  </div>
    
    <div class="form-group">
      <label>justifier</label>
      <input type="hidden" name="justifier" value="0">
     <input type="checkbox" name="justifier" value="1">
    </div>
  <button type="submit" class="btn btn-primary form-control mt-1" >Modifier</button>
</form>
@endsection