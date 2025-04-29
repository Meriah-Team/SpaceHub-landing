@extends('layout.landingLayout')

@section('content')
    {{--  Hero Section  --}}
    <div id="hero" class="min-h-[70vh] flex justify-center items-center bg-gradient-to-br from-blue-50 to-white">
        <div class="container mx-auto px-4 lg:px-8 py-20">
            <div class="flex flex-col items-center gap-8 max-w-4xl mx-auto">
                <h1 class="text-4xl lg:text-4xl font-bold text-center text-[var(--color-spacehub-dark)] font-jakarta">
                    Cari ruang diskusi jadi <br class="hidden md:block"> lebih mudah
                </h1>

                <svg width="400" height="34" viewBox="0 0 488 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 30C74.1307 10.3798 267.414 -17.0885 483.5 30" stroke="#2F327D" stroke-width="8"
                        stroke-linecap="round" />
                </svg>

                <h3 class="font-poppins text-xl lg:text-lg text-[var(--color-spacehub-dark)] text-center">
                    Pesan ruang meeting, meja kerja, atau kopi favoritmu <br class="hidden md:block"> dari kafe dan
                    co-working space pilihan—cepat dan praktis!
                </h3>

                <a href="#katalog"
                    class="px-5 py-2 bg-[var(--color-spacehub-dark)] text-white rounded-full hover:bg-[var(--color-spacehub)] transition text-base md:text-lg">
                    Mitra Kami
                </a>
            </div>
        </div>
    </div>

    {{--  About Section  --}}
    <section id="about" class="bg-blue-50 min-h-[80vh] px-6 md:px-20 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16">
            {{--  Left Column - Text Content  --}}
            <div class="lg:col-span-5 flex flex-col text-[var(--color-spacehub-dark)]">
                {{--  Section Label  --}}
                <div class="flex items-center gap-2 mb-5">
                    <div class="w-3 h-3 bg-[var(--color-spacehub)]"></div>
                    <p class="text-lg text-black">Tentang Spacehub</p>
                </div>

                {{--  Main Content  --}}
                <h2 class="font-poppins font-semibold text-xl lg:text-3xl mb-5">
                    Spacehub <br>meyatukanmu dengan ruang diskusi terbaik.
                </h2>

                <p class="font-poppins font-light text-md lg:text-xl mb-8">
                    Temukan kafe dan co-working space terpercaya, pesan langsung via WhatsApp, dan nikmati kenyamanan
                    dalam setiap langkah.
                </p>

                {{--  Option Buttons  --}}
                <div class="flex flex-col sm:flex-row gap-4 text-black">
                    <div class="bg-white rounded-xl shadow-md px-4 py-5 flex items-center">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC3ElEQVR4nO2aO4wOURxHz9oN3woVDSJKQuNRetQ2oaLeaEWyNNRUFpW3kt1SVJaoLSVb2USUHpssQYhHIcg/uYXE7tw7M/fO982d30m2/Wbu2Zt5nPmDEEIIIYQQQgghhBBCiH9YDVwHPgN/9EcVB5+Aa8Bo0c66JbnE2mDmcklWAN8lmliivzmnEk2fROvSQVTRN4uu0XYBv+ou6LoZUsnBR+CK72YohBBCCNE/7DFFj3oUOujFEL1RovFttA0xRO+QaHyit8cQvU+i8YneG0P0YYnGJ/pQDNHjEo1PtDmqzUmJxifaHNXmrETjE22OamPJT8/RFDq4HEP0tETj22hTMUTPSDQ+0fdjiH4q0fhEP4kh+kUN0e+ACWALMMzgMezObcKda9V1mqPaVD2BGTeQ0xbsXB/U2FC1+VHhwLPAKtpHz10Gyq7XHPUlke6kveyquObRphPpHO1nrsK6zVWjiTTKW1KfqfI2bK4aTaS7aT97KqzbXDWWSN8AQ7SfIeB1ybWbq8YSqc1W58KNJlNp2UR6kHwYazKVlrkpfI31NXhAsPeAL009BJRJpHfJj3tNpdLppj/nDBjHmkqloYn0F7Ce/Fjn1pY8lYYm0sfky2wTqXQ+8CCnyZczgQ7MVWUWAg+ylXzZFujAXCVNpK/In5cBHn6mTqQXyZ9LKVNpaCLdT/4cSJlKQxLpB2CE/BkG3qdKpSGJ9Dbd4U6qVBqSSI/QHY6mSqXjAXfZtXSHNW7N0TPEKc+PPqR7PEqRSs95fvQ43eNEilRalEh/A5vpHpvc2pfzYs6iJtJndJfnBV7MWdREmsNIQYqvTuYsaiLNYaQgxSiCOYuWSHMZKUgxijAfM5HmNFIQexRhIWYitc/wXWes4CWuNG+XGSlo4zhubHrLjCKYs9JMdrQ9h3JhCT/nqcBKJ9v+S4sufnchiYYy4jbeonM06ZwJIYQQQgghhBBCCCGE4D/+AnnRDeySDz40AAAAAElFTkSuQmCC"
                            width="24" height="24" alt="Kafe icon">
                        <p class="font-semibold text-xl ml-3">Kafe</p>
                    </div>
                    <div class="bg-white rounded-xl shadow-md px-4 py-5 flex items-center">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAADgElEQVR4nO2aO2sVQRSAPxUNiJJC6xu5aKGtj0ZLGxFLf0JsLGxEW0sRNL6KpPFVWhsbW8uUoghGDdgZSRQ0yaKMDMyFcMm9d+e1OzN7PjhN7j7OfJmZMzu7IAiCIAhCduxuO4HSOQM8B/4Av4GnwOm2kyqFKeAy8BZQI2IJuALsbzvZHOkDt4HvYwQPxzrwwJwrTJh7zwMvgb8WgofjH/DGjIQ9427YNaaBa8Cyh9xRoa95EzhMhzkJLJjCpiLHphkpZ+kIUzWKW+wounj2gTvAquOcuzjm90VzjO11V01O/a4Xt/WhVcSo41xXKdkXT9/itjRiaI8THWpq+gbcSr14+hS3zRrFqo7o0PnoEZkEvj1o2WL5ZSs69ghrhDbmROUoOmTN0CPkOJkVN1t8RW8nyeI5bYbO+5aHngooOqniuQ+YAzYcEtBbmU+AU4RDRRA9vA37zLG9G8aVdmbNPYcbfgKuA4cIj4oseoDunTcci+ddlxuuWsxZr4ALkd9+qIZED9BtuQi8tnjy1HO+NZMuutbw/q9qWLRr8bQmtXWlalG0TfFMsmFHTRFJJR8bshB9bmg93nY+RYk+YKacd47XFNETOAbcB356yvI5d85MU8X16F2Wj+t18D138Oh8yeRXhOiPNeSqhkVvjw/AVeBgzfND5xPsQipx0crEL7Mjd6LmdULl0znRymNHTkTvgM0/XU97dRDRGYywYhumEsun2IapxPJppWGfE8unONFfzdvpqUTyKU70iqXg2PkUJ3rFUXCsfIoTveIpOHQ+xYn+AswCe/Fjxjwmj8pnwRzTSdGzrq/edxC8VUPM1gThxYr2oWde+rp8X1EBL3bYexbRgQRPEi6isZsibGMwpXRadC9gDw4dRYjuJSy4CNG9DARnLbqXkeAsRecoWOUkOuYqQjUUMymLzrkHq5oPPq2KLkmwshDemOiSBasawqOL7pJgNUZ4dNE5FzkVKLaaEC3BWAcimmY6iYhGRFPSdGTNWgJJq8xCO7PmYQKJq8xCO7NGfx7w2Kwd226ASjy0o0e+n1QMHlA2E2iQynBPRISTmGDp4TQruMvCqzYEd0l4lYLgkoVXKQouSXiVg+CchVc5Cs5JeFWC4JSFVyUKTkl4JwS3KbyTgpsULoIjCxfBkYWL4MjCRXBk4ZUUufAcAeaBHybmzd8EQRAEQRAEBvwHjUqwSG6U5YAAAAAASUVORK5CYII="
                            width="24" height="24" alt="Workspace icon">
                        <p class="font-semibold text-xl ml-3">Workspace</p>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-7 sm:hidden lg:block lg:py-6">
                <img src="{{ asset('images/about-section.png') }}" alt="about images" class="w-full h-auto object-cover">
            </div>
        </div>
    </section>

    {{--  Top Katalog Section  --}}
    <div id="katalog" class="min-h-screen bg-gradient-to-br from-white to-blue-100 px-6 md:px-20 py-12">
        <div class="flex flex-row items-center gap-2 mb-5">
            <div class="w-3 h-3 bg-[var(--color-spacehub)]"></div>
            <p class="text-lg">Katalog</p>
        </div>
        <div class="flex flex-row justify-between">
            <h2 class="font-bold text-lg lg:text-4xl text-[var(--color-spacehub-dark)]">Temukan Kafe dan Workspace</h2>
            <a href="{{ route('landing.explore') }}"
                class="px-5 py-2 bg-[var(--color-spacehub-dark)] text-white rounded-full hover:bg-[var(--color-spacehub)] transition text-base">
                Lebih Banyak
            </a>
        </div>
        {{--  workspace cards container - keeping existing layout  --}}
        <div class="grid grid-cols-3 px-10 gap-8 min-h-screen py-15">
            @foreach($topWorkspaces as $workspace)
                <x-spacecards 
                    :name="$workspace->name"
                    :address="$workspace->address"
                    :opening-time="$workspace->opening_time"
                    :closing-time="$workspace->closing_time"
                    :image="'images/image.png'"
                    :id="$workspace->id"
                />
            @endforeach
        </div>
    </div>

    {{-- cara penggunaan section --}}
    <div class="min-h-screen bg-gradient-to-tr from-white to-blue-100 px-6 md:px-20 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-9 gap-8 lg:gap-x-16">
            <div
                class="col-span-1 lg:col-span-4 text-[var(--color-spacehub-dark)] flex flex-col items-start lg:justify-start lg:h-full">
                <div class="flex flex-row items-center gap-2 mb-5">
                    <div class="w-3 h-3 bg-[var(--color-spacehub)]"></div>
                    <p class="text-lg text-black">Cara Penggunaan</p>
                </div>
                <h2 class="font-jakarta font-bold text-xl lg:text-4xl mb-5">Cara <span class="text-yellow-400">Mudah</span>
                    Pesan Ruang Dikusi</h2>

                <svg width="400" height="34" viewBox="0 0 488 34" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 30C74.1307 10.3798 267.414 -17.0885 483.5 30" stroke="#2F327D" stroke-width="8"
                        stroke-linecap="round" />
                </svg>

                <div class="flex flex-col gap-5 mt-8">
                    <div class="flex flex-row align-center">
                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id="Subtract"
                                d="M16.5 0C25.3366 0 32.5 7.16344 32.5 16C32.5 24.8366 25.3366 32 16.5 32C7.66344 32 0.5 24.8366 0.5 16C0.5 7.16344 7.66344 0 16.5 0ZM15.3857 17.792L12.0693 14.6357L11.3799 15.3594L10.6904 16.084L14.7246 19.9238L15.4424 20.6074L16.1318 19.8955L22.3379 13.4961L20.9023 12.1035L15.3857 17.792Z"
                                fill="#54BD95" />
                        </svg>
                        <p class="text-lg text-gray-800 text-left ml-5">Pilih tempat yang kamu inginkan</p>
                    </div>
                    <div class="flex flex-row align-center">
                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id="Subtract"
                                d="M16.5 0C25.3366 0 32.5 7.16344 32.5 16C32.5 24.8366 25.3366 32 16.5 32C7.66344 32 0.5 24.8366 0.5 16C0.5 7.16344 7.66344 0 16.5 0ZM15.3857 17.792L12.0693 14.6357L11.3799 15.3594L10.6904 16.084L14.7246 19.9238L15.4424 20.6074L16.1318 19.8955L22.3379 13.4961L20.9023 12.1035L15.3857 17.792Z"
                                fill="#54BD95" />
                        </svg>
                        <p class="text-lg text-gray-800 text-left ml-5">Lihat informasi detail tentang lokasi</p>
                    </div>
                    <div class="flex flex-row align-center">
                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id="Subtract"
                                d="M16.5 0C25.3366 0 32.5 7.16344 32.5 16C32.5 24.8366 25.3366 32 16.5 32C7.66344 32 0.5 24.8366 0.5 16C0.5 7.16344 7.66344 0 16.5 0ZM15.3857 17.792L12.0693 14.6357L11.3799 15.3594L10.6904 16.084L14.7246 19.9238L15.4424 20.6074L16.1318 19.8955L22.3379 13.4961L20.9023 12.1035L15.3857 17.792Z"
                                fill="#54BD95" />
                        </svg>
                        <p class="text-lg text-gray-800 text-left ml-5">Hubungi kafe melalui WhatsApp yang tersedia</p>
                    </div>
                    <div class="flex flex-row align-center">
                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path id="Subtract"
                                d="M16.5 0C25.3366 0 32.5 7.16344 32.5 16C32.5 24.8366 25.3366 32 16.5 32C7.66344 32 0.5 24.8366 0.5 16C0.5 7.16344 7.66344 0 16.5 0ZM15.3857 17.792L12.0693 14.6357L11.3799 15.3594L10.6904 16.084L14.7246 19.9238L15.4424 20.6074L16.1318 19.8955L22.3379 13.4961L20.9023 12.1035L15.3857 17.792Z"
                                fill="#54BD95" />
                        </svg>
                        <p class="text-lg text-gray-800 text-left ml-5">Ruang diskusi siap digunakan</p>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-5 sm:hidden lg:block lg:py-6">
                <img src="{{ asset('images/howtouse.png') }}" alt="about images" class="w-full h-auto object-cover">
            </div>
        </div>
    </div>

    {{-- Kemitraan section --}}
    <div id="mitra" class="bg-gradient-to-br from-white to-blue-100 min-h-[80vh] px-6 md:px-20 py-12">
        <div class="grid grid-cols-2">
            <div class="col-span-1 flex flex-col lg:gap-5">
                <div class="bg-[var(--color-spacehub-dark)] px-3 py-2 text-white rounded-full  lg:max-w-[25%] text-center">
                    Kemitraan
                </div>
                <h2 class="font-jakarta font-bold text-xl lg:text-4xl text-[var(--color-spacehub-dark)] mt-5">
                    Bergabung bersama SpaceHub!
                </h2>
                <svg width="400" height="34" viewBox="0 0 488 34" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 30C74.1307 10.3798 267.414 -17.0885 483.5 30" stroke="#2F327D" stroke-width="8"
                        stroke-linecap="round" />
                </svg>
                <a href="#"
                    class="font-jakarta font-bold border-2 text-center border-[var(--color-spacehub-dark)] text-[var(--color-spacehub-dark)] rounded-md md:max-w-[35%] px-3 py-2 mt-5 hover:bg-[var(--color-spacehub-dark)] hover:text-white transition duration-300">
                    Lihat Tawaran
                </a>
            </div>
            <div class="col-span-1">
                <img src="{{ asset('images/team.png') }}" alt="">

            </div>
        </div>
        <div class="grid lg:grid-cols-2 sm:grid-cols-1 gap-5 mt-10">
            <div class="col-span-1 flex flex-col gap-5">
                <div class="flex flex-row align-center">
                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path id="Subtract"
                            d="M16.5 0C25.3366 0 32.5 7.16344 32.5 16C32.5 24.8366 25.3366 32 16.5 32C7.66344 32 0.5 24.8366 0.5 16C0.5 7.16344 7.66344 0 16.5 0ZM15.3857 17.792L12.0693 14.6357L11.3799 15.3594L10.6904 16.084L14.7246 19.9238L15.4424 20.6074L16.1318 19.8955L22.3379 13.4961L20.9023 12.1035L15.3857 17.792Z"
                            fill="#54BD95" />
                    </svg>
                    <p class="text-lg text-gray-800 text-left ml-5">Jangkau profesional di area yang lebih luas</p>
                </div>
                <div class="flex flex-row align-center">
                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path id="Subtract"
                            d="M16.5 0C25.3366 0 32.5 7.16344 32.5 16C32.5 24.8366 25.3366 32 16.5 32C7.66344 32 0.5 24.8366 0.5 16C0.5 7.16344 7.66344 0 16.5 0ZM15.3857 17.792L12.0693 14.6357L11.3799 15.3594L10.6904 16.084L14.7246 19.9238L15.4424 20.6074L16.1318 19.8955L22.3379 13.4961L20.9023 12.1035L15.3857 17.792Z"
                            fill="#54BD95" />
                    </svg>
                    <p class="text-lg text-gray-800 text-left ml-5">Pesanan langsung via WhatsApp</p>
                </div>
            </div>
            <div class="col-span-1 flex flex-col gap-5">
                <div class="flex flex-row align-center">
                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path id="Subtract"
                            d="M16.5 0C25.3366 0 32.5 7.16344 32.5 16C32.5 24.8366 25.3366 32 16.5 32C7.66344 32 0.5 24.8366 0.5 16C0.5 7.16344 7.66344 0 16.5 0ZM15.3857 17.792L12.0693 14.6357L11.3799 15.3594L10.6904 16.084L14.7246 19.9238L15.4424 20.6074L16.1318 19.8955L22.3379 13.4961L20.9023 12.1035L15.3857 17.792Z"
                            fill="#54BD95" />
                    </svg>
                    <p class="text-lg text-gray-800 text-left ml-5">Pemasaran di sosial media SpaceHub</p>
                </div>
                <div class="flex flex-row align-center">
                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path id="Subtract"
                            d="M16.5 0C25.3366 0 32.5 7.16344 32.5 16C32.5 24.8366 25.3366 32 16.5 32C7.66344 32 0.5 24.8366 0.5 16C0.5 7.16344 7.66344 0 16.5 0ZM15.3857 17.792L12.0693 14.6357L11.3799 15.3594L10.6904 16.084L14.7246 19.9238L15.4424 20.6074L16.1318 19.8955L22.3379 13.4961L20.9023 12.1035L15.3857 17.792Z"
                            fill="#54BD95" />
                    </svg>
                    <p class="text-lg text-gray-800 text-left ml-5">Promosikan ruangmu tanpa biaya tambahan</p>
                </div>
            </div>
        </div>
    </div>

    {{-- CTA Section --}}
    <div
        class="bg-gradient-to-tr from-white to-blue-100 min-h-[60vh] px-6 md:px-20 py-12 flex flex-col items-center justify-center gap-8">
        <h1 class="text-[var(--color-spacehub-dark)] text-2xl lg:text-3xl font-bold text-center">Siap temukan ruang kerja
            yang pas? Yuk mulai sekarang</h1>

        <a href="#katalog"
            class="text-white bg-[var(--color-spacehub-dark)] px-6 py-3 rounded-full hover:bg-[var(--color-spacehub)] transition-colors duration-300">
            Jelajahi Tempat
        </a>
        <div class="flex flex-row gap-2 justify-center items-center w-full max-w-4xl mx-auto group ">
            <img src="{{ asset('images/r.png') }}" alt="gambar group"
                class="object-contain h-auto max-h-65 w-auto transition-all duration-500 ease-in-out group-hover:scale-105">
            <img src="{{ asset('images/c.png') }}" alt="gambar group"
                class="object-contain h-auto max-h-100 w-auto transition-all duration-500 delay-75 ease-in-out group-hover:scale-110">
            <img src="{{ asset('images/l.png') }}" alt="gambar group"
                class="object-contain h-auto max-h-65 w-auto transition-all duration-500 delay-150 ease-in-out group-hover:scale-105">
        </div>
    </div>
    {{-- FAQ Section --}}
    <div id="faq" class="bg-gradient-to-br from-white to-blue-100 min-h-[80vh] px-6 md:px-20 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-x-16">
            <div class="lg:col-span-1 sm:hidden lg:block p-4">
                <img src="{{ asset('images/faq.png') }}" alt="">
            </div>
            <div class="lg:col-span-1">
                <h4 class="text-3xl font-jakarta font-bold mb-8">Frequently Asked Questions</h4>
                {{-- FAQ points --}}
                <div class="space-y-4" x-data="{ selected: null }">
                    <x-faq-dropdown id="1" question="Apa itu SpaceHub?"
                        answer="SpaceHub adalah platform yang menghubungkan pengguna dengan kafe dan ruang kerja untuk kebutuhan diskusi atau bekerja. Kami menyediakan informasi lengkap dan memudahkan pemesanan melalui WhatsApp." />

                    <x-faq-dropdown id="2" question="Bagaimana cara memesan ruang diskusi?"
                        answer="Pilih ruang diskusi yang kamu inginkan, lihat informasi detail, lalu hubungi langsung melalui WhatsApp yang tersedia pada halaman detail tempat tersebut." />

                    <x-faq-dropdown id="3" question="Apakah perlu mendaftar untuk menggunakan SpaceHub?"
                        answer="Tidak, kamu tidak perlu mendaftar untuk menggunakan SpaceHub. Kamu bisa langsung memilih tempat yang diinginkan dan menghubungi mereka melalui WhatsApp." />

                    <x-faq-dropdown id="4" question="Bagaimana jika tempat yang saya pesan sudah penuh?"
                        answer="Karena pemesanan dilakukan langsung melalui WhatsApp, kamu akan langsung mendapatkan informasi ketersediaan ruang saat menghubungi pihak kafe atau workspace. SpaceHub juga berusaha menyediakan alternatif tempat lain di sekitar lokasi." />
                </div>
            </div>
        </div>
    </div>

    {{-- Feedback Section --}}
    <div
        class="bg-gradient-to-tr from-white to-blue-100 min-h-[80vh] px-6 md:px-20 py-12 flex flex-col items-center justify-center gap-8">
        <div class="flex flex-col w-full max-w-4xl">
            <div class="text-center mb-8">
                <h3 class="text-3xl font-semibold text-[var(--color-spacehub-dark)]">Bantu Kami Jadi Lebih Baik</h3>
                <h4 class="text-gray-500 mt-2">Berikan saran dan masukkan berdasarkan pengalaman anda menggunakan layanan kami!</h4>
            </div>
            
            {{-- Feedback Form with CSRF Protection --}}
            <form action="{{ route('landing.index') }}" method="GET" class="w-full">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="flex flex-col gap-2">
                        <label for="first_name" class="text-sm font-semibold text-gray-500">Nama Depan</label>
                        <input type="text" id="first_name" name="first_name" required
                            class="w-full bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[var(--color-spacehub-dark)]">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="last_name" class="text-sm font-semibold text-gray-500">Nama Belakang</label>
                        <input type="text" id="last_name" name="last_name" 
                            class="w-full bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[var(--color-spacehub-dark)]">
                    </div>
                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label for="email" class="text-sm font-semibold text-gray-500">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[var(--color-spacehub-dark)]">
                    </div>
                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label for="message" class="text-sm font-semibold text-gray-500">Pesan</label>
                        <textarea id="message" name="message" rows="4" required
                            class="w-full bg-white border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[var(--color-spacehub-dark)]"></textarea>
                    </div>
                </div>
                <div class="mt-6 flex justify-center">
                    <button type="submit"
                        class="px-6 py-3 bg-[var(--color-spacehub-dark)] text-white rounded-lg hover:bg-[var(--color-spacehub)] transition-colors duration-300">
                        Kirim Feedback
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
