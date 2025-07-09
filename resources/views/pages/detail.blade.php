<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail - {{ $workspace->name }}</title>
    <link rel="icon" href="{{ asset('images/squarelogo.png') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{asset('js/detail.js')}}"></script>

    <style>
        body{
            scroll-behavior: smooth;
        }

        /**
         * CSS untuk membuat iframe responsif
         *
         * Teknik ini menggunakan pendekatan "aspect ratio container" yang umum digunakan
         * untuk membuat elemen embedded seperti iframe, video, dll menjadi responsif.
         */
        .iframe-container {
            position: relative;     /* Diperlukan untuk pengaturan posisi absolute pada child */
            overflow: hidden;       /* Mencegah konten yang melebihi container terlihat */
            width: 100%;            /* Mengisi lebar parent sepenuhnya */
            height: 100%;           /* Mengisi tinggi yang tersedia */
            border-radius: 0.5rem;  /* Membuat sudut container menjadi rounded */
        }

        .iframe-container iframe {
            position: absolute;      /* Melepaskan dari normal flow untuk mengisi container */
            top: 0;                  /* Posisikan dari atas container */
            left: 0;                 /* Posisikan dari kiri container */
            width: 100% !important;  /* Memaksa lebar 100% dan menimpa atribut width inline */
            height: 100% !important; /* Memaksa tinggi 100% dan menimpa atribut height inline */
            border-radius: 0.5rem;   /* Sudut rounded agar selaras dengan container */
            border: 0;               /* Menghilangkan border default dari iframe */
        }
    </style>

</head>

<body class="overflow-x-hidden">
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
                        <x-nav-link href="#hero" :active="false" @click="isOpen = false">Beranda</x-nav-link>
                        <x-nav-link href="#deskripsi" :active="false" @click="isOpen = false">Deskripsi</x-nav-link>
                        <x-nav-link href="#room" :active="false" @click="isOpen = false">Ruangan</x-nav-link>
                        <x-nav-link href="#table" :active="false" @click="isOpen = false">Meja</x-nav-link>
                        <x-nav-link href="#maps" :active="false" @click="isOpen = false">Google Maps</x-nav-link>
                        <x-nav-link href="#recommendation" :active="false" @click="isOpen = false">Rekomendasi</x-nav-link>
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
                            <x-nav-link href="#hero" :active="false">Beranda</x-nav-link>
                            <x-nav-link href="#deskripsi" :active="false">Deskripsi</x-nav-link>
                            <x-nav-link href="#about" :active="false">Ruangan</x-nav-link>
                            <x-nav-link href="#mitra" :active="false">Meja</x-nav-link>
                            <x-nav-link href="#about" :active="false">Google Maps</x-nav-link>
                            <x-nav-link href="#mitra" :active="false">Rekomendasi</x-nav-link>
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
                    <div class="relative">
                        @if($workspace->description_images && count($workspace->description_images) > 0)
                            <img
                            src="{{ asset('storage/' . $workspace->description_images[0]) }}"
                            alt="Main Image"
                            class="w-full h-80 object-cover rounded-lg main-image"
                            id="main-image"
                            >
                        @else
                            {{-- No images placeholder --}}
                            <div class="w-full h-80 bg-gray-200 rounded-lg flex items-center justify-center main-image" id="main-image">
                                <p class="text-gray-500 text-lg">Tidak ada gambar</p>
                            </div>
                        @endif

                        @if($workspace->description_images && count($workspace->description_images) > 1)
                        <button
                        class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 focus:outline-none carousel-prev"
                        aria-label="Previous Image"
                        >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        </button>
                        <button
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-gray-800 bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 focus:outline-none carousel-next"
                        aria-label="Next Image"
                        >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        </button>
                        @endif
                    </div>

                    <div class="grid grid-cols-3 gap-4 mt-4 w-full">
                        @if($workspace->description_images && count($workspace->description_images) > 0)
                            @php
                                $totalImages = count($workspace->description_images);
                                $displayedImages = array_slice($workspace->description_images, 0, 3);
                            @endphp
                            @foreach($displayedImages as $index => $image)
                                @if($index === 2 && $totalImages > 3)
                                    {{-- Last thumbnail with +N overlay --}}
                                    <div class="relative cursor-pointer thumbnail transition-opacity hover:opacity-75" data-index="{{ $index }}">
                                        <img
                                            src="{{ asset('storage/' . $image) }}"
                                            alt="Thumbnail {{ $index + 1 }}"
                                            class="w-full h-24 object-cover rounded"
                                        >
                                        <div class="absolute inset-0 bg-black bg-opacity-60 rounded flex items-center justify-center">
                                            <span class="text-white text-lg font-bold">+{{ $totalImages - 3 }}</span>
                                        </div>
                                    </div>
                                @else
                                    {{-- Regular thumbnail --}}
                                    <img
                                        src="{{ asset('storage/' . $image) }}"
                                        alt="Thumbnail {{ $index + 1 }}"
                                        class="w-full h-24 object-cover rounded cursor-pointer thumbnail transition-opacity hover:opacity-75"
                                        data-index="{{ $index }}"
                                    >
                                @endif
                            @endforeach
                        @else
                            {{-- No thumbnails placeholder --}}
                            <div class="w-full h-24 bg-gray-200 rounded flex items-center justify-center">
                                <p class="text-gray-500 text-xs">Tidak ada gambar</p>
                            </div>
                            <div class="w-full h-24 bg-gray-200 rounded flex items-center justify-center">
                                <p class="text-gray-500 text-xs">Tidak ada gambar</p>
                            </div>
                            <div class="w-full h-24 bg-gray-200 rounded flex items-center justify-center">
                                <p class="text-gray-500 text-xs">Tidak ada gambar</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flex flex-col gap-y-3 mt-6 lg:mt-10 w-full lg:w-1/2">
                    <h1 class="font-bold text-2xl sm:text-3xl lg:text-4xl">{{ $workspace->name }}</h1>
                    <div class="flex gap-x-2 mt-3 items-center">
                        <img src="{{asset('img/location.png')}}" alt="Location" class="w-5 h-5">
                        <h1 class="text-gray-500 text-sm sm:text-base">{{ $workspace->address }}</h1>
                    </div>
                    <div class="flex gap-x-2 items-center">
                        <img src="{{asset('img/Calendar.png')}}" alt="Calendar" class="w-5 h-5">
                        <p class="text-gray-500 text-sm sm:text-base">Setiap Hari</p>
                    </div>
                    <div class="flex gap-x-2 items-center">
                        <img src="{{asset('img/Clock.png')}}" alt="Clock" class="w-5 h-5">
                        <p class="text-gray-500 text-sm sm:text-base">{{ $workspace->opening_time }} - {{ $workspace->closing_time }}</p>
                    </div>

                    <div class="flex flex-col gap-y-5 mt-6 w-full max-w-full">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="py-4 px-3 border border-gray-100 shadow-md rounded-xl bg-white">
                                <div class="flex items-center gap-x-2">
                                    <img src="{{asset('img/Clock.png')}}" alt="Clock" class="w-5 h-5">
                                    <p class="font-semibold">Pilihan Meja</p>
                                </div>
                                <p class="px-1 text-gray-600 mt-1">{{ $workspace->tables->count() }} Meja</p>
                            </div>
                            <div class="py-4 px-3 border border-gray-100 shadow-md rounded-xl bg-white">
                                <div class="flex items-center gap-x-2">
                                    <img src="{{asset('img/Clock.png')}}" alt="Clock" class="w-5 h-5">
                                    <p class="font-semibold">Pilihan Ruangan</p>
                                </div>
                                <p class="px-1 text-gray-600 mt-1">{{ $workspace->rooms->count() }} Ruangan</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="py-4 px-3 border border-gray-100 shadow-md rounded-xl bg-white">
                                <div class="flex items-center gap-x-2">
                                    <img src="{{asset('img/Clock.png')}}" alt="Clock" class="w-5 h-5">
                                    <p class="font-semibold">Daftar Menu</p>
                                </div>
                                <p class="px-1 text-gray-600 mt-1">Klik <span class="text-orange-500 font-bold">Menu</span></p>
                            </div>
                            <div class="py-4 px-3 border border-gray-100 shadow-md rounded-xl bg-white">
                                <div class="flex items-center gap-x-2">
                                    <img src="{{asset('img/Clock.png')}}" alt="Clock" class="w-5 h-5">
                                    <p class="font-semibold">Kontak WhatsApp</p>
                                </div>
                                <p class="px-1 text-gray-600 mt-1">
                                    Hubungi via
                                    <a href="https://wa.me/{{ $workspace->phone }}" class="text-green-500 font-bold hidden md:inline">WA</a>
                                    <a href="https://wa.me/{{ $workspace->phone }}" class="text-green-500 font-bold md:hidden sm:inline">WhatsApp</a>
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
                        {{ $workspace->description ?? 'No description available.' }}
                    </p>

                    <!-- Pilihan Ruangan -->
                    <section class="mt-10 flex flex-col">
                        <div class="flex items-center gap-x-4 font-semibold text-2xl sm:text-3xl mb-6">
                            <img src="{{asset('img/Room.png')}}" alt="Room" class="w-8 h-8">
                            Pilihan Ruangan
                        </div>

                        <!-- Ruangan -->
                        @foreach ($workspace->rooms as $room)
                        <div class="flex flex-col sm:flex-row border border-gray-200 bg-white gap-4 rounded-xl p-4 shadow-lg mt-4">
                            @if ($room->cover_image)
                                <img src="{{ $room->getCoverImageUrl() }}" alt="Room" class="w-full sm:w-1/3 h-48 object-cover rounded">
                            @else
                                <img src="{{asset('img/contoh1.png')}}" alt="Room" class="w-full sm:w-1/3 h-48 object-cover rounded">
                            @endif
                            <div class="flex flex-col">
                                <h2 class="text-lg sm:text-xl font-semibold">{{ $room->name }}</h2>
                                <div class="flex gap-x-3 mt-2">
                                    <div class="bg-green-500 rounded-xl text-xs sm:text-sm text-white px-2 py-1">Maks. {{$room->max_capacity}} Orang</div>
                                    <div class="bg-{{ $room->is_smoking ? 'green' : 'red' }}-500 rounded-xl text-xs sm:text-sm text-white px-2 py-1">{{ $room->is_smoking ? 'Smoking' : 'Non Smoking' }}</div>
                                </div>
                                <h2 class="text-orange-500 mt-2 font-semibold">
                                    @if($room->book_type)
                                        Mulai dari
                                    @else
                                        Mulai Dari
                                    @endif
                                </h2>
                                <h2 class="font-semibold text-base sm:text-lg">
                                    Rp. {{ number_format($room->starting_price, 0, ',', '.') }}
                                    @if($room->book_type)
                                        / jam
                                    @endif
                                </h2>
                            </div>
                        </div>

                        @endforeach

                    </section>

                    <!-- Pilihan Meja -->
                    <section class="mt-10 flex flex-col">
                        <div class="flex items-center font-semibold gap-x-4 text-2xl sm:text-3xl mb-5">
                            <img src="{{asset('img/Table.png')}}" alt="Table" class="w-8 h-8">
                            Pilihan Meja
                        </div>

                        @foreach ($workspace->tables as $table)
                        <!-- Meja -->
                        <div class="flex flex-col sm:flex-row border bg-white border-gray-200 gap-4 rounded-xl p-4 shadow-lg mt-4">
                            @if ($table->cover_image)
                                <img src="{{ $table->getCoverImageUrl() }}" alt="Table" class="w-full sm:w-1/3 h-48 object-cover rounded">
                            @else
                                <img src="{{asset('img/contoh1.png')}}" alt="Table" class="w-full sm:w-1/3 h-48 object-cover rounded">
                            @endif
                            <div class="flex flex-col">
                                <h2 class="text-lg sm:text-xl font-semibold">{{ $table->name }}</h2>
                                <div class="flex gap-x-3 mt-2">
                                    <div class="bg-green-500 rounded-xl text-xs sm:text-sm text-white px-2 py-1">Maks. {{ $table->max_capacity }} Orang</div>
                                    <div class="bg-{{ $table->is_smoking ? 'green' : 'red' }}-500 rounded-xl text-xs sm:text-sm text-white px-2 py-1">Outdoor</div>
                                </div>
                                <h2 class="text-orange-500 mt-2 font-semibold">
                                    @if($table->book_type)
                                        Hourly
                                    @else
                                        Minimal Order
                                    @endif
                                </h2>
                                <h2 class="font-semibold text-base sm:text-lg">
                                    Rp. {{ number_format($table->starting_price, 0, ',', '.') }}
                                    @if($table->book_type)
                                        / jam
                                    @endif
                                </h2>
                            </div>
                        </div>

                        @endforeach

                    </section>
                </div>

                <div class="w-full lg:w-3/8" id="maps">
                    <p class="text-center text-2xl sm:text-3xl font-semibold">Temukan Lokasi Tempat di <span class="text-orange-500">Maps</span></p>
                    <div class="w-full h-auto border bg-white border-gray-200 shadow-xl rounded-xl mt-5 p-5">
                        <!--
                            Container untuk Google Maps dengan tinggi tetap (h-64 = 16rem)
                            Container ini memiliki tinggi tetap untuk memastikan proporsi peta yang konsisten
                        -->
                        <div class="w-full h-64" id="peta">
                            @if($workspace->iframe)
                                <!--
                                    iframe-container: Container khusus untuk membuat iframe responsif
                                    Struktur ini memungkinkan iframe menyesuaikan dengan container parent
                                    tanpa kehilangan proporsi dan tanpa mempengaruhi layout sekitarnya
                                -->
                                <div class="w-full h-full iframe-container">
                                    {!! $workspace->iframe !!}
                                </div>
                            @else
                                <!-- Tampilan fallback jika tidak ada iframe -->
                                <div class="w-full h-full flex items-center justify-center bg-gray-100 rounded-lg">
                                    <p class="text-gray-500">Peta tidak tersedia</p>
                                </div>
                            @endif
                        </div>
                        <div class="flex flex-col items-start" id="fasilitas">
                            <h2 class="text-xl sm:text-2xl font-semibold mt-5">Fasilitas Lokasi</h2>
                            <ul class="text-sm font-medium list-disc flex flex-col ml-5 gap-y-1 mt-1">
                            @foreach ($workspace->facilities ?? [] as $facility)
                                <li>{{ $facility }}</li>
                            @endforeach

                            </ul>

                            @if($workspace->maps)
                                <a href="{{ $workspace->maps }}" target="_blank" class="w-full text-center text-sm sm:text-base text-white bg-[#363062] p-2 rounded-xl mt-5 transition ease-in-out hover:-translate-y-1 duration-300">Buka Maps</a>
                            @endif
                        </div>
                    </div>
                    <h1 class="mt-10 text-2xl sm:text-3xl font-bold mb-3">Hubungi Sekarang</h1>
                    <div class="flex flex-col border border-gray-200 w-full text-start py-5 px-6 sm:px-8 rounded-xl shadow-xl bg-white">
                        <div class="flex justify-between items-center">
                            <div class="flex flex-col text-sm">
                                <h1 class="font-semibold text-xl sm:text-2xl">Kontak WhatsApp</h1>
                                <h3 class="text-lg sm:text-xl">Hubungi via <span class="text-green-400 font-bold">WhatsApp</span></h3>
                            </div>
                            <img src="{{asset('img/Phone.png')}}" alt="Phone" class="w-8 h-8">
                        </div>
                        <a href="https://wa.me/{{ $workspace->phone }}" class="w-full text-center text-sm sm:text-base text-white bg-[#00C652] p-2 rounded-xl mt-6 transition ease-in-out hover:-translate-y-1 duration-300">Chat WhatsApp</a>
                    </div>

                    <h1 class="mt-10 text-2xl sm:text-3xl font-bold mb-3">Social Media</h1>
                    <div class="w-full p-5 flex flex-col border rounded-xl shadow-xl bg-white border-gray-200 gap-y-2">

                        {{-- Instagram --}}
                        <h1 class="text-sm sm:text-base"><span class="font-semibold">Instagram : </span> <a href="https://www.instagram.com/{{ $workspace->instagram }}">{{ $workspace->instagram }}</a></h1>

                        {{-- Tiktok --}}
                        <h1 class="text-sm sm:text-base"><span class="font-semibold">TikTok : </span> <a href="https://www.tiktok.com/{{ $workspace->tiktok }}">{{ $workspace->tiktok }}</a></h1>

                    </div>
                </div>
            </div>

            <!-- Rekomendasi -->
            <section class="mt-10 flex flex-col mb-20">
                <div class="font-semibold text-2xl sm:text-3xl mb-6">Rekomendasi Tempat Lainnya</div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Rekomendasi -->
                    @foreach ($recommendedWorkspaces as $recommended)
                    <div class="border border-gray-200 rounded-xl p-4 flex flex-col shadow-xl bg-white">
                        @if($recommended->cover_image)
                            <img src="{{ $recommended->getCoverImageUrl() }}" alt="Recommendation" class="w-full h-48 object-cover rounded">
                        @else
                            <div class="w-full h-48 bg-gray-200 rounded flex items-center justify-center">
                                <p class="text-gray-500 text-sm">Tidak ada gambar</p>
                            </div>
                        @endif
                        <h1 class="mt-2 text-base sm:text-lg font-semibold">{{ $recommended->name }}</h1>
                        <div class="flex items-center mt-2">
                            <img src="{{asset('img/GrayMap.png')}}" alt="Map" class="w-4 h-4 mr-2">
                            <p class="text-gray-400 text-sm">{{ $recommended->address }}</p>
                        </div>
                        <div class="flex items-center mt-1">
                            <img src="{{asset('img/GrayJam.png')}}" alt="Clock" class="w-4 h-4 mr-2">
                            <p class="text-gray-400 text-sm">{{ $recommended->opening_time }} - {{ $recommended->closing_time }}</p>
                        </div>
                        <a href="{{ route('landing.detail', $recommended->id) }}">
                            <div class="w-full rounded-lg text-center text-white mt-4 bg-[#363062] py-2 px-4 hover:bg-[#2F327D] text-sm sm:text-base">Detail</div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </section>

        </section>

        <div class="w-full h-px bg-[#2F327D]"></div>

        <!-- Footer -->
        <x-footer></x-footer>
    </div>

    <div class="blur-circle top-350 -right-48"></div>
</div>

{{-- JavaScript untuk Carousel Description Images --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const mainImage = document.getElementById('main-image');
        const thumbnails = document.querySelectorAll('.thumbnail');
        const nextButton = document.querySelector('.carousel-next');
        const prevButton = document.querySelector('.carousel-prev');

        // Check if we have description images
        const hasDescriptionImages = {{ $workspace->description_images && count($workspace->description_images) > 0 ? 'true' : 'false' }};

        // Create an array of all image sources from description_images
        const allImages = [
            @if($workspace->description_images && count($workspace->description_images) > 0)
                @foreach ($workspace->description_images as $image)
                    "{{ asset('storage/' . $image) }}",
                @endforeach
            @endif
        ];

        let currentIndex = 0;

        // Debug: Log available images
        console.log('Has description images:', hasDescriptionImages);
        console.log('Available images:', allImages);
        console.log('Total images:', allImages.length);

        // Function to update the main image
        function updateMainImage(index) {
            // Only update if we have actual images
            if (hasDescriptionImages && allImages[index]) {
                // Check if mainImage is an img element
                if (mainImage.tagName === 'IMG') {
                    mainImage.src = allImages[index];
                    mainImage.alt = `Image ${index + 1}`;
                } else {
                    // If it's a div (no images placeholder), replace it with an img
                    const newImg = document.createElement('img');
                    newImg.src = allImages[index];
                    newImg.alt = `Image ${index + 1}`;
                    newImg.className = 'w-full h-80 object-cover rounded-lg main-image';
                    newImg.id = 'main-image';
                    mainImage.parentNode.replaceChild(newImg, mainImage);
                }
                currentIndex = index;

                // Update thumbnail active state
                thumbnails.forEach((thumb, i) => {
                    if (i === index) {
                        thumb.classList.add('ring-2', 'ring-blue-500', 'opacity-100');
                    } else {
                        thumb.classList.remove('ring-2', 'ring-blue-500');
                        thumb.classList.add('opacity-75');
                    }
                });
            }
        }

        // Only add event listeners if we have multiple images
        if (hasDescriptionImages && allImages.length > 1) {
            // Next button click handler
            if (nextButton) {
                nextButton.addEventListener('click', () => {
                    currentIndex = (currentIndex + 1) % allImages.length; // Cycle to next image
                    updateMainImage(currentIndex);
                });
            }

            // Previous button click handler
            if (prevButton) {
                prevButton.addEventListener('click', () => {
                    currentIndex = (currentIndex - 1 + allImages.length) % allImages.length; // Cycle to previous image
                    updateMainImage(currentIndex);
                });
            }

            // Click on thumbnail to update main image
            thumbnails.forEach((thumbnail) => {
                thumbnail.addEventListener('click', () => {
                    const index = parseInt(thumbnail.getAttribute('data-index'));
                    updateMainImage(index);
                });
            });
        }

        // Set initial active thumbnail only if we have images
        if (hasDescriptionImages && allImages.length > 0) {
            updateMainImage(0);
        }
    });
</script>

<script>
    /**
     * Script untuk membuat iframe Google Maps menjadi responsif
     *
     * Script ini mendeteksi iframe yang ada dalam container dan menyesuaikan ukurannya
     * agar dapat mengisi ruang container secara penuh. Hal ini diperlukan karena
     * secara default, iframe Google Maps memiliki width dan height yang tetap (fixed)
     * yang diberikan oleh Google saat kode embed dibuat.
     */
    document.addEventListener('DOMContentLoaded', function() {
        // Tunggu hingga DOM sepenuhnya dimuat sebelum memanipulasi elemen

        // Cari container yang menampung iframe
        const iframeContainer = document.querySelector('.iframe-container');

        if (iframeContainer) {
            // Dapatkan iframe yang ada di dalam container
            const iframe = iframeContainer.querySelector('iframe');

            if (iframe) {
                // Hapus atribut width dan height default dari iframe
                // Ini penting karena atribut ini akan mengganti style CSS
                iframe.removeAttribute('width');
                iframe.removeAttribute('height');

                // Terapkan style lebar dan tinggi 100% secara langsung ke iframe
                // Ini memastikan iframe akan mengisi container sepenuhnya
                iframe.style.width = '100%';
                iframe.style.height = '100%';

                // Catatan: CSS telah mengatur position: absolute untuk iframe
                // sehingga iframe dapat mengisi area container dengan benar
            }
        }
    });
</script>
</body>
</html>
