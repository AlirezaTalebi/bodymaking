@php
    use App\Models\User;
@endphp

<section>
    <header>
        <h2 class="text-lg font-medium">
            {{ __('general.profile_information') }}
        </h2>

        <p class="mt-1 text-sm">
            {{ __('general.update_your_account_profile_information_and_email_address') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('general.name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                          :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('general.email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                          :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('general.email_unverified') }}

                        <button form="send-verification"
                                class="underline text-sm hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('general.resend_verification_email') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('general.verification_link_sent') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Gender Dropdown -->
        <x-input-label for="gender" :value="__('general.gender')" />
        <x-forms.dropdown
            name="gender"
            :options="collect(User::getGender())->mapWithKeys(fn($g) => [$g => $g])->toArray()"
            :selected="old('gender', $user->gender)"
            placeholder="select_gender"
        />
        <x-input-error :messages="$errors->get('gender')" class="mt-2" />

        <div class="mt-4">
            <x-input-label for="age" :value="__('general.age')"/>
            <x-text-input class="block mt-1 w-full" type="number" name="age" :value="old('age', $user->age)" required/>
            <x-input-error :messages="$errors->get('age')" class="mt-2"/>
        </div>

        <div class="flex items-center gap-4">
            <x-buttons.primary-button-yellow>{{ __('general.save') }}</x-buttons.primary-button-yellow>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm">
                    {{ __('general.saved') }}
                </p>
            @endif
        </div>
    </form>
</section>
