$(document).ready(function(){
    initSample();
    
    $( "#save_post" ).click(function() {
        
        var title = $("input[name=title]").val();
        var content = CKEDITOR.instances.editor.getData();
        
        var data = {
            'title': title,
            'content': content
        }
        
        if(title == ''  || content == ''){
            alert('Please fill out the fields!')
        }else{
            $.ajax({
                type: "POST",
                url  : "save_post",
                data: data,
                dataType: "JSON",
                success: function(data)
                {
                   //if success close modal and reload ajax table
                   console.log(data);
                  alert('Blog Added');
                  window.location.href = "profile";// for reload a page
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('There is an error!');
                }
            });
        }
        

        

    });

    var readURL = function (input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('.avatar').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }


      $(".file-upload").on('change', function () {
        readURL(this);
    });


});
