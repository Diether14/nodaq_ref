<style>
  .custom-card{
    min-height: 300px;

  }

</style>

<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('public/user/assets/img/bg3.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h1>My Community</h1>
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
      <?php if ($msg) : ?>
        <div class="card bg-info text-white shadow">
                    <div class="card-body">
                    <?= $msg ?>
            
                    </div>
                  </div>
                  <br>
    <?php endif; ?>  
      <div class="row">
        <div class="col-md-4">
   

        <div class="team-player">
          <div class="card custom-card card-body justify-content-center">
            
            <a class="btn btn-link" data-toggle="modal" data-target="#myModal">
              <span style="font-size:50px; color:#9C27B0" class="fa fa-plus"></span></a>
          </div>
        </div>
        </div>

        <?php foreach ($community_list as $key => $value): ?>

<div class="col-md-4">
  <div class="team-player">

    <div class="card card-plain" >

      <h4 class="card-title p-3 my-0" style="background-color: <?= $value->color; ?>">
    
        <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-bars pr-3"
            style="float:left;"></i></a>
        <a href="community-join/<?= $value->id;  ?>" class="text-center" style="color: <?= $value->text_color; ?>"><?= $value->title ?> </a>
      
      </h4>
      <div class="view overlay" >
        <img class="card-img-top rounded-0" src="public/admin/uploads/community/<?= $value->name ?>"
          alt="Card image cap">
        <a href="#!">
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>



      <div class="card-body">
     

      <p class="card-description"><?= $value->content ?>
        </p>
      </div>
      <div class="card-footer justify-content-center">
        <div class="togglebutton">
          <label>
            <input type="checkbox" checked="">
            <span class="toggle"></span>
            label here
          </label><br>
          <div style="float-right"><p class="text">Created By: <b><?= $value->nickname ?></b></p></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>

        </div>
      </div>


      
    </div>
  </div>
</div>

<!-- Classic Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Community</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
        </button>
      </div>
      <div class="modal-body">

      <form class="contact-form" action="<?= base_url(); ?>/user_save_community"  method="post" accept-charset="utf-8" enctype="multipart/form-data">

<div class="form-group">
  <input type="text" name="title" class="form-control" placeholder="Title">
</div>

<div class="form-group">
  <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Content"></textarea>
</div>
<label for="">Community Photo</label>
<input type="file" name="file" class="text-center center-block file-upload form-control" accept=".png, .jpg, .jpeg">
<br>
<div class="togglebutton">
      <label>
        <input type="checkbox" name="community_type" <?= ($user_settings['user_mode'] == '1' ? 'checked': null)?>>
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

<button type="submit" class="btn btn-primary">Save Community</button>

</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--  End Modal -->



</div>
<script>
  $('document').ready(function () {
    $("#btnSubmit").attr("disabled", true);

  });
</script>