@extends('layouts.app')

@section('content')

<!-- HEADER -->
    <div class="flex items-start justify-between mb-8">

           <div>
            <h1 class="text-5xl font-black bg-gradient-to-r from-blue-700 via-indigo-600 to-purple-600 bg-clip-text text-transparent">
                Akun Saya
            </h1>

            <p class="text-purple-500 text-2xl mt-3">
                Kelola Informasi Akun dan Profil Pengguna
            </p>

        </div>
    </div>


    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

        <!-- CARD PROFILE -->
        <div
            class="relative overflow-hidden bg-gradient-to-br from-white via-blue-50 to-indigo-100 rounded-[2rem] border border-blue-400 shadow-[0_20px_60px_rgba(99,102,241,0.15)] p-8">

            <!-- Blur -->
            <div class="absolute top-0 right-0 w-48 h-48 bg-blue-300/20 rounded-full blur-3xl"></div>

            <div class="relative z-10">

                <div class="flex justify-center">

                    <div class="relative">

                        <div class="absolute inset-0 bg-blue-400/30 rounded-full blur-2xl"></div>

                        <div class="w-36 h-36 mx-auto rounded-full bg-blue-100 flex items-center justify-center shadow-lg">

                            <span class="text-7xl">
                                👤
                            </span>

                        </div>

                    </div>

                </div>

                <div class="text-center mt-8">

                    <h2 class="text-3xl font-bold text-yellow-500">

                        {{ auth()->user()->name }}

                    </h2>

                    <p class="text-gray-500 mt-2">

                        {{ auth()->user()->email }}

                    </p>

                </div>

                <div class="grid grid-cols-1 gap-4 mt-10">

                    <div class="bg-white/70 rounded-3xl p-5 border border-purple-400">

                        <p class="text-blue-500 text-sm uppercase tracking-wider">
                            Status
                        </p>

                        <h3 class="text-2xl font-bold text-gray-800 mt-1">
                            Aktif
                        </h3>

                    </div>

                    <div class="bg-white/70 rounded-3xl p-5 border border-purple-400">

                        <p class="text-purple-500 text-sm uppercase tracking-wider">
                            Sistem
                        </p>

                        <h3 class="text-2xl font-bold text-gray-800 mt-1">
                            Monitoring
                        </h3>

                    </div>

                </div>

            </div>

        </div>

        <!-- FORM -->
        <div
            class="xl:col-span-2 relative overflow-hidden bg-gradient-to-br from-white via-blue-50 to-indigo-50 rounded-[2rem] border border-blue-400 shadow-[0_20px_60px_rgba(99,102,241,0.15)] p-10">

            <div class="absolute top-0 right-0 w-72 h-72 bg-indigo-300/20 rounded-full blur-3xl"></div>

            <div class="relative z-10">

                <h2 class="text-4xl font-bold text-purple-500 mb-8">

                    Edit Profil

                </h2>

                <form action="{{ route('akun.update') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <!-- NAMA -->
                    <div class="mb-8">
                        <label class="block mb-3 text-lg font-semibold text-gray-700">
                             Nama Lengkap
                        </label>

                        <input type="text"
                            name="name"
                            value="{{ auth()->user()->name }}"
                            class="w-full bg-white border border-purple-400 rounded-3xl px-6 py-5 text-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-blue-200">

                    </div>

                    <!-- EMAIL -->
                    <div class="mb-8">

                        <label class="block mb-3 text-lg font-semibold text-gray-700">

                            Email

                        </label>

                        <input type="email"
                            name="email"
                            value="{{ auth()->user()->email }}"
                            class="w-full bg-white border border-purple-400 rounded-3xl px-6 py-5 text-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-blue-200">

                    </div>

                    <!-- PASSWORD -->
                    <div class="mb-10">

                        <label class="block mb-3 text-lg font-semibold text-gray-700">

                            Password Baru

                        </label>

                        <input type="password"
                            name="password"
                            placeholder="Kosongkan jika tidak ingin mengganti password"
                            class="w-full bg-white border border-purple-400 rounded-3xl px-6 py-5 text-lg shadow-sm focus:outline-none focus:ring-4 focus:ring-blue-200">

                    </div>

                    <!-- BUTTON -->
                    <button type="submit"
                        class="bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 text-white px-10 py-5 rounded-3xl text-lg font-bold shadow-xl hover:scale-105 transition-all duration-300">

                        Simpan Perubahan

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection