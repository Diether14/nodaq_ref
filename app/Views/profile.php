<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
    .rounded-circle:hover {
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
    /* modal show */
    
    .modal-backdrop {
        z-index: 1040 !important;
        display: none;
    }
    
    .modal-dialog {
        margin: 80px auto;
        z-index: 1100 !important;
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

<div class="page-header header-filter img-cover" data-parallax="true" data-toggle="modal" data-target="#cover" style="background-image: url('public/user/uploads/covers/<?= $cover_photo['name'] ?>');"></div>

<?php else: ?>
<div class="page-header header-filter img-cover" data-parallax="true" data-toggle="modal" data-target="#cover" style="background-image: url('public/user/assets/img/city-profile.jpg');"></div>
<?php endif; ?>
<div class="main">
    <div class="profile-content ">
        <div class="col-sm-9 m-auto">
            <div class="row">
                <div class="col-sm-12">
                    <div class="profile">
                        <div class="avatar" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="top" title="Click to update" data-container="body">
                            <?php if(!empty($profile_photo['name'])): ?>

                            <!-- <img src="public/user/uploads/profiles/<?= $profile_photo['name'] ?>" alt="Circle Image"
                  class="img-raised rounded-circle img-fluid img-thumbnail" alt="avatar"> -->

                            <img class="img-raised rounded-circle z-depth-2" alt="100x100" src="public/user/uploads/profiles/<?= $profile_photo['name'] ?>" data-holder-rendered="true">


                            <?php else: ?>
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="100x100" class="img-raised rounded-circle z-depth-2" alt="avatar" data-holder-rendered="true">

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
                            <div class="text-center profile-name mt-3 mb-3" data-toggle="modal" data-target="#profilename">
                                <span class="h3 title"><?php echo $user['nickname']  ?></span><br><span class="small" class="h3">
                    <?php if($users_settings['user_mode'] == '1'): ?>
                    (Anonymous Mode)
                    <?php else: ?>

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
                </div>
                <div class="col-sm-12 card profile-card bg-light">
                    <div class="col-sm-3 px-2 border-right ">
                        <h3 class="title text-center mb-2">My Communities</h3>
                        <hr>
                        <div class="row profile-community_list">
                            <?php if(!empty($community_list)): ?>
                            <?php foreach ($community_list as $key => $value): ?>

                            <div class="col-md-4">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action active">
                                      Cras justo odio
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                                    <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                                    <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                                    <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Vestibulum at eros</a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <div class="col-sm-12">


                                <div class="team-player">
                                    <div class=" justify-content-center">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                              Community1
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">Community2</a>
                                            <a href="#" class="list-group-item list-group-item-action">Community3</a>
                                            <a href="#" class="list-group-item list-group-item-action">Community4</a>
                                            <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Community5</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="col-sm-9 px-0">

                        <div class="m-4">

                            <div class="tab-content tab-space">
                                <div class="tab-pane active" id="dashboard-1">
                                    <div class="card card-nav-tabs card-plain my-1">
                                        <div class="px-0 py-1">
                                            <div class="nav-tabs-navigation">
                                                <div class="nav-tabs-wrapper">
                                                    <h3 class="title mb-0 text-center my-0">Posts</h3>
                                                    <hr>
                                                    <ul class="nav nav-tabs post-tabs" data-tabs="tabs">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" href="#home" data-toggle="tab">All Post</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#updates" data-toggle="tab">Posts</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#history" data-toggle="tab">Shared Posts</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body ">
                                            <div class="tab-content text-center">
                                                <div class="tab-pane active" id="home">



                                                </div>
                                                <div class="tab-pane" id="updates">
                                                    <!-- content -->
                                                    <div class="row m-3">
                                                        <?php if(!empty($posts)): ?>
                                                        <?php foreach($posts as $key => $value): ?>
                                                        <div class="col-md-12">

                                                            <div class="team-player">
                                                                <div class="card custom-card1 p-3">
                                                                    <?php if($value->user_mode == '1'): ?>
                                                                    <div class="profile-photo-small d-flex">

                                                                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image" class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar">

                                                                        <div class="m-0 p-0">
                                                                            <h4 class="card-title pl-2 mt-0 mb-0">Anonymous
                                                                            </h4>
                                                                            <p class="small pl-2 m-0">1 hour ago</p>
                                                                        </div>
                                                                    </div>
                                                                    <?php else: ?>

                                                                    <div class="profile-photo-small d-flex">

                                                                        <?php if(!empty($value->name)): ?>

                                                                        <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>" alt="Circle Image" class="rounded-circle img-fluid z-depth-2">

                                                                        <?php else: ?>
                                                                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image" class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar">

                                                                        <?php endif; ?>

                                                                        <div class="m-0 p-0">
                                                                            <h4 class="card-title pl-2 mt-0 mb-0">
                                                                                <?= $value->nickname; ?>
                                                                            </h4>
                                                                            <p class="small pl-2 m-0">1 hour ago</p>
                                                                        </div>
                                                                    </div>

                                                                    <?php endif; ?>

                                                                    <!-- <p class="card-text"><?= $value->description ?></p> -->

                                                                    <div class="card-body  m-0 p-0">
                                                                        <p class="m-0 p-0 card-description">
                                                                            <?= character_limiter($value->description, 180) ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="card-footer justify-content-center m-0 p-0">
                                                                        <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>" class="btn btn-link m-0 p-2"><i class="fa fa-eye m-0 p-0"></i> View Post </a>
                                                                        <a href="#" data-toggle="modal" data-target="#edit-post<?= $key?>" class="btn btn-link m-0 p-2"><i class="fa fa-recycle m-0 p-0"></i> Edit Post</a>
                                                                        <a href="#" data-toggle="modal" data-target="#delete-post<?= $key?>" class="btn btn-link m-0 p-2"><i class="fa fa-trash m-0 p-0"></i> Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Classic Modal -->
                                                        <div class="modal fade" id="edit-post<?= $key ?>" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Edit Post</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <i class="material-icons">clear</i>
                                    </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="card container">
                                                                            <div class="form-group ">
                                                                                <label>Title</label>
                                                                                <div class="input-group">
                                                                                    <input type="text" id="title" name="title" value="<?= $value->title ?>" class="form-control" placeholder="Title..." value="" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card container">
                                                                            <div class="form-group">
                                                                                <label>Tags</label>
                                                                                <textarea name="description" class="form-control" placeholder="Description..." cols="30" rows="5"><?= $value->description ?></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="card my-auto mx-auto">
                                                                            <h4 class="h4 p-3">Post Content</h4>
                                                                            <div id="editor">
                                                                                <?= $value->content ?>
                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden" name="community_id" id="community-id" value="<?= $value->community_id; ?>">
                                                                        <input type="hidden" name="id" id="id" value="<?= $value->id; ?>">
                                                                        <div class="mt-3">

                                                                            <button id="edit_post" class="btn btn-primary">Save</button>

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
                                                        <div class="modal fade" id="delete-post<?= $key ?>" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Are you sure do you want to delete your post?</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <i class="material-icons">clear</i>
                                    </button>
                                                                    </div>
                                                                    <div class="modal-body">




                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary btn-link" data-dismiss="modal">Close</button>
                                                                        <a href="<?= base_url() ?>/delete-post/<?= $value->id ?>" class="btn btn-danger">
                                      Delete</a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--  End Modal -->


                                                        <?php endforeach; ?>
                                                        <?php else: ?>

                                                        <div class="col-md-4">


                                                            <div class="team-player">
                                                                <div class="card custom-card1 card-body justify-content-center">

                                                                    <p class="text-center">No Post Yet</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>



                                                    </div>

                                                    <!-- end content -->

                                                </div>
                                                <div class="tab-pane" id="history">
                                                    <!-- shared content -->
                                                    <div class="row m-3">
                                                        <?php if(!empty($shared)): ?>
                                                        <?php foreach($shared as $key => $value): ?>

                                                        <div class="col-md-4">
                                                            <div class="card custom-card1 p-3">

                                                                <div class="profile-photo-small d-flex">

                                                                    <?php if(!empty($value->name)): ?>

                                                                    <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>" alt="Circle Image" class="rounded-circle img-fluid z-depth-2">

                                                                    <?php else: ?>
                                                                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image" class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar">

                                                                    <?php endif; ?>

                                                                    <div class="m-0 p-0">

                                                                        <h4 class="card-title pl-2 mt-0 mb-0">
                                                                            <?= $value->nickname; ?>
                                                                                <span class="fa fa-share small" style="float-right"></span>
                                                                        </h4>
                                                                        <p class="small pl-2 m-0">1 hour ago </p>


                                                                    </div>

                                                                </div>

                                                                <div class="card-body m-0 p-0">
                                                                    <p class="card-description">
                                                                        <?= character_limiter($value->content, 180); ?>
                                                                    </p>
                                                                </div>

                                                                <div class="card-footer justify-content-center m-0 p-0">

                                                                    <a href="<?= base_url(); ?>/post-share/<?= $value->post_id ?>/<?= $value->community_id ?>" class="btn btn-link m-0 p-2"><i class="fa fa-eye m-0 p-0"></i> View Post </a>
                                                                    <a href="#" data-toggle="modal" data-target="#edit-shared-post<?= $key?>" class="btn btn-link m-0 p-2"><i class="fa fa-recycle m-0 p-0"></i> Edit Post</a>
                                                                    <a href="#" data-toggle="modal" data-target="#delete-shared-post<?= $key?>" class="btn btn-link m-0 p-2"><i class="fa fa-trash m-0 p-0"></i> Delete</a>

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
                                                                                <textarea name="shared_content" class="form-control" placeholder="Tags" cols="30" rows="5"><?= $value->content ?></textarea>
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
                                                                        <a href="<?= base_url() ?>/delete-shared-post/<?= $value->id ?>" class="btn btn-danger m-0 p-2">
                                        Delete</a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--  End Modal -->




                                                        <?php endforeach; ?>
                                                    </div>
                                                    <?php else: ?>

                                                    <div class="col-md-4">


                                                        <div class="team-player">
                                                            <div class="card custom-card1 card-body justify-content-center">

                                                                <p class="text-center">No Shared Post Yet</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>

                                                    <!-- end shared content -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end tabs -->
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <form class="contact-form" action="/weendi/change_profile" method="post" accept-charset="utf-8" enctype="multipart/form-data">

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
                    <form action="<?php echo base_url('/change_cover');?>" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8" enctype="multipart/form-data">

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
                            <input type="text" name="nickname" class="form-control" placeholder="Nickname..." value="<?=  $user['nickname']; ?>">
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
    $(document).ready(function() {


        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function() {
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