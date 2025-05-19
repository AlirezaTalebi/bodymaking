<div class="relative z-30">
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
        <div class="flex items-center justify-between p-4 border-b border-yellow-400">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-yellow-400 bg-opacity-20 flex items-center justify-center">
                    <span class="text-lg font-bold text-yellow-300">{{ config('app.name')[0] ?? 'L' }}</span>
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
                       class="flex items-center px-4 py-3 transition-all duration-200
                       {{ request()->routeIs('dashboard') ? 'bg-yellow-400 bg-opacity-20 border-r-4 border-yellow-400' : 'hover:bg-yellow-400 hover:bg-opacity-10' }}"
                       x-bind:class="{ 'justify-center': !sidebarOpen }"
                    >
                        <i class="fas fa-home text-yellow-400 text-lg"></i>
                        <span x-show="sidebarOpen" class="ml-4 text-yellow-300">Dashboard</span>
                    </a>
                </li>

                {{-- Profile --}}
                <li>
                    <a href="{{ route('profile.edit') }}"
                       class="flex items-center px-4 py-3 transition-all duration-200
                       {{ request()->routeIs('profile.edit') ? 'bg-yellow-400 bg-opacity-20 border-r-4 border-yellow-400' : 'hover:bg-yellow-400 hover:bg-opacity-10' }}"
                       x-bind:class="{ 'justify-center': !sidebarOpen }"
                    >
                        <i class="fas fa-user text-yellow-400 text-lg"></i>
                        <span x-show="sidebarOpen" class="ml-4 text-yellow-300">Profile</span>
                    </a>
                </li>

                {{-- Settings --}}
                <li>
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center px-4 py-3 transition-all duration-200
                       {{ request()->routeIs('settings') ? 'bg-yellow-400 bg-opacity-20 border-r-4 border-yellow-400' : 'hover:bg-yellow-400 hover:bg-opacity-10' }}"
                       x-bind:class="{ 'justify-center': !sidebarOpen }"
                    >
                        <i class="fas fa-cog text-yellow-400 text-lg"></i>
                        <span x-show="sidebarOpen" class="ml-4 text-yellow-300">Settings</span>
                    </a>
                </li>

                {{-- Logout --}}
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="w-full flex items-center px-4 py-3 transition-all duration-200 hover:bg-yellow-400 hover:bg-opacity-10 text-left"
                            x-bind:class="{ 'justify-center': !sidebarOpen }"
                        >
                            <i class="fas fa-sign-out-alt text-yellow-400 text-lg"></i>
                            <span x-show="sidebarOpen" class="ml-4 text-yellow-300">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
