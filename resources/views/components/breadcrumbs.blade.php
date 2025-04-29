@props(['breadcrumbs'])

<nav aria-label="Breadcrumb" class="py-4">
    <ol class="flex items-center space-x-2 text-gray-500">
        @foreach($breadcrumbs as $index => $breadcrumb)
            <li class="flex items-center">
                @if($index > 0)
                    <span class="mx-2">&raquo;</span>
                @endif
                
                @if(isset($breadcrumb['url']) && $index < count($breadcrumbs) - 1)
                    <a href="{{ $breadcrumb['url'] }}" class="text-gray-600 hover:text-[var(--color-spacehub-dark)] transition duration-150">
                        {{ $breadcrumb['label'] }}
                    </a>
                @else
                    <span class="font-medium text-[var(--color-spacehub-dark)]">{{ $breadcrumb['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>