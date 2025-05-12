<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium">
            {{ __('general.delete_account') }}
        </h2>

        <p class="mt-1 text-sm">
            {{ __('general.delete_account_warning') }}
        </p>
    </header>

    <x-buttons.danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        {{ __('general.delete_account') }}
    </x-buttons.danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium">
                {{ __('general.delete_account_confirmation') }}
            </h2>

            <p class="mt-1 text-sm">
                {{ __('general.delete_account_password_warning') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" :value="__('general.password')" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('general.password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('general.cancel') }}
                </x-secondary-button>

                <x-buttons.danger-button class="ms-3">
                    {{ __('general.delete_account') }}
                </x-buttons.danger-button>
            </div>
        </form>
    </x-modal>
</section>
