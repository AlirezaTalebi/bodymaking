<x-guest-layout>
    <div class="w-full max-w-md mx-auto p-6 bg-gradient-to-br from-zinc-900 to-gray-800 shadow-xl rounded-lg text-white">
        <div class="mb-4 text-sm text-gray-300 leading-relaxed">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('general.password')" />

                <x-text-input id="password" type="password" name="password"
                              class="mt-1 block w-full"
                              required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-6">
                <x-buttons.primary-button-yellow>
                    {{ __('Confirm') }}
                </x-buttons.primary-button-yellow>
            </div>
        </form>
    </div>
</x-guest-layout>
