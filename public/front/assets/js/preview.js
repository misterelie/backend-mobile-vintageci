    $(document).ready(function (e) {

        //* Charger et visualiser la photo:
        $('#photo_1').on("change",function(){  
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#drop_preview_1').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]); 
        $('#drop_preview_1').parent('.box').removeClass("drop-off").addClass("drop-on");
        $('.drop_label_1').removeClass("drop-on").addClass("drop-off") ;
        });

        //* Supprimer la photo:
        $('#drop_preview_1').prev('.drop-remove').on("click", function (){
            $('#drop_preview_1').attr('src', "");
            $("#_photo_1").val("");
            $('#drop_preview_1').parent('.box').removeClass("drop-on").addClass("drop-off");
            $('.drop_label_1').removeClass("drop-off").addClass("drop-on") ;
        })



        //*--------------------------
        //* Charger et visualiser la photo:
        $('#photo_2').on("change",function(){  
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#drop_preview_2').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]); 
        $('#drop_preview_2').parent('.box').removeClass("drop-off").addClass("drop-on");
        $('.drop_label_2').removeClass("drop-on").addClass("drop-off") ;
        });

        //* Supprimer la photo:
        $('#drop_preview_2').prev('.drop-remove').on("click", function (){
            $('#drop_preview_2').attr('src', "");
            $("#_photo_2").val("");
            $('#drop_preview_2').parent('.box').removeClass("drop-on").addClass("drop-off");
            $('.drop_label_2').removeClass("drop-off").addClass("drop-on") ;
        })



        //*---------------------------------
        //* Charger et visualiser la photo:
        $('#photo_3').on("change",function(){  
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#drop_preview_3').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]); 
        $('#drop_preview_3').parent('.box').removeClass("drop-off").addClass("drop-on");
        $('.drop_label_3').removeClass("drop-on").addClass("drop-off") ;
        });

        //* Supprimer la photo:
        $('#drop_preview_3').prev('.drop-remove').on("click", function (){
            $('#drop_preview_3').attr('src', "");
            $("#_photo_3").val("");
            $('#drop_preview_3').parent('.box').removeClass("drop-on").addClass("drop-off");
            $('.drop_label_3').removeClass("drop-off").addClass("drop-on") ;
        })


        //*------------------------------
        //* Charger et visualiser la photo:
        $('#photo_4').on("change",function(){  
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#drop_preview_4').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]); 
        $('#drop_preview_4').parent('.box').removeClass("drop-off").addClass("drop-on");
        $('.drop_label_4').removeClass("drop-on").addClass("drop-off") ;
        });

        //* Supprimer la photo:
        $('#drop_preview_4').prev('.drop-remove').on("click", function (){
            $('#drop_preview_4').attr('src', "");
            $("#_photo_4").val("");
            $('#drop_preview_4').parent('.box').removeClass("drop-on").addClass("drop-off");
            $('.drop_label_4').removeClass("drop-off").addClass("drop-on") ;
        })


        //*----------------------------------------
        //* Charger et visualiser la photo:
        $('#photo_5').on("change",function(){  
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#drop_preview_5').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]); 
        $('#drop_preview_5').parent('.box').removeClass("drop-off").addClass("drop-on");
        $('.drop_label_5').removeClass("drop-on").addClass("drop-off") ;
        });

        //* Supprimer la photo:
        $('#drop_preview_5').prev('.drop-remove').on("click", function (){
            $('#drop_preview_5').attr('src', "");
            $("#_photo_5").val("");
            $('#drop_preview_5').parent('.box').removeClass("drop-on").addClass("drop-off");
            $('.drop_label_5').removeClass("drop-off").addClass("drop-on") ;
        })



        //*-------------------------------
        //* Charger et visualiser la photo:
        $('#photo_6').on("change",function(){  
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#drop_preview_6').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]); 
        $('#drop_preview_6').parent('.box').removeClass("drop-off").addClass("drop-on");
        $('.drop_label_6').removeClass("drop-on").addClass("drop-off") ;
        });

        //* Supprimer la photo:
        $('#drop_preview_6').prev('.drop-remove').on("click", function (){
            $('#drop_preview_6').attr('src', "");
            $("#_photo_6").val("");
            $('#drop_preview_6').parent('.box').removeClass("drop-on").addClass("drop-off");
            $('.drop_label_6').removeClass("drop-off").addClass("drop-on") ;
        })

        //*----------------------

        //* Charger et visualiser la photo:
        $('#photo_7').on("change",function(){  
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#drop_preview_7').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]); 
        $('#drop_preview_7').parent('.box').removeClass("drop-off").addClass("drop-on");
        $('.drop_label_7').removeClass("drop-on").addClass("drop-off") ;
        });

        //* Supprimer la photo:
        $('#drop_preview_7').prev('.drop-remove').on("click", function (){
            $('#drop_preview_7').attr('src', "");
            $("#_photo_7").val("");
            $('#drop_preview_7').parent('.box').removeClass("drop-on").addClass("drop-off");
            $('.drop_label_7').removeClass("drop-off").addClass("drop-on") ;
        })


        //*=================================

        //* Charger et visualiser la photo:
        $('#photo_8').on("change",function(){  
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#drop_preview_8').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]); 
        $('#drop_preview_8').parent('.box').removeClass("drop-off").addClass("drop-on");
        $('.drop_label_8').removeClass("drop-on").addClass("drop-off") ;
        });

        //* Supprimer la photo:
        $('#drop_preview_8').prev('.drop-remove').on("click", function (){
            $('#drop_preview_8').attr('src', "");
            $("#_photo_9").val("");
            $('#drop_preview_8').parent('.box').removeClass("drop-on").addClass("drop-off");
            $('.drop_label_8').removeClass("drop-off").addClass("drop-on") ;
        })



        //* Charger et visualiser la photo:
        $('#photo_9').on("change",function(){  
        let reader = new FileReader();
        reader.onload = (e) => { 
            $('#drop_preview_9').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]); 
        $('#drop_preview_9').parent('.box').removeClass("drop-off").addClass("drop-on");
        $('.drop_label_9').removeClass("drop-on").addClass("drop-off") ;
        });

        //* Supprimer la photo:
        $('#drop_preview_9').prev('.drop-remove').on("click", function (){
            $('#drop_preview_9').attr('src', "");
            $("#_photo_9").val("");
            $('#drop_preview_9').parent('.box').removeClass("drop-on").addClass("drop-off");
            $('.drop_label_9').removeClass("drop-off").addClass("drop-on") ;
        })
    });
