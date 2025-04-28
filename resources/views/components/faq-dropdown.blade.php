@props(['id', 'question', 'answer'])

<div class="border border-gray-200 rounded-lg overflow-hidden shadow-sm">
    <button 
        @click="selected !== {{ $id }} ? selected = {{ $id }} : selected = null"
        class="flex justify-between items-center w-full px-4 py-3 text-left bg-white hover:bg-gray-50"
    >
        <span class="font-semibold text-[var(--color-spacehub-dark)]">{{ $question }}</span>
        <svg 
            :class="selected == {{ $id }} ? 'rotate-180 transform' : ''"
            class="w-5 h-5 transition-transform duration-300" 
            fill="none" 
            stroke="currentColor" 
            viewBox="0 0 24 24"
        >
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>
    <div 
        x-show="selected == {{ $id }}" 
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-4"
        class="px-4 py-3 bg-gray-50 text-gray-600"
    >
        {{ $answer }}
    </div>
</div>