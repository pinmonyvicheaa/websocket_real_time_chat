<nav class="bg-gradient-to-r from-green-200 to-green-400 border-b border-green-300 shadow-md">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 h-[70px]">
        <div class="flex justify-between items-center h-16 text-sm font-medium text-gray-700">

            <!-- Logo and Navigation -->
            <div class="flex items-center space-x-6">
                <a href="{{ route('dashboard') }}">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/WebSocket_colored_logo.svg/1200px-WebSocket_colored_logo.svg.png" alt="Logo"
                         class="h-[50px] w-auto rounded-full shadow-md hover:scale-105 transition-transform" />
                </a>
                <a href="{{ route('dashboard') }}"
                   class="relative inline-flex items-center py-1 rounded-md  transition-all duration-200
                          {{ request()->routeIs('dashboard') ? 'text-xl text-green-700 font-bold' : '' }}">
                    {{ __('Chat') }}
                </a>
            </div>

            <!-- Auth User Info -->
            <div class="flex items-center gap-4">
                @auth
                    <span class="text-gray-800 font-semibold">{{ Auth::user()->name }}</span>

                    <!-- Trigger Button -->
                    <button
                        onclick="document.getElementById('logout-modal').classList.remove('hidden')"
                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md shadow hover:shadow-lg transition duration-150">
                        {{ __('Logout') }}
                    </button>
                @endauth
            </div>
        </div>
    </div>
</nav>

<!-- Logout Confirmation Modal -->
<div id="logout-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden">
    <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Logout</h2>
        <p class="text-gray-600 mb-6">Are you sure you want to log out?</p>
        <div class="flex justify-end space-x-4">
            <button
                onclick="document.getElementById('logout-modal').classList.add('hidden')"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                Cancel
            </button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    Yes, Logout
                </button>
            </form>
        </div>
    </div>
</div>
