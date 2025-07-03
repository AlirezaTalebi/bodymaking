<x-app-layout>
    @include('components.header', ['header' => 'dashboard'])
    <div class="sm:py-12 py-3">
        <div
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3 bg-gradient-to-br from-zinc-900 to-gray-800 text-white shadow-xl sm:rounded-lg">
            <div
                class="hidden sm:block sm:p-6">
                <livewire:calendar :viewName="'livewire.calendar'"/>
            </div>
            <div class="sm:hidden">
                <livewire:calendar :viewName="'livewire.sm.calendar'"/>
            </div>
            <div class="flex justify-center gap-2">
                <div
                    class="calendar-body sm:flex flex-wrap sm:flex-nowrap items-center justify-center sm:justify-between gap-3 mb-6 bg-zinc-800 rounded-lg p-3 border border-zinc-700">

                    @include('workout-sessions.index', ['workoutSessions' => request()->user()->workoutSessions()->get()])

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
