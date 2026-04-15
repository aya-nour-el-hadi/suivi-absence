@extends('layouts.app')

@section('content')

<style>
body{
       background: #ffffff;
    font-family: "Segoe UI", sans-serif;
}

/* CARD */
.card-soft{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:18px;
    box-shadow:0 6px 16px rgba(0,0,0,0.04);
    overflow:hidden;
}

/* HEADER */
.card-header-soft{
    background:#f9fafb;
    border-bottom:1px solid #e5e7eb;
    padding:14px 18px;
    font-weight:600;
    color:#111827;
}

/* BADGES */
.badge-soft-blue{
    background:#e0f2fe;
    color:#0369a1;
    border-radius:10px;
    padding:6px 10px;
}

.badge-soft-red{
    background:#fee2e2;
    color:#b91c1c;
    border-radius:10px;
    padding:6px 10px;
}

.badge-soft-yellow{
    background:#fef3c7;
    color:#92400e;
    border-radius:10px;
    padding:6px 10px;
}

.badge-soft-green{
    background:#dcfce7;
    color:#166534;
    border-radius:10px;
    padding:6px 10px;
}

/* TABLE */
.table thead{
    background:#f8fafc;
}

.table tbody tr:hover{
    background:#f1f5f9;
    transition:0.2s;
}

/* FORM SELECT */
.form-select-sm{
    border-radius:10px;
    border:1px solid #e5e7eb;
}

/* BUTTON */
.btn-soft-primary{
    background:#6366f1;
    color:#fff;
    border-radius:10px;
    padding:6px 12px;
    border:none;
    font-size:13px;
}

.btn-soft-primary:hover{
    background:#4f46e5;
}
</style>

<div class="container py-4">

    <!-- TITLE -->
    <div class="p-4 mb-4 card-soft">
        <h4 class="fw-bold mb-1"> Tableau CEF</h4>
   
    </div>

    <!-- TABLE CARD -->
    <div class="card-soft">

        <div class="card-header-soft d-flex justify-content-between">
            <span> Liste des CEF</span>
            <span class="text-muted">Total: {{ count($cef) }}</span>
        </div>

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Absences</th>
                        <th>Retards</th>
                        <th>Sanction</th>
                        <th>Évaluation</th>
                        <th>Signature</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($cef as $s)
                    <tr>

                        <td class="text-muted">#{{ $s->id }}</td>

                        <td class="fw-semibold">{{ $s->stagiaire->Nom }}</td>
                        <td>{{ $s->stagiaire->prénom }}</td>

                        <td>
                            <span class="badge-soft-red">
                                {{ $s->stagiaire->absences->where('type','Absence')->count() }}
                            </span>
                        </td>

                        <td>
                            <span class="badge-soft-yellow">
                                {{ $s->stagiaire->absences->where('type','Retard')->count() }}
                            </span>
                        </td>

                        <td class="text-muted">
                            {{ $s->sanction }}
                        </td>

                        <td>
                            @if($s->evaluation_final == 'Très bien')
                                <span class="badge-soft-green">Très bien</span>
                            @elseif($s->evaluation_final == 'Bien')
                                <span class="badge-soft-blue">Bien</span>
                            @else
                                <span class="badge-soft-yellow">Intermédiaire</span>
                            @endif
                        </td>

                        <td>
                            @if($s->signature == 'Oui')
                                <span class="badge-soft-green">Oui</span>
                            @else
                                <span class="badge-soft-red">Non</span>
                            @endif
                        </td>

                        <td>
                            <form action="{{ route('CEF.update',$s->id) }}" method="POST" class="d-flex gap-2">
                                @csrf
                                @method('PUT')

                                <select name="evaluation_final" class="form-select form-select-sm">
                                    <option value="Très bien">Très bien</option>
                                    <option value="Bien">Bien</option>
                                    <option value="Intermédiaire">Intermédiaire</option>
                                </select>

                                <select name="signature" class="form-select form-select-sm">
                                    <option value="Oui">Oui</option>
                                    <option value="Non">Non</option>
                                </select>

                                <button class="btn-soft-primary">
                                    Save
                                </button>

                            </form>
                        </td>

                    </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection