<div class="flex items-center justify-between px-4 py-2.5 bg-zinc-900 text-yellow-400 border-b border-yellow-400">
    <!-- Hamburger menu (mobile) -->
    <button
        @click="sidebarOpen = !sidebarOpen"
        class="text-yellow-400 hover:text-yellow-300 focus:outline-none"
        x-data
    >
        <i class="fas fa-bars text-lg"></i>
    </button>

    <!-- Right side navbar items -->
    <div class="flex items-center space-x-4">
        <!-- Notifications -->
        <div class="relative" x-data="{ notificationsOpen: false }">
            <button
                @click="notificationsOpen = !notificationsOpen"
                class="relative text-yellow-400 hover:text-yellow-300 focus:outline-none"
            >
                <i class="fas fa-bell text-lg"></i>
                <span class="absolute top-0 right-0 w-2 h-2 rounded-full bg-red-500"></span>
            </button>

            <!-- Dropdown -->
            <div
                x-show="notificationsOpen"
                @click.away="notificationsOpen = false"
                x-transition
                class="absolute right-0 mt-2 w-80 bg-zinc-800 text-gray-200 rounded-md shadow-lg py-1 z-50"
            >
                <div class="px-4 py-2 border-b border-zinc-700 text-yellow-300">
                    <p class="font-medium">Notifications</p>
                </div>
                <div class="px-4 py-2 text-sm text-gray-400">
                    No new notifications
                </div>
            </div>
        </div>

        <!-- User profile -->
        <div class="hidden md:flex items-center bg-zinc-800 rounded-md px-3 py-1.5">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center overflow-hidden border-2 border-yellow-400">
                    <img src="{{ Auth::user()->profile_photo_url ?? asset('https://picsum.photos/200/300') }}"
                         alt="{{ Auth::user()->name ?? 'User' }}" class="w-full h-full object-cover">
                </div>
                <div x-show="sidebarOpen" class="ml-3">
                    <p class="text-sm font-medium text-white">{{ Auth::user()->name ?? 'User' }}</p>
                    <p class="text-xs text-yellow-300">{{ Auth::user()->role ?? 'Member' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
