@extends('layouts.app')

@section('content')
<style>
    body{
    margin:0;
    background:#ffffff; 
    font-family: system-ui, -apple-system, Segoe UI, sans-serif;
}
</style>
<div style="
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:40px;
">

    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT SIDE -->
            <div class="col-lg-6 mb-4">

                <h1 style="
                    font-size:36px;
                    font-weight:800;
                    color:#0f172a;
                ">
                    Ajouter Sanction
                </h1>

         

            </div>

            <!-- FORM -->
            <div class="col-lg-6">

                <div style="
                    background:#ffffff;
                    border:1px solid #e5e7eb;
                    border-radius:16px;
                    padding:30px;
                    box-shadow:0 10px 25px rgba(0,0,0,0.05);
                ">

                    <h5 style="
                        font-weight:700;
                        color:#0f172a;
                        margin-bottom:20px;
                    ">
                        Formulaire
                    </h5>

                    @if ($errors->any())
                        <div style="
                            background:#fee2e2;
                            color:#991b1b;
                            padding:10px;
                            border-radius:10px;
                            margin-bottom:15px;
                            font-size:13px;
                        ">
                            <ul style="margin:0;padding-left:18px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('sanctions.store') }}" method="post">
                        @csrf

                        <!-- STAGIAIRE -->
                        <select name="stagiaire_id"
                            style="width:100%;padding:10px;margin-bottom:10px;border:1px solid #e5e7eb;border-radius:10px;">
                            @foreach ($stagiaire as $s)
                                <option value="{{ $s->id }}">
                                    {{ $s->Nom }} {{ $s->prénom }}
                                </option>
                            @endforeach
                        </select>

                        <!-- TYPE -->
                        <select name="type_sanction"
                            style="width:100%;padding:10px;margin-bottom:10px;border:1px solid #e5e7eb;border-radius:10px;">
                            <option>Normal</option>
                            <option>1er Mise en garde</option>
                            <option>2ème Mise en garde</option>
                            <option>1er avertissement</option>
                            <option>2ème avertissement</option>
                            <option>Blâme</option>
                            <option>Exclusion de 2 jours</option>
                            <option>Exclusion Temporaire</option>
                            <option>Exclusion Définitive</option>
                        </select>

                        <!-- MOTIF -->
                        <input type="text" name="Motif" placeholder="Motif"
                            style="width:100%;padding:10px;margin-bottom:10px;border:1px solid #e5e7eb;border-radius:10px;">

                        <!-- DATE -->
                        <input type="date" name="date"
                            style="width:100%;padding:10px;margin-bottom:10px;border:1px solid #e5e7eb;border-radius:10px;">

                        <!-- POINTS -->
                        <input type="number" name="points_déduire" placeholder="Points à déduire"
                            style="width:100%;padding:10px;margin-bottom:10px;border:1px solid #e5e7eb;border-radius:10px;">

                        <!-- AUTORITE -->
                        <div style="
                            display:flex;
                            flex-direction:column;
                            gap:6px;
                            margin-bottom:10px;
                            color:#475569;
                            font-size:14px;
                        ">
                            <label><input type="radio" name="Autorite" value="SG"> SG</label>
                            <label><input type="radio" name="Autorite" value="Directeur"> Directeur</label>
                            <label><input type="radio" name="Autorite" value="Conseil de Discipline"> Conseil de Discipline</label>
                        </div>

                        <!-- BUTTON -->
                        <button type="submit"
                            style="
                                width:100%;
                                margin-top:10px;
                                padding:12px;
                                background:#3b82f6;
                                color:#fff;
                                border:none;
                                border-radius:10px;
                                font-weight:600;
                                transition:0.2s;
                            "
                            onmouseover="this.style.background='#2563eb'"
                            onmouseout="this.style.background='#3b82f6'">

                            Ajouter Sanction
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection