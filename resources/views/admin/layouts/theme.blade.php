<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ $page_title }} </title>

    @livewireStyles
    @include('admin/layouts/assets/css')
    

</head>

<body>
   
    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="ecaps-page-wrapper">


        @include('admin/layouts/includes/sidebar')

        <!-- Page Content -->
        <div class="ecaps-page-content">
            <!-- Top Header Area -->

            @include('admin/layouts/includes/navbar')
           

            <!-- Main Content Area -->
            <div class="main-content">
                <div class="main-container container-fluid">

                    @yield('theme')
                </div>

                @include('admin/layouts/includes/footer')

            </div>
        </div>
    </div>
    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->
@livewireScripts
    @include('admin/layouts/assets/js')

</body>
</html>