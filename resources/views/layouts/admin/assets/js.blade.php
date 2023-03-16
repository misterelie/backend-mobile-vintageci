<script src="{{ asset('back/assets/libs/jquery/jquery.min.js')}} "></script>
<script src="{{ asset('back/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
<script src="{{ asset('back/assets/libs/metismenu/metisMenu.min.js')}} "></script>
<script src="{{ asset('back/assets/libs/simplebar/simplebar.min.js')}} "></script>
<script src="{{ asset('back/assets/libs/node-waves/waves.min.js')}} "></script>

<script src="{{ asset('back/assets/libs/select2/js/select2.min.js')}} "></script>
<script src="{{ asset('back/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}} "></script>
<script src="{{ asset('back/assets/libs/spectrum-colorpicker2/spectrum.min.js')}} "></script>
<script src="{{ asset('back/assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}} "></script>
<script src="{{ asset('back/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}} "></script>
<script src="{{ asset('back/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}} "></script>
<script src="{{ asset('back/assets/libs/%40chenfengyuan/datepicker/datepicker.min.js')}} "></script>

<!-- form advanced init -->
{{-- <script src="assets/js/pages/form-advanced.init.js"></script>

<script src="assets/js/app.js"></script> --}}


 
{{-- Init --}}
<script src="{{ asset('back/assets/js/pages/form-advanced.init.js')}} "></script>
<!-- apexcharts -->
<script src="{{ asset('back/assets/libs/apexcharts/apexcharts.min.js')}} "></script>


<script src="{{ asset('back/assets/js/app.js')}} "></script>

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
                cancelButtonClass: "btn btn-danger",
                cancelButtonText: "Fermer",
                confirmButtonColor:"#556ee6",cancelButtonColor:"#f46a6a"

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
                cancelButtonClass: "btn btn-danger",
                cancelButtonText: "Fermer",
                confirmButtonColor:"#556ee6",cancelButtonColor:"#f46a6a"
            }
    )
</script>'
!!}

@endif