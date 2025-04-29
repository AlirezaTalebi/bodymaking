@php
    use App\Models\User;
@endphp
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('general.name')" />
            <x-text-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('general.email')" />
            <x-text-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="age" :value="__('general.age')" />
            <x-text-input class="block mt-1 w-full" type="number" name="age" :value="old('age')" required />
            <x-input-error :messages="$errors->get('age')" class="mt-2" />
        </div>

            <!-- Gender Dropdown -->
        <div class="mt-4 w-full">
            <x-input-label for="gender" :value="__('general.gender')" />

            <div x-data="{ open: false, selected: '{{ old('gender', __('general.select_gender')) }}' }" class="relative">
                <!-- Trigger button -->
                <button @click="open = !open"
                        type="button"
                        class="border-gray-300 focus:border-custom_yellow focus:ring-custom_yellow rounded-md bg-white w-full flex justify-between items-center px-4 py-2.5">
                    <span x-text="selected" class="text-left"></span>
                    <svg class="w-4 h-4 rtl:rotate-180" aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div x-show="open"
                     x-transition
                     @click.outside="open = false"
                     class="absolute z-50 mt-1 w-full rounded-md bg-white"
                     style="display: none;">
                    <ul class="py-1 text-sm text-gray-900">
                        @foreach (User::gender() as $gender)
                            <li>
                                <button type="button"
                                        @click="selected = '{{ __("general.$gender") }}'; open = false; $refs.gender.value = '{{ $gender }}'"
                                        class="w-full text-left px-4 py-2 hover:underline">
                                    {{ __("general.$gender") }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Hidden input to submit selected gender -->
                <input type="hidden" name="gender" x-ref="gender" value="{{ old('gender') }}">
            </div>

            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('general.password')" />

            <x-text-input class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('general.confirm_password')" />

            <x-text-input class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-buttons.primary-a-button href="{{ route('login') }}">
                {{ __('general.already_registered') }}
            </x-buttons.primary-a-button>

            <x-buttons.primary-button>
                {{ __('general.register') }}
            </x-buttons.primary-button>
        </div>
    </form>
</x-guest-layout>
