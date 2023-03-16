<div id="topbar" class="d-flex align-items-center fixed-top">
  <div class="container d-flex justify-content-between">
    <div class="contact-info d-flex align-items-center">
      <div class="contact-info d-flex align-items-center">
        <a href="{{ url('/')}}">
          <img src="{{asset('storage/'.Site::logo()) }}" style="width:200px;" />
      </div>
    </div>
    <div class="d-none d-lg-flex social-links align-items-center">
      <a href="{{ url('/presentation') }}" class="twitter" style="color:#000; font-weight:bold; font-size:13px;">NOTRE
        SOCIETE</a>
      <a href="{{ url('/nos-realisations')}}" class="twitter" style="color:#000; font-weight:bold; font-size:13px;">NOS
        REALISATIONS</a>
      <a href="{{ url('/nos-references')}}" class="twitter" style="color:#000; font-weight:bold; font-size:13px;">NOS
        REFERENCES</a>
      <a href="{{ url('/demander-un-devis')}}" class="twitter"
        style="color:#000; font-weight:bold; font-size:13px;">DEMANDEZ UN DEVIS</a>
      <a href="{{ url('/contact')}}" class="twitter"
        style="color:#000; font-weight:bold; font-size:13px; margin-right:20px;">NOS CONTACTS</a>

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

    </div>
  </div>
</div>