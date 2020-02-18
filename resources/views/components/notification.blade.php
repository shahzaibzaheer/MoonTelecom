


<script type="application/javascript">

    // toastr.success("HELLOooooooo");
    @if(\Illuminate\Support\Facades\Session::has('success'))
        toastr.success("{{ \Illuminate\Support\Facades\Session::get('success') }}");
    @endif

</script>