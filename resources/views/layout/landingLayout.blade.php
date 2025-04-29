<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceHub - {{ $title ?? "Your Space, Your Way!" }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <x-navbar></x-navbar>
    @yield('content')
    
    <!-- Back to Top Button -->
    <button id="backToTopBtn" 
            class="fixed bottom-6 right-6 p-3 rounded-full bg-[var(--color-spacehub-dark)] text-white shadow-lg 
                   opacity-0 transition-opacity duration-300 hover:bg-[var(--color-spacehub)] focus:outline-none z-50"
            aria-label="Back to top">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

    <script>
        // Back to Top Button functionality
        document.addEventListener('DOMContentLoaded', function() {
            const backToTopBtn = document.getElementById('backToTopBtn');
            
            // Show/hide button based on scroll position
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    backToTopBtn.classList.replace('opacity-0', 'opacity-100');
                } else {
                    backToTopBtn.classList.replace('opacity-100', 'opacity-0');
                }
            });
            
            // Scroll to top when clicked
            backToTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
    <x-footer></x-footer>
</body>

</html>
