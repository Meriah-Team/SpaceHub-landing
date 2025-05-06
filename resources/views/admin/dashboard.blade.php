<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceHub Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <div class="bg-[var(--color-spacehub-dark)] text-white w-64 py-6 px-4 flex-shrink-0 hidden md:block">
            <div class="mb-8">
                <img src="{{ asset('images/spacehublogo.png') }}" alt="SpaceHub Logo" class="h-10">
            </div>
            
            <nav class="space-y-4">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded bg-[var(--color-spacehub)]">Dashboard</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-[var(--color-spacehub-light)]">Workspaces</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-[var(--color-spacehub-light)]">Feedback</a>
                <a href="#" class="block py-2 px-4 rounded hover:bg-[var(--color-spacehub-light)]">Settings</a>
                
                <form method="POST" action="{{ route('admin.logout') }}" class="mt-8">
                    @csrf
                    <button type="submit" class="w-full text-left py-2 px-4 rounded hover:bg-[var(--color-spacehub-light)]">
                        Logout
                    </button>
                </form>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                <p class="text-gray-600">Welcome to the SpaceHub admin panel.</p>
            </div>
            
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold text-gray-700">Total Workspaces</h2>
                    <p class="text-3xl font-bold text-[var(--color-spacehub-dark)]">{{ $workspaceCount }}</p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold text-gray-700">Total Feedback</h2>
                    <p class="text-3xl font-bold text-[var(--color-spacehub-dark)]">{{ $feedbackCount }}</p>
                </div>
            </div>
            
            <!-- Recent Feedback -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Recent Feedback</h2>
                
                @if($recentFeedback->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentFeedback as $feedback)
                            <div class="border-b pb-4">
                                <p class="font-medium">{{ $feedback->name }}</p>
                                <p class="text-sm text-gray-500">{{ $feedback->email }}</p>
                                <p class="mt-2">{{ $feedback->message }}</p>
                                <p class="text-xs text-gray-400 mt-1">{{ $feedback->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">No feedback yet.</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
