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
                    Ajouter Stagiaire
                </h1>

                <p style="
                    color:#64748b;
                    margin-top:10px;
                    max-width:420px;
                ">
                    Gérez vos stagiaires avec une interface simple, rapide et moderne.
                </p>

                <div style="
                    margin-top:20px;
                    color:#64748b;
                    font-size:14px;
                ">
                    <p>✔ Interface claire et moderne</p>
                    <p>✔ Gestion facile des données</p>
                    <p>✔ Expérience utilisateur fluide</p>
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

                    <form action="{{ route('stagiaire.store') }}" method="post">
                        @csrf

                        <input type="text" name="Nom" placeholder="Nom"
                            style="width:100%;padding:10px;margin-bottom:10px;border:1px solid #e5e7eb;border-radius:10px;">

                        <input type="text" name="prénom" placeholder="Prénom"
                            style="width:100%;padding:10px;margin-bottom:10px;border:1px solid #e5e7eb;border-radius:10px;">

                        <input type="text" name="Filière" placeholder="Filière"
                            style="width:100%;padding:10px;margin-bottom:10px;border:1px solid #e5e7eb;border-radius:10px;">

                        <select name="Nivaux"
                            style="width:100%;padding:10px;margin-bottom:10px;border:1px solid #e5e7eb;border-radius:10px;">
                            <option>Débutant</option>
                            <option>Intermédiaire</option>
                            <option>Avancé</option>
                        </select>

                        <div style="display:flex;gap:10px;">
                            <input type="date" name="date_debut"
                                style="flex:1;padding:10px;border:1px solid #e5e7eb;border-radius:10px;">
                            <input type="date" name="date_fin"
                                style="flex:1;padding:10px;border:1px solid #e5e7eb;border-radius:10px;">
                        </div>

                        <input type="text" name="group_class" placeholder="Group Class"
                            style="width:100%;padding:10px;margin-top:10px;border:1px solid #e5e7eb;border-radius:10px;">

                        <button type="submit"
                            style="
                                width:100%;
                                margin-top:15px;
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