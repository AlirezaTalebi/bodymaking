<x-guest-layout>
    <div class="w-full max-w-md mx-auto p-6 bg-gradient-to-br from-zinc-900 to-gray-800 shadow-xl rounded-lg text-white">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('general.email')" />
                <x-text-input id="email" type="email" name="email" class="mt-1 block w-full"
                              :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('general.password')" />
                <x-text-input id="password" type="password" name="password" class="mt-1 block w-full"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('general.confirm_password')" />
                <x-text-input id="password_confirmation" type="password" name="password_confirmation"
                              class="mt-1 block w-full" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-6">
                <x-buttons.primary-button-yellow>
                    {{ __('Reset Password') }}
                </x-buttons.primary-button-yellow>
            </div>
        </form>
    </div>
</x-guest-layout>
