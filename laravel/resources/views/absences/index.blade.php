@extends('layouts.app')

@section('content')

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

    .header-box h1 {
        font-size: 22px;
        font-weight: 600;
        color: #111827;
    }

    .header-box p {
        margin: 0;
        color: #6b7280;
        font-size: 13px;
    }

    .table thead {
        background: #f9fafb;
    }

    .table tbody tr:hover {
        background: #f3f4f6;
    }

    .badge-soft-warning {
        background: #fef3c7;
        color: #92400e;
        padding: 5px 10px;
        border-radius: 8px;
        font-size: 12px;
    }

    .badge-soft-danger {
        background: #fee2e2;
        color: #b91c1c;
        padding: 5px 10px;
        border-radius: 8px;
        font-size: 12px;
    }

    .badge-soft-success {
        background: #dcfce7;
        color: #166534;
        padding: 5px 10px;
        border-radius: 8px;
        font-size: 12px;
    }

    .btn-soft {
        border-radius: 10px;
        font-size: 13px;
    }

    .btn-edit {
        background: #4f46e5;
        color: white;
    }

    .btn-delete {
        background: #ef4444;
        color: white;
    }

    .form-control, .form-select {
        border-radius: 10px;
        font-size: 14px;
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

{{-- HEADER --}}
<div class="p-4 mb-4 rounded-4 soft-shadow"
     style="
        background: linear-gradient(135deg,#f8fafc,#eef2ff);
        border:1px solid #e5e7eb;
     ">

    <h4 class="fw-bold mb-1" style="color:#111827;">
        Tableau des Absences
    </h4>

</div>

{{-- SEARCH CARD --}}
<div class="card mb-4"
     style="
        border:1px solid #e5e7eb;
        border-radius:18px;
        background:#ffffff;
        box-shadow:0 6px 16px rgba(0,0,0,0.04);
        overflow:hidden;
     ">

    {{-- HEADER --}}
    <div style="
        padding:14px 18px;
        background:#f9fafb;
        border-bottom:1px solid #e5e7eb;
    ">
        <div style="font-weight:600; font-size:15px; color:#111827;">
             Recherche des absences
        </div>
    </div>

    {{-- BODY --}}
    <div style="padding:20px;">

        <form method="GET" action="{{ route('absence.index') }}">

            <div class="row g-3">

                {{-- STAGIAIRE --}}
                <div class="col-md-4">
                    <label style="font-size:12px; color:#6b7280;">Stagiaire</label>
                    <input type="text"
                           name="stagiaire"
                           class="form-control"
                           placeholder="Nom ou Prénom"
                           value="{{ request('stagiaire') }}"
                           style="
                                border-radius:12px;
                                border:1px solid #e5e7eb;
                                padding:10px 12px;
                                font-size:14px;
                           ">
                </div>

                {{-- DATE --}}
                <div class="col-md-4">
                    <label style="font-size:12px; color:#6b7280;">Date</label>
                    <input type="date"
                           name="date"
                           class="form-control"
                           value="{{ request('date') }}"
                           style="
                                border-radius:12px;
                                border:1px solid #e5e7eb;
                                padding:10px 12px;
                                font-size:14px;
                           ">
                </div>

                {{-- TYPE --}}
                <div class="col-md-4">
                    <label style="font-size:12px; color:#6b7280;">Type</label>
                    <select name="type"
                            class="form-control"
                            style="
                                border-radius:12px;
                                border:1px solid #e5e7eb;
                                padding:10px 12px;
                                font-size:14px;
                            ">
                        <option value="">Tous</option>
                        <option value="Absence">Absence</option>
                        <option value="Retard">Retard</option>
                    </select>
                </div>

                {{-- BUTTONS --}}
                <div class="col-12 d-flex justify-content-end gap-2 mt-3">

                <button type="submit" class="animated-button btn-blue">
                    <i class="bi bi-search"></i>
                    <span>Rechercher</span>
                </button>

                    <a href="{{ route('absence.index') }}"
                       class="animated-button btn-orange">
                        <i class="bi bi-arrow-clockwise"></i>
                        <span>Reset</span>
                    </a>

                </div>

            </div>

        </form>

    </div>
</div>
    </div>

    {{-- TABLE --}}
    <div class="card">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    <thead>
                        <tr class="text-muted small">
                            <th>#</th>
                            <th>Stagiaire</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Justifié</th>
                            <th>Modifier</th>
                            <th>supprimer</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($absence as $a)
                        <tr>

                            <td class="text-muted">#{{ $a->id }}</td>

                            <td class="fw-semibold">
                                {{ $a->stagiaire->Nom }} {{ $a->stagiaire->prénom }}
                            </td>

                            <td class="text-muted">{{ $a->date }}</td>

                            <td>
                                @if($a->type == 'Absence')
                                    <span class="badge-soft-warning">{{ $a->type }}</span>
                                @else
                                    <span class="badge-soft-danger">{{ $a->type }}</span>
                                @endif
                            </td>

                            <td>
                                @if($a->justifier)
                                    <span class="badge-soft-success">Oui</span>
                                @else
                                    <span class="badge-soft-danger">Non</span>
                                @endif
                            </td>

                            <td class="d-flex gap-2">

                                <a href="{{ route('absence.edit', $a->id) }}"
                                    class="animated-button btn-green">
                                    <i class="bi bi-pencil"></i>
                                    <span>Edit</span>
                                </a>

                                
                            </td>
                            <td>

                                <form action="{{ route('absense.destroy', $a->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Supprimer ?')">
    
                                    @csrf
                                    @method('DELETE')
    
                                    <button class="animated-button btn-red">
                                        <i class="bi bi-trash"></i>
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

</div>

@endsection