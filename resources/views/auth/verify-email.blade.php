<x-guest-layout>
    <div class="mb-4 text-sm text-gray-300">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-500">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <x-buttons.primary-button-yellow>
                {{ __('Resend Verification Email') }}
            </x-buttons.primary-button-yellow>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                    class="text-sm text-gray-400 hover:text-yellow-400 transition focus:outline-none focus:ring-2 focus:ring-yellow-500 rounded-md">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
