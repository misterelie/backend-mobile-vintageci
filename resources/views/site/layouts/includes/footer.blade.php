<footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <img src="{{ asset('storage/'.Site::logo())}} " style="width:200px;"/> 
            @if(!is_null(Site::adresse()))
            <p><br/>
             @if(!is_null(Site::adresse()->phone_one)) Tél 1:  {{Site::adresse()->phone_one}} <br/> @endif
             @if(!is_null(Site::adresse()->phone_two)) Tél 2:  {{Site::adresse()->phone_two}} <br/> @endif
             @if(!is_null(Site::adresse()->email_one)) E-mail: {{Site::adresse()->email_one}} <br> @endif
             @if(!is_null(Site::adresse()->adresse)) {{Site::adresse()->adresse}} <br><br>@endif
              <p>
              @endif
                <div class="social-links pt-3 pt-md-0">
                  @if(!is_null(Site::adresse()->facebook))
                    <a href="{{ Site::adresse()->facebook}}" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a> 
                  @endif
                  @if(!is_null(Site::adresse()->instagram))
                  <a href="{{ Site::adresse()->instagram}}" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
                  @endif
                   @if(!is_null(Site::adresse()->skype))
                  <a href="{{ Site::adresse()->skype}}" class="google-plus" target="_blank"><i class="bx bxl-skype"></i></a>
                   @endif
                  @if(!is_null(Site::adresse()->linkedin))
                  <a href="{{ Site::adresse()->linkedin}}" class="linkedin" target="_blank"><i class="bx bxl-linkedin"></i></a>
                   @endif
                </div>
              </p>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>A propos de nous</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{url('/presentation') }} ">Notre société</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{url('/nos-realisations') }} ">Nos réalisations</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{url('/nos-references') }} ">Nos références</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{url('/demander-un-devis') }} ">Demandez un devis</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{url('/contact') }} ">Nous contacter</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos prestations</h4>
            <ul>
              @if(!is_null(Site::categories()))
                @foreach (Site::categories() as $cat)
               <li><i class="bx bx-chevron-right"></i><a class="text-uppercase" href="{{ url('/services', $cat->slug)}}">{{ Str::ucfirst($cat->category)}}</a></li>
               @endforeach
              @endif
             
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Newsletter</h4>
            <p>Souscrivez à notre newsletter et restés informés de toutes nos offres promotionnelles.</p>
            <form action="{{ url('/newsletter/create')}} " method="post">
              @csrf
              <input type="email" name="email">
              <input type="submit" value="Souscrire">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright {{ date('Y')}} <strong><span>Impression KDO</span></strong>. Tous droits réservés.
        </div>
        <div class="credits">
       
          Conçu par <a href="https://africodeur.ci/" target="_blank">AFRICODEUR SARL</a>
        </div>
      </div>
      <div class=" text-right text-md-right pt-3 pt-md-0">
        <a href="{{ url('/main/dashboard') }}" target="_blank">Tableau de bord</a>
      </div>
    </div>
  </footer>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>