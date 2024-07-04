
<html>
<head>
    <style>
    .navbar-custom {
    background-color: #1f2937;
    border-bottom: 1px solid #2d3748; /* Optional: This matches the dark border color */
    color: white;
    }
    h4 {
    color: #47a2ed;
    display: flex;
    align-items: center;
    height: 100%;
    }
    .nav-link-custom {
    color: white;
    text-decoration: none; /* Menghapus garis bawah */
    transition: color 0.3s ease;
}

.nav-link-custom:hover,
.nav-link-custom:focus,
.nav-link-custom:active {
    color: #47a2ed; /* Warna saat hover, bisa disesuaikan */
    text-decoration: none; /* Pastikan garis bawah tetap tidak muncul */
}
.active-link {
    border-bottom: 2px solid #47a2ed; /* Warna garis bawah saat aktif */
}
.dropd{
    text-decoration: none;
    color: #47a2ed;
}
.dropd:hover{
    text-decoration: none;
    color: white;
}
    </style>
<head>

<body>
<nav x-data="{ open: false }" class="navbar-custom border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <h4 class="flicktalks-text">FlickTalks</h4>

                @auth
                @if(Auth::user()->role === 'Staff')
                <!-- Navigation Links for Staff -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link-custom {{ request()->routeIs('dashboard') ? 'active-link' : '' }}">
                        HOME
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('movie')" :active="request()->routeIs('movie')" class="nav-link-custom {{ request()->routeIs('movie') ? 'active-link' : '' }}">
                        MOVIE
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('review')" :active="request()->routeIs('review')" class="nav-link-custom {{ request()->routeIs('review') ? 'active-link' : '' }}">
                        REVIEW
                    </x-nav-link>
                </div>
                @elseif(Auth::user()->role === 'User')
                <!-- Navigation Links for User -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link-custom {{ request()->routeIs('dashboard') ? 'active-link' : '' }}">
                        HOME
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('user_movie')" :active="request()->routeIs('user_movie')" class="nav-link-custom {{ request()->routeIs('user_movie') ? 'active-link' : '' }}">
                        MOVIE
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('user_review')" :active="request()->routeIs('user_review')" class="nav-link-custom {{ request()->routeIs('user_review') ? 'active-link' : '' }}">
                        REVIEW
                    </x-nav-link>
                </div>
                <!-- Additional Navigation Link for User -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('aboutus')" :active="request()->routeIs('aboutus')" class="nav-link-custom {{ request()->routeIs('aboutus') ? 'active-link' : '' }}">
                        ABOUT US
                    </x-nav-link>
                </div>
                @endif
            @else
            <!-- Navigation Links for Guest -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')" class="nav-link-custom {{ request()->routeIs('welcome') ? 'active-link' : '' }}">
                        HOME
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('user_movie')" :active="request()->routeIs('user_movie')" class="nav-link-custom {{ request()->routeIs('user_movie') ? 'active-link' : '' }}">
                        MOVIE
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('aboutus')" :active="request()->routeIs('aboutus')" class="nav-link-custom {{ request()->routeIs('aboutus') ? 'active-link' : '' }}">
                        ABOUT US
                    </x-nav-link>
                </div>
                @endauth
            </div>

            <!-- Settings Dropdown -->
             @auth
             @if(Auth::user()->role === 'Staff' || Auth::user()->role === 'User')
            <div class="hidden sm:flex sm:items-center sm:ms-6 ml-auto">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white-500 dark:text-white-400 bg-transparent dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content" class="drop">
                    <x-dropdown-link :href="route('profile.edit')" class="dropd">               
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="dropd">                           
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endif
            @endauth
            @auth

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600 sm:ml-auto">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    @endauth
</nav>

</body>
</html>