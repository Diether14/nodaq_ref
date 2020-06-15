$(document).ready(function(){
    initSample();
    
    $( "#save_post" ).click(function() {
        
        var title = $("input[name=title]").val();
        var community_id = $("input[name=community_id]").val();
        var content = CKEDITOR.instances.editor.getData();
        var desc = $("textarea[name=description]").val();
        
        var data = {
            'title': title,
            'content': content,
            'community_id': community_id,
            'description': desc
        }

        if(title == ''  || content == ''){
            alert('Please fill out the fields!')
        }else{
            $.ajax({
                type: "POST",
                url  : "../save_post",
                data: data,
                dataType: "JSON",
                success: function(data)
                {
                   //if success close modal and reload ajax table
                   console.log(data);
                  alert('Blog Added');
                  location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('There is an error!');
                }
            });
        }
        

        

    });

    $( "#edit_post" ).click(function() {
        
        var title = $("input[name=title]").val();
        var community_id = $("input[name=community_id]").val();
        var content = CKEDITOR.instances.editor.getData();
        var desc = $("textarea[name=description]").val();
        var id = $("input[name=id]").val();

        var data = {
            'title': title,
            'content': content,
            'community_id': community_id,
            'description': desc,
            'id' : id
        }

        if(title == ''  || content == ''){
            alert('Please fill out the fields!')
        }else{
            $.ajax({
                type: "POST",
                url  : "edit_post",
                data: data,
                dataType: "JSON",
                success: function(data)
                {
                   //if success close modal and reload ajax table
                   console.log(data);
                  alert('Update Successfully!');
                  location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('There is an error!');
                }
            });
        }
        
    });

    $( "#not_joined").click(function(){
        alert('You must join to the community first!');
    });

    $( ".not_joined").click(function(){
        alert('You must join to the community first!');
    });


    $( "#edit_shared_post" ).click(function() {

        var content = $("textarea[name=shared_content]").val();
        var id = $("input[name=shared_id]").val();

        var data = {
            'content': content,
            'id' : id
        }

        if(title == ''  || content == ''){
            alert('Please fill out the fields!')
        }else{
            $.ajax({
                type: "POST",
                url  : "edit_shared_post",
                data: data,
                dataType: "JSON",
                success: function(data)
                {
                   //if success close modal and reload ajax table
          
                  alert('Update Successfully!');
                  location.reload();
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

    console.log($("input").val());
    

    // $("input").val();
    // $("input").tagsinput('items');



});
