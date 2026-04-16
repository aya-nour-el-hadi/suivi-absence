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

/* LEFT */
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

/* CARD */
.form-card{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:18px;
    padding:30px;
    box-shadow:0 12px 30px rgba(0,0,0,0.06);
}

/* INPUT */
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

/* LABEL */
label{
    font-size:13px;
    color:#475569;
    margin-bottom:6px;
    display:block;
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

/* RADIO GROUP */
.radio-group{
    display:flex;
    flex-direction:column;
    gap:8px;
    margin-bottom:10px;
    color:#475569;
    font-size:14px;
}

.radio-item{
    display:flex;
    align-items:center;
    gap:8px;
}
</style>

<div class="page-wrap">

    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT -->
            <div class="col-lg-6 mb-4 left">

                <h1>Modifier Sanction</h1>


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
                                @foreach ($errors->all() as $error )
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('sanction.update',$sanction->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <!-- STAGIAIRE -->
                        <select class="input" name="stagiaire_id">
                            @foreach ($stagiaire as $s)
                                <option value="{{ $s->id }}"
                                    {{ $sanction->stagiaire_id == $s->id ? 'selected' : '' }}>
                                    {{ $s->Nom }} {{ $s->prénom }}
                                </option>
                            @endforeach
                        </select>

                        <!-- TYPE SANCTION -->
                        <select class="input" name="type_sanction">
                            @foreach([
                                'Normal',
                                '1er Mise en garde',
                                '2éme Mise en garde',
                                '1er avertissement',
                                '2éme avertissement',
                                'Blâme',
                                'Exclusion de 2 jours',
                                'Exclusion Temporaire',
                                'Exclusion Définitive'
                            ] as $type)
                                <option value="{{ $type }}"
                                    {{ $sanction->type_sanction == $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>

                        <!-- MOTIF -->
                        <input class="input" type="text" name="Motif"
                               value="{{ $sanction->Motif }}"
                               placeholder="Motif">

                        <!-- DATE -->
                        <input class="input" type="date" name="date"
                               value="{{ $sanction->date }}">

                        <!-- POINTS -->
                        <input class="input" type="number" name="points_déduire"
                               value="{{ $sanction->points_déduire }}"
                               placeholder="Points à déduire">

                        <!-- AUTORITE -->
                        <div class="radio-group">

                            <label>Autorité de décision :</label>

                            <div class="radio-item">
                                <input type="radio" name="Autorite" value="SG"
                                    {{ $sanction->Autorite == 'SG' ? 'checked' : '' }}>
                                SG
                            </div>

                            <div class="radio-item">
                                <input type="radio" name="Autorite" value="Directeur"
                                    {{ $sanction->Autorite == 'Directeur' ? 'checked' : '' }}>
                                Directeur
                            </div>

                            <div class="radio-item">
                                <input type="radio" name="Autorite" value="Conseil de Discipline"
                                    {{ $sanction->Autorite == 'Conseil de Discipline' ? 'checked' : '' }}>
                                Conseil de Discipline
                            </div>

                        </div>

                        <button type="submit" class="btn-primary">
                            Update Sanction
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection