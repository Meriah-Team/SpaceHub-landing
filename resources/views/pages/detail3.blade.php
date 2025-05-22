<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail | SpaceHub</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Jakarta+Sans:wght@700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-spacehub-dark: #2F327D;
            --color-spacehub: #3B82F6;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        h1, h2, h3, h4 {
            font-family: 'Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 lg:px-8 py-4 flex justify-between items-center">
            <div>
                <a href="/">
                    <img src="{{ asset('images/spacehublogo.png') }}" alt="SpaceHub Logo" class="h-8 w-auto">
                </a>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="/#hero" class="text-gray-600 hover:text-[var(--color-spacehub-dark)]">Beranda</a>
                <a href="/#katalog" class="text-gray-600 hover:text-[var(--color-spacehub-dark)]">Katalog</a>
                <a href="/#about" class="text-gray-600 hover:text-[var(--color-spacehub-dark)]">Tentang Kami</a>
                <a href="/#mitra" class="text-gray-600 hover:text-[var(--color-spacehub-dark)]">Mitra</a>
            </div>
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-600 hover:text-[var(--color-spacehub-dark)]">
                    <svg id="menu-icon" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-md">
            <div class="flex flex-col items-center py-4 space-y-2">
                <a href="/#hero" class="text-gray-600 hover:text-[var(--color-spacehub-dark)]">Beranda</a>
                <a href="/#katalog" class="text-gray-600 hover:text-[var(--color-spacehub-dark)]">Katalog</a>
                <a href="/#about" class="text-gray-600 hover:text-[var(--color-spacehub-dark)]">Tentang Kami</a>
                <a href="/#mitra" class="text-gray-600 hover:text-[var(--color-spacehub-dark)]">Mitra</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    {{-- <div id="hero" class="min-h-[70vh] bg-gradient-to-br from-blue-50 to-white relative overflow-hidden">
        <div class="container mx-auto px-4 lg:px-8 py-10">
            <!-- Breadcrumbs -->
            <nav class="flex mb-6" aria-label="Breadcrumb">
                <ol class="flex space-x-2 text-sm text-gray-500">
                    <li><a href="{{ route('landing.index') }}" class="hover:text-[var(--color-spacehub-dark)]">Home</a></li>
                    <li>/</li>
                    <li><a href="{{ route('landing.explore') }}" class="hover:text-[var(--color-spacehub-dark)]">Katalog</a></li>
                    <li>/</li>
                    <li class="text-[var(--color-spacehub-dark)]">{{ $workspace->name }}</li>
                </ol>
            </nav>

            <!-- Cover Image -->
            <div class="w-full h-64 md:h-96 mb-8 rounded-xl overflow-hidden">
                <img src="{{ $workspace->getCoverImageUrl() }}" alt="{{ $workspace->name }}" class="w-full h-full object-cover">
            </div>

            <div class="flex flex-col lg:flex-row gap-8 lg:gap-16">
                <!-- Left: Basic Info -->
                <div class="flex flex-col w-full lg:w-1/2">
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h1 class="font-bold text-2xl lg:text-4xl text-[var(--color-spacehub-dark)]">{{ $workspace->name }}</h1>
                        <div class="flex items-center gap-2 mt-3">
                            <img src="{{ asset('img/location.png') }}" alt="Location" class="w-5 h-5">
                            <p class="text-gray-500 text-sm lg:text-base">{{ $workspace->address }}</p>
                        </div>
                        <div class="flex items-center gap-2 mt-2">
                            <img src="{{ asset('img/calendar.png') }}" alt="Calendar" class="w-5 h-5">
                            <p class="text-gray-500 text-sm lg:text-base">Setiap Hari</p>
                        </div>
                        <div class="flex items-center gap-2 mt-2">
                            <img src="{{ asset('img/clock.png') }}" alt="Clock" class="w-5 h-5">
                            <p class="text-gray-500 text-sm lg:text-base">{{ $workspace->opening_time }} - {{ $workspace->closing_time }}</p>
                        </div>
                    </div>
                </div>

                <!-- Right: Details -->
                <div class="flex flex-col w-full lg:w-1/2 text-[var(--color-spacehub-dark)]">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-white rounded-xl shadow-md p-4">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('img/Table.png') }}" alt="Table" class="w-5 h-5">
                                <p class="font-semibold text-sm lg:text-base">Pilihan Meja</p>
                            </div>
                            <p class="text-gray-600 mt-1 text-sm">{{ $workspace->tables->count() }} Meja</p>
                        </div>
                        <div class="bg-white rounded-xl shadow-md p-4">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('img/Room.png') }}" alt="Room" class="w-5 h-5">
                                <p class="font-semibold text-sm lg:text-base">Pilihan Ruangan</p>
                            </div>
                            <p class="text-gray-600 mt-1 text-sm">{{ $workspace->rooms->count() }} Ruangan</p>
                        </div>
                        <div class="bg-white rounded-xl shadow-md p-4">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('img/clock.png') }}" alt="Menu" class="w-5 h-5">
                                <p class="font-semibold text-sm lg:text-base">Daftar Menu</p>
                            </div>
                            <p class="text-gray-600 mt-1 text-sm">Klik <a href="#" class="text-yellow-400 font-semibold">Menu</a></p>
                        </div>
                        <div class="bg-white rounded-xl shadow-md p-4">
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('img/phone.png') }}" alt="WhatsApp" class="w-5 h-5">
                                <p class="font-semibold text-sm lg:text-base">Kontak WhatsApp</p>
                            </div>
                            <p class="text-gray-600 mt-1 text-sm">
                                Hubungi via <a href="https://wa.me/{{ $workspace->phone }}" class="text-green-500 font-semibold">WhatsApp</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
        <section class="w-full mt-10 flex flex-col md:px-4 sm:px-8 lg:px-14" id="hero">
        <x-breadcrumbs :breadcrumbs="[['label' => 'Home', 'url' => route('landing.index')], ['label' => 'Katalog', 'url' => route('landing.explore')], ['label' => 'Detail']]" />

        <div class="flex flex-col lg:flex-row gap-8 lg:gap-20 justify-between w-full mt-5">

            <div class="flex flex-col w-full lg:w-1/2">
                <div class="relative">
                    <img
                    src="{{asset('img/MainImg.png')}}"
                    alt="Main Image"
                    class="w-full h-auto rounded-lg main-image"
                    id="main-image"
                    >
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
                </div>

                <div class="grid grid-cols-3 gap-4 mt-4 w-full">
                    <img
                        src="{{asset('img/image.png')}}"
                        alt="Thumbnail"
                        class="w-full h-auto rounded thumbnail"
                        data-index="1"
                    >
                    <img
                        src="{{asset('img/image3.png')}}"
                        alt="Thumbnail"
                        class="w-full h-auto rounded thumbnail"
                        data-index="2"
                    >
                    <img
                        src="{{asset('img/image2.png')}}"
                        alt="Thumbnail"
                        class="w-full h-auto rounded thumbnail"
                        data-index="3"
                    >
                </div>
            </div>

            {{-- Stack Image --}}
            {{-- <div class="flex flex-col w-full lg:w-1/2">
                <div class="relative">
                    <img
                    src="{{ asset('img/MainImg.png') }}"
                    alt="Main Image"
                    class="w-full h-auto rounded-lg main-image"
                    id="main-image"
                    >
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
                </div>

                <div class="grid grid-cols-3 gap-4 mt-4 w-full">
                    @php
                    $maxThumbnails = 3;
                    $totalImages = count($images); // Assume $images is an array of image paths
                    $displayedImages = array_slice($images, 0, $maxThumbnails);
                    @endphp

                    @foreach ($displayedImages as $index => $image)
                    @if ($index === $maxThumbnails - 1 && $totalImages > $maxThumbnails)
                        <div class="relative thumbnail" data-index="{{ $index }}" data-src="{{ asset('img/' . $image) }}">
                        <img
                            src="{{ asset('img/' . $image) }}"
                            alt="Thumbnail"
                            class="w-full h-auto rounded thumbnail-image"
                        >
                        <div class="absolute inset-0 bg-black bg-opacity-50 rounded flex items-center justify-center text-white text-lg font-bold">
                            +{{ $totalImages - $maxThumbnails }}
                        </div>
                        </div>
                    @else
                        <img
                        src="{{ asset('img/' . $image) }}"
                        alt="Thumbnail"
                        class="w-full h-auto rounded thumbnail"
                        data-index="{{ $index }}"
                        data-src="{{ asset('img/' . $image) }}"
                        >
                    @endif
                    @endforeach
                </div>
            </div> --}}

            <div class="flex flex-col gap-y-3 mt-6 lg:mt-10 w-full lg:w-1/2">
                <h1 class="font-bold text-2xl sm:text-3xl lg:text-4xl">{{ $workspace->name }}</h1>
                <div class="flex gap-x-2 mt-3 items-center">
                    <img src="{{asset('img/location.png')}}" alt="Location" class="w-5 h-5">
                    <h1 class="text-gray-500 text-sm sm:text-base">{{ $workspace->address }}</h1>
                </div>
                <div class="flex gap-x-2 items-center">
                    <img src="{{asset('img/calendar.png')}}" alt="Calendar" class="w-5 h-5">
                    <p class="text-gray-500 text-sm sm:text-base">Setiap Hari</p>
                </div>
                <div class="flex gap-x-2 items-center">
                    <img src="{{asset('img/clock.png')}}" alt="Clock" class="w-5 h-5">
                    <p class="text-gray-500 text-sm sm:text-base">{{ $workspace->opening_time }} - {{ $workspace->closing_time }}</p>
                </div>

                <div class="flex flex-col gap-y-5 mt-6 w-full max-w-full">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="py-4 px-3 border border-gray-100 shadow-md rounded-xl bg-white">
                            <div class="flex items-center gap-x-2">
                                <img src="{{asset('img/clock.png')}}" alt="Clock" class="w-5 h-5">
                                <p class="font-semibold">Pilihan Meja</p>
                            </div>
                            <p class="px-1 text-gray-600 mt-1">{{ $workspace->tables->count() }} Meja</p>
                        </div>
                        <div class="py-4 px-3 border border-gray-100 shadow-md rounded-xl bg-white">
                            <div class="flex items-center gap-x-2">
                                <img src="{{asset('img/clock.png')}}" alt="Clock" class="w-5 h-5">
                                <p class="font-semibold">Pilihan Ruangan</p>
                            </div>
                            <p class="px-1 text-gray-600 mt-1">{{ $workspace->rooms->count() }} Ruangan</p>
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
                                <a href="https://wa.me/{{ $workspace->phone }}" class="text-green-500 font-bold hidden md:inline">WA</a>
                                <a href="https://wa.me/{{ $workspace->phone }}" class="text-green-500 font-bold md:hidden sm:inline">WhatsApp</a>
                                </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <!-- Description Section -->
    <section id="deskripsi" class="bg-blue-50 px-6 md:px-20 py-12">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8 lg:gap-16">
                <!-- Left: Description, Rooms, Tables -->
                <div class="w-full lg:w-2/3">
                    <div class="flex items-center gap-2 mb-5">
                        <div class="w-3 h-3 bg-[var(--color-spacehub)]"></div>
                        <p class="text-lg text-[var(--color-spacehub-dark)]">Deskripsi Lokasi</p>
                    </div>
                    <h2 class="font-bold text-xl lg:text-3xl text-[var(--color-spacehub-dark)] mb-5">{{ $workspace->name }}</h2>
                    <p class="text-sm lg:text-base text-gray-700 mb-8">{{ $workspace->description ?? 'No description available.' }}</p>

                    <!-- Rooms -->
                    <div class="mt-10">
                        <div class="flex items-center gap-2 mb-5">
                            <img src="{{ asset('img/Room.png') }}" alt="Room" class="w-8 h-8">
                            <h3 class="font-semibold text-lg lg:text-2xl text-[var(--color-spacehub-dark)]">Pilihan Ruangan</h3>
                        </div>
                        @foreach ($workspace->rooms as $room)
                            <div class="bg-white rounded-xl shadow-md p-4 mb-4">
                                <div class="flex flex-col">
                                    <h4 class="font-semibold text-lg">{{ $room->name }}</h4>
                                    <div class="flex gap-2 mt-2">
                                        <span class="bg-green-500 text-white text-xs sm:text-sm px-2 py-1 rounded-xl">Maks. {{ $room->max_capacity }} Orang</span>
                                        <span class="bg-{{ $room->is_smoking ? 'green' : 'red' }}-500 text-white text-xs sm:text-sm px-2 py-1 rounded-xl">{{ $room->is_smoking ? 'Smoking' : 'Non Smoking' }}</span>
                                    </div>
                                    <p class="text-yellow-400 font-semibold mt-2">Mulai Dari</p>
                                    <p class="font-semibold text-base">Rp. {{ number_format($room->starting_price, 0, ',', '.') }} / 2 jam</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Tables -->
                    <div class="mt-10">
                        <div class="flex items-center gap-2 mb-5">
                            <img src="{{ asset('img/Table.png') }}" alt="Table" class="w-8 h-8">
                            <h3 class="font-semibold text-lg lg:text-2xl text-[var(--color-spacehub-dark)]">Pilihan Meja</h3>
                        </div>
                        @foreach ($workspace->tables as $table)
                            <div class="bg-white rounded-xl shadow-md p-4 mb-4">
                                <div class="flex flex-col">
                                    <h4 class="font-semibold text-lg">{{ $table->name }}</h4>
                                    <div class="flex gap-2 mt-2">
                                        <span class="bg-green-500 text-white text-xs sm:text-sm px-2 py-1 rounded-xl">{{ $table->max_capacity }} Orang</span>
                                        <span class="bg-{{ $table->is_smoking ? 'green' : 'red' }}-500 text-white text-xs sm:text-sm px-2 py-1 rounded-xl">{{ $table->is_smoking ? 'Indoor' : 'Outdoor' }}</span>
                                    </div>
                                    <p class="text-yellow-400 font-semibold mt-2">Minimal Order</p>
                                    <p class="font-semibold text-base">Rp. {{ number_format($table->starting_price, 0, ',', '.') }} / 2 jam</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Right: Map, Facilities, Contact -->
                <div class="w-full lg:w-1/3">
                    <div class="flex items-center gap-2 mb-5">
                        <div class="w-3 h-3 bg-[var(--color-spacehub)]"></div>
                        <p class="text-lg text-[var(--color-spacehub-dark)]">Temukan Lokasi</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-md p-5">
                        <div class="w-full h-64">
                            <iframe src="{{ $workspace->maps }}" width="100%" height="100%" style="border-radius:10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <h3 class="font-semibold text-lg mt-5">Fasilitas Lokasi</h3>
                        <ul class="text-sm list-disc ml-5 mt-2">
                            @foreach ($workspace->facilities ?? [] as $facility)
                                <li>{{ $facility }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ $workspace->maps }}" target="_blank" class="block text-center text-white bg-[var(--color-spacehub-dark)] px-4 py-2 rounded-full mt-4 hover:bg-[var(--color-spacehub)] transition">Buka Maps</a>
                    </div>

                    <h3 class="font-semibold text-lg lg:text-2xl mt-8 text-[var(--color-spacehub-dark)]">Hubungi Sekarang</h3>
                    <div class="bg-white rounded-xl shadow-md p-5 mt-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <h4 class="font-semibold text-lg">Kontak WhatsApp</h4>
                                <p class="text-sm">Hubungi via <a href="https://wa.me/{{ $workspace->phone }}" class="text-green-500 font-semibold">WhatsApp</a></p>
                            </div>
                            <img src="{{ asset('img/phone.png') }}" alt="Phone" class="w-8 h-8">
                        </div>
                        <a href="https://wa.me/{{ $workspace->phone }}" class="block text-center text-white bg-[#00C652] px-4 py-2 rounded-full mt-4">Chat WhatsApp</a>
                    </div>

                    <h3 class="font-semibold text-lg lg:text-2xl mt-8 text-[var(--color-spacehub-dark)]">Social Media</h3>
                    <div class="bg-white rounded-xl shadow-md p-5 mt-4">
                        @if ($workspace->instagram)
                            <p class="text-sm"><span class="font-semibold">Instagram:</span> <a href="{{ $workspace->instagram }}" target="_blank" class="text-[var(--color-spacehub)]">@{{ str_replace('https://www.instagram.com/', '', $workspace->instagram) }}</a></p>
                        @endif
                        @if ($workspace->tiktok)
                            <p class="text-sm mt-2"><span class="font-semibold">TikTok:</span> <a href="{{ $workspace->tiktok }}" target="_blank" class="text-[var(--color-spacehub)]">@{{ str_replace('https://www.tiktok.com/@', '', $workspace->tiktok) }}</a></p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Recommendations -->
            <div class="mt-12">
                <div class="flex items-center gap-2 mb-5">
                    <div class="w-3 h-3 bg-[var(--color-spacehub)]"></div>
                    <p class="text-lg text-[var(--color-spacehub-dark)]">Rekomendasi Tempat Lainnya</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($recommendedWorkspaces as $recommended)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden">
                            <div class="h-48 w-full">
                                <img src="{{ $recommended->getCoverImageUrl() }}" alt="{{ $recommended->name }}" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4">
                                <h4 class="text-base sm:text-lg font-semibold text-[var(--color-spacehub-dark)]">{{ $recommended->name }}</h4>
                                <div class="flex items-center mt-2">
                                    <img src="{{ asset('img/GrayMap.png') }}" alt="Map" class="w-4 h-4 mr-2">
                                    <p class="text-gray-400 text-sm">{{ $recommended->address }}</p>
                                </div>
                                <div class="flex items-center mt-1">
                                    <img src="{{ asset('img/GrayJam.png') }}" alt="Clock" class="w-4 h-4 mr-2">
                                    <p class="text-gray-400 text-sm">{{ $recommended->opening_time }} - {{ $recommended->closing_time }}</p>
                                </div>
                                <a href="{{ route('landing.detail', $recommended->id) }}" class="block text-center text-white bg-[var(--color-spacehub-dark)] px-4 py-2 rounded-full mt-4 hover:bg-[var(--color-spacehub)]">Detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[var(--color-spacehub-dark)] text-white py-8">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div>
                    <img src="{{ asset('images/spacehublogo.png') }}" alt="SpaceHub Logo" class="h-8 w-auto">
                    <p class="mt-2 text-sm">SpaceHub - Menyatukanmu dengan ruang diskusi terbaik.</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <p class="text-sm">&copy; 2025 SpaceHub. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Script -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');
            const closeIcon = document.getElementById('close-icon');
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    </script>
</body>
</html>
