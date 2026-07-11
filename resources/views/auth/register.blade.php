<x-guest-layout>

    <div class="text-center mb-8">

        <h3 class="text-3xl font-bold text-gray-800">
            Create Account
        </h3>

        <p class="mt-2 text-gray-500">
            Create a new account to access the FlexKnee dashboard.
        </p>

    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" />

            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name" />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-5">
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-5">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-5">
            <x-input-label
                for="password_confirmation"
                :value="__('Confirm Password')" />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password" />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2" />
        </div>

        <!-- Button -->

        <button
            type="submit"
            class="w-full mt-8 py-4 rounded-2xl
            bg-gradient-to-r
            from-[#2456A5]
            via-[#3368C5]
            to-[#4F7FDC]
            text-white font-bold
            shadow-lg
            hover:scale-[1.02]
            transition-all">

            Create Account

        </button>

        <!-- Login Link -->

        <p class="text-center mt-6 text-gray-500">

            Already have an account?

            <a
                href="{{ route('login') }}"
                class="font-semibold text-[#2456A5] hover:underline">

                Sign In

            </a>

        </p>

    </form>

</x-guest-layout>