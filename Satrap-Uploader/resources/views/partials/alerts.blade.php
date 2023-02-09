<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('simpleSuccess'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{session('simpleSuccess')}}",
            showConfirmButton: false,
            timer: 2800
        })
    </script>
@endif
@if(session('simpleError'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: "{{session('simpleError')}}",
            showConfirmButton: false,
            timer: 4000
        })
    </script>
@endif
