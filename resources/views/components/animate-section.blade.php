@props(['animation' => 'fade-in'])

<div x-data="{ 
    animationClass: '{{ $animation }}',
    isVisible: false 
}" 
x-init="
    $nextTick(() => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    isVisible = true;
                    observer.disconnect();
                }
            });
        }, { threshold: 0.2 });
        
        observer.observe($el);
    })
" 
:class="[animationClass, isVisible ? 'appear' : '']"
{{ $attributes }}>
    {{ $slot }}
</div>