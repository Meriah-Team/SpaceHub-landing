<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-x-hidden relative">
    <!-- Circle Ungu -->
    <div class="absolute bg-[#7358FF] rounded-l-full right-0 w-[18.75rem] h-[37.5rem] hidden sm:block top-50"></div>
    <!-- Circle Hijau -->
    <div class="absolute bg-green-400 rounded-l-full right-0 w-[50px] h-[100px] top-180 hidden sm:block"></div>

    <div class="relative py-4 h-full w-full flex flex-col items-center justify-center px-4 sm:px-6 lg:px-10">

        <div class="blur-circle -top-100 -left-24"></div>

        <div class="max-w-[90rem] w-full">

            <!-- Mobile Navigation -->
            <nav x-data="{ isOpen: false }" class="md:hidden shadow-lg">
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
                            <x-nav-link href="/#hero" :active="request()->is('/')" @click="isOpen = false">Beranda</x-nav-link>
                            <x-nav-link href="/#katalog" :active="false" @click="isOpen = false">Katalog</x-nav-link>
                            <x-nav-link href="/#about" :active="false" @click="isOpen = false">Tentang Kami</x-nav-link>
                            <x-nav-link href="/#mitra" :active="false" @click="isOpen = false">Mitra</x-nav-link>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Desktop Navigation -->
            <nav class="hidden md:block">
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
                    </div>
                </div>
            </nav>

            <!-- Hero -->
            <section class="w-full mt-10 flex flex-col md:px-4 sm:px-8 lg:px-14" id="hero">
                <x-breadcrumbs :breadcrumbs="[['label' => 'Home', 'url' => route('landing.index')], ['label' => 'Katalog', 'url' => route('landing.explore')], ['label' => 'Detail']]" />

                <div class="flex flex-col lg:flex-row gap-8 lg:gap-20 justify-between w-full mt-5">
                    <div class="flex flex-col w-full lg:w-1/2">
                        <div>
                            <img src="{{asset('img/MainImg.png')}}" alt="Main Image" class="w-full h-auto rounded-lg">
                        </div>
                        <div class="grid grid-cols-3 gap-4 mt-4 w-full">
                            <img src="{{asset('img/image.png')}}" alt="Thumbnail" class="w-full h-auto rounded">
                            <img src="{{asset('img/image3.png')}}" alt="Thumbnail" class="w-full h-auto rounded">
                            <img src="{{asset('img/image2.png')}}" alt="Thumbnail" class="w-full h-auto rounded">
                        </div>
                    </div>

                    <div class="flex flex-col gap-y-3 mt-6 lg:mt-10 w-full lg:w-1/2">
                        <h1 class="font-bold text-2xl sm:text-3xl lg:text-4xl">Virtual Office (vOffice)</h1>
                        <div class="flex gap-x-2 mt-3 items-center">
                            <img src="{{asset('img/location.png')}}" alt="Location" class="w-5 h-5">
                            <h1 class="text-gray-500 text-sm sm:text-base">Jl. Braga No. 109, Bandung</h1>
                        </div>
                        <div class="flex gap-x-2 items-center">
                            <img src="{{asset('img/calendar.png')}}" alt="Calendar" class="w-5 h-5">
                            <p class="text-gray-500 text-sm sm:text-base">Setiap Hari</p>
                        </div>
                        <div class="flex gap-x-2 items-center">
                            <img src="{{asset('img/clock.png')}}" alt="Clock" class="w-5 h-5">
                            <p class="text-gray-500 text-sm sm:text-base">08.00 - 17.00</p>
                        </div>

                        <div class="flex flex-col gap-y-5 mt-6 w-full max-w-full">

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="py-4 px-3 border border-gray-100 shadow-md rounded-xl bg-white">
                                    <div class="flex items-center gap-x-2">
                                        <img src="{{asset('img/clock.png')}}" alt="Clock" class="w-5 h-5">
                                        <p class="font-semibold">Pilihan Meja</p>
                                    </div>
                                    <p class="px-1 text-gray-600 mt-1">6 Meja</p>
                                </div>
                                <div class="py-4 px-3 border border-gray-100 shadow-md rounded-xl bg-white">
                                    <div class="flex items-center gap-x-2">
                                        <img src="{{asset('img/clock.png')}}" alt="Clock" class="w-5 h-5">
                                        <p class="font-semibold">Pilihan Ruangan</p>
                                    </div>
                                    <p class="px-1 text-gray-600 mt-1">3 Ruangan</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="py-4 px-3 border border-gray-100 shadow-md rounded-xl bg-white">
                                    <div class="flex items-center gap-x-2">
                                        <img src="{{asset('img/clock.png')}}" alt="Clock" class="w-5 h-5">
                                        <p class="font-semibold">Daftar Menu</p>
                                    </div>
                                    <p class="px-1 text-gray-600 mt-1">Klik <span class="text-orange-500 font-bold">Menu</span></p>
                                </div>
                                <div class="py-4 px-3 border border-gray-100 shadow-md rounded-xl bg-white">
                                    <div class="flex items-center gap-x-2">
                                        <img src="{{asset('img/clock.png')}}" alt="Clock" class="w-5 h-5">
                                        <p class="font-semibold">Kontak WhatsApp</p>
                                    </div>
                                    <p class="px-1 text-gray-600 mt-1">
                                        Hubungi via
                                        <span class="text-green-500 font-bold hidden md:inline">WA</span>
                                        <span class="text-green-500 font-bold md:hidden sm:inline">WhatsApp</span>
                                      </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Deskripsi -->
            <section class="mt-10 flex flex-col px-4 sm:px-8 lg:px-14" id="deskripsi">
                <div class="flex flex-col lg:flex-row gap-[5rem]">
                    <div class="w-full lg:w-5/8">
                        <!-- Deskripsi -->
                        <div class="text-2xl sm:text-3xl font-semibold">Deskripsi Lokasi</div>
                        <p class="mt-6 text-gray-700 text-sm sm:text-base">
                            Terletak di Jalan Braga, vOffice menawarkan suasana kerja yang profesional dengan ruang modern yang nyaman. Cocok bagi pekerja yang membutuhkan kantor virtual dengan fasilitas lengkap. Ruangan ini memiliki desain minimalis yang membantu meningkatkan produktivitas.
                        </p>
                        <!-- Pilihan Ruangan -->
                        <section class="mt-10 flex flex-col">
                            <div class="flex items-center gap-x-4 font-semibold text-2xl sm:text-3xl mb-6">
                                <img src="{{asset('img/Room.png')}}" alt="Room" class="w-8 h-8">
                                Pilihan Ruangan
                            </div>
                            <!-- Ruangan -->
                            <div class="flex flex-col sm:flex-row border border-gray-200 bg-white gap-4 rounded-xl p-4 shadow-lg mt-4">
                                <img src="{{asset('img/contoh1.png')}}" alt="Room" class="w-full sm:w-1/3 h-auto rounded">
                                <div class="flex flex-col">
                                    <h2 class="text-lg sm:text-xl font-semibold">Melawai Room</h2>
                                    <div class="flex gap-x-3 mt-2">
                                        <div class="bg-green-500 rounded-xl text-xs sm:text-sm text-white px-2 py-1">Maks. 8 Orang</div>
                                        <div class="bg-red-500 rounded-xl text-xs sm:text-sm text-white px-2 py-1">Non Smoking</div>
                                    </div>
                                    <h2 class="text-orange-500 mt-2 font-semibold">Mulai Dari</h2>
                                    <h2 class="font-semibold text-base sm:text-lg">Rp. 90.000 / 2 jam</h2>
                                </div>
                            </div>

                        </section>
                        <!-- Pilihan Meja -->
                        <section class="mt-10 flex flex-col">
                            <div class="flex items-center font-semibold gap-x-4 text-2xl sm:text-3xl mb-5">
                                <img src="{{asset('img/Table.png')}}" alt="Table" class="w-8 h-8">
                                Pilihan Meja
                            </div>
                            <!-- Meja -->
                            <div class="flex flex-col sm:flex-row border bg-white border-gray-200 gap-4 rounded-xl p-4 shadow-lg mt-4">
                                <img src="{{asset('img/contoh1.png')}}" alt="Table" class="w-full sm:w-1/3 h-auto rounded">
                                <div class="flex flex-col">
                                    <h2 class="text-lg sm:text-xl font-semibold">Melawai Room</h2>
                                    <div class="flex gap-x-3 mt-2">
                                        <div class="bg-green-500 rounded-xl text-xs sm:text-sm text-white px-2 py-1">3 - 5 Orang</div>
                                        <div class="bg-red-500 rounded-xl text-xs sm:text-sm text-white px-2 py-1">Outdoor</div>
                                    </div>
                                    <h2 class="text-orange-500 mt-2 font-semibold">Minimal Order</h2>
                                    <h2 class="font-semibold text-base sm:text-lg">Rp. 100.000 / 2 jam</h2>
                                </div>
                            </div>

                        </section>
                    </div>

                    <div class="md:w-[60rem] lg:w-3/8 sm:w-full" id="maps">
                        <p class="text-center text-2xl sm:text-3xl font-semibold">Temukan Lokasi Tempat di <span class="text-orange-500">Maps</span></p>
                        <div class="w-full h-auto border bg-white border-gray-200 shadow-xl rounded-xl mt-5 p-5">
                            <div class="w-full h-64" id="peta">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2027677.9212814716!2d105.19650925625!3d-6.972890399999993!2m3!1f0!2f0!3f0!3m2!1i104!2i768!4f13.1!3m3!1m2!1s0x2e68e969bc54be89%3A0x2cde296cfcd5b037!2sDiagram%20Coffee%20%26%20Space!5e0!3m2!1sen!2sid!4v1745821243003!5m2!1sen!2sid" width="100%" height="100%" style="border-radius:20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="flex flex-col items-start" id="fasilitas">
                                <h2 class="text-xl sm:text-2xl font-semibold mt-5">Fasilitas Lokasi</h2>
                                <ul class="text-sm font-medium list-disc flex flex-col ml-5 gap-y-1 mt-1">
                                    <li>Parkir Mobil</li>
                                    <li>Parkir Motor</li>
                                    <li>Keamanan 24 Jam</li>
                                    <li>Rak Helm</li>
                                </ul>
                                <a href="#" class="w-full text-center text-sm sm:text-base text-white bg-[#363062] p-2 rounded-xl mt-5 transition ease-in-out hover:-translate-y-1 duration-300">Buka Maps</a>
                            </div>
                        </div>
                        <h1 class="mt-10 text-2xl sm:text-3xl font-bold mb-3">Hubungi Sekarang</h1>
                        <div class="flex flex-col border border-gray-200 w-full text-start py-5 px-6 sm:px-8 rounded-xl shadow-xl bg-white">
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col text-sm">
                                    <h1 class="font-semibold text-xl sm:text-2xl">Kontak WhatsApp</h1>
                                    <h3 class="text-lg sm:text-xl">Hubungi via <span class="text-green-400 font-bold">WhatsApp</span></h3>
                                </div>
                                <img src="{{asset('img/phone.png')}}" alt="Phone" class="w-8 h-8">
                            </div>
                            <div class="w-full text-center text-sm sm:text-base text-white bg-[#00C652] p-2 rounded-xl mt-6">Chat WhatsApp</div>
                        </div>
                        <h1 class="mt-10 text-2xl sm:text-3xl font-bold mb-3">Social Media</h1>
                        <div class="w-full p-5 flex flex-col border rounded-xl shadow-xl bg-white border-gray-200 gap-y-2">
                            <h1 class="text-sm sm:text-base"><span class="font-semibold">Instagram : </span> @voffice_bdg</h1>
                            <h1 class="text-sm sm:text-base"><span class="font-semibold">TikTok : </span> @voffice_bdg</h1>
                        </div>
                    </div>
                </div>

                <!-- Rekomendasi -->
                <section class="mt-10 flex flex-col mb-20">
                    <div class="font-semibold text-2xl sm:text-3xl mb-6">Rekomendasi Tempat Lainnya</div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Rekomendasi -->
                        <div class="border border-gray-200 rounded-xl p-4 flex flex-col shadow-xl bg-white">
                            <img src="{{asset('img/contoh1.png')}}" alt="Recommendation" class="w-full h-auto rounded">
                            <h1 class="mt-2 text-base sm:text-lg font-semibold">PointLab - Private Team/Individual Room</h1>
                            <div class="flex items-center mt-2">
                                <img src="{{asset('img/GrayMap.png')}}" alt="Map" class="w-4 h-4 mr-2">
                                <p class="text-gray-400 text-sm">Jl. Lengkong kecil, Bandung</p>
                            </div>
                            <div class="flex items-center mt-1">
                                <img src="{{asset('img/GrayJam.png')}}" alt="Clock" class="w-4 h-4 mr-2">
                                <p class="text-gray-400 text-sm">08.00 - 22.00</p>
                            </div>
                            <a href="/detail">
                                <div class="w-full rounded-lg text-center text-white mt-4 bg-[#363062] py-2 px-4 hover:bg-blue-700 text-sm sm:text-base">Detail</div>
                            </a>
                        </div>
                    </div>
                </section>

            </section>

            <div class="w-full h-px bg-[#2F327D]"></div>

            <!-- Footer -->
            <x-footer></x-footer>
        </div>

        <div class="blur-circle top-350 -right-48"></div>
    </div>

</body>
</html>
