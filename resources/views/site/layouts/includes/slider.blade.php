<section id="services" class="services">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="swiper sliderFeaturedPosts">
          <div class="swiper-wrapper">

            @if (!is_null(Site::sliders()))
                @foreach(Site::sliders() as $s)
                  <div class="swiper-slide">
                    <img src="{{ asset('storage/'.$s->image)}} " alt="">
                  </div>
                @endforeach
            @endif

          </div>
          <div class="custom-swiper-button-next">
            <span class="bi-chevron-right"></span>
          </div>
          <div class="custom-swiper-button-prev">
            <span class="bi-chevron-left"></span>
          </div>

          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
  </section>