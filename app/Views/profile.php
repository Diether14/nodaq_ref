<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
  .img-raised:hover {
    opacity: 0.9;
    cursor: pointer;
  }

  .img-cover:hover {
    opacity: 0.9;
    cursor: pointer;
  }

  .profile-name:hover {
    opacity: 0.9;
    cursor: pointer;
  }
</style>
<?php if(!empty($cover_photo['name'])): ?>

<div class="page-header header-filter img-cover" data-parallax="true" data-toggle="modal" data-target="#cover"
  style="background-image: url('public/user/uploads/covers/<?= $cover_photo['name'] ?>');"></div>

<?php else: ?>
<div class="page-header header-filter img-cover" data-parallax="true" data-toggle="modal" data-target="#cover"
  style="background-image: url('public/user/assets/img/city-profile.jpg');"></div>
<?php endif; ?>
<div class="main">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="profile ">
              <div class="avatar" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="top"
                title="Click to update" data-container="body">
                <?php if(!empty($profile_photo['name'])): ?>

                <img src="public/user/uploads/profiles/<?= $profile_photo['name'] ?>" alt="Circle Image"
                  class="img-raised rounded-circle img-fluid" alt="avatar">

                <?php else: ?>
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                  class="img-raised rounded-circle img-fluid" alt="avatar">

                <?php endif; ?>
                <!-- <div class="img-circle"><img src="http://placehold.it/200x200" /></div> -->
              </div>

              <div class="name">
                <div class="text-center">
                  <!--                 
              <h6>Upload a different photo...</h6>
              <input type="file" class="text-center center-block file-upload"> -->
                </div>
                </hr>
                <?php if (session('msg')) : ?>
                <div class="mx-auto my-auto alert alert-primary alert-dismissible">
                  <?= session('msg') ?>
                  <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                </div>
                <?php endif ?>
                <div class="text-center profile-name mt-3 mb-3" data-toggle="modal" data-target="#profilename">
                  <span class="h3 title"><?php echo $user['nickname']  ?></span><br><span class="small"
                    class="h3"> 
                      <?php if($user_settings['user_mode'] == '1'): ?>
                        (Anonymous)
                      <?php else: ?>

                      <?php endif; ?>
                    </span>
                  <?php if(session()->get('success')): ?>
                  <div class="alert alert-success" role="alert">
                    <?= session()->get('success') ?>
                  </div>
                  <?php endif; ?>
                </div>

                <a href="#" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-dribbble"></i></a>
                <a href="#" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a>
              </div>

            </div>

          </div>
<!-- 
          <div class="card">
            <div class="text-center">
              <h1>Side</h1>
            </div>
          </div> -->

        </div>

        <div class="col-md-8 ">
        <div class="card">
        <div class="row ">
            <div class="col-md-6 ml-auto mr-auto">
              <div class="profile-tabs">
                <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                      <i class="material-icons">camera</i> Lorem
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                      <i class="material-icons">palette</i> Lorem
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                      <i class="material-icons">favorite</i> Lorem
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="tab-content tab-space">
            <div class="tab-pane active text-center gallery" id="studio">
              <div class="row">
                <div class="col-md-3 ml-auto">
                  <img src="public/user/assets/img/examples/studio-1.jpg" class="rounded">
                  <img src="public/user/assets/img/examples/studio-2.jpg" class="rounded">
                </div>
                <div class="col-md-3 mr-auto">
                  <img src="public/user/assets/img/examples/studio-5.jpg" class="rounded">
                  <img src="public/user/assets/img/examples/studio-4.jpg" class="rounded">
                </div>
              </div>
            </div>
            <div class="tab-pane text-center gallery" id="works">
              <div class="row">
                <div class="col-md-3 ml-auto">
                  <img src="public/user/assets/img/examples/olu-eletu.jpg" class="rounded">
                  <img src="public/user/assets/img/examples/clem-onojeghuo.jpg" class="rounded">
                  <img src="public/user/assets/img/examples/cynthia-del-rio.jpg" class="rounded">
                </div>
                <div class="col-md-3 mr-auto">
                  <img src="public/user/assets/img/examples/mariya-georgieva.jpg" class="rounded">
                  <img src="public/user/assets/img/examples/clem-onojegaw.jpg" class="rounded">
                </div>
              </div>
            </div>
            <div class="tab-pane text-center gallery" id="favorite">
              <div class="row">
                <div class="col-md-3 ml-auto">
                  <img src="public/user/assets/img/examples/mariya-georgieva.jpg" class="rounded">
                  <img src="public/user/assets/img/examples/studio-3.jpg" class="rounded">
                </div>
                <div class="col-md-3 mr-auto">
                  <img src="public/user/assets/img/examples/clem-onojeghuo.jpg" class="rounded">
                  <img src="public/user/assets/img/examples/olu-eletu.jpg" class="rounded">
                  <img src="public/user/assets/img/examples/studio-1.jpg" class="rounded">
                </div>
              </div>
            </div>
          </div>
        </div> 
        </div>



        <div class="col-md-12 card">
        <div class="card card-plain">
          <a href="/weendi/post">
              <button class="btn btn-primary">Create Post</button></a>
        </div>
          <?php foreach ($users_post as $key => $value): ?> 
          <a href="/weendi/blog-view/<?= $value['id']; ?>">
          <div class="card promoting-card card-plain">
            <!-- Card content -->
            <div class="card-body d-flex flex-row">
              <!-- Avatar -->
              <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">
              <!-- Content -->
              <div>
                <!-- Title -->
                <?php if($users_settings['user_nickname'] == '1' && $users_settings['user_mode'] == '1'): ?> 
                  
                  <h4 class="card-title font-weight-bold mb-2">Anonymous</h4>
                
                <?php else: ?>
                
                  <h4 class="card-title font-weight-bold mb-2"><?= $user['nickname'] ?></h4>
                
                <?php endif;?>
                <!-- Subtitle -->
       
                <p class="card-text small"><i class="far fa-clock pr-2"></i>07/24/2018</p>
                </div>
            </div>
            <!-- Card image -->
            <div class="view overlay">
              <img class="card-img-top rounded-0" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/full page/2.jpg" alt="Card image cap">
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <!-- Card content -->
            <div class="card-body">
              <div class="collapse-content">
                <!-- Text -->
                <div class="card-body">
                  <h4 class="card-title"><?= $value['title'] ?></h4>
                  <h6 class="card-subtitle mb-2 text-muted">Position</h6>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
                </div>
                <!-- Button -->
                <!-- <a class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 collapsed" data-toggle="collapse" href="#collapseContent" aria-expanded="false" aria-controls="collapseContent"></a>
                <i class="fas fa-share-alt text-muted float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
                <i class="fas fa-heart text-muted float-right p-1 my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i> -->
              </div>
            </div>
            </div>
            </a>
            <!-- Card -->
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- Classic Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Profile Picture</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>

        <div class="modal-body">
          <div class="text-center">
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"
              alt="avatar">
            <h6>Upload a different photo...</h6>
            <form class="contact-form" action="/weendi/change_profile"  method="post"
              accept-charset="utf-8" enctype="multipart/form-data">

              <input type="file" name="file" class="text-center center-block file-upload" accept=".png, .jpg, .jpeg">
              <div class="form-group"><br>
                <hr>
                <button type="submit" id="send_form" class="btn btn-primary">Submit</button>
              </div>
            </form>

          </div>
          </hr><br>
        </div>

      </div>
    </div>
  </div>
  <!--  End Modal -->

  <!-- Classic Modal -->
  <div class="modal fade" id="cover" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Cover Picture</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>

        <div class="modal-body">
          <div class="text-center">
            <img src="" class="avatar img-circle img-thumbnail">
            <h6>Upload a different photo...</h6>
            <form action="<?php echo base_url('/change_cover');?>" name="ajax_form" id="ajax_form" method="post"
              accept-charset="utf-8" enctype="multipart/form-data">

              <input type="file" name="file" class="text-center center-block file-upload" accept=".png, .jpg, .jpeg">
              <div class="form-group"><br>
                <hr>
                <button type="submit" id="send_form" class="btn btn-primary">Submit</button>
              </div>
            </form>

          </div>
          </hr><br>
        </div>

      </div>
    </div>
  </div>
  <!--  End Modal -->


  <!-- Classic Modal -->
  <div class="modal fade" id="profilename" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>

        <div class="modal-body">
          <div class="text-center">
            <form class="contact-form" action="/weendi/update_profile" method="post">
              <!-- <h2 class="text-center title">Update Profile</h2> -->

            
              <div class="input-group">
                <div class="input-group-prepend">
                  <!-- <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span> -->
                </div>
                <input type="text" name="nickname" class="form-control" placeholder="Nickname..."
                  value="<?=  $user['nickname']; ?>">
              </div>
              <?php if(isset($validation)): ?>
              <div class="col-12">
                <div class="alert alert-danger" role="alert">
                  <?= $validation->listErrors() ?>
                </div>
              </div>
              <?php endif; ?>
              <div class="form-group"><br>
                <hr>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>

          </div>
          </hr><br>
        </div>

      </div>
    </div>
  </div>
  <!--  End Modal -->
  <script>
    $(document).ready(function () {


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


// function readURL(input, id) {
//     id = id || '#blah';
//     if (input.files &amp;&amp; input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function (e) {
//             $(id)
//                     .attr('src', e.target.result)
//                     .width(200)
//                     .height(150);
//         };

//         reader.readAsDataURL(input.files[0]);
//     }
//  }
  </script>