<x-guest-layout>
    <div class="text-center mb-8">

    <h3 class="text-3xl font-bold text-gray-800">
        Welcome 
    </h3>

    <p class="mt-2 text-gray-500">
        Sign in to access your FlexSquidi dashboard.
    </p>

</div> 
    {{-- Pesan setelah registrasi berhasil --}}
    @if (session('success'))
        <div class="mb-4 rounded-lg bg-green-100 border border-green-300 text-green-700 px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Button -->
        <div class="flex gap-4 mt-8">

            <!-- Kembali -->
            <a href="{{ url('/') }}"
            class="w-1/2 py-4 rounded-2xl
            border-2 border-[#3368C5]
            text-[#3368C5]
            font-bold
            text-center
            hover:bg-blue-50
            transition-all">

                Kembali

            </a>

            <!-- Login -->
            <button
                type="submit"
                class="w-1/2 py-4 rounded-2xl
                bg-gradient-to-r
                from-[#2456A5]
                via-[#3368C5]
                to-[#4F7FDC]
                text-white
                font-bold
                shadow-lg
                hover:scale-[1.02]
                transition-all">

                Login

            </button>

        </div>

        <div class="mt-6 text-center text-sm text-gray-500">

            Belum punya akun?

            <a href="{{ route('register') }}"
            class="font-semibold text-blue-600 hover:underline">

                Daftar

            </a>

        </div>

        </div>
    </form>
</x-guest-layout>
