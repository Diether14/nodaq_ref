<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
  
  .img-circle {
    border-radius: 50%;
  }

  .img-circle {
    border-radius: 0;
  }

  .profile-page .profile img {
    max-width: 200px !important;
    width: 100%;
    margin: 0 auto;

    transform: translate3d(0, -50%, 0);
    width: 180px;
    height: 180px;
    border-radius: 50%;
    background-position: center center;
    background-size: cover;
  }

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

  .custom-card1 {
    min-height: 270px;
    max-height: 500px;
  }

  .card .card-body,
  .card .card-footer {
    padding: 0 !important;
  }

  
</style>
<?php if(!empty($cover_photo['name'])): ?>

<div class="page-header header-filter img-cover" 
  style="background-image: url('<?= base_url(); ?>/public/user/uploads/covers/<?= $cover_photo['name'] ?>');"></div>

<?php else: ?>
<div class="page-header header-filter img-cover" 
  style="background-image: url('<?= base_url(); ?>/public/user/assets/img/city-profile.jpg');"></div>
<?php endif; ?>
<div class="main">
  <div class="profile-content">
    <div class="container">
      <div class="row">
      <div class="col-md-12">
          <div class="">
            <div class="profile">
              <div class="avatar" 
                title="Click to update" data-container="body">
                <?php if(!$users_settings['user_mode'] == '1'): ?>
                <?php if(!empty($profile_photo['name'])): ?>

                <img class="img-raised rounded-circle z-depth-2" alt="100x100"
                  src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $profile_photo['name'] ?>" data-holder-rendered="true">

                <?php else: ?>
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="100x100"
                  class="img-raised rounded-circle z-depth-2" alt="avatar" data-holder-rendered="true">

                <?php endif; ?>
                <?php else: ?>
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="100x100"
                  class="img-raised rounded-circle z-depth-2" alt="avatar" data-holder-rendered="true">

                <?php endif; ?>
                
                <!-- <div class="img-circle"><img src="http://placehold.it/200x200" /></div> -->
              </div><br>

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
                <div class="text-center profile-name mt-3 mb-3">
                  <span class="h3 title">
                  
                
                    <?php if($users_settings['user_mode'] == '1'): ?>
                    (Anonymous)
                    <?php else: ?>
                    <?php echo $user['nickname']  ?></span><br><span class="small" class="h3">
                    <?php endif; ?>
                  </span>
                  <?php if(session()->get('success')): ?>
                  <div class="alert alert-success" role="alert">
                    <?= session()->get('success') ?>
                  </div>
                  <?php endif; ?>
                </div>

                <p></p>

                <!-- <a href="#" class="btn btn-just-icon btn-link btn-dribbble"><i class="fa fa-"></i></a>
                <a href="#" class="btn btn-just-icon btn-link btn-twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="btn btn-just-icon btn-link btn-pinterest"><i class="fa fa-pinterest"></i></a> -->
              </div>
            </div>
            <br>
            <hr>
           
            <h2 class="title mb-0">Recent Posts</h2>
            <div class="row">
              <?php if(!empty($posts)): ?>
              <?php foreach($posts as $key => $value): ?>
              <div class="col-md-4">

                <div class="team-player">
                  <div class="card custom-card1 p-3">

                    <div class="profile-photo-small d-flex">

                      <?php if(!empty($value->name)): ?>

                      <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>" alt="Circle Image"
                        class="rounded-circle img-fluid z-depth-2">

                      <?php else: ?>
                      <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                        class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar">

                      <?php endif; ?>

                      <div class="m-0 p-0">
                        <h4 class="card-title pl-2 mt-0 mb-0"><?= $value->nickname; ?>
                        </h4>
                        <p class="small pl-2 m-0">1 hour ago</p>
                      </div>
                    </div>

                    <!-- <p class="card-text"><?= $value->description ?></p> -->
                    
                    <div class="card-body  m-0 p-0">
                          <p class="m-0 p-0 card-description"><?= character_limiter($value->description, 180) ?></p>
                    </div>
                    <div class="card-footer justify-content-center">
                          <?php if($value->post_id): ?>
                          <a href="<?= base_url(); ?>/post-share/<?= $value->post_id ?>/<?= $community_id ?>"
                            class="btn btn-link m-0 p-2"><i class="fa fa-eye m-0 p-0"></i> View Post </a>
                          <?php else: ?>
                          <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>" class="btn btn-link m-0 p-1"><i
                              class="fa fa-eye m-0 p-0"></i> View Post</a>
                          <?php endif; ?>
                          <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>" class="btn btn-link m-0 p-1"><i
                              class="fa fa-comments m-0 p-0"></i>
                            <?php if(1000 >= 1000){ 
                              echo round((1200/1000),1). 'K'; 
                            }elseif(1000000 >= 1000000){
                              echo round((1000000/1000000),1). 'M';
                            }else{
                              echo '50';
                            } ?> Comments</a>
                          <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>" class="btn btn-link m-0 p-1"><i
                              class="fa fa-share m-0 p-0"></i>
                            <?php 
                          if(1000 >= 1000){ 
                            echo round((1200/1000),1). 'K'; 
                          }elseif(1000000 >= 1000000){
                            echo round((1000000/1000000),1). 'M';
                          }else{
                            echo '50';
                          } ?>


                            Shares</a>

                        </div>
                  </div>
                </div>
              </div>

             

            

              <?php endforeach; ?>
              <?php else: ?>

              <div class="col-md-3">


                <div class="team-player">
                  <div class="card custom-card1 card-body justify-content-center">

                    <p class="text-center">No Post Yet</p>
                  </div>
                </div>
              </div>
              <?php endif; ?>



            </div>
            <h2 class="title mb-0">Recent Shared Posts</h2><br>
            <div class="row">
              <?php if(!empty($shared)): ?>
              <?php foreach($shared as $key => $value): ?>

              <div class="col-md-4">
              <div class="card custom-card1 p-3">

              <div class="profile-photo-small d-flex">

                    <?php if(!empty($value->name)): ?>

                    <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>" alt="Circle Image"
                      class="rounded-circle img-fluid z-depth-2">

                    <?php else: ?>
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                      class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar">

                    <?php endif; ?>

                    <div class="m-0 p-0">

                      <h4 class="card-title pl-2 mt-0 mb-0"><?= $value->nickname; ?>
                        <span class="fa fa-share small" style="float-right"></span>
                      </h4>
                      <p class="small pl-2 m-0">1 hour ago </p>
                      
                     
                    </div>

                  </div>

                  <div class="card-body m-0 p-0">
                      <p class="card-description">
                        <?= character_limiter($value->content, 180) ?>
                      </p>
                      </div>

                  <div class="card-footer justify-content-center m-0 p-0" >

                    <a href="<?= base_url(); ?>/post-share/<?= $value->post_id ?>/<?= $value->community_id ?>"
                      class="btn btn-link m-0 p-2"><i class="fa fa-eye m-0 p-0"></i> View Post </a>
                    <a href="#" data-toggle="modal" data-target="#edit-shared-post<?= $key?>" class="btn btn-link m-0 p-2"><i
                          class="fa fa-recycle m-0 p-0"></i> Edit Post</a>
                    <a href="#" data-toggle="modal" data-target="#delete-shared-post<?= $key?>"
                        class="btn btn-link m-0 p-2"><i class="fa fa-trash m-0 p-0"></i> Delete</a>

                  </div>
                </div>
              </div>

              
              <!-- Classic Modal -->
              <div class="modal fade" id="edit-shared-post<?= $key ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Shared Post</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">clear</i>
                      </button>
                    </div>
                    <div class="modal-body">

                 
                      <div class="card container">
                        <div class="form-group">
                          <label>Tags</label>
                          <textarea name="shared_content" class="form-control" placeholder="Tags" cols="30"
                            rows="5"><?= $value->content ?></textarea>
                        </div>
                      </div>


                      <input type="hidden" name="shared_id" id="id" value="<?= $value->id; ?>">
                      <div class="mt-3">

                        <button id="edit_shared_post" class="btn btn-primary">Save</button>

                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--  End Modal -->

                       <!-- Classic Modal -->
              <div class="modal fade" id="delete-shared-post<?= $key ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Are you sure do you want to delete your shared post?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">clear</i>
                      </button>
                    </div>
                    <div class="modal-body">




                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary btn-link" data-dismiss="modal">Close</button>
                      <a href="<?= base_url() ?>/delete-shared-post/<?= $value->id ?>" class="btn btn-danger m-0 p-2"> Delete</a>

                    </div>
                  </div>
                </div>
              </div>
              <!--  End Modal -->




              <?php endforeach; ?>
            </div>
            <?php else: ?>

            <div class="col-md-3">


              <div class="team-player">
                <div class="card custom-card1 card-body justify-content-center">

                  <p class="text-center">No Shared Post Yet</p>
                </div>
              </div>
            </div>
            <?php endif; ?>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
</div>


