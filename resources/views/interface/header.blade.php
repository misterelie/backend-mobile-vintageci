<header>
    <div class="container-fluid">
        <!-- Button trigger modal -->
        <div class="mobile-toggler d-lg-none">
            <a href="#" data-bs-toggle="modal" data-bs-target="#navbModal">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="navb-logo">
            <img src="{{ asset('assets/img/icon-android.png')}}" alt="Logo">
        </div>
        
        <div class="mobile-toggler d-lg-none">
            <a href="{{ route('interface.login') }}">
                <i class="fa fa-user-plus"></i>
            </a>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="navbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="{{ asset('assets/img/ICONES-04.png')}}" alt="Logo">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </div> 
                    <div class="modal-body">
                        <div class="modal-line">
                            <i class="fa fa-home" aria-hidden="true"></i><a href="/">Accueil</a>
                        </div>
                        <div class="modal-line">
                            <i class="fa fa-list" aria-hidden="true"></i><a href="/services">Toutes Les Catégories</a>
                        </div>
                        <div class="modal-line">
                            <i class="fa fa-bullhorn" aria-hidden="true"></i><a href="/cases">Poster Une Annonce<a>
                        </div>

                        <div class="modal-line">
                            <i class="fa fa-plus" aria-hidden="true"></i><a href="/about">Toutes les annonces</a>
                        </div>

                        <div class="modal-line">
                            <i class="fa fa-plus" aria-hidden="true"></i><a href="/about">Les Annonces VIP</a>
                        </div>

                        <div class="modal-line">
                            <i class="fa fa-plus" aria-hidden="true"></i><a href="/about">Annonces Par Commune</a>
                        </div>

                        <div class="modal-line">
                            <i class="fa fa-credit-card" aria-hidden="true"></i><a href="/about">Acheter Du Crédit</a>
                        </div>

                        <div class="modal-line">
                            <i class="fa fa-question" aria-hidden="true"></i><a href="/about">Aide</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>