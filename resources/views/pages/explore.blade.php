@extends('layout.landingLayout', ['title' => 'Explore Workspaces'])

@section('content')
    {{-- Main Container --}}
    <div class="min-h-screen bg-gradient-to-br from-white to-blue-100 px-6 md:px-20 py-12 flex flex-col">
        {{-- BreadCrumbs --}}
        <div class="mb-4">
            <x-breadcrumbs :breadcrumbs="[['label' => 'Home', 'url' => route('landing.index')], ['label' => 'Katalog']]" />
        </div>
        {{-- "Hero" Section --}}
        <div class=" mb-8">
            <div class="max-w-full rounded-lg w-full">
                <img src="{{ asset('images/explore-image.png') }}" alt="Explore Workspaces"
                    class="w-auto object-cover object-left h-full">
            </div>
        </div>

        {{-- Katalog Section --}}
        <div id="katalog" class="min-h-screen">
            <div class="flex flex-row items-center gap-2 mb-5">
                <div class="w-3 h-3 bg-[var(--color-spacehub)]"></div>
                <p class="text-lg">Katalog</p>
            </div>
            <div class="flex flex-row justify-between items-center">
                <h2 class="font-bold text-lg lg:text-4xl text-[var(--color-spacehub-dark)]">Temukan Kafe dan Workspace</h2>
            </div>
            <div class="flex justify-end mb-8">
                {{-- Search --}}
                <form action="{{ route('landing.explore') }}" method="GET">
                    <input type="text" name="location" placeholder="Cari lokasi..." value="{{ $searchLocation ?? '' }}"
                        class="px-3 py-3 border border-gray-300 rounded-md focus:outline-none focus:border-[var(--color-spacehub)] text-sm bg-white shadow-sm">
                    </input>
                </form>
            </div>
            {{--  workspace cards container - keeping existing layout  --}}
            <div class="grid grid-cols-1 md:grid-cols-2 px-10 py-15 lg:grid-cols-3 gap-8 auto-rows-auto">
                @foreach ($topWorkspaces as $workspace)
                    <div class="block">
                        <x-spacecards :name="$workspace->name" :address="$workspace->address" :openingTime="$workspace->opening_time" :closingTime="$workspace->closing_time"
                            :image="$workspace->getCoverImageUrl()" :id="$workspace->id" />
                    </div>
                @endforeach
            </div>
            @if (isset($topWorkspaces) && method_exists($topWorkspaces, 'links'))
                <div class="mt-8 flex justify-end">
                    {{ $topWorkspaces->links() }}
                </div>
            @endif
        </div>


        {{-- Kemitraan section --}}
        <div id="mitra" class="min-h[80vh] my-10 mx-8">
            <div class="grid grid-cols-2">
                <div class="col-span-1 flex flex-col lg:gap-5">
                    <div
                        class="bg-[var(--color-spacehub-dark)] px-3 py-2 text-white rounded-full  lg:max-w-[25%] text-center">
                        Kemitraan
                    </div>
                    <h2 class="font-jakarta font-bold text-xl lg:text-4xl text-[var(--color-spacehub-dark)] mt-5">
                        Bergabung bersama SpaceHub!
                    </h2>
                    <svg class="w-full max-w-[400px] h-auto" viewBox="0 0 488 34" fill="none"
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

    </div>
@endsection
