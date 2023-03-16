<script>
  $(document).ready(function() {
    $(".drop-remove").each(function(){
      $(this).on("click", function(){
        var form = document.getElementById("updateForm");
        var formData = new FormData(form);
        var annonceId = $(this).attr('id');
        formData.append('_input',$(this).attr('id'));
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token()}}",
          }
        });

        $.ajax({
          type:'POST',
          url: "{{ url('annonces/removeImage') }}",
          data:formData,
          cache:false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response){
            if((response.type) && response.type === "success"){
                //.css("display","none");
                $("."+annonceId).fadeOut().remove();
                $('.ajax-msg').text(response.message).addClass('text-success');
                setTimeout(() => {
                  $('.ajax-msg').text("");
                }, 700);
            }else{
              $('.ajax-msg').text(response.message).addClass('text-danger');
            }
          },
        });
        });
    });
  });

</script>