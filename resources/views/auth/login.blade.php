<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('general.email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('general.password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <x-checkbox-input id="remember_me" name="remember"/>
                <span class="ms-2 text-sm text-white">{{ __('general.remember_me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-white hover:text-custom_yellow rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom_yellow" href="{{ route('password.request') }}">
                    {{ __('general.forgot_password') }}
                </a>
            @endif

            <a class="underline text-sm text-white {{app()->isLocale('fa') ? 'mr-4' : 'ml-4' }} hover:text-custom_yellow rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-custom_yellow" href="{{ route('password.request') }}">
                {{ __('general.login') }}
            </a>
        </div>
    </form>
</x-guest-layout>
