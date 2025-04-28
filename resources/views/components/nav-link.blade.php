<a {{ $attributes }}
    class="{{ $active ? 'text-gray-600 hover:font-semibold' : 'text-gray-600 hover:text-[var(--color-spacehub)]' }} rounded-md px-3 py-2 text-sm font-medium transition duration-300 cursor-pointer"
    aria-current="{{ $active ? 'page' : false }}"
    @click.prevent="document.querySelector('{{ $href }}')?.scrollIntoView({behavior: 'smooth'})">
    {{ $slot }}
</a>
<!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
