@php
    use App\Models\User;
@endphp

<x-guest-layout>
    <div class="w-full max-w-md mx-auto p-6 bg-gradient-to-br from-zinc-900 to-gray-800 rounded-lg text-white">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('general.name')" />
                <x-text-input id="name" type="text" name="name" class="mt-1 block w-full"
                              :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('general.email')" />
                <x-text-input id="email" type="email" name="email" class="mt-1 block w-full"
                              :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Age -->
            <div class="mt-4">
                <x-input-label for="age" :value="__('general.age')" />
                <x-text-input id="age" type="number" name="age" class="mt-1 block w-full"
                              :value="old('age')" required />
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>

            <!-- Gender Dropdown -->
            <div class="mt-4">
                <x-input-label for="gender" :value="__('general.gender')" />
                <div x-data="{ open: false, selected: '{{ __("general." . old("gender", "select_gender")) }}' }"
                     class="relative">
                    <!-- Trigger -->
                    <button @click="open = !open" type="button"
                            class="mt-1 bg-zinc-800 text-white border border-zinc-600 focus:border-yellow-400 focus:ring-yellow-400 rounded-md w-full px-4 py-2.5 flex justify-between items-center">
                        <span x-text="selected" class="text-left truncate"></span>
                        <i :class="open ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down'"></i>
                    </button>

                    <!-- Options -->
                    <div x-show="open" x-transition @click.outside="open = false"
                         class="absolute z-50 mt-1 w-full rounded-md bg-zinc-800 shadow border border-zinc-700">
                        <ul class="py-1 text-sm text-white">
                            @foreach (User::getGender() as $gender)
                                <li>
                                    <button type="button"
                                            @click="selected = '{{ __("general.$gender") }}'; open = false; $refs.gender.value = '{{ $gender }}'"
                                            class="w-full px-4 py-2 text-left hover:bg-zinc-700">
                                        {{ __("general.$gender") }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Hidden input -->
                    <input type="hidden" name="gender" x-ref="gender" value="{{ old('gender') }}">
                </div>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
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

            <!-- Buttons -->
            <div class="flex items-center justify-between mt-6">
                <x-buttons.primary-a-button href="{{ route('login') }}">
                    {{ __('general.already_registered') }}
                </x-buttons.primary-a-button>

                <x-buttons.primary-button-yellow>
                    {{ __('general.register') }}
                </x-buttons.primary-button-yellow>
            </div>
        </form>
    </div>
</x-guest-layout>
