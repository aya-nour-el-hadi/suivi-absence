@extends('layouts.app')

@section('content')

<style>
body {
    background: #ffffff;
    font-family: "Segoe UI", sans-serif;
}

/* CARD STYLE */
.card-soft {
    border: 1px solid #e5e7eb;
    border-radius: 18px;
    background: #fff;
    box-shadow: 0 6px 16px rgba(0,0,0,0.04);
    overflow: hidden;
}

/* HEADER */
.card-header-soft {
    background: #f9fafb;
    border-bottom: 1px solid #e5e7eb;
    padding: 14px 18px;
    font-weight: 600;
    color: #111827;
}

/* INPUTS */
.input-soft {
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 10px 12px;
    font-size: 14px;
    transition: 0.2s;
}

.input-soft:focus {
    border-color: #6366f1;
    box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
    outline: none;
}

/* BUTTONS */
.btn-soft-primary {
    background: #6366f1;
    color: #fff;
    border-radius: 12px;
    padding: 10px 18px;
    border: none;
}

.btn-soft-primary:hover {
    background: #4f46e5;
}

.btn-soft-danger {
    background: #ef4444;
    color: #fff;
    border-radius: 12px;
    padding: 10px 14px;
    border: none;
}

/* TABLE */
.table thead {
    background: #f8fafc;
}

.table tbody tr:hover {
    background: #f1f5f9;
}

/* BADGES */
.badge-soft-blue {
    background: #e0f2fe;
    color: #0369a1;
    border-radius: 10px;
    padding: 6px 10px;
}

.badge-soft-red {
    background: #fee2e2;
    color: #b91c1c;
    border-radius: 10px;
    padding: 6px 10px;
}

.badge-soft-yellow {
    background: #fef3c7;
    color: #92400e;
    border-radius: 10px;
    padding: 6px 10px;
}
.animated-button {
  position: relative;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 10px 20px;
  border-radius: 12px;
  font-size: 14px;
  font-weight: 600;
  cursor: pointer;
  overflow: hidden;
  border: 1px solid transparent;
  background: #ffffff;
  transition: 0.3s ease;
}

/* TEXT */
.animated-button span {
  position: relative;
  z-index: 2;
}

/* EFFECT */
.animated-button::before {
  content: "";
  position: absolute;
  width: 0;
  height: 0;
  border-radius: 50%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  transition: 0.4s ease;
  z-index: 1;
}

.animated-button:hover::before {
  width: 180px;
  height: 180px;
}

.animated-button:hover {
  color: #1f2937;
}

/* 🔵 BLUE SOFT */
.btn-blue {
  color: #3b82f6;
  background: #eff6ff;
  border-color: #dbeafe;
}
.btn-blue::before {
  background: #bfdbfe;
}

/* 🟢 GREEN SOFT */
.btn-green {
  color: #16a34a;
  background: #f0fdf4;
  border-color: #dcfce7;
}
.btn-green::before {
  background: #bbf7d0;
}

/* 🔴 RED SOFT */
.btn-red {
  color: #dc2626;
  background: #fef2f2;
  border-color: #fee2e2;
}
.btn-red::before {
  background: #fecaca;
}

/* 🟡 ORANGE SOFT */
.btn-orange {
  color: #ea580c;
  background: #fff7ed;
  border-color: #ffedd5;
}
.btn-orange::before {
  background: #fed7aa;
}
</style>

<div class="container py-4">

    <!-- TITLE -->
    <div class="p-4 mb-4 card-soft">
        <h4 class="fw-bold mb-1"><i data-lucide="alert-triangle"></i>Tableau des Sanctions</h4>
    </div>

    <!-- FILTER -->
    <div class="card-soft mb-4">

        <div class="card-header-soft">
            <i data-lucide="search"></i>
             Recherche des sanctions
        </div>

        <div class="p-3">

            <form method="GET" action="{{ route('sanction.index') }}">

                <div class="row g-3">

                    <!-- STAGIAIRE -->
                    <div class="col-md-4">
                        <input type="text"
                               name="stagiaire"
                               class="form-control input-soft"
                               placeholder="Nom ou prénom"
                               value="{{ request('stagiaire') }}">
                    </div>

                    <!-- TYPE -->
                    <div class="col-md-4">
                        <select name="type_sanction" class="form-control input-soft">
                            <option value="">Tous types</option>
                            <option value="Normal">Normal</option>
                            <option value="1er Mise en garde">1er Mise en garde</option>
                            <option value="2ème Mise en garde">2ème Mise en garde</option>
                            <option value="1er Avertissement">1er Avertissement</option>
                            <option value="2ème Avertissement">2ème Avertissement</option>
                            <option value="Blâme">Blâme</option>
                            <option value="Exclusion 2 jours">Exclusion 2 jours</option>
                            <option value="Exclusion Temporaire">Exclusion Temporaire</option>
                            <option value="Exclusion Définitive">Exclusion Définitive</option>
                        </select>
                    </div>

                    <!-- AUTORITE -->
                    <div class="col-md-4">
                        <select name="autorite" class="form-control input-soft">
                            <option value="">Toutes autorités</option>
                            <option value="SG">SG</option>
                            <option value="CD">CD</option>
                            <option value="D">D</option>
                        </select>
                    </div>

                    <!-- BUTTONS -->
                    <div class="col-12 d-flex justify-content-end gap-2">

                    <button type="submit" class="animated-button btn-blue">
                        <i data-lucide="search"></i>
                        <span>Rechercher</span>
                    </button>

                        <a href="{{ route('sanction.index') }}"
                        class="animated-button btn-orange">
                        <i data-lucide="refresh-ccw"></i>
                        <span>Reset</span>
                    </a>

                    </div>

                </div>

            </form>

        </div>

    </div>

    <!-- TABLE -->
    <div class="card-soft">

        <div class="card-header-soft d-flex justify-content-between">
            <span>Liste des Sanctions</span>
            <span class="text-muted">Total: {{ count($sanctions) }}</span>
        </div>

        <div class="table-responsive">

            <table class="table align-middle mb-0">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Stagiaire</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Motif</th>
                        <th>Points</th>
                        <th>Autorité</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($sanctions as $s)
                    <tr>

                        <td class="text-muted">#{{ $s->id }}</td>

                        <td class="fw-semibold">
                            {{ $s->stagiaire->Nom }} {{ $s->stagiaire->prénom }}
                        </td>

                        <td class="text-muted">{{ $s->date }}</td>

                        <td>
                            <span class="badge badge-soft-blue">
                                {{ $s->type_sanction }}
                            </span>
                        </td>

                        <td class="text-muted">{{ $s->Motif }}</td>

                        <td>
                            <span class="badge badge-soft-red">
                                {{ $s->points_déduire }}
                            </span>
                        </td>

                        <td>
                            <span class="badge badge-soft-yellow">
                                {{ $s->Autorite }}
                            </span>
                        </td>

                        <td class="d-flex gap-2">

                            <a href="{{ route('sanction.edit', $s->id) }}"class="animated-button btn-green">
                                 <i data-lucide="edit-3"></i>
                                <span>Edit</span>
                            </a>
                            </td>
                         <td>
                            <form action="{{ route('sanction.destroy', $s->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Supprimer ?')">

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

@endsection