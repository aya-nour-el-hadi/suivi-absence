@extends('layouts.app')

@section('content')

<div style="
    min-height:100vh;
    background:#f8fafc;
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
                    Ajouter Absence
                </h1>

                <p style="
                    color:#64748b;
                    margin-top:10px;
                    max-width:420px;
                ">
                    Gérez facilement les absences et retards des stagiaires avec une interface simple et moderne.
                </p>

                <div style="
                    margin-top:20px;
                    color:#64748b;
                    font-size:14px;
                ">
                    <p>✔ Suivi rapide des absences</p>
                    <p>✔ Gestion claire et organisée</p>
                    <p>✔ Interface simple et efficace</p>
                </div>

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

                    <form action="{{ route('absence.store') }}" method="POST">
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

                        <!-- DATE -->
                        <input type="date" name="date"
                            style="width:100%;padding:10px;margin-bottom:10px;border:1px solid #e5e7eb;border-radius:10px;">

                        <!-- TYPE -->
                        <select name="type"
                            style="width:100%;padding:10px;margin-bottom:10px;border:1px solid #e5e7eb;border-radius:10px;">
                            <option>Absence</option>
                            <option>Retard</option>
                        </select>

                        <!-- JUSTIFIE -->
                        <div style="
                            display:flex;
                            align-items:center;
                            gap:10px;
                            margin-top:5px;
                            margin-bottom:10px;
                            color:#475569;
                        ">
                            <input type="hidden" name="justifier" value="0">
                            <input type="checkbox" name="justifier" value="1" style="width:16px;height:16px;">
                            <label>Justifié</label>
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

                            Ajouter
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection