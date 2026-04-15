@extends('layouts.app')

@section('content')

<style>
     /* background: linear-gradient(180deg, #f5f7fb, #eef2f7); */
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

    .badge-soft-blue {
        background: #e0f2fe;
        color: #0369a1;
    }

    .badge-soft-red {
        background: #fee2e2;
        color: #b91c1c;
    }

    .badge-soft-yellow {
        background: #fef3c7;
        color: #92400e;
    }

    .btn-soft-primary {
        background: #6366f1;
        color: white;
        border-radius: 10px;
    }

    .btn-soft-danger {
        background: #ef4444;
        color: white;
        border-radius: 10px;
    }

    .btn-soft {
        border-radius: 10px;
    }
        .input-soft{
        border:1px solid #e5e7eb;
        border-radius:10px;
        padding:10px 12px;
        font-size:14px;
        background:#fff;
        transition:0.2s ease;
        box-shadow:none;
    }

    .input-soft:focus{
        border-color:#6366f1;
        box-shadow:0 0 0 3px rgba(99,102,241,0.12);
        outline:none;
    }

    .label-soft{
        font-size:12px;
        color:#6b7280;
        margin-bottom:4px;
        display:block;
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


.btn-blue {
  color: #3b82f6;
  background: #eff6ff;
  border-color: #dbeafe;
}
.btn-blue::before {
  background: #bfdbfe;
}


.btn-green {
  color: #16a34a;
  background: #f0fdf4;
  border-color: #dcfce7;
}
.btn-green::before {
  background: #bbf7d0;
}


.btn-red {
  color: #dc2626;
  background: #fef2f2;
  border-color: #fee2e2;
}
.btn-red::before {
  background: #fecaca;
}


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

    <div class="p-4 mb-4 rounded-4 soft-shadow"
         style="background: linear-gradient(135deg,#eef2ff,#f8fafc);">

        <h4 class="fw-bold mb-1">Tableau des Stagiaires</h4>

    </div>

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
        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
        ">
            <div style="font-weight:600; font-size:15px; color:#111827;">
                 Recherche des stagiaires
            </div>

        </div>
    </div>

    {{-- BODY --}}
    <div style="padding:20px;">

        <form method="GET" action="{{ route('stagiaire.index') }}">

            <div class="row g-3">

                {{-- NOM --}}
                <div class="col-md-4">
                    <label style="font-size:12px; color:#6b7280;">Nom</label>
                    <input type="text"
                           name="nom"
                           class="form-control"
                           placeholder="Ex: Ahmed"
                           value="{{ request('nom') }}"
                           style="
                                border-radius:12px;
                                border:1px solid #e5e7eb;
                                padding:10px 12px;
                                font-size:14px;
                           ">
                </div>

               
                <div class="col-md-4">
                    <label style="font-size:12px; color:#6b7280;">Filière</label>
                    <input type="text"
                           name="filiere"
                           class="form-control"
                           placeholder="Ex: Informatique"
                           value="{{ request('filiere') }}"
                           style="border-radius:12px;">
                </div>

            
                <div class="col-md-4">
                    <label style="font-size:12px; color:#6b7280;">Groupe</label>
                    <input type="text"
                           name="group_class"
                           class="form-control"
                           placeholder="Ex: G1"
                           value="{{ request('group_class') }}"
                           style="border-radius:12px;">
                </div>

                {{-- BUTTONS --}}
                <div class="col-12 d-flex justify-content-end gap-2 mt-3">

                <button type="submit" class="animated-button btn-blue">
                    <i class="bi bi-search"></i>
                    <span>Rechercher</span>
                </button>

                <a href="{{ route('stagiaire.index') }}" class="animated-button btn-orange">
                    <i class="bi bi-arrow-clockwise"></i>
                    <span>Reset</span>
                </a>

                </div>

            </div>

        </form>

    </div>
</div>

  
    <div class="card soft-shadow">

        <div class="card-header bg-white d-flex justify-content-between">
            <strong>📋 Liste des Stagiaires</strong>
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

                        <td class="text-muted">#{{ $s->id }}</td>
                        <td class="fw-semibold">{{ $s->Nom }}</td>
                        <td>{{ $s->prénom }}</td>

                        <td>
                            <span class="badge badge-soft-blue px-3 py-2">
                                {{ $s->Nivaux }}
                            </span>
                        </td>

                        <td class="text-muted">{{ $s->Filière }}</td>

                        <td>
                            <span class="badge badge-soft-red px-3 py-2">
                                {{ $s->absences->where('type','Absence')->count() }}
                            </span>
                        </td>

                        <td>
                            <span class="badge badge-soft-yellow px-3 py-2">
                                {{ $s->absences->where('type','Retard')->count() }}
                            </span>
                        </td>

                        <td class="text-muted">{{ $s->date_debut }}</td>
                        <td class="text-muted">{{ $s->date_fin }}</td>
                        <td class="text-muted">{{ $s->group_class }}</td>

                        <td class="d-flex gap-2">

                        <a href="{{ route('stagiaire.edit', $s->id) }}" class="animated-button btn-green">
                            <i class="bi bi-pencil"></i>
                            <span>Edit</span>
                        </a>

                            
                        </td>
                        <td>
                            <form action="{{ route('stagiaire.destroy', $s->id) }}"
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

@endsection