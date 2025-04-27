<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceHub - Your Gateway to the Universe</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <!-- Hero Section -->
    <div class="min-h-[70vh] flex justify-center items-center bg-gradient-to-br from-blue-50 to-white">
        <div class="container mx-auto px-4 lg:px-8 py-20">
            <div class="flex flex-col items-center gap-8 max-w-4xl mx-auto">
                <h1 class="text-4xl lg:text-6xl font-bold text-center text-[var(--color-spacehub-dark)]">
                    Cari Ruang Diskusi Jadi <br class="hidden md:block"> Lebih Mudah
                </h1>

                <svg width="488" height="34" viewBox="0 0 488 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.5 30C74.1307 10.3798 267.414 -17.0885 483.5 30" stroke="#2F327D" stroke-width="8" stroke-linecap="round" />
                </svg>

                <h3 class="text-xl lg:text-2xl text-[var(--color-spacehub-dark)] font-light text-center">
                    Pesan ruang meeting, meja kerja, atau kopi favoritmu <br class="hidden md:block"> dari kafe dan co-working space pilihan—cepat dan praktis!
                </h3>

                <button class="font-bold px-8 py-3 bg-[var(--color-spacehub-dark)] text-white rounded-full hover:bg-[var(--color-spacehub)] transition text-base md:text-lg">
                    Mitra Kami
                </button>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="bg-blue-50 min-h-[50vh] flex flex-col px-30 py-25">
        <div class="flex flex-row items-center gap-2 mb-5">
            <div class="w-[1em] h-[1em] bg-[var(--color-spacehub)]"></div>
            <p class="text-2xl">Tentang Spacehub</p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-9 gap-8 lg:gap-x-16 py-5">
            <div class="lg:mr-25 col-span-1 lg:col-span-4 text-[var(--color-spacehub-dark)] flex flex-col items-start lg:justify-between lg:h-full">
                <h2 class="font-bold text-xl lg:text-6xl mb-5">Spacehub <br>meyatukanmu dengan ruang diskusi terbaik.</h2>
                <p class="font-light text-md lg:text-3xl mb-5">Temukan kafe dan co-working space terpercaya, pesan langsung via WhatsApp, dan nikmati kenyamanan dalam setiap langkah.</p>

                <!-- tombol 2 biji -->
                <div class="flex flex-col sm:flex-row gap-5 w-[80%] text-black">
                    <div class="bg-white sm:w-1/2 rounded-2xl shadow-md px-6 py-8 lg:py-10 flex hover:bg-gray-50 transition-colors duration-300">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="35" height="35" fill="url(#pattern0_876_5152)" />
                            <defs>
                                <pattern id="pattern0_876_5152" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_876_5152" transform="scale(0.0111111)" />
                                </pattern>
                                <image id="image0_876_5152" width="90" height="90" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC3ElEQVR4nO2aO4wOURxHz9oN3woVDSJKQuNRetQ2oaLeaEWyNNRUFpW3kt1SVJaoLSVb2USUHpssQYhHIcg/uYXE7tw7M/fO982d30m2/Wbu2Zt5nPmDEEIIIYQQQgghhBBCiH9YDVwHPgN/9EcVB5+Aa8Bo0c66JbnE2mDmcklWAN8lmliivzmnEk2fROvSQVTRN4uu0XYBv+ou6LoZUsnBR+CK72YohBBCCNE/7DFFj3oUOujFEL1RovFttA0xRO+QaHyit8cQvU+i8YneG0P0YYnGJ/pQDNHjEo1PtDmqzUmJxifaHNXmrETjE22OamPJT8/RFDq4HEP0tETj22hTMUTPSDQ+0fdjiH4q0fhEP4kh+kUN0e+ACWALMMzgMezObcKda9V1mqPaVD2BGTeQ0xbsXB/U2FC1+VHhwLPAKtpHz10Gyq7XHPUlke6kveyquObRphPpHO1nrsK6zVWjiTTKW1KfqfI2bK4aTaS7aT97KqzbXDWWSN8AQ7SfIeB1ybWbq8YSqc1W58KNJlNp2UR6kHwYazKVlrkpfI31NXhAsPeAL009BJRJpHfJj3tNpdLppj/nDBjHmkqloYn0F7Ce/Fjn1pY8lYYm0sfky2wTqXQ+8CCnyZczgQ7MVWUWAg+ylXzZFujAXCVNpK/In5cBHn6mTqQXyZ9LKVNpaCLdT/4cSJlKQxLpB2CE/BkG3qdKpSGJ9Dbd4U6qVBqSSI/QHY6mSqXjAXfZtXSHNW7N0TPEKc+PPqR7PEqRSs95fvQ43eNEilRalEh/A5vpHpvc2pfzYs6iJtJndJfnBV7MWdREmsNIQYqvTuYsaiLNYaQgxSiCOYuWSHMZKUgxijAfM5HmNFIQexRhIWYitc/wXWes4CWuNG+XGSlo4zhubHrLjCKYs9JMdrQ9h3JhCT/nqcBKJ9v+S4sufnchiYYy4jbeonM06ZwJIYQQQgghhBBCCCGE4D/+AnnRDeySDz40AAAAAElFTkSuQmCC" />
                            </defs>
                        </svg>

                        <p class="font-bold lg:text-3xl ml-4">Kafe</p>
                    </div>
                    <div class="bg-white sm:w-1/2 rounded-2xl shadow-md px-6 py-8 lg:py-10 flex hover:bg-gray-50 transition-colors duration-300">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="35" height="35" fill="url(#pattern0_876_5160)" />
                            <defs>
                                <pattern id="pattern0_876_5160" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_876_5160" transform="scale(0.0111111)" />
                                </pattern>
                                <image id="image0_876_5160" width="90" height="90" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAACXBIWXMAAAsTAAALEwEAmpwYAAADgElEQVR4nO2aO2sVQRSAPxUNiJJC6xu5aKGtj0ZLGxFLf0JsLGxEW0sRNL6KpPFVWhsbW8uUoghGDdgZSRQ0yaKMDMyFcMm9d+e1OzN7PjhN7j7OfJmZMzu7IAiCIAhCduxuO4HSOQM8B/4Av4GnwOm2kyqFKeAy8BZQI2IJuALsbzvZHOkDt4HvYwQPxzrwwJwrTJh7zwMvgb8WgofjH/DGjIQ9427YNaaBa8Cyh9xRoa95EzhMhzkJLJjCpiLHphkpZ+kIUzWKW+wounj2gTvAquOcuzjm90VzjO11V01O/a4Xt/WhVcSo41xXKdkXT9/itjRiaI8THWpq+gbcSr14+hS3zRrFqo7o0PnoEZkEvj1o2WL5ZSs69ghrhDbmROUoOmTN0CPkOJkVN1t8RW8nyeI5bYbO+5aHngooOqniuQ+YAzYcEtBbmU+AU4RDRRA9vA37zLG9G8aVdmbNPYcbfgKuA4cIj4oseoDunTcci+ddlxuuWsxZr4ALkd9+qIZED9BtuQi8tnjy1HO+NZMuutbw/q9qWLRr8bQmtXWlalG0TfFMsmFHTRFJJR8bshB9bmg93nY+RYk+YKacd47XFNETOAbcB356yvI5d85MU8X16F2Wj+t18D138Oh8yeRXhOiPNeSqhkVvjw/AVeBgzfND5xPsQipx0crEL7Mjd6LmdULl0znRymNHTkTvgM0/XU97dRDRGYywYhumEsun2IapxPJppWGfE8unONFfzdvpqUTyKU70iqXg2PkUJ3rFUXCsfIoTveIpOHQ+xYn+AswCe/Fjxjwmj8pnwRzTSdGzrq/edxC8VUPM1gThxYr2oWde+rp8X1EBL3bYexbRgQRPEi6isZsibGMwpXRadC9gDw4dRYjuJSy4CNG9DARnLbqXkeAsRecoWOUkOuYqQjUUMymLzrkHq5oPPq2KLkmwshDemOiSBasawqOL7pJgNUZ4dNE5FzkVKLaaEC3BWAcimmY6iYhGRFPSdGTNWgJJq8xCO7PmYQKJq8xCO7NGfx7w2Kwd226ASjy0o0e+n1QMHlA2E2iQynBPRISTmGDp4TQruMvCqzYEd0l4lYLgkoVXKQouSXiVg+CchVc5Cs5JeFWC4JSFVyUKTkl4JwS3KbyTgpsULoIjCxfBkYWL4MjCRXBk4ZUUufAcAeaBHybmzd8EQRAEQRAEBvwHjUqwSG6U5YAAAAAASUVORK5CYII=" />
                            </defs>
                        </svg>
                        <p class="font-bold lg:text-3xl ml-3">Workspace</p>
                    </div>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-5 sm:hidden lg:block lg:py-6">
                <img src="{{ asset('images/about-section.png') }}" alt="about images" class="w-full h-auto object-cover">
            </div>
        </div>
    </div>

    <!-- Temukan kafe Section -->
    <div class="min-h-screen bg-gradient-to-br from-white to-blue-50 lg:p-25">
        <div class="flex flex-row items-center gap-2 mb-5">
            <div class="w-[1em] h-[1em] bg-[var(--color-spacehub)]"></div>
            <p class="text-2xl">Katalog</p>
        </div>
        <div class="flex flex-row justify-between">
            <h2 class="font-bold text-3xl lg:text-6xl text-[var(--color-spacehub-dark)] mb-5">Temukan Kafe dan Workspace</h2>
            <button class="font-bold px-8 py-3 bg-[var(--color-spacehub-dark)] text-white rounded-full hover:bg-[var(--color-spacehub)] transition text-base md:text-3xl">
                Lebih Banyak
            </button>
        </div>
        <!-- workspace cards container -->
        <div class="grid grid-cols-3 gap-8 px-30 min-h-screen py-15">
            @for ($i = 0; $i < 6; $i++)
                <div class="bg-white rounded-2xl shadow-2xl flex flex-col justify-between col-span-1 row-span-1 p-5">
                <!-- TODO ganti gambar dan info workspace placeholder pake database -->
                <img src="{{ asset('images/image.png') }}" alt="wokspace" class="w-full h-">
                <!-- workspace info -->
                <div>
                    <p class="text-2xl font-bold text-left">Kafe 1</p>
                    <div class="flex items-center gap-2">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Bold / Map &#38; Location / Map Point">
                                <path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M9.00065 1.9165C5.87104 1.9165 3.33398 4.75167 3.33398 7.93734C3.33398 11.098 5.14259 14.5336 7.96441 15.8526C8.62222 16.16 9.37908 16.16 10.0369 15.8526C12.8587 14.5336 14.6673 11.098 14.6673 7.93734C14.6673 4.75167 12.1303 1.9165 9.00065 1.9165ZM9.00065 8.99984C9.78305 8.99984 10.4173 8.36557 10.4173 7.58317C10.4173 6.80077 9.78305 6.1665 9.00065 6.1665C8.21825 6.1665 7.58398 6.80077 7.58398 7.58317C7.58398 8.36557 8.21825 8.99984 9.00065 8.99984Z" fill="#8D99AB" />
                            </g>
                        </svg>
                        <p class="text-xl font-bold text-gray-300">Lokasi</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Clock" clip-path="url(#clip0_918_5589)">
                                <path id="Icon" d="M8.50065 4.00016V8.00016L11.1673 9.3335M15.1673 8.00016C15.1673 11.6821 12.1825 14.6668 8.50065 14.6668C4.81875 14.6668 1.83398 11.6821 1.83398 8.00016C1.83398 4.31826 4.81875 1.3335 8.50065 1.3335C12.1825 1.3335 15.1673 4.31826 15.1673 8.00016Z" stroke="#8D99AB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_918_5589">
                                    <rect width="16" height="16" fill="white" transform="translate(0.5)" />
                                </clipPath>
                            </defs>
                        </svg>

                        <p class="text-xl font-bold text-gray-300">Jam buka</p>
                    </div>
                </div>
                <button class="font-bold bg-blue-500 py-4 rounded-xl text-white hover:bg-blue-200 transition duration-300">
                    Detail
                </button>
        </div>
        @endfor
    </div>
    </div>
    <!-- cara penggunaan section -->
    <div class="min-h-screen bg-gradient-to-tr from-white to-blue-50 lg:p-25">
        <div class="flex flex-row items-center gap-2 mb-5">
            <div class="w-[1em] h-[1em] bg-[var(--color-spacehub)]"></div>
            <p class="text-2xl">Cara Penggunaan</p>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-9 gap-8 lg:gap-x-16 py-5">
            <div class="col-span-1 lg:col-span-4 text-[var(--color-spacehub-dark)] flex flex-col items-start lg:justify-start lg:h-full">
                <h2 class="font-bold text-3xl lg:text-6xl text-[var(--color-spacehub-dark)] mb-5 mr-10">Cara <span class="text-yellow-400">Mudah</span> Pesan Ruang Dikusi</h2>
                <svg width="800" height="60" viewBox="0 0 800 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full max-w-xl">
                    <path d="M4.5 45C120 15 400 -25 795.5 45" 
                          stroke="#2F327D" 
                          stroke-width="12" 
                          stroke-linecap="round"/>
                </svg>
                <div>
                    
                </div>
            </div>
            <div class="col-span-1 lg:col-span-5 sm:hidden lg:block lg:py-6">
                <img src="{{ asset('images/howtouse.png') }}" alt="about images" class="w-full h-auto object-cover">
            </div>
        </div>
    </div>
</body>

</html>