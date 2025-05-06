<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceHub Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-white to-blue-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-8">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('images/spacehublogo.png') }}" alt="SpaceHub Logo" class="h-12">
        </div>

        <!-- Admin Alert -->
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-yellow-700">
                        This login is for administrative use only. Regular users do not need to login.
                    </p>
                </div>
            </div>
        </div>

        <!-- Login Form -->
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            
            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" id="email" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-[var(--color-spacehub)] focus:border-[var(--color-spacehub)]"
                    required autofocus>
                @error('email')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Password Field -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-[var(--color-spacehub)] focus:border-[var(--color-spacehub)]"
                    required>
                @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Remember Me -->
            <div class="flex items-center mb-6">
                <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-[var(--color-spacehub-dark)] focus:ring-[var(--color-spacehub)]">
                <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
            </div>
            
            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[var(--color-spacehub-dark)] hover:bg-[var(--color-spacehub)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--color-spacehub)]">
                    Sign in
                </button>
            </div>
        </form>
    </div>
</body>
</html>
