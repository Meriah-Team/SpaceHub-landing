@props([
    'name' => 'Workspace Name',
    'address' => 'Workspace Address',
    'openingTime' => '08:00',
    'closingTime' => '22:00',
    'image' => 'images/image.png',
    'id' => null
])

<div class="bg-white rounded-2xl shadow-2xl flex flex-col justify-between p-5 transition-all duration-300 hover:scale-105 h-full">
    <div class="h-48 w-full mb-3 overflow-hidden rounded-lg">
        <img src="{{ $image }}" alt="{{ $name }}" class="w-full h-full object-cover">
    </div>
    <div class="flex flex-col gap-1 py-2">
        {{-- Workspace Name --}}
        <p class="text-sm font-bold text-left text-gray-800">{{ $name }}</p>
        <div class="flex flex-row items-center gap-1">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g id="Bold / Map &#38; Location / Map Point">
                    <path id="Vector" fill-rule="evenodd" clip-rule="evenodd"
                        d="M9.00065 1.9165C5.87104 1.9165 3.33398 4.75167 3.33398 7.93734C3.33398 11.098 5.14259 14.5336 7.96441 15.8526C8.62222 16.16 9.37908 16.16 10.0369 15.8526C12.8587 14.5336 14.6673 11.098 14.6673 7.93734C14.6673 4.75167 12.1303 1.9165 9.00065 1.9165ZM9.00065 8.99984C9.78305 8.99984 10.4173 8.36557 10.4173 7.58317C10.4173 6.80077 9.78305 6.1665 9.00065 6.1665C8.21825 6.1665 7.58398 6.80077 7.58398 7.58317C7.58398 8.36557 8.21825 8.99984 9.00065 8.99984Z"
                        fill="#8D99AB" />
                </g>
            </svg>
            {{-- Workspace Address --}}
            <p class="text-gray-400 text-sm">{{ $address }}</p>
        </div>
        <div class="flex flex-row items-center gap-1">
            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g id="Clock" clip-path="url(#clip0_918_5589)">
                    <path id="Icon"
                        d="M8.50065 4.00016V8.00016L11.1673 9.3335M15.1673 8.00016C15.1673 11.6821 12.1825 14.6668 8.50065 14.6668C4.81875 14.6668 1.83398 11.6821 1.83398 8.00016C1.83398 4.31826 4.81875 1.3335 8.50065 1.3335C12.1825 1.3335 15.1673 4.31826 15.1673 8.00016Z"
                        stroke="#8D99AB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </g>
                <defs>
                    <clipPath id="clip0_918_5589">
                        <rect width="16" height="16" fill="white" transform="translate(0.5)" />
                    </clipPath>
                </defs>
            </svg>
            {{-- Open Hours --}}
            <p class="text-gray-400 text-sm">{{ substr($openingTime, 0, 5) }} - {{ substr($closingTime, 0, 5) }} WIB</p>
        </div>
    </div>
    <a href="{{ route('landing.detail', $id) }}"
       class="bg-[var(--color-spacehub-dark)] py-2 rounded-lg text-white hover:bg-[var(--color-spacehub)] transition duration-300 text-xs text-center mt-auto">
        Detail
    </a>
</div>
