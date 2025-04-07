<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<header class="bg-[#202c34] text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="Your Company">
                    <span class="text-white text-xl font-bold ml-4">FIT CHOICE</span>
                </div>

                <!-- Navigation Links -->
                <div class="flex flex-1 items-center justify-center">
                    <div class="hidden sm:block">
                        <div class="flex space-x-16">
                            <a href="{{ route('active') }}" class="rounded-md bg-gray-900 px-6 py-2 text-sm font-medium text-white" aria-current="page">Memberships</a>
                            <a href="#" class="rounded-md px-6 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Workout Progress</a>
                            <a href="#" class="rounded-md px-6 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Payment History</a>
                            <a href="#" class="rounded-md px-6 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Favourite Gyms</a>
                        </div>
                    </div>
                </div>

                <!-- User Menu -->
                <div class="flex items-center">
                    <!-- Notification Bell -->
                    <button class="p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>

                    <!-- Profile Dropdown -->
                    <div class="ml-3 relative">
                        <button type="button" class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button">
                            <span class="sr-only">Open user menu</span>
                            <img class="h-8 w-8 rounded-full border-2 border-indigo-500" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e" alt="">
                        </button>

                        <!-- Dropdown Menu -->
                        <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5" id="user-dropdown-menu">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 border-t border-gray-200">Sign out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script>
        // Toggle dropdown menu visibility
        document.getElementById('user-menu-button').addEventListener('click', function() {
            const dropdownMenu = document.getElementById('user-dropdown-menu');
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const userMenuButton = document.getElementById('user-menu-button');
            const dropdownMenu = document.getElementById('user-dropdown-menu');
            if (!userMenuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>