<!-- Must needed plugins to the run this Template -->
<script src="{{asset('admin/js/jquery.min.js') }} "></script>
<script src="{{asset('admin/js/popper.min.js') }} "></script>
<script src="{{asset('admin/js/bootstrap.min.js') }} "></script>
<script src="{{asset('admin/js/ecaps.bundle.js') }} "></script>
<script src="{{asset('admin/js/default-assets/todolist.js') }} "></script>
<script src="{{asset('admin/js/default-assets/date-time.js') }} "></script>

{{-- Script de base --}}
<script src="{{asset('admin/js/default-assets/active.js') }} "></script>

{{-- Plugins de cartes --}}
<script src="{{asset('admin/js/apexchart/apexchart.js') }} "></script>
<script src="{{asset('admin/js/apexchart/pageviews.js') }} "></script>
<script src="{{asset('admin/js/apexchart/revenuebar.js') }} "></script>
<script src="{{asset('admin/js/apexchart/sales-overview.js') }} "></script>
<script src="{{asset('admin/js/apexchart/order-statistics.js') }} "></script>
<script src="{{asset('admin/js/apexchart/yearly-sales.js') }} "></script>
<script src="{{asset('admin/js/apexchart/dailysales.js') }} "></script>
<script src="{{asset('admin/js/apexchart/catagory.js') }} "></script>

<script src="{{asset('admin/js/default-assets/vector-map/jquery-jvectormap-2.0.2.min.js') }} "></script>
<script src="{{asset('admin/js/default-assets/vector-map/jquery-jvectormap-world-mill-en.js') }} "></script>
<script src="{{asset('admin/js/default-assets/vector-map/jvectormap.custom.js') }} "></script>

{{-- Imported Plugins --}}
<script src="{{asset('admin/js/default-assets/summernote.min.js') }} "></script>
<script src="{{asset('admin/js/default-assets/summernote-fr.min.js') }} "></script>
<script src="{{asset('admin/js/default-assets/summernote-active.js') }} "></script>

{{-- Le DataTable --}}
<script src="{{asset('admin/js/default-assets/data-table.min.js') }} "></script>
<script src="{{asset('admin/js/default-assets/data-table-active.js') }} "></script>

{{-- SweetAlert --}}
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