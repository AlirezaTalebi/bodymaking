<nav :class="{'opacity-0': !openMenu, 'opacity-100': openMenu}"
     class="bg-custom_purple min-h-screen fixed w-full sm:w-[24.99999999%] md:w-[16.99999999%] text-white transition-opacity duration-500 ease-in-out">
    <div class="flex justify-end mr-2 pt-2">
        <button @click="openMenu = !openMenu"
                class="inline-flex items-center justify-center p-2 rounded-md focus:outline-none transition duration-150 ease-in-out">
            <x-application-logo class="h-5 w-10 fill-current text-white"/>
        </button>
    </div>
    <div class="flex items-center justify-start">
        <ul class="p-4">
            <li>
                <div class="flex items-center justify-start">
                    <x-buttons.primary-a-button class="block py-2 w-full" href="{{ route('dashboard') }}">
                    <span class="text-3xl sm:text-2xl">
                        {{ __('general.home') }}
                    </span>
                    </x-buttons.primary-a-button>
                </div>
            </li>
            <li>
              <div class="flex items-center justify-start">
                  <x-buttons.primary-a-button class="block py-2 w-full" href="{{ route('profile.edit') }}">
                    <span class="text-3xl sm:text-2xl">
                        {{ __('general.profile') }}
                    </span>
                  </x-buttons.primary-a-button>
              </div>
            </li>
            <li>
                <div class="flex items-center justify-start" >
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-buttons.primary-button class="block py-2 w-full">
                        <span class="text-3xl sm:text-2xl">
                            {{ __('general.logout') }}
                        </span>
                        </x-buttons.primary-button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div :class="{'opacity-0 invisible': openMenu, 'opacity-100 visible': !openMenu}"
     class="fixed top-3 ml-2 transition-opacity duration-500 ease-in-out z-50" id="logo">
    <button @click="openMenu = !openMenu"
            class="inline-flex items-center justify-center p-2 bg-custom_yellow rounded-md focus:outline-none transition duration-150 ease-in-out">
        <x-application-logo class="h-5 w-10 fill-current text-custom_purple"/>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const logo = document.getElementById('logo');
        const threshold = 20;

        window.addEventListener("scroll", () => {
            if (window.scrollY > threshold) {
                logo.style.opacity = "80%";
            } else {
                logo.style.opacity = "100%";
            }
        });

    })
</script>
