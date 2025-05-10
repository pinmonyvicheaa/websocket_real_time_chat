<title>Login</title>
<link rel="icon" type="image/x-icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/WebSocket_colored_logo.svg/1200px-WebSocket_colored_logo.svg.png">

<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-100 to-green-200">
        <div class="w-full max-w-md px-8 py-10 bg-white rounded-2xl shadow-xl">
            <div class="flex justify-center mb-6">
                <a href="/">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cd/WebSocket_colored_logo.svg/1200px-WebSocket_colored_logo.svg.png" class="w-20 h-20 text-green-600 fill-current" alt="">
                </a>
            </div>

            <h2 class="text-2xl font-bold text-center text-gray-800">Welcome Back</h2>
            <p class="mt-1 text-sm text-center text-gray-600">Please login to your account</p>

            <!-- Session Status -->
            <x-auth-session-status class="mt-4 mb-2" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}" class="mt-4">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block mb-1 text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-2 text-sm border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block mb-1 text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-2 text-sm border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between">
                    @if (Route::has('register'))
                        <a class="text-sm text-green-700 hover:underline" href="{{ route('register') }}">
                            {{ __('No account yet? Register') }}
                        </a>
                    @endif

                    <button type="submit"
                        class="px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-lg shadow hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
