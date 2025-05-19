<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-yellow-400 leading-tight">
            {{ __('general.profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <x-card title="{{ __('general.profile_information') }}">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </x-card>

            <x-card title="{{ __('general.update_password') }}">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </x-card>

            <x-card title="{{ __('general.delete_account') }}">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </x-card>

        </div>
    </div>
</x-app-layout>
