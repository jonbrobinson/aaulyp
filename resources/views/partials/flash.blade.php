@if(session()->has('flash_message'))
    <script type="text/javascript">
            swal({
                    title: "{{ session('flash_message.title') }}",
            text: "{{ session('flash_message.message') }}",
            type: "{{ session('flash_message.level') }}",
            timer: 1700,
            showConfirmButton: false
        });
    </script>
    {!! session()->forget('flash_message') !!}
@endif

@if(session()->has('flash_message_overlay'))
    <script type="text/javascript">
            swal({
                    title: "{{ session('flash_message_overlay.title') }}",
            text: "{{ session('flash_message_overlay.message') }}",
            type: "{{ session('flash_message_overlay.level') }}",
            confirmButtonText: 'Accept'
        });
    </script>
    {!! session()->forget('flash_message_overlay') !!}
@endif
