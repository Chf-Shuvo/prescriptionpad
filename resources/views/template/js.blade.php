<script src="{{ asset('backend/vendors/scripts/core.js') }}"></script>
<script src="{{ asset('backend/vendors/scripts/script.min.js') }}"></script>
<script src="{{ asset('backend/vendors/scripts/process.js') }}"></script>
<script src="{{ asset('backend/vendors/scripts/layout-settings.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.79/jquery.form-validator.min.js"></script>
<script>
  $(document).ready(function() {
    $.validate();
  });
</script>
@include('sweetalert::alert')
@stack('js')
