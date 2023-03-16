<header id="header" class="fixed-top">
    <div class="container d-flex">
        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                @if(!is_null(Site::categories()))
                    @foreach (Site::categories() as $cat)
                    <li class="dropdown"><a href="{{ url('/services',$cat->slug)}}" class="text-uppercase"><span>{{ $cat->category}}</span></a>
                        <ul>
                            
                            @if (!is_null($cat->articles))
                               @foreach ($cat->articles as $article)
                                <li><a href="{{ url('/articles', $article->slug)}}">{{ $article->titre}}</a></li>
                                @endforeach
                            @endif
                           
                        </ul>
                    </li>
                    @endforeach
                @endif


            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header>