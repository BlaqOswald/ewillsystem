
@if(session('alert'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                toast: true,
                position: 'top-right',
                icon: '{{ session('alert.type') }}',
                title: '{!! addslashes(session('alert.message')) !!}',
                showConfirmButton: true,
                // timer: 3000 // Auto-close in 3 seconds
            });
        });
    </script>
@endif
