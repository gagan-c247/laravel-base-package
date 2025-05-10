<script>
    const timeout = 2000;
    window.onload = function() {
        @if (session('success'))
            toastr.success("{{ session('success') }}", "Success", {
                iconClass: 'success',
                timeOut: timeout
            });
        @elseif (session('error'))
            toastr.error("{{ session('error') }}", "Error", {
                iconClass: 'error',
                timeOut: timeout
            });
        @endif
    }
</script>
