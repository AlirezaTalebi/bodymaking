<x-app-layout>
    @include('components.header', ['header' => 'dashboard'])
    <div class="sm:py-12 py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="hidden sm:block bg-gradient-to-br from-zinc-900 to-gray-800 text-white shadow-xl sm:rounded-lg sm:p-6">
                <livewire:calendar :viewName="'livewire.calendar'" />
            </div>
            <div class="sm:hidden bg-gradient-to-br from-zinc-900 to-gray-800 text-white shadow-xl sm:rounded-lg">
                <livewire:calendar :viewName="'livewire.sm.calendar'"/>
            </div>
        </div>
    </div>
</x-app-layout>
