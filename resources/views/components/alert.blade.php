@props(['type' => 'success', 'message' => ''])

<div 
    x-data="{
        show: false,
        type: '{{ $type }}',
        message: '{{ $message }}'
    }"
    x-init="
        $watch('show', value => {
            if (value) {
                Swal.fire({
                    icon: type,
                    title: type.charAt(0).toUpperCase() + type.slice(1),
                    text: message,
                    confirmButtonColor: 'var(--color-spacehub-dark)'
                });
            }
        });
        show = true;
    "
></div>