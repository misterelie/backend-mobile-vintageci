<div class="col-md-12 mb-4 ">
    <div class="drop-row">
        {{-- Box item --}}
        @if(!is_null($annonce) && !is_null($annonce->photo_1))
        <div class="drop-box photo_1">
            <div class="box  drop-on">
                <span class="drop-remove" title="Supprimer la photo N°1" id="photo_1">
                    <i class="fas fa fa-trash"></i>
                </span>
                <img id="" src="{{ asset("$annonce->photo_1")}} " alt="Photo"
                    class="drop-preview-zone ">
            </div>
        </div>
        @endif


        @if(!is_null($annonce) && !is_null($annonce->photo_2))
        <div class="drop-box photo_2">
            <div class="box  drop-on">
                <span class="drop-remove" title="Supprimer la photo N°2" id="photo_2">
                    <i class="fas fa fa-trash"></i>
                </span>
                <img src="{{ asset("PhotosAnnonces/banner.jpg")}} " alt="Photo"
                    class="drop-preview-zone ">
            </div>
        </div>
        @endif

        @if(!is_null($annonce) && !is_null($annonce->photo_3))
        <div class="drop-box photo_3">
            <div class="box  drop-on">
                <span class="drop-remove" title="Supprimer la photo N°3" id="photo_3">
                    <i class="fas fa fa-trash"></i>
                </span>
                <img id="" src="{{ asset($annonce->photo_3)}} " alt="Photo"
                    class="drop-preview-zone ">
            </div>
        </div>
        @endif

        @if(!is_null($annonce) && !is_null($annonce->photo_4))
        <div class="drop-box photo_4">
            <div class="box  drop-on">
                <span class="drop-remove" title="Supprimer la photo N°4" id="photo_4">
                    <i class="fas fa fa-trash"></i>
                </span>
                <img id="" src="{{ asset($annonce->photo_4)}} " alt="Photo"
                    class="drop-preview-zone ">
            </div>
        </div>
        @endif

        @if(!is_null($annonce) && !is_null($annonce->photo_5))
        <div class="drop-box photo_5">
            <div class="box  drop-on">
                <span class="drop-remove" title="Supprimer la photo N°5" id="photo_5">
                    <i class="fas fa fa-trash"></i>
                </span>
                <img id="" src="{{ asset($annonce->photo_5)}} " alt="Photo"
                    class="drop-preview-zone ">
            </div>
        </div>
        @endif


        @if(!is_null($annonce) && !is_null($annonce->photo_6))
        <div class="drop-box photo_6">
            <div class="box  drop-on">
                <span class="drop-remove" title="Supprimer la photo N°6" id="photo_6">
                    <i class="fas fa fa-trash"></i>
                </span>
                <img id="" src="{{ asset($annonce->photo_6)}} " alt="Photo"
                    class="drop-preview-zone ">
            </div>
        </div>
        @endif


        @if(!is_null($annonce) && !is_null($annonce->photo_7))
        <div class="drop-box photo_7">
            <div class="box  drop-on">
                <span class="drop-remove" title="Supprimer la photo N°7" id="photo_7">
                    <i class="fas fa fa-trash"></i>
                </span>
                <img id="" src="{{ asset($annonce->photo_7)}} " alt="Photo"
                    class="drop-preview-zone ">
            </div>
        </div>
        @endif


        @if(!is_null($annonce) && !is_null($annonce->photo_8))
        <div class="drop-box photo_8">
            <div class="box  drop-on">
                <span class="drop-remove" title="Supprimer la photo N°8" id="photo_8">
                    <i class="fas fa fa-trash"></i>
                </span>
                <img id="" src="{{ asset($annonce->photo_8)}} " alt="Photo"
                    class="drop-preview-zone ">
            </div>
        </div>
        @endif


        @if(!is_null($annonce) && !is_null($annonce->photo_9))
        <div class="drop-box photo_9">
            <div class="box  drop-on">
                <span class="drop-remove" title="Supprimer la photo N°9" id="photo_9">
                    <i class="fas fa fa-trash"></i>
                </span>
                <img id="" src="{{ asset($annonce->photo_9)}} " alt="Photo"
                    class="drop-preview-zone ">
            </div>
        </div>
        @endif
    </div>

    <div class="span d-block ajax-msg"></div>
</div>
