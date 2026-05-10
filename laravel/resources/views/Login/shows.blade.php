@extends('layouts.app')

@section('content')

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>

<style>
body{
    font-family: 'Inter', sans-serif;
    background:#f5f9ff;
}

.material-symbols-outlined{
    font-variation-settings:'FILL' 1,'wght' 500;
}
</style>

<main class="max-w-5xl mx-auto px-6 py-10">

    <!-- PROFILE HERO -->
    <div class="relative overflow-hidden rounded-[32px] bg-gradient-to-br from-blue-500 via-sky-500 to-indigo-500 p-[1px] shadow-xl">

        <div class="bg-white/90 backdrop-blur rounded-[32px] p-8 md:p-10">

            <!-- TOP -->
            <div class="flex flex-col md:flex-row md:items-center gap-8">

                <!-- IMAGE -->
                <div class="relative">

                    <div class="absolute inset-0 bg-blue-400 blur-2xl opacity-20 rounded-full"></div>

                    <img
                        src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=300&h=300&fit=crop&crop=face"
                        class="relative w-28 h-28 rounded-full object-cover border-4 border-white shadow-xl"
                        alt="profile">

                    <div class="absolute bottom-1 right-1 w-5 h-5 rounded-full bg-green-500 border-2 border-white"></div>

                </div>

                <!-- INFO -->
                <div class="flex-1">

                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-xs font-semibold mb-4">
                        <span class="material-symbols-outlined text-sm">verified</span>
                        VERIFIED ADMIN
                    </div>

                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800">
                        {{ auth()->user()->name }}
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Professional Attendance Management Administrator
                    </p>

                    <!-- EMAIL -->
                    <div class="flex items-center gap-2 mt-5 text-gray-600">

                        <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                            <span class="material-symbols-outlined text-blue-600 text-[20px]">
                                mail
                            </span>
                        </div>

                        <div>
                            <p class="text-xs text-gray-400">Email Address</p>
                            <p class="font-medium">{{ auth()->user()->email }}</p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- STATS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8">

        <!-- STATUS -->
        <div class="bg-white rounded-3xl p-6 border border-blue-100 shadow-sm hover:shadow-md transition">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-400">Account Status</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-2">
                        Active
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-green-50 flex items-center justify-center">
                    <span class="material-symbols-outlined text-green-600 text-3xl">
                        verified
                    </span>
                </div>

            </div>

        </div>

        <!-- ROLE -->
        <div class="bg-white rounded-3xl p-6 border border-blue-100 shadow-sm hover:shadow-md transition">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-400">Role</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-2">
                        Admin
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center">
                    <span class="material-symbols-outlined text-blue-600 text-3xl">
                        admin_panel_settings
                    </span>
                </div>

            </div>

        </div>

        <!-- SECURITY -->
        <div class="bg-white rounded-3xl p-6 border border-blue-100 shadow-sm hover:shadow-md transition">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-sm text-gray-400">Security</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-2">
                        Protected
                    </h3>
                </div>

                <div class="w-14 h-14 rounded-2xl bg-sky-50 flex items-center justify-center">
                    <span class="material-symbols-outlined text-sky-600 text-3xl">
                        shield
                    </span>
                </div>

            </div>

        </div>

    </div>

    <!-- ACCOUNT DETAILS -->
    <div class="mt-8 bg-white rounded-[28px] border border-blue-100 shadow-sm overflow-hidden">

        <!-- HEADER -->
        <div class="px-7 py-5 border-b border-gray-100 flex items-center justify-between">

            <div>
                <h2 class="text-xl font-bold text-gray-800">
                    Account Overview
                </h2>

                <p class="text-sm text-gray-400 mt-1">
                    Personal account information and details
                </p>
            </div>

            <div class="w-12 h-12 rounded-2xl bg-blue-50 flex items-center justify-center">
                <span class="material-symbols-outlined text-blue-600">
                    account_circle
                </span>
            </div>

        </div>

        <!-- CONTENT -->
        <div class="p-7 space-y-5">

            <!-- ITEM -->
            <div class="flex items-center justify-between p-4 rounded-2xl bg-blue-50/50">

                <div>
                    <p class="text-sm text-gray-400">Full Name</p>
                    <p class="font-semibold text-gray-800 mt-1">
                        {{ auth()->user()->name }}
                    </p>
                </div>

                <span class="material-symbols-outlined text-blue-500">
                    person
                </span>

            </div>

            <!-- ITEM -->
            <div class="flex items-center justify-between p-4 rounded-2xl bg-blue-50/50">

                <div>
                    <p class="text-sm text-gray-400">Email Address</p>
                    <p class="font-semibold text-gray-800 mt-1">
                        {{ auth()->user()->email }}
                    </p>
                </div>

                <span class="material-symbols-outlined text-blue-500">
                    mail
                </span>

            </div>

            <!-- ITEM -->
            <div class="flex items-center justify-between p-4 rounded-2xl bg-blue-50/50">

                <div>
                    <p class="text-sm text-gray-400">Account Type</p>
                    <p class="font-semibold text-gray-800 mt-1">
                        Administrator
                    </p>
                </div>

                <span class="material-symbols-outlined text-blue-500">
                    badge
                </span>

            </div>

        </div>

    </div>

    <!-- ACTION BUTTONS -->
    <div class="flex items-center justify-center gap-3 mt-8">

        <a href="{{ route('dashboard') }}"
           class="px-5 py-3 rounded-2xl bg-blue-50 text-blue-700 font-semibold hover:bg-blue-100 transition shadow-sm">
            Back Dashboard
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit"
                class="px-5 py-3 rounded-2xl bg-red-50 text-red-600 font-semibold hover:bg-red-100 transition shadow-sm">
                Logout
            </button>
        </form>

    </div>

</main>

@endsection