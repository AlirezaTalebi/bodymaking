<x-guest-layout>
    <div class="w-full max-w-md mx-auto p-6 bg-gradient-to-br from-zinc-900 to-gray-800 shadow-xl rounded-lg text-white">
        <div class="mb-4 text-sm text-gray-300 leading-relaxed">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('general.email')" />
                <x-text-input id="email" type="email" name="email"
                              class="mt-1 block w-full"
                              :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-6">
                <x-buttons.primary-button-yellow>
                    {{ __('Email Password Reset Link') }}
                </x-buttons.primary-button-yellow>
            </div>
        </form>
    </div>
</x-guest-layout>
