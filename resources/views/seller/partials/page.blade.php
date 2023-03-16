<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{ $page_title}}</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    {{-- CSS files --}}
    @include('layouts/front/assets/css')

</head>

<body class="home">
    @include("layouts.front.includes.messenger-widget")
    <div class="page-wrapper">

        {{-- Navbar --}}
        @include('layouts/front/includes/navbar')
        @if(!is_null(User::user()) && User::user()->user_validated === 1)
            @yield('page')
        @else
            <main class="my-4 py-5">
                @include('seller.partials.alert')
            </main>
        @endif


        <!-- Start of Footer -->
        @include('layouts/front/includes/footer')
        <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper-->




    {{-- CSS files --}}
    @include('layouts/front/assets/js')
    <script>
        const toggle = document.querySelector("#toggle"),
                toggleConfirm = document.querySelector('#toggleConfirm'),
                i = document.querySelector('#toggle i');
                iConfirm = document.querySelector('#toggleConfirm i');
              input = document.querySelector("#password");
              inputConfirm = document.querySelector("#password_confirmation");
              toggle.addEventListener("click", () =>{
                  if(input.type ==="password"){
                    input.type = "text";
                    i.classList.replace("fa-eye", "fa-eye-slash");
                  }else{
                    input.type = "password";
                    i.classList.replace("fa-eye-slash", "fa-eye");
                  }
              });


              //* Confirmation:
              toggleConfirm.addEventListener("click", () =>{
                  if(inputConfirm.type ==="password"){
                    inputConfirm.type = "text";
                    iConfirm.classList.replace("fa-eye", "fa-eye-slash");
                  }else{
                    inputConfirm.type = "password";
                    iConfirm.classList.replace("fa-eye-slash", "fa-eye");
                  }
              })
    </script>

    <script type="text/javascript">
        $("docmuent").ready(function(){
        $("label.credit-item").each(function(){
            $(this).on("click", function (e){
                let active = $("label.active");
                $(active).removeClass("active");
            }) // Troisième
        }) // Deuxième
    }); //Premier
    </script>
</body>

</html>