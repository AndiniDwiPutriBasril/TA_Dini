<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>FlexSquidi</title>
</head>

<body class="bg-slate-100">

    <!-- SIDEBAR -->
    <div class="fixed w-60 h-screen bg-[#234B91] shadow-xl flex flex-col justify-between">

        <!--Menu -->
        <div>

            <div class="px-6 pt-8 pb-11">

                <h1 class="text-3xl font-extrabold text-white">
                    Flex Squidi
                </h1>

                <p class="text-blue-300 mt-1">
                    Smart Squat Monitoring
                </p>

            </div>

            <div class="px-6">

                <h2 class="text-white font-semibold mb-6">
                    MENU
                </h2>

                <div class="space-y-2">

                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                        {{ request()->routeIs('dashboard')
                            ? 'bg-white text-[#234B91] font-semibold'
                            : 'text-white hover:bg-white/10' }}">

                        🏠 Dashboard

                    </a>

                    <!-- Histori -->
                    <a href="{{ route('histori') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                        {{ request()->routeIs('histori')
                            ? 'bg-white text-[#234B91] font-semibold'
                            : 'text-white hover:bg-white/10' }}">

                        📊 Histori

                    </a>

                    <!-- Akun -->
                    <a href="{{ route('akun') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition
                        {{ request()->routeIs('akun')
                            ? 'bg-white text-[#234B91] font-semibold'
                            : 'text-white hover:bg-white/10' }}">

                        👤 Akun

                    </a>

                </div>

            </div>

        </div>

        <!-- User -->
        <div class="p-6">

            <div class="bg-slate-800/60 rounded-2xl p-3">

                <div class="flex items-center gap-3">

                   <div class="w-10 h-10 rounded-full bg-blue-200 flex items-center justify-center">

                        <span class="text-lg">👤</span>

                    </div>

                    <div>

                        <p class="text-xs text-slate-300">
                            Login Sebagai
                        </p>

                        <h2 class="text-base font-semibold text-white">
                            {{ auth()->user()->name }}
                        </h2>

                    </div>

                </div>

            </div>

            <form action="{{ route('logout') }}" method="POST" class="mt-3">

                @csrf

                <button
                    class="w-full py-2.5 rounded-xl bg-gradient-to-r from-indigo-600 to-cyan-500 text-white font-semibold">

                    Logout

                </button>

            </form>

        </div>

    </div>

    <!-- CONTENT -->
    <main class="ml-60 p-8 min-h-screen">

        @yield('content')

    </main>

</body>

</html>