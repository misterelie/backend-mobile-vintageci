<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('front/assets/images/favicon.png') }} ">

<!-- WebFont.js -->
<script>
    WebFontConfig = {
        google: {
            families: ['Poppins:400,500,600,700,800']
        }
    };
    (function(d) {
        var wf = d.createElement('script'),
            s = d.scripts[0];
        wf.src = 'assets/js/webfont.js';
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
    })(document);
</script>

<link rel="preload" href="{{ asset('front/assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2') }} "
    as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="{{ asset('front/assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }} "
    as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="{{ asset('front/assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }} "
    as="font" type="font/woff2" crossorigin="anonymous">
<link rel="preload" href="{{ asset('front/assets/fonts/wolmart87d5.woff?png09e') }} " as="font" type="font/woff"
    crossorigin="anonymous">


{{-- Summernote --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<!-- Vendor CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/vendor/fontawesome-free/css/all.min.css') }} ">

<!-- Plugins CSS -->
<!-- <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css"> -->
<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/vendor/animate/animate.min.css') }} ">
<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/vendor/magnific-popup/magnific-popup.min.css') }} ">
<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.css') }} ">

<!-- Default CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/style.min.css') }} ">

    
@livewireStyles
