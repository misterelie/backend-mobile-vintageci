 @livewireScripts

  <!-- Vendor JS Files -->
  <script src="{{ asset('front/assets/vendor/purecounter/purecounter.js')}} "></script>
  <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
  <script src="{{ asset('front/assets/vendor/glightbox/js/glightbox.min.js')}} "></script>
  <script src="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.js')}} "></script>
  <script src="{{ asset('front/assets/vendor/php-email-form/validate.js')}} "></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('front/assets/js/main.js')}} "></script>


<!-- These plugins only need for the run this page -->
<script src="{{  asset('admin/js/sweetalert.min.js')}} "></script>
<script src="{{  asset('admin/js/default-assets/jquery.sweet-alert.custom.js')}} "></script>

@if(Session::has('success'))
{!! 
'<script>
    swal(
            {
                title: "Réussite",
                text: "'.Session::get('success').'",
                type: "success",
                showCancelButton: true,
                confirmButtonClass: "btn btn-success",
                cancelButtonClass: "btn btn-danger"
            }
    )
</script>'
!!}

@endif



@if (Session::has('error'))
{!! 
'<script>
    swal(
            {
                title: "Alerte !",
                text: "'.Session::get('error').'",
                type: "error",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info",
                cancelButtonClass: "btn btn-danger"
            }
    )
</script>'
!!}

@endif