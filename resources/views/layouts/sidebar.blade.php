<div class="relative z-30" x-cloak>
    {{-- Mobile Overlay --}}
    <div
        x-show="sidebarOpen"
        x-transition.opacity
        class="fixed inset-0 bg-black bg-opacity-60 z-20 lg:hidden"
        @click="sidebarOpen = false"
    ></div>

    {{-- Sidebar --}}
    <div
        x-bind:class="{
            'translate-x-0': sidebarOpen,
            '-translate-x-full lg:translate-x-0': !sidebarOpen,
            'w-64': sidebarOpen,
            'w-64 lg:w-20': !sidebarOpen
        }"
        class="fixed lg:relative h-full bg-gradient-to-b from-zinc-900 to-gray-800 text-white transition-all duration-300 ease-in-out shadow-xl z-30"
    >
        {{-- Logo section --}}
        <div class="flex items-center justify-between p-4 border-b-2 border-r border-yellow-400">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-opacity-20 flex items-center justify-center">
                    <x-application-logo class="h-4 w-16 fill-current text-yellow-400"/>
                </div>
                <span x-show="sidebarOpen" class="ml-3 font-semibold text-lg text-yellow-300">
                    {{ config('app.name', 'Laravel') }}
                </span>
            </div>
            <button
                    @click="sidebarOpen = false"
                    class="lg:hidden text-yellow-400 hover:text-yellow-300 focus:outline-none"
                    x-show="sidebarOpen"
            >
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        {{-- Navigation --}}
        <div class="py-4">
            <ul class="space-y-1">
                {{-- Dashboard --}}
                <li>
                    <a href="{{ route('dashboard') }}"
                       class="w-full flex items-center px-4 py-3 text-left transition-all duration-200"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'"
                        @class([
                            'hover:bg-yellow-400 hover:bg-opacity-10',
                            'bg-yellow-400 bg-opacity-20 border-r-4 border-yellow-400' => request()->routeIs('dashboard')
                        ])
                    >
                        <i class="fas fa-home text-yellow-400 text-lg w-4 h-7"></i>
                        <span
                            :class="sidebarOpen ? 'opacity-100 ml-4' : 'opacity-0 w-0 ml-0'"
                            class="text-yellow-300 transition-all duration-300 overflow-hidden whitespace-nowrap"
                        >
                    {{ __('general.dashboard') }}
                </span>
                    </a>
                </li>

                {{-- Profile --}}
                <li>
                    <a href="{{ route('profile.edit') }}"
                       @click="sidebarOpen = false"
                       class="w-full flex items-center px-4 py-3 text-left transition-all duration-200"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'"
                        @class([
                            'hover:bg-yellow-400 hover:bg-opacity-10',
                            'bg-yellow-400 bg-opacity-20 border-r-4 border-yellow-400' => request()->routeIs('profile.edit')
                        ])
                    >
                        <i class="fas fa-user text-yellow-400 text-lg w-4 h-7"></i>
                        <span
                            :class="sidebarOpen ? 'opacity-100 ml-4' : 'opacity-0 w-0 ml-0'"
                            class="text-yellow-300 transition-all duration-300 overflow-hidden whitespace-nowrap"
                        >
                    {{ __('general.profile') }}
                </span>
                    </a>
                </li>

                {{-- Logout --}}
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="w-full flex items-center px-4 py-3 text-left transition-all duration-200"
                       :class="sidebarOpen ? 'justify-start' : 'justify-center'"
                       class="hover:bg-yellow-400 hover:bg-opacity-10"
                    >
                        <i class="fas fa-sign-out-alt text-yellow-400 text-lg w-4 h-7"></i>
                        <span
                            :class="sidebarOpen ? 'opacity-100 ml-4' : 'opacity-0 w-0 ml-0'"
                            class="text-yellow-300 transition-all duration-300 overflow-hidden whitespace-nowrap"
                        >
                    {{ __('general.logout') }}
                </span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

    </div>
</div>
