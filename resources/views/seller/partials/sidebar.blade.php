<ul class="nav nav-tabs mb-6 user-sidebar">
    <li class="nav-item">
        <a href="{{ url('/mon-compte')}}" class="nav-link {{ Helpers::page_active('mon-compte') }} "><span class="  w-icon-home"></span>&nbsp; Tableau de bord</a>
    </li>
    {{-- purchase/credit --}}
    <li class="nav-item    ">
        <a href="{{ url('/purchase/credit')}}" class="nav-link {{ Helpers::page_active('purchase/credit') }}  {{ Helpers::page_contains('my-purchases') }}"><span class="   w-icon-wallet"></span>&nbsp; Mes crédits</a>
    </li>

    <li class="nav-item">
        <a href="{{ url('account/setting')}}" class="nav-link {{ Helpers::page_active('setting') }}  {{ Helpers::page_contains('setting') }}"><span class="   w-icon-user"></span>&nbsp; Mon profil </a>
    </li>


    <li class="nav-item">
        <a href="{{ url('/account/mes-annonces')}}" class="nav-link {{ Helpers::page_active('mes-annonces') }}  {{ Helpers::page_contains('mes-annonces') }}"><span class="  w-icon-category"></span>&nbsp; Mes annonces</a>
    </li>
    <li class="nav-item">
        <a href="{{ url('/annonces/new')}}" class="nav-link {{ Helpers::page_active('annonces/new') }}  {{ Helpers::page_contains('annonces/new') }}"> <span class=" w-icon-plus"></span>&nbsp; Publier </a>
    </li>

    <li class="nav-item">
        <a href="{{ url("/deconnexion")}}" class="nav-link"><span class="w-icon-logout"></span> &nbsp;Se déconnecter</a>
    </li>

    <div class="separator hr"></div>
    <li class="nav-item">
        <a href="{{ url('/account/drop')}}" class="nav-link"> <span class=" w-icon-times-circle"></span>&nbsp; Supprimer mon compte </a>
    </li>

</ul>