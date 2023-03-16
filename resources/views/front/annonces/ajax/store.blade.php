<script>
  $(document).ready(function() {
    var form = document.getElementById("image_upload");
    for (let index = 0; index < 10; index++) {
      $('#photo_'+index).on("change", function(){

        // Datas
        var formData = new FormData(form);
        //formData.append('_token',"{{ csrf_token() }}");
        formData.append('_input', $('#photo_'+index).attr("name"));
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token()}}",
          }
        });

       
        $.ajax({
          type:'POST',
          url: "{{ url('annonces/storeImage') }}",
          data:formData,
          cache:false,
          contentType: false,
          processData: false,
          encType: 'multipart/form-data',
          dataType: 'json',
          beforeSend: function (option) {
              //* Pendant le traitement de la requette:
              $(".box_"+index).children("span.status").addClass("onloading");
              $(".box_"+index).children("span.status").children("i.icon").removeClass("times").addClass("fa-spinner");
              $(".box_"+index).children("img.drop-preview-zone").css("opacity", .6);
            },
            complete: function(options){
              $(".box_"+index).children("span.status").removeClass("onloading");
            },
             success: function(response){
              $("#_photo_"+index).val(response.data.photo);
              if((response.type) && response.type === "success"){
                //Remove
                $(".box_"+index).children("span.status").removeClass("onloading");
                $(".box_"+index).children("span.status").children("i.icon").removeClass("fa-spinner");
                // Add
                $(".box_"+index).children("span.status").addClass("success");
                $(".box_"+index).children("span.status").children("i.icon").addClass("fa-check");
                $(".box_"+index).children("img.drop-preview-zone").css("opacity", 1);
              }else{
                //Remove
                $(".box_"+index).children("span.status").removeClass("onloading").removeClass('success').addClass("error");
                $(".box_"+index).children("span.status").children("i.icon").removeClass("fa-spinner").removeClass("fa-check").addClass("fa-times");
                //Add
                $(".box_"+index).children("img.drop-preview-zone").css("opacity", .7);
              }
             },
             error: function(response){
                $(".box_"+index).children("span.status").removeClass("onloading").removeClass('success').addClass("error");
                $(".box_"+index).children("span.status").children("i.icon").removeClass("fa-spinner").removeClass("fa-check").addClass("fa-times");
                //Add
                $(".box_"+index).children("img.drop-preview-zone").css("opacity", .7);
             }
        });
      });
    }
  });

</script>