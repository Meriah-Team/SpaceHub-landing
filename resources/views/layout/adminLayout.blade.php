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
            <div class="mb-8 bg-white p-2 rounded-md shadow-md">
                <img src="{{ asset('images/spacehublogo.png') }}" alt="SpaceHub Logo" class="h-10">
            </div>
            
            <nav class="space-y-4">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-[var(--color-spacehub)]' : 'hover:bg-[var(--color-spacehub-light)]' }}">Dashboard</a>
                <a href="{{ route('admin.workspace') }}" class="block py-2 px-4 rounded {{ request()->routeIs('admin.workspace') ? 'bg-[var(--color-spacehub)]' : 'hover:bg-[var(--color-spacehub-light)]' }}">Workspaces</a>
                <a href="{{ route('admin.feedback') }}" class="block py-2 px-4 rounded {{ request()->routeIs('admin.feedback') ? 'bg-[var(--color-spacehub)]' : 'hover:bg-[var(--color-spacehub-light)]' }}">Feedback</a>
                
                <form x-data method="POST" action="{{ route('admin.logout') }}" class="mt-8" @submit.prevent="confirmLogout">
                    @csrf
                    <button type="submit" class="w-full text-left py-2 px-4 rounded bg-red-500 hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-8">
            @yield('content')
        </div>
    </div>

    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out of the admin panel",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'var(--color-spacehub-dark)',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.closest('form').submit();
                }
            });
        }
    </script>
</body>
</html>
