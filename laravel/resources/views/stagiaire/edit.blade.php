@extends('layouts.app')

@section('content')

<style>
body{
    margin:0;
    background:#ffffff;
    font-family: system-ui, -apple-system, Segoe UI, sans-serif;
}

/* PAGE */
.page-wrap{
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:40px;
}

/* LEFT TEXT */
.left h1{
    font-size:38px;
    font-weight:800;
    color:#0f172a;
}

.left p{
    color:#64748b;
    margin-top:10px;
    max-width:420px;
}

/* FORM CARD */
.form-card{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:18px;
    padding:30px;
    box-shadow:0 12px 30px rgba(0,0,0,0.06);
}

/* INPUTS */
.input{
    width:100%;
    padding:11px 12px;
    margin-bottom:10px;
    border:1px solid #e5e7eb;
    border-radius:12px;
    font-size:14px;
    transition:0.2s;
}

.input:focus{
    outline:none;
    border-color:#3b82f6;
    box-shadow:0 0 0 3px rgba(59,130,246,0.15);
}

/* BUTTON */
.btn-primary{
    width:100%;
    margin-top:15px;
    padding:12px;
    background:#3b82f6;
    color:#fff;
    border:none;
    border-radius:12px;
    font-weight:600;
    transition:0.2s;
}

.btn-primary:hover{
    background:#2563eb;
    transform:translateY(-1px);
}

/* ERROR */
.error-box{
    background:#fee2e2;
    color:#991b1b;
    padding:10px;
    border-radius:12px;
    margin-bottom:15px;
    font-size:13px;
}
</style>

<div class="page-wrap">

    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT -->
            <div class="col-lg-6 mb-4 left">

                <h1>Modifier Stagiaire</h1>


            </div>

            <!-- FORM -->
            <div class="col-lg-6">

                <div class="form-card">

                    <h5 style="font-weight:700;color:#0f172a;margin-bottom:20px;">
                        Formulaire de modification
                    </h5>

                    @if ($errors->any())
                        <div class="error-box">
                            <ul style="margin:0;padding-left:18px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('stagiaire.update',$stagiaire->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <input class="input" type="text" name="Nom"
                               value="{{ $stagiaire->Nom }}"
                               placeholder="Nom">

                        <input class="input" type="text" name="prénom"
                               value="{{ $stagiaire->prénom }}"
                               placeholder="Prénom">

                        <input class="input" type="text" name="Filière"
                               value="{{ $stagiaire->Filière }}"
                               placeholder="Filière">

                        <select class="input" name="Nivaux">
                            <option {{ $stagiaire->Nivaux == 'Débutant' ? 'selected' : '' }}>Débutant</option>
                            <option {{ $stagiaire->Nivaux == 'Intermédiaire' ? 'selected' : '' }}>Intermédiaire</option>
                            <option {{ $stagiaire->Nivaux == 'Avancé' ? 'selected' : '' }}>Avancé</option>
                        </select>

                        <div style="display:flex;gap:10px;">
                            <input class="input" type="date" name="date_debut"
                                   value="{{ $stagiaire->date_debut }}">

                            <input class="input" type="date" name="date_fin"
                                   value="{{ $stagiaire->date_fin }}">
                        </div>

                        <input class="input" type="text" name="group_class"
                               value="{{ $stagiaire->group_class }}"
                               placeholder="Group Class">

                        <button type="submit" class="btn-primary">
                            Update Stagiaire
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection