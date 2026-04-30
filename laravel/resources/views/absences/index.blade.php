@extends('layouts.app')

@section('content')

<script src="https://unpkg.com/lucide@latest"></script>

<style>
body {
    background: #ffffff;
    font-family: "Segoe UI", sans-serif;
}

.card {
    border: none;
    border-radius: 14px;
    box-shadow: 0 3px 12px rgba(0,0,0,0.05);
}

.header-box {
    background: #ffffff;
    border-radius: 14px;
    padding: 18px;
    border: 1px solid #e5e7eb;
}

.table thead {
    background: #f9fafb;
}

.table tbody tr:hover {
    background: #f3f4f6;
}

/* BUTTONS same */
.animated-button {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 10px 20px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 600;
    border: 1px solid transparent;
}

/* COLORS */
.btn-blue { color:#3b82f6; background:#eff6ff; border-color:#dbeafe; }
.btn-orange { color:#ea580c; background:#fff7ed; border-color:#ffedd5; }
.btn-green { color:#16a34a; background:#f0fdf4; border-color:#dcfce7; }
.btn-red { color:#dc2626; background:#fef2f2; border-color:#fee2e2; }

</style>

<div class="container py-4">

{{-- HEADER --}}
<div class="p-4 mb-4 rounded-4 soft-shadow"
     style="background: linear-gradient(135deg,#f8fafc,#eef2ff);">

    <h4 class="fw-bold mb-1">
        <i data-lucide="calendar-check"></i>
        Tableau des Absences
    </h4>

</div>

{{-- SEARCH --}}
<div class="card mb-4">

    <div style="padding:14px 18px;background:#f9fafb;border-bottom:1px solid #e5e7eb;">
        <div>
            <i data-lucide="search"></i>
            Recherche des absences
        </div>
    </div>

    <div style="padding:20px;">

        <form method="GET" action="{{ route('absences.index') }}">

            <div class="row g-3">

                <div class="col-md-4">
                    Stagiaire</label>
                    <input type="text" name="stagiaire" class="form-control">
                </div>

                <div class="col-md-4">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control">
                </div>

                <div class="col-md-4">
                    <label></i> Type</label>
                    <select name="type" class="form-control">
                        <option value="">Tous</option>
                        <option value="Absence">Absence</option>
                        <option value="Retard">Retard</option>
                    </select>
                </div>

                <div class="col-12 d-flex justify-content-end gap-2 mt-3">

                    <button type="submit" class="animated-button btn-blue">
                        <i data-lucide="search"></i>
                        <span>Rechercher</span>
                    </button>

                    <a href="{{ route('absences.index') }}" class="animated-button btn-orange">
                        <i data-lucide="refresh-ccw"></i>
                        <span>Reset</span>
                    </a>

                </div>

            </div>

        </form>

    </div>
</div>

{{-- TABLE --}}
<div class="card soft-shadow">

    <div class="card-header bg-white d-flex justify-content-between">
        <strong>
            <i data-lucide="list"></i>
            Liste des Absences
        </strong>
        <span>Total: {{ count($absence) }}</span>
    </div>

    <div class="table-responsive">

        <table class="table align-middle mb-0">

            <thead>
                <tr class="text-muted small">
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Justifié</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>

            <tbody>

            @foreach ($absence as $a)
            <tr>

                <td>#{{ $a->id }}</td>

                <td>{{ $a->stagiaire->Nom }}</td>
                <td>{{ $a->stagiaire->prénom }}</td>

                <td>{{ $a->date }}</td>

                <td>
                    @if($a->type == 'Absence')
                        <span class="badge-soft-warning">
                            <i data-lucide="x-circle"></i> {{ $a->type }}
                        </span>
                    @else
                        <span class="badge-soft-danger">
                            <i data-lucide="clock"></i> {{ $a->type }}
                        </span>
                    @endif
                </td>

                <td>
                    @if($a->justifier)
                        <span class="badge-soft-success">
                            <i data-lucide="check-circle"></i> Oui
                        </span>
                    @else
                        <span class="badge-soft-danger">
                            <i data-lucide="x-circle"></i> Non
                        </span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('absences.edit', $a->id) }}"
                       class="animated-button btn-green">
                        <i data-lucide="edit-3"></i>
                        <span>Edit</span>
                    </a>
                </td>

                <td>
                    <form action="{{ route('absences.destroy', $a->id) }}" method="POST" onsubmit="return confirm('supprimer ?')">
                        @csrf
                        @method('DELETE')

                        <button class="animated-button btn-red">
                            <i data-lucide="trash-2"></i>
                            <span>Delete</span>
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

<script>
    lucide.createIcons();
</script>

@endsection