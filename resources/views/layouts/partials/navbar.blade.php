<!-- Navbar -->
<nav class="bg-gray-500 p-4">
    <!-- Navbar Content -->
    <div class="flex items-center justify-between">
        <a href="{{ route('profile.show') }}" class="text-white pr-4 focus:outline-none">
            <!-- Icon Profil -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 2c2.76 0 5 2.24 5 5s-2.24 5-5 5-5-2.24-5-5 2.24-5 5-5zM12 14c3.33 0 6 2.67 6 6H6c0-3.33 2.67-6 6-6z"></path>
            </svg>
        </a>
        <!-- Other Navbar Content-->
        <img src="/storage/image/logo.png" alt="logo" class="w-12 h-12">

        <a href="{{ route('logout') }}" class="text-white pr-4 focus:outline-none">
            <!-- Icon Logout -->
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
        </a>
    </div>
</nav>
