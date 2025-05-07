@props(['text', 'position'])

<div class="hidden md:flex items-center space-x-2 bg-white px-4 py-3 rounded-lg shadow-md absolute {{ $position }}">
    <div class="w-5 h-5 rounded-full bg-green-500 flex items-center justify-center">
        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
    </div>
    <span class="text-sm font-medium text-gray-700">{{ $text }}</span>
</div>