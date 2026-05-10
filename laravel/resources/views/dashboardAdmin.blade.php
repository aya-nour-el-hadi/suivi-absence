@extends('layouts.app')

@section('content')

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>

<style>
body {
    font-family: Inter, sans-serif;
    background: #faf8ff;
}

.material-symbols-outlined {
    font-variation-settings: 'FILL' 1, 'wght' 500;
}
</style>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4 mb-6">

    <div class="flex items-center justify-between">

        <!-- LEFT -->
        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-200 flex items-center justify-center">
                <img src="https://ui-avatars.com/api/?name=Admin&background=2563eb&color=fff"
                     class="w-full h-full object-cover" alt="admin">
            </div>

            <div>
                <h1 class="text-lg font-bold text-gray-800">Admin Dashboard</h1>
                <p class="text-xs text-gray-500">Gestion des stagiaires</p>
            </div>

        </div>

        <!-- RIGHT -->
        <span class="material-symbols-outlined text-gray-600">
            notifications
        </span>

    </div>

</div>

<!-- CONTENT -->
<main class="pt-6 pb-32 px-6 max-w-7xl mx-auto">

<!-- STATS (Bento / modern cards like your template) -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

    <!-- Stagiaires -->
    <div class="bg-white rounded-2xl p-5 shadow border border-gray-100">
        <div class="flex justify-between items-center">
            <p class="text-gray-500 text-sm">Stagiaires</p>
            <span class="material-symbols-outlined text-blue-600">group</span>
        </div>
        <p class="text-3xl font-bold mt-3 text-gray-800">{{ $totalStagiaires }}</p>
        <div class="h-1 bg-gray-100 rounded mt-3">
            <div class="h-1 bg-blue-500 rounded w-3/4"></div>
        </div>
    </div>

    <!-- Absences -->
    <div class="bg-white rounded-2xl p-5 shadow border border-gray-100">
        <div class="flex justify-between items-center">
            <p class="text-gray-500 text-sm">Absences</p>
            <span class="material-symbols-outlined text-red-500">event_busy</span>
        </div>
        <p class="text-3xl font-bold mt-3 text-red-500">{{ $totalAbsences }}</p>
        <div class="h-1 bg-red-100 rounded mt-3">
            <div class="h-1 bg-red-500 rounded w-1/2"></div>
        </div>
    </div>

    <!-- Retards -->
    <div class="bg-white rounded-2xl p-5 shadow border border-gray-100">
        <div class="flex justify-between items-center">
            <p class="text-gray-500 text-sm">Retards</p>
            <span class="material-symbols-outlined text-yellow-500">schedule</span>
        </div>
        <p class="text-3xl font-bold mt-3 text-yellow-500">{{ $totalRetards }}</p>
        <div class="h-1 bg-yellow-100 rounded mt-3">
            <div class="h-1 bg-yellow-500 rounded w-1/3"></div>
        </div>
    </div>

    <!-- Sanctions -->
    <div class="bg-white rounded-2xl p-5 shadow border border-gray-100">
        <div class="flex justify-between items-center">
            <p class="text-gray-500 text-sm">Sanctions</p>
            <span class="material-symbols-outlined text-purple-600">gavel</span>
        </div>
        <p class="text-3xl font-bold mt-3 text-gray-800">{{ $totalSanctions }}</p>
        <div class="h-1 bg-gray-100 rounded mt-3">
            <div class="h-1 bg-purple-500 rounded w-1/4"></div>
        </div>
    </div>

</div>

    <!-- CONTENT SECTION -->
     <!-- DERNIERES ABSENCES (PRO) -->
    <div class="mt-10">

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-bold text-gray-800">Dernières Absences</h2>
            <a href="{{ route('absences.index') }}" class="text-blue-600 text-sm hover:underline">
                Voir tout
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

             <div class="bg-white rounded-2xl shadow overflow-hidden">

            @forelse($lastAbsences as $absence)

                <div class="flex items-center gap-4 p-4 border-b last:border-b-0">

@php
$photos = [
    "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face",
    "https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop&crop=face",
    "https://images.unsplash.com/photo-1544723795-3fb6469f5b39?w=100&h=100&fit=crop&crop=face",
    "https://images.unsplash.com/photo-1511367461989-f85a21fda167?w=100&h=100&fit=crop&crop=face",
    "https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=100&h=100&fit=crop&crop=face",
];
@endphp

<div class="w-10 h-10 rounded-full overflow-hidden bg-gray-200">
    <img 
        src="{{ $photos[$absence->id % count($photos)] }}"
        class="w-full h-full object-cover"
        alt="person"
    >
</div>

                    <!-- INFO -->
                    <div class="flex-1">
                        <p class="font-semibold text-gray-800">
                            {{"Stagiaire # ".$absence->stagiaire->Nom }}  {{ $absence->stagiaire->prénom }}
                        </p>

                        <p class="text-sm text-gray-500">
                            {{ $absence->created_at->format('d M Y - H:i') }}
                        </p>
                    </div>

                    <!-- BADGE -->
                    @if(strtolower($absence->type) == 'absence')
                        <span class="text-xs px-3 py-1 rounded-full bg-red-100 text-red-600 font-semibold">
                            ABSENCE
                        </span>
                    @elseif(strtolower($absence->type) == 'retard')
                        <span class="text-xs px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 font-semibold">
                            RETARD
                        </span>
                    @else
                        <span class="text-xs px-3 py-1 rounded-full bg-gray-100 text-gray-600 font-semibold">
                            {{ $absence->type }}
                        </span>
                    @endif

                </div>

            @empty

                <div class="p-6 text-center text-gray-500">
                    Aucune absence trouvée
                </div>

            @endforelse

        </div>
    </div>

<br><br>
        <div class="bg-gradient-to-br from-blue-600 to-indigo-600 text-white rounded-2xl p-6 shadow">
            <h3 class="font-bold text-lg">Résumé</h3>
            <p class="text-sm opacity-80 mt-2">
                Suivi en temps réel des stagiaires et absences.
            </p>
        </div>



</main>

<!-- 🔥 BOTTOM NAV (خاص بهاد الصفحة فقط) -->
<nav class="fixed bottom-0 left-0 w-full z-50 bg-white/80 backdrop-blur border-t shadow-lg">

    <div class="max-w-4xl mx-auto flex justify-between items-center px-6 py-3">

        <a href="#" class="flex flex-col items-center text-blue-600">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-xs font-semibold">Dashboard</span>
        </a>

        <a href="{{ route('stagiaires.index') }}" class="flex flex-col items-center text-gray-500">
            <span class="material-symbols-outlined">group</span>
            <span class="text-xs">Stagiaires</span>
        </a>

        <a href="{{ route('absences.index') }}" class="flex flex-col items-center text-gray-500">
            <span class="material-symbols-outlined">event_busy</span>
            <span class="text-xs">Absences</span>
        </a>

 

        <a href="{{ route('dashboard') }}" class="flex flex-col items-center text-gray-500 hover:text-blue-600 transition">

            <span class="relative">
                <span class="material-symbols-outlined">person</span>

                <!-- badge (optional) -->
                <span class="absolute -top-1 -right-2 w-2 h-2 bg-blue-500 rounded-full"></span>
            </span>

            <span class="text-xs">Profil</span>
        </a>

    </div>

</nav>

@endsection