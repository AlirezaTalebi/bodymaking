<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full max-w-md mx-auto p-6 bg-gradient-to-br from-zinc-900 to-gray-800 rounded-lg text-white">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('general.email')" />
                <x-text-input id="email" type="email" name="email"
                              class="mt-1 block w-full"
                              :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('general.password')" />
                <x-text-input id="password" type="password" name="password"
                              class="mt-1 block w-full"
                              required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mt-4">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <x-checkbox-input id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-300">{{ __('general.remember_me') }}</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-6 gap-4">
                <div class="flex gap-3">
                    @if (Route::has('password.request'))
                        <x-buttons.primary-a-button href="{{ route('password.request') }}">
                            {{ __('general.forgot_password') }}
                        </x-buttons.primary-a-button>
                    @endif

                    <x-buttons.primary-a-button href="{{ route('register') }}">
                        {{ __('general.register') }}
                    </x-buttons.primary-a-button>
                </div>

                <x-buttons.primary-button-yellow type="submit">
                    {{ __('general.login') }}
                </x-buttons.primary-button-yellow>
            </div>
        </form>
    </div>
</x-guest-layout>
