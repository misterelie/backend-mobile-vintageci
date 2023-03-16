<!-- Plugin JS File -->
<script src="{{  asset('front/assets/vendor/jquery/jquery.min.js')}} "></script>
<script src="{{  asset('front/assets/vendor/jquery.plugin/jquery.plugin.min.js')}} "></script>
<script src="{{ asset('back/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
<script src="{{  asset('front/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}} "></script>
<script src="{{  asset('front/assets/vendor/zoom/jquery.zoom.js')}} "></script>
<script src="{{  asset('front/assets/vendor/jquery.countdown/jquery.countdown.min.js')}} "></script>
<script src="{{  asset('front/assets/vendor/magnific-popup/jquery.magnific-popup.min.js')}} "></script>
<script src="{{  asset('front/assets/vendor/skrollr/skrollr.min.js')}} "></script>
<script src=" {{ asset('front/assets/js/bootstrap.min.js')}} "></script>

<!-- Swiper JS -->
<script src="{{  asset('front/assets/vendor/swiper/swiper-bundle.min.js')}} "></script>

<script src="{{  asset('front/assets/vendor/swiper/swiper-bundle.min.js')}} "></script>
<script src="{{  asset('front/assets/vendor/swiper/swiper-bundle.min.js')}} "></script>
<!-- Main JS -->
<script src="{{  asset('front/assets/js/main.min.js')}} "></script>
<script src=" {{ asset('front/assets/js/preview.js')}} "></script>

{{-- Summernote --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(window).scroll(function() {
        //console.log($(this).scrollTop())
        if ($(this).scrollTop() >= 112) {
            $('.mobile-header-search').addClass('header-fixed');
        } else {
            $('.mobile-header-search').removeClass('header-fixed');
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('textarea, .summernote').summernote({
            lang: 'fr-FR',
            height: 285,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline',]],
                // ['font', ['strikethrough', 'superscript', 'subscript']],
                ['para', ['ul', 'ol']],
            ]
        });
    });
</script>


<script>
    const textarea = document.querySelector("textarea");
    if(textarea){
        textarea.style.display = "block";
    textarea.addEventListener("keyup", e =>{
      textarea.style.height = "63px";
      let scHeight = e.target.scrollHeight;
      textarea.style.height = `${scHeight}px`;
    });
    }
</script>

<script type="text/javascript">
    const closeModal = document.getElementById("closeCustomModal");
    const modalWrapper = document.getElementById("custom-pub-wrapper");
    $(document).ready(function(){
        setTimeout(() => {
            if (modalWrapper) {
                openCustomModal();
            }
        }, 5000);
    });
    function closeCustomModal() {
        modalWrapper.style.display = "none";
    }
    function openCustomModal() {
        modalWrapper.style.display = "block";
    }
</script>

<script type="text/javascript">
    function myFunction(imgs) {
        // Get the expanded image
        var expandImg = document.getElementById("expandedImg");
        // Get the image text
        //var imgText = document.getElementById("imgtext");
        // Use the same src in the expanded image as the image being clicked on from the grid
        expandImg.src = imgs.src;
        // Use the value of the alt attribute of the clickable image as text inside the expanded image
        //imgText.innerHTML = imgs.alt;
        // Show the container element (hidden with CSS)
        expandImg.parentElement.style.display = "block";
    } 
</script>

<script>
    var closeCustomModal = '#closeCustomModal';
    const IP = "{{Meta::ip()}}";
    $(closeCustomModal).on('click', function(event){
        event.preventDefault();

        var url = "{{url('/hasVisited')}}";
        var Data = {"user_ip": IP};
        $.ajax({
            url: url,
            method: 'GET',
            data: Data,
            //contentType: false,
            cache: false,
            processData: false,
            beforeSend:function(){
                $(closeCustomModal).html('<span class="spinner-border text-primary" role="status" style="width:20px;height:20px !important"></span>'); //// Changement d'icone
            },
            success:function(response)
            {
                $(closeCustomModal).html('<img src="{{asset("/front/assets/images/close.png")}}" alt="" srcset="">'); // Changement d'icone
                modalWrapper.style.display = "none"; // Fermeture du modal
            },
            error: function(response) {
                modalWrapper.style.display = "none";
            }
        });
    });
</script>



@livewireScripts