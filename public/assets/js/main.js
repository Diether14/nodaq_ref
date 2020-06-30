$(document).ready(function(){
    initSample();
    
    $( "#save_post" ).click(function() {

        // grecaptcha.ready(function() {
        //     // do request for recaptcha token
        //     // response is promise with passed token
        //     grecaptcha.execute('6LfwIo4UAAAAADauXCK0Ke_jIWNSW-z49N-IUj43', {action: 'save_post'}).then(function(token) {
        //         // add token to form
        //         $('#comment_form').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
		//     $.post("form_v3.php",{email: email, comment: comment, token: token}, function(result) {
		// 	    console.log(result);
		// 	    if(result.success) {
		// 		    alert('Thanks for posting comment.')
		// 	    } else {
		// 		    alert('You are spammer ! Get the @$%K out.')
		// 	    }
		//     });
        //     });;
        // });
        
        var title = $("input[name=title]").val();
        var community_id = $("input[name=community_id]").val();
        var content = CKEDITOR.instances.editor.getData();
        var desc = $("textarea[name=description]").val();
        // console.log(content);return;
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
        if(input.files && input.files[1]){
            var reader1 = new FileReader();

            reader1.onload = function (e) {
              $('.avatar1').attr('src', e.target.result);
            }
  
            reader1.readAsDataURL(input.files[1]);
        }
      }


      $(".file-upload").on('change', function () {
        readURL(this);
    });

    console.log($("input").val());
    

    // $("input").val();
    // $("input").tagsinput('items');








});