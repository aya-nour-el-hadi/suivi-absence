@extends('layouts.app')

@section('content')

<script src="https://unpkg.com/lucide@latest"></script>

<style>
body {
    background: #ffffff;
    font-family: "Segoe UI", sans-serif;
    min-height: 100vh;
}

.card {
    border: none;
    border-radius: 16px;
}

.soft-shadow {
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

.table thead {
    background: #f8fafc;
}

.table tbody tr:hover {
    background: #f1f5f9;
    transition: 0.2s;
}

.badge-soft-blue { background: #e0f2fe; color: #0369a1; }
.badge-soft-red { background: #fee2e2; color: #b91c1c; }
.badge-soft-yellow { background: #fef3c7; color: #92400e; }

.btn-blue { color: #3b82f6; background: #eff6ff; border-color: #dbeafe; }
.btn-orange { color: #ea580c; background: #fff7ed; border-color: #ffedd5; }
.btn-green { color: #16a34a; background: #f0fdf4; border-color: #dcfce7; }
.btn-red { color: #dc2626; background: #fef2f2; border-color: #fee2e2; }

.animated-button {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 10px 18px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 600;
    border: 1px solid transparent;
}
</style>

<div class="container py-4">

    {{-- HEADER --}}
    <div class="p-4 mb-4 rounded-4 soft-shadow"
         style="background: linear-gradient(135deg,#eef2ff,#f8fafc);">

        <h4 class="fw-bold mb-1 d-flex align-items-center gap-2">
            <i data-lucide="users"></i>
            Tableau des Stagiaires
        </h4>

    </div>

    {{-- SEARCH --}}
    <div class="card mb-4 soft-shadow">

        <div style="padding:14px 18px;background:#f9fafb;border-bottom:1px solid #e5e7eb;">
            <strong class="d-flex align-items-center gap-2">
                <i data-lucide="search"></i>
                Recherche des stagiaires
            </strong>
        </div>

        <div style="padding:20px;">
            <form method="GET" action="{{ route('stagiaires.index') }}">
                <div class="row g-3">

                    <div class="col-md-4">
                        <label>Nom</label>
                        <input type="text" name="nom" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label>Filière</label>
                        <input type="text" name="filiere" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label>Groupe</label>
                        <input type="text" name="group_class" class="form-control">
                    </div>

                    <div class="col-12 d-flex justify-content-end gap-2 mt-3">

                        <button class="animated-button btn-blue">
                            <i data-lucide="search"></i>
                            <span>Rechercher</span>
                        </button>

                        <a href="{{ route('stagiaires.index') }}" class="animated-button btn-orange">
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
            <strong class="d-flex align-items-center gap-2">
                <i data-lucide="list"></i>
                Liste des Stagiaires
            </strong>
            <span class="text-muted">Total: {{ count($stagiaire) }}</span>
        </div>

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead>
                    <tr class="text-muted small">
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Niveau</th>
                        <th>Filière</th>
                        <th>Abs</th>
                        <th>Ret</th>
                        <th>Début</th>
                        <th>Fin</th>
                        <th>Group</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>

                <tbody>

                @foreach ($stagiaire as $s)
                <tr>

                    <td>#{{ $s->id }}</td>
                    <td class="fw-semibold">{{ $s->Nom }}</td>
                    <td>{{ $s->prénom }}</td>

                    <td>
                        <span class="badge-soft-blue">
                            {{ $s->Nivaux }}
                        </span>
                    </td>

                    <td>{{ $s->Filière }}</td>

                    <td>
                        <span class="badge-soft-red">
                            {{ $s->absences->where('type','Absence')->count() }}
                        </span>
                    </td>

                    <td>
                        <span class="badge-soft-yellow">
                            {{ $s->absences->where('type','Retard')->count() }}
                        </span>
                    </td>

                    <td>{{ $s->date_debut }}</td>
                    <td>{{ $s->date_fin }}</td>
                    <td>{{ $s->group_class }}</td>

                    <td>
                        <a href="{{ route('stagiaires.edit', $s->id) }}"
                           class="animated-button btn-green">
                            <i data-lucide="edit-3"></i>
                            <span>Edit</span>
                        </a>
                    </td>

                    <td>
                        <form action="{{ route('stagiaires.destroy', $s->id) }}" method="POST" onsubmit="return confirm('supprimer ?')">
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