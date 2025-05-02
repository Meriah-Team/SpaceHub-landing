<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="container relative px-[100px] py-4 h-full overflow-hidden">

        <div class="absolute -top-100 -left-100 w-[1000px] h-[800px] -z-10 bg-violet-300 rounded-full blur-[500px]"></div>

        {{-- Navbar --}}
        <section class="navbar inline-flex w-full h-full items-center justify-between px-5" id="navbar">

            <div>
                <img src="{{asset('img/logo.png')}}" alt="">
            </div>

            <div class="">
               <ul>
                    <li class="inline-flex gap-x-10">
                        <a href="">Beranda</a>
                        <a href="">Katalog</a>
                        <a href="">Tentang Kami</a>
                        <a href="">Mitra</a>
                    </li>
               </ul>
            </div>

            <div class="border py-2 px-6 rounded-full">
                <button type="button">
                    Lihat Sekarang
                </button>
            </div>

        </section>

        {{-- Hero --}}
        <section class="hero w-full h-full mt-[80px]" id="hero">

            <div class="inline-flex text-gray-500 ">
                Home >> Katalog >> Detail
            </div>

            <div class="flex gap-x-[150px] w-full mt-5">

                <div class="flex flex-col w-1/2 items-center">
                    <div>
                        <img src="{{asset('img/MainImg.png')}}" alt="">
                    </div>
                    <div class="grid grid-cols-3 w-[590px] mt-7">
                        <img src="{{asset('img/image.png')}}" alt="">
                        <img src="{{asset('img/image3.png')}}" alt="">
                        <img src="{{asset('img/image2.png')}}" alt="">
                    </div>
                </div>

                <div class="flex flex-col gap-y-3 mt-10 w-3/4">
                    <h1 class="font-bold text-4xl">Virtual Office (vOffice)</h1>

                    <div class="inline-flex gap-x-2 mt-3">
                        <img src="{{asset('img/location.png')}}" alt="" class="w-[20px] h-[20px]">
                        <h1 class="text-gray-500">Jl. Braga No. 109, Bandung</h1>
                    </div>

                    <div class="inline-flex gap-x-2">
                        <img src="{{asset('img/calendar.png')}}" alt="" class="w-[20px] h-[20px]">
                        <p class="text-gray-500">Setiap Hari</p>
                    </div>

                    <div class="inline-flex gap-x-2">
                        <img src="{{asset('img/clock.png')}}" alt="" class="w-[20px] h-[20px]">
                        <p class="text-gray-500">08.00 - 17.00</p>
                    </div>

                    <div class="flex flex-col gap-y-5 mt-10 w-[500px]">
                        <div class="inline-flex gap-x-5">
                            <div class="w-full h-full py-4 px-2 border border-gray-50 shadow-md rounded-xl bg-white">
                                <div class="flex flex-col">
                                    <div class="inline-flex gap-x-2">
                                        <img src="{{asset('img/clock.png')}}" alt="">
                                        <p class="font-semibold">Pilihan Meja</p>
                                    </div>
                                </div>
                                <p class="px-1 text-gray-600">6 Meja</p>
                            </div>
                            <div class="w-full h-full py-4 px-2 border border-gray-50 shadow-md rounded-xl bg-white">
                                <div class="flex flex-col">
                                    <div class="inline-flex gap-x-2">
                                        <img src="{{asset('img/clock.png')}}" alt="">
                                        <p class="font-semibold">Pilihan Ruangan</p>
                                    </div>
                                </div>
                                <p class="px-1 text-gray-600">3 Ruangan</p>
                            </div>
                        </div>
                        <div class="inline-flex gap-x-5">
                            <div class="w-full h-full py-4 px-2 border border-gray-50 shadow-md rounded-xl bg-white">
                                <div class="flex flex-col">
                                    <div class="inline-flex gap-x-2">
                                        <img src="{{asset('img/clock.png')}}" alt="">
                                        <p class="font-semibold">Daftar Menu</p>
                                    </div>
                                </div>
                                <p class="px-1 text-gray-600">Klik <span class="text-orange-500 font-bold">Menu</span></p>
                            </div>
                            <div class="w-full h-full py-4 px-2 border border-gray-50 shadow-md rounded-xl bg-white">
                                <div class="flex flex-col">
                                    <div class="inline-flex gap-x-2">
                                        <img src="{{asset('img/clock.png')}}" alt="">
                                        <p class="font-semibold">Kontak WhatsApp</p>
                                    </div>
                                </div>
                                <p class="px-1 text-gray-600">Hubungi via <span class="text-green-500 font-bold">WhatsApp</span> </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>

        {{-- Circle Ungu --}}
        <div
            class="w-[500px] h-[500px] bg-blue-500 rounded-full absolute top-40 -right-95">
        </div>

        {{-- Circle Hijau --}}
        <div
            class="w-[100px] h-[100px] bg-green-500 rounded-full absolute top-140 -right-13">
        </div>

        <div class="absolute top-400 -right-200 w-[1000px] h-[800px] -z-10 bg-violet-300 rounded-full blur-[500px]"></div>

        <section class=" mt-10 flex flex-col" id="deskripsi">

            <div class="flex">

                <div class="w-5/8 mr-[100px] flex flex-col">

                    {{-- Deskripsi --}}
                    <div class="text-3xl font-semibold">
                        Deskripsi Lokasi
                    </div>
                    <p class="mt-10">
                        Terletak di Jalan Braga, vOffice menawarkan suasana kerja yang profesional dengan ruang modern yang nyaman. Cocok bagi pekerja yang membutuhkan kantor virtual dengan fasilitas lengkap. Ruangan ini memiliki desain minimalis yang membantu meningkatkan produktivitas.
                    </p>

                    {{-- Pilihan Ruangan --}}
                    <section class=" mt-10 flex flex-col">

                        <div class="inline-flex gap-x-4 font-semibold text-3xl mb-10">
                            <div>
                                <img src="{{asset('img/Room.png')}}" alt="">
                            </div>
                            Pilihan Ruangan
                        </div>

                        {{-- Ruangan --}}
                        <div class="flex border border-gray-200 bg-white gap-x-10 rounded-xl p-2 shadow-lg">
                            <img src="{{asset('img/contoh1.png')}}" alt="">
                            <div class="flex flex-col">
                                <h2 class="text-xl font-semibold">Melawai Room</h2>
                                <div class="inline-flex gap-x-3 mt-2">
                                    <div class="bg-[#6DC993] rounded-xl text-sm text-white px-2 py-1">
                                        Maks. 8 Orang
                                    </div>
                                    <div class="bg-[#F67474] rounded-xl text-sm text-white px-2 py-1">
                                        Non Smoking
                                    </div>
                                </div>

                                <h2 class="text-orange-500 mt-2 font-semibold">Mulai Dari</h2>
                                <h2 class="font-semibold text-lg">Rp. 90.000 / 2 jam</h2>
                            </div>
                        </div>

                        {{-- Ruangan --}}
                        <div class="flex border border-gray-200 bg-white gap-x-10 rounded-xl p-2 shadow-lg mt-8">
                            <img src="{{asset('img/contoh1.png')}}" alt="">
                            <div class="flex flex-col">
                                <h2 class="text-xl font-semibold">Melawai Room</h2>
                                <div class="inline-flex gap-x-3 mt-2">
                                    <div class="bg-[#6DC993] rounded-xl text-sm text-white px-2 py-1">
                                        Maks. 8 Orang
                                    </div>
                                    <div class="bg-[#F67474] rounded-xl text-sm text-white px-2 py-1">
                                        Non Smoking
                                    </div>
                                </div>

                                <h2 class="text-orange-500 mt-2 font-semibold">Mulai Dari</h2>
                                <h2 class="font-semibold text-lg">Rp. 90.000 / 2 jam</h2>
                            </div>
                        </div>

                        {{-- Ruangan --}}
                        <div class="flex border border-gray-200 bg-white gap-x-10 rounded-xl p-2 shadow-lg mt-8">
                            <img src="{{asset('img/contoh1.png')}}" alt="">
                            <div class="flex flex-col">
                                <h2 class="text-xl font-semibold">Melawai Room</h2>
                                <div class="inline-flex gap-x-3 mt-2">
                                    <div class="bg-[#6DC993] rounded-xl text-sm text-white px-2 py-1">
                                        Maks. 8 Orang
                                    </div>
                                    <div class="bg-[#F67474] rounded-xl text-sm text-white px-2 py-1">
                                        Non Smoking
                                    </div>
                                </div>

                                <h2 class="text-orange-500 mt-2 font-semibold">Mulai Dari</h2>
                                <h2 class="font-semibold text-lg">Rp. 90.000 / 2 jam</h2>
                            </div>
                        </div>

                    </section>

                    {{-- Pilihan Meja --}}
                    <section class=" mt-10 flex flex-col">

                        <div class="inline-flex font-semibold gap-x-4 text-3xl mb-5">
                            <div>
                                <img src="{{asset('img/Table.png')}}" alt="">
                            </div>
                            Pilihan Meja
                        </div>

                        {{-- Meja --}}
                        <div class="flex border bg-white border-gray-200 gap-x-10 rounded-xl p-2 shadow-lg">
                            <img src="{{asset('img/contoh1.png')}}" alt="">
                            <div class="flex flex-col">
                                <h2 class="text-xl font-semibold">Melawai Room</h2>
                                <div class="inline-flex gap-x-3 mt-2">
                                    <div class="bg-[#6DC993] rounded-xl text-sm text-white px-2 py-1">
                                        3 - 5 Orang
                                    </div>
                                    <div class="bg-[#F67474] rounded-xl text-sm text-white px-2 py-1">
                                        Outdoor
                                    </div>
                                </div>

                                <h2 class="text-orange-500 mt-2 font-semibold">Minimal Order</h2>
                                <h2 class="font-semibold text-lg">Rp. 100.000 / 2 jam</h2>
                            </div>
                        </div>

                        {{-- Meja --}}
                        <div class="flex border bg-white border-gray-200 gap-x-10 rounded-xl p-2 shadow-lg mt-8">
                            <img src="{{asset('img/contoh1.png')}}" alt="">
                            <div class="flex flex-col">
                                <h2 class="text-xl font-semibold">Melawai Room</h2>
                                <div class="inline-flex gap-x-3 mt-2">
                                    <div class="bg-[#6DC993] rounded-xl text-sm text-white px-2 py-1">
                                        3 - 5 Orang
                                    </div>
                                    <div class="bg-[#F67474] rounded-xl text-sm text-white px-2 py-1">
                                        Outdoor
                                    </div>
                                </div>

                                <h2 class="text-orange-500 mt-2 font-semibold">Minimal Order</h2>
                                <h2 class="font-semibold text-lg">Rp. 100.000 / 2 jam</h2>
                            </div>
                        </div>

                        {{-- Meja --}}
                        <div class="flex border bg-white border-gray-200 gap-x-10 rounded-xl p-2 shadow-lg mt-8">
                            <img src="{{asset('img/contoh1.png')}}" alt="">
                            <div class="flex flex-col">
                                <h2 class="text-xl font-semibold">Melawai Room</h2>
                                <div class="inline-flex gap-x-3 mt-2">
                                    <div class="bg-[#6DC993] rounded-xl text-sm text-white px-2 py-1">
                                        3 - 5 Orang
                                    </div>
                                    <div class="bg-[#F67474] rounded-xl text-sm text-white px-2 py-1">
                                        Outdoor
                                    </div>
                                </div>

                                <h2 class="text-orange-500 mt-2 font-semibold">Minimal Order</h2>
                                <h2 class="font-semibold text-lg">Rp. 100.000 / 2 jam</h2>
                            </div>
                        </div>

                    </section>
                </div>


                <div class="w-3/8 " id="maps">
                    <p class="text-center text-3xl font-semibold">Temukan Lokasi Tempat di <span class="text-orange-500">Maps</span></p>

                    <div class="w-full h-[500px] border border-gray-200 shadow-xl rounded-xl mt-5 p-5">

                        <div class="w-full h-[250px]" id="peta">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2027677.9212814716!2d105.19650925625!3d-6.972890399999993!2m3!1f0!2f0!3f0!3m2!1i104!2i768!4f13.1!3m3!1m2!1s0x2e68e969bc54be89%3A0x2cde296cfcd5b037!2sDiagram%20Coffee%20%26%20Space!5e0!3m2!1sen!2sid!4v1745821243003!5m2!1sen!2sid" width="100%" height="100%" style="border-radius:20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <div class="flex flex-col items-start" id="fasilitas">
                                <h2 class="text-2xl font-semibold mt-5">Fasilitas Lokasi</h2>
                                <ul class="text-sm font-medium items-start list-disc flex flex-col ml-5 gap-y-1 mt-1">
                                    <li>Parkir Mobil</li>
                                    <li>Parkir Motor</li>
                                    <li>Keamanan 24 Jam</li>
                                    <li>Rak Helm</li>
                                </ul>

                                <a href="#" class="w-full h-full text-center text-[15px] text-white bg-[#363062] p-2 rounded-xl mt-5 transition ease-in-out hover:-translate-y-1 duration-300">
                                    Buka Maps
                                </a>

                            </div>
                        </div>

                    </div>

                    <h1 class="mt-10 text-[27px] font-bold mb-3">Hubungi Sekarang</h1>

                    <div class="flex flex-col border border-gray-200 w-full text-start py-5 px-8 rounded-xl shadow-xl">
                        <div class="inline-flex justify-between">
                            <div class="flex flex-col text-sm">
                                <h1 class="font-semibold text-2xl">Kontak WhatsApp</h1>
                                <h3 class="text-xl">Hubungi via <span class="text-green-400 font-bold">WhatsApp</span></h3>
                            </div>
                            <div class="flex items-center">
                                <img src="{{asset("img/phone.png")}}" alt="" class="mr-10">
                            </div>
                        </div>
                        <div class="w-full h-full text-center text-[15px] text-white bg-[#00C652] p-2 rounded-xl mt-8">
                            Chat WhatsApp
                        </div>
                    </div>

                    <h1 class="mt-10 text-[27px] font-bold mb-3">Social Media</h1>

                    <div class="w-full p-5 flex flex-col border rounded-xl shadow-xl bg-white border-gray-200 gap-y-2">
                        <h1 class="text-[17px]"><span class="font-semibold">Instagram : </span> @voffice_bdg</h1>
                        <h1 class="text-[17px]"><span class="font-semibold">TikTok : </span> @voffice_bdg</h1>
                    </div>

                </div>
            </div>

            {{-- Rekomendasi --}}
            <section class="mt-10 flex flex-col mb-[150px]">

                <div class="inline-flex font-semibold text-3xl mb-10">
                    Rekomendasi Tempat Lainnya
                </div>

                <div class="inline-flex gap-x-8">

                    {{-- Rekomendasi --}}
                    <div class="border border-gray-200 h-full rounded-xl w-[350px] py-5 px-3 flex flex-col shadow-xl">
                        <img src="{{asset("img/contoh1.png")}}" alt="">
                        <h1 class="mt-2 text-lg font-semibold">PointLab - Private Team/Individual Room</h1>

                        <div class="inline-flex">
                            <div class="mr-2 mt-[2px]">

                                <img src="{{asset("img/GrayMap.png")}}" alt="">
                            </div>
                            <p class="text-gray-400">Jl. Lengkong kecil, Bandung</p>
                        </div>

                        <div class="inline-flex">
                            <div class="mr-2 mt-[4px]">
                                <img src="{{asset("img/GrayJam.png")}}" alt="">
                            </div>
                            <p class="text-gray-400">08.00 - 22.00</p>
                        </div>

                        <div class="w-full rounded-lg text-center text-white mt-5 bg-[#4C6FFF] py-2 px-7">
                            Detail
                        </div>
                    </div>

                    {{-- Rekomendasi --}}
                    <div class="border border-gray-200 h-full rounded-xl w-[350px] py-5 px-3 flex flex-col shadow-xl">
                        <img src="{{asset("img/contoh1.png")}}" alt="">
                        <h1 class="mt-2 text-lg font-semibold">PointLab - Private Team/Individual Room</h1>

                        <div class="inline-flex">
                            <div class="mr-2 mt-[2px]">

                                <img src="{{asset("img/GrayMap.png")}}" alt="">
                            </div>
                            <p class="text-gray-400">Jl. Lengkong kecil, Bandung</p>
                        </div>

                        <div class="inline-flex">
                            <div class="mr-2 mt-[4px]">
                                <img src="{{asset("img/GrayJam.png")}}" alt="">
                            </div>
                            <p class="text-gray-400">08.00 - 22.00</p>
                        </div>

                        <div class="w-full rounded-lg text-center text-white mt-5 bg-[#4C6FFF] py-2 px-7">
                            Detail
                        </div>
                    </div>

                    {{-- Rekomendasi --}}
                    <div class="border border-gray-200 h-full rounded-xl w-[350px] py-5 px-3 flex flex-col shadow-xl">
                        <img src="{{asset("img/contoh1.png")}}" alt="">
                        <h1 class="mt-2 text-lg font-semibold">PointLab - Private Team/Individual Room</h1>

                        <div class="inline-flex">
                            <div class="mr-2 mt-[2px]">

                                <img src="{{asset("img/GrayMap.png")}}" alt="">
                            </div>
                            <p class="text-gray-400">Jl. Lengkong kecil, Bandung</p>
                        </div>

                        <div class="inline-flex">
                            <div class="mr-2 mt-[4px]">
                                <img src="{{asset("img/GrayJam.png")}}" alt="">
                            </div>
                            <p class="text-gray-400">08.00 - 22.00</p>
                        </div>

                        <div class="w-full rounded-lg text-center text-white mt-5 bg-[#4C6FFF] py-2 px-7">
                            Detail
                        </div>
                    </div>

                </div>

            </section>

        </section>

    </div>

    <div class="w-full h-[1.5px] bg-[#2F327D]"></div>

    <div class="flex flex-col w-full h-[280px] px-[150px] mb-5">
        <div class="w-full flex">
            <div class="mt-10">
                <img src="{{asset("img/logo.png")}}" alt="" class="w-[200px]">
            </div>

            <div class="flex w-full pl-[600px]">
                <div>
                    <h1 class="text-xl font-bold mt-10 mb-3">Kontak Kami</h1>
                    <ul class="text-gray-600">
                        <li class="mb-3">spacehub@gmail.com</li>
                        <li> +62 8883 8883</li>
                    </ul>
                </div>

                <div class="ml-[100px]">
                    <h1 class="text-xl font-bold mt-10 mb-3">Social Media</h1>
                    <ul class="text-gray-600">
                        <li class="mb-3">Instagram</li>
                        <li>Linkedln</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="flex w-full text-center justify-center items-end text-gray-600 h-full text-sm py-2">
            All rights reserved© 2025 SpaceHub.<br>Menghubungkan Ruang Kerja, Memberdayakan Bisnis
        </div>

    </div>

</body>
</html>
