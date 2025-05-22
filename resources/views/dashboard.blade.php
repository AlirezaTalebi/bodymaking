<x-app-layout>
    @include('components.header', ['header' => 'dashboard'])
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-zinc-900 to-gray-800 text-white shadow-xl sm:rounded-lg p-6">
                <p class="text-lg font-medium text-gray-300">
                    {{ __("You're logged in!") }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
