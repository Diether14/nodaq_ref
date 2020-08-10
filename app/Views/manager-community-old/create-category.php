
<link rel="stylesheet" href="<?= base_url(); ?>/public/assets/simple-watch/css/simpleSwatchPicker.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="<?= base_url(); ?>/public/assets/simple-watch/js/jquery.simpleSwatchPicker.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function(){
        $(".add-row").click(function(){
            // var name = $("#name").val();
            var markup = "<tr><td width='95%'> <input type='text' class='form-control' id='name' placeholder='Category Name' value='' name='category[]'></td><td width='5%' class='d-flex'><div class='form-check'><label class='form-check-label'><input class='form-check-input' type='checkbox' value='' name='record'>select<span class='form-check-sign'><span class='check'></span></span></label></div></td></tr>";
            $("table tbody").append(markup);
        });
        
        // Find and remove selected table rows
        $(".delete-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    $(this).parents("tr").remove();

                }
                
            });
        });
        
        $(".add-sub-row").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                  
                    var markup = "<tr><td width='100%'> <input type='text' class='form-control' id='name' placeholder='Sub Category'   value='' name='category[sub_category][]'></td></tr>";
                    $("table tbody").append(markup);
                }
            });
        });

    });    
</script>
<style>
  .modal {
    display: none;
    /* Hidden by default */

    padding-top: 50px;
    /* Location of the box - don't know what this does?  If it is to move your modal down by 100px, then just change top below to 100px and remove this*/

    overflow: auto;
    /* Enable scroll if needed */

    z-index: 9999;
    /* Sit on top - higher than any other z-index in your site*/
  }

  .modal-backdrop {
    position: absolute !important;
  }

  .modal-backdrop.show {
    opacity: 0 !important;
  }

  .custom-card {
    min-height: 420px;
    max-height: 420px;
  }

  .card-img-top {
    max-height: 200px;
    min-height: 200px;
    border-radius: 0%;
  }
/* modal show */
  .modal-backdrop {
    z-index: 1040 !important;
    display: none;    
  }
  .modal-dialog {
      margin: 32px auto;
      z-index: 1100 !important;
  }
  table{
        width: 100%;
        margin: 20px 0;
        border-collapse: collapse;
    }
    table, th, td{
        /* border: 1px solid #cdcdcd; */
    }
    table th, table td{
        padding: 5px;
        text-align: left;
    }
</style>

<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('public/user/assets/img/bg3.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h1>Create Community</h1>
          <!-- <h3 class="title text-center">Subtitle</h3> -->
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main">
  <div class="container">
    <div class="section">
      <div class="col-lg-12 col-md-12">
        <?php if (session('msg')) : ?>
        <div class="card bg-info text-white shadow">
          <div class="card-body">
            <?= session('msg') ?>
          </div>
        </div>
           <?php endif; ?>

           <div class="card shadow mb-4">

<div class="text-center py-3">
  <h2 class="m-0 font-weight-bold text-primary">Create Community</h2>
</div>
<div class="card-body">
  <?php if ($msg) : ?>
  <div class="card bg-info text-white shadow">
    <div class="card-body">
      <?= $msg ?>

    </div>
  </div>
  <br>
  <?php endif; ?>

  <form class="contact-form" action="<?= base_url(); ?>/user_save_community" method="post" accept-charset="utf-8"
    enctype="multipart/form-data">

    <div class="form-group">
      <input type="text" name="title" class="form-control" placeholder="Title">
    </div>

    <div class="form-group">
      <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Content"></textarea>
    </div>
    <div class="form-group">
      <input type="file" name="file" class="text-center center-block file-upload" accept=".png, .jpg, .jpeg">
    </div>
    <div class="togglebutton">
      <label>
        <input type="checkbox" name="community_type"
          <?= ($user_settings['user_mode'] == '1' ? 'checked': null)?>>
        <span class="toggle"></span>
        Private Community
      </label>
    </div>

    <label for="color">Select your theme color:</label>
    <input type="color" name="color" value="#FFFFFF">
    <label for="color">Select your text color:</label>
    <input type="color" name="text_color" value="#555555">

    <div class="form-group row">
      <div class="col-lg-6">
        <label>Upvote Name</label>
        <input type="text" name="upvote" class="form-control">
      </div>

      <div class="col-lg-6">
        <label>Devote Name</label>
        <input type="text" name="devote" class="form-control">
      </div>

    </div>

    <div class="text-center py-3">
            <h4 class="m-0 font-weight-bold text-primary">Create Category</h4>
    </div>
    <div>
  
    </div>
    <table>
        <thead>
            <tr>
            <th>Category Name</th>
            <input type="button" class="add-row btn btn-sm" value="Add Category">
            <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
       
            </td>
                <td width="90%">
                <input type="text" class="form-control" id="name" placeholder="Category Name" value="Notice Category" name="category[]">
                
                </td>
                <td width="10%" class="d-flex">
                   <div class="form-check">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" value="" name="record">
                    Select
                    <span class="form-check-sign">
                      <span class="check"></span>
                    </span>
                    </label>
                 </div>
               
                </td>
        <button type="button" class="add-sub-row btn btn-success btn-sm">Add Sub Class</button>
                <button type="button" class="delete-row btn btn-danger btn-sm">Delete Row</button>
            </tr>
        </tbody>
    </table>
    


    

    <hr>
    <button type="submit" class="btn btn-primary">Save Community</button>
        </div>

    </div>



  </form>

</div>
</div>
      </div>


    </div>






  </div>
</div>
</div>
