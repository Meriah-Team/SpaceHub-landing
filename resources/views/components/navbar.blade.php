<!-- Mobile Navigation -->
<nav x-data="{ isOpen: false }" class="md:hidden bg-blue-50 shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex-shrink-0">
                <img src="{{ asset('images/spacehublogo.png') }}" alt="" class="h-8 w-auto">
            </div>
            <div class="mobile-menu">
                <button id="mobile-menu-button" @click="isOpen = !isOpen"
                    class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block size-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                        data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden size-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                        data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile Menu Dropdown -->
        <div x-show="isOpen" id="mobile-menu" class="md:hidden pb-3">
            <div class="flex flex-col space-y-2 text-center">
                <x-nav-link href="/#hero" :active="request()->is('/')">Beranda</x-nav-link>
                <x-nav-link href="/#katalog" :active="false">Katalog</x-nav-link>
                <x-nav-link href="/#about" :active="false">Tentang Kami</x-nav-link>
                <x-nav-link href="/#mitra" :active="false">Mitra</x-nav-link>
                <hr class="my-2">
                <a href="/onboarding"
                    class="border bg-[var(--color-spacehub)] text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-white hover:text-[var(--color-spacehub)] hover:border-[var(--color-spacehub)] text-center">Daftar</a>
            </div>
        </div>
    </div>
</nav>

<!-- Desktop Navigation -->
<nav class="hidden md:block bg-blue-50">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="/">
                        <img src="{{ asset('images/spacehublogo.png') }}" alt="logo spacehub"
                            class="h-8 w-auto transition-transform hover:scale-105">
                    </a>
                </div>
            </div>
            
            <!-- Centered navigation links -->
            <div class="flex-grow flex justify-center">
                <div class="flex items-center space-x-8">
                    <x-nav-link href="/#hero" :active="request()->is('/')">Beranda</x-nav-link>
                    <x-nav-link href="/#katalog" :active="false">Katalog</x-nav-link>
                    <x-nav-link href="/#about" :active="false">Tentang Kami</x-nav-link>
                    <x-nav-link href="/#mitra" :active="false">Mitra</x-nav-link>
                </div>
            </div>

            <div class="hidden md:block">
                <div class="flex items-center space-x-4">
                    <a href="#katalog"
                        class="bg-white text-red px-4 py-2 rounded-3xl text-sm font-medium border-1 border-gray-700 hover:bg-[var(--color-spacehub)] hover:text-white hover:border-0 transition-colors">Lihat Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</nav>
