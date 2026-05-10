@extends('layouts.app')

@section('content')

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>

<style>
body{
    font-family: 'Inter', sans-serif;
    background:
    radial-gradient(circle at top left,#dbeafe 0%,transparent 30%),
    radial-gradient(circle at bottom right,#bfdbfe 0%,transparent 25%),
    #f4f8ff;
}

.material-symbols-outlined{
    font-variation-settings:'FILL' 1,'wght' 500;
}

.profile-card{
    background:rgba(255,255,255,0.78);
    backdrop-filter:blur(22px);
    border:1px solid rgba(255,255,255,0.7);

    box-shadow:
    0 20px 60px rgba(37,99,235,0.10),
    0 10px 25px rgba(0,0,0,0.04);
}

.soft-card{
    background:white;
    box-shadow:
    0 10px 30px rgba(37,99,235,0.06),
    0 4px 10px rgba(0,0,0,0.03);
}

.glow{
    position:absolute;
    width:280px;
    height:280px;
    border-radius:999px;
    filter:blur(80px);
    opacity:.25;
}

.glow1{
    background:#60a5fa;
    top:-80px;
    right:-80px;
}

.glow2{
    background:#93c5fd;
    bottom:-100px;
    left:-100px;
}
</style>

<main class="min-h-screen px-6 py-12">

    <div class="max-w-6xl mx-auto">

        <!-- HERO -->
        <div class="relative overflow-hidden rounded-[40px] profile-card p-10 md:p-14">

            <div class="glow glow1"></div>
            <div class="glow glow2"></div>

            <div class="relative z-10">

                <div class="flex flex-col lg:flex-row items-center gap-10">

                    <!-- LEFT -->
                    <div class="flex flex-col md:flex-row items-center gap-7">

                        <!-- IMAGE -->
                        <div class="relative">

                            <div class="absolute inset-0 rounded-full bg-blue-400 blur-2xl opacity-30 scale-110"></div>

                            <img
                                src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=500&auto=format&fit=crop"
                                alt="profile"
                                class="relative w-36 h-36 rounded-full object-cover border-[6px] border-white shadow-2xl"
                            >

                            <div class="absolute bottom-3 right-3 w-7 h-7 bg-green-400 border-4 border-white rounded-full"></div>

                        </div>

                        <!-- TEXT -->
                        <div class="text-center md:text-left">

                            <p class="uppercase tracking-[5px] text-blue-500 text-xs font-bold mb-3">
                                Administrator Profile
                            </p>

                            <h1 class="text-5xl md:text-6xl font-extrabold text-gray-800 leading-tight">
                                {{ auth()->user()->name }}
                            </h1>

                            <div class="flex items-center gap-2 justify-center md:justify-start mt-5 text-gray-500">

                                <span class="material-symbols-outlined text-[20px] text-blue-500">
                                    mail
                                </span>

                                <span class="text-sm md:text-base font-medium">
                                    {{ auth()->user()->email }}
                                </span>

                            </div>

                            <div class="flex items-center gap-3 mt-6 justify-center md:justify-start">

                                <div class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 text-sm font-semibold">
                                    Active Account
                                </div>

                                <div class="px-4 py-2 rounded-full bg-indigo-100 text-indigo-700 text-sm font-semibold">
                                    Premium Admin
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- RIGHT -->
                    <div class="lg:ml-auto">

                        <div class="flex flex-col sm:flex-row gap-3">

                            <!-- Dashboard Button -->
                            <a href="{{ route('user.shows') }}"
                               class="flex items-center justify-center gap-2 bg-white text-blue-700 px-7 py-4 rounded-2xl font-bold shadow-xl hover:scale-105 transition duration-300">

                                <span class="material-symbols-outlined text-[20px]">
                                    dashboard
                                </span>

                                Voir New Profile
                            </a>

                            <!-- Logout -->
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf

                                <button
                                    class="group relative overflow-hidden bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-8 py-4 rounded-2xl font-bold shadow-xl hover:scale-105 transition duration-300"
                                >

                                    <span class="relative z-10 flex items-center gap-2">

                                        <span class="material-symbols-outlined text-[20px]">
                                            logout
                                        </span>

                                        Logout

                                    </span>

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

                <!-- STATS -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">

                    <!-- CARD -->
                    <div class="soft-card rounded-[28px] p-7 border border-blue-100 hover:-translate-y-1 transition duration-300">

                        <div class="flex items-center justify-between mb-5">

                            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                                <span class="material-symbols-outlined text-blue-600 text-3xl">
                                    verified
                                </span>

                            </div>

                            <span class="text-green-500 text-sm font-bold">
                                ONLINE
                            </span>

                        </div>

                        <p class="text-gray-500 text-sm">
                            Account Status
                        </p>

                        <h3 class="text-3xl font-extrabold text-gray-800 mt-2">
                            Active
                        </h3>

                    </div>

                    <!-- CARD -->
                    <div class="soft-card rounded-[28px] p-7 border border-blue-100 hover:-translate-y-1 transition duration-300">

                        <div class="w-14 h-14 rounded-2xl bg-indigo-100 flex items-center justify-center mb-5">

                            <span class="material-symbols-outlined text-indigo-600 text-3xl">
                                admin_panel_settings
                            </span>

                        </div>

                        <p class="text-gray-500 text-sm">
                            Role Access
                        </p>

                        <h3 class="text-3xl font-extrabold text-gray-800 mt-2">
                            Admin
                        </h3>

                    </div>

                    <!-- CARD -->
                    <div class="soft-card rounded-[28px] p-7 border border-blue-100 hover:-translate-y-1 transition duration-300">

                        <div class="w-14 h-14 rounded-2xl bg-cyan-100 flex items-center justify-center mb-5">

                            <span class="material-symbols-outlined text-cyan-600 text-3xl">
                                shield
                            </span>

                        </div>

                        <p class="text-gray-500 text-sm">
                            Security
                        </p>

                        <h3 class="text-3xl font-extrabold text-gray-800 mt-2">
                            Protected
                        </h3>

                    </div>

                </div>

            </div>

        </div>

        <!-- DETAILS -->
        <div class="grid md:grid-cols-2 gap-7 mt-8">

            <!-- LEFT -->
            <div class="soft-card rounded-[32px] p-8 border border-blue-100">

                <div class="flex items-center gap-3 mb-8">

                    <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center">

                        <span class="material-symbols-outlined text-blue-600 text-3xl">
                            person
                        </span>

                    </div>

                    <div>

                        <h2 class="text-2xl font-bold text-gray-800">
                            Personal Info
                        </h2>

                        <p class="text-gray-500 text-sm">
                            Your account details
                        </p>

                    </div>

                </div>

                <div class="space-y-6">

                    <div class="bg-blue-50 rounded-2xl p-5">

                        <p class="text-blue-500 text-sm font-semibold mb-1">
                            FULL NAME
                        </p>

                        <h3 class="text-xl font-bold text-gray-800">
                            {{ auth()->user()->name }}
                        </h3>

                    </div>

                    <div class="bg-blue-50 rounded-2xl p-5">

                        <p class="text-blue-500 text-sm font-semibold mb-1">
                            EMAIL ADDRESS
                        </p>

                        <h3 class="text-lg font-bold text-gray-800 break-all">
                            {{ auth()->user()->email }}
                        </h3>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="relative overflow-hidden rounded-[32px] bg-gradient-to-br from-blue-600 via-indigo-600 to-cyan-500 p-8 text-white shadow-2xl">

                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>

                <div class="relative z-10">

                    <p class="uppercase tracking-[4px] text-sm text-blue-100 font-semibold">
                        System Access
                    </p>

                    <h2 class="text-4xl font-extrabold mt-4 leading-tight">
                        Professional Dashboard Experience
                    </h2>

                    <p class="text-blue-100 mt-5 leading-7">
                        Securely manage stagiaires, absences, reports and institutional data through a premium modern interface.
                    </p>

                    <div class="mt-10 space-y-4">

                        <div class="flex items-center gap-4 bg-white/10 rounded-2xl p-4 backdrop-blur">

                            <span class="material-symbols-outlined text-green-300">
                                check_circle
                            </span>

                            <span class="font-medium">
                                Secure authentication
                            </span>

                        </div>

                        <div class="flex items-center gap-4 bg-white/10 rounded-2xl p-4 backdrop-blur">

                            <span class="material-symbols-outlined text-cyan-300">
                                monitoring
                            </span>

                            <span class="font-medium">
                                Real-time dashboard analytics
                            </span>

                        </div>

                        <div class="flex items-center gap-4 bg-white/10 rounded-2xl p-4 backdrop-blur">

                            <span class="material-symbols-outlined text-yellow-300">
                                verified_user
                            </span>

                            <span class="font-medium">
                                Protected administrator access
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

@endsection