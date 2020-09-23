<style>
    .modal-lg {
        max-width: 80% !important;
    }
    
    .label-info {
        background-color: #5bc0de;
        display: inline-block;
        padding: 0.2em 0.6em 0.3em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25em;
    }
    
    .custom-card {
        min-height: 200px;
        max-height: 200px;
        height: 400px;
    }
    /* .card .card-body,
    .card .card-footer {
        padding: 0 !important;
    } */
    /* .rounded-circle1 {
    height: 42px !important;
  } */
</style>
<div class="row">
    <div class="community-sidebar" data-parallax="true">
        <div class="community_header row align-items-center">
            <div class="community_title text-center col-sm">
                <h3 class="community-title my-2">
                    <?= $community_list[0]->title; ?>
                </h3>
                <?php if($community_list['community_type'] == '1'): ?>
                <i class="fa fa-lock"></i>
                <small class="community-status fw-600">Private Community </small>
                <?php else: ?>
                <i class="fa fa-lock"></i>
                <small class="community-status fw-600">Public Community </small>
                <?php endif; ?>
            </div>
        </div>

        <div class="community_hr my-4"></div>
        <div class="community_joined">
        <div class="community_joined_row">
          <h4 class="community_subtitle">
            Community Settings
          </h4>

          <div class="row mb-2">
            <div class="col-12 row align-items-center">
              <h5 class="m-0">Categories</h5>
              <div class="float-right">

                <button type="button" class="btn btn-sm bg-transparent" data-toggle="modal" data-target="#add_category"><i
                    class="fa fa-plus text-primary shadow-none"></i></button>
              </div>

            </div>


            
              <div id="accordion-sidebar" class="w-100">
                <div class="btn-group-vertical w-100">
                  <?php foreach ($community_category as $key => $value) : ?>
                    <button class="btn btn-block m-0 text-left" data-toggle="collapse" data-target="#collapseCategory<?= $key ?>">
                      <?= $value["category_name"]?>
                      <div class="dropdown float-right">
                        <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          <!-- <i class="fa fa-cog"></i> -->
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item " data-toggle="modal" data-target="#add_subclass<?= $key ?>">Add Subclass</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#edit_category<?= $key ?>">Edit</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#delete_category<?= $key ?>">Delete</a>
                        </div>
                      </div>
                    </button>
                    <div id="collapseCategory<?= $key ?>" class="collapse <?= ($key == 0)? "show":"" ?> w-100" data-parent="#accordion-sidebar">
                      
                    <?php foreach ($value['subclass'] as $key1 => $value1) : ?>
                      <div class="d-flex p-3 bg-light align-items-center col-sm-12">

                        <div class="col-sm-11 p-0" id="headingOne">
                          <a href="#" class="d-block text-left" data-toggle="collapse" data-target="#collapseOne<?= $key ?>">
                            <b><?= $value1['subclass'] ?></b></a>
                        </div>
                        <div class="col-sm">
                          <div class="dropdown float-right">
                            <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <!-- <i class="fa fa-cog"></i> -->
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" data-toggle="modal" data-target="#edit_subclass<?= $key ?><?= $key1 ?>">Edit</a>
                              <?php if($key1 != 0): ?>
                                <a class="dropdown-item" data-toggle="modal" data-toggle="modal" data-target="#delete_subclass<?= $key ?><?= $key1 ?>">Delete</a>
                              <?php endif; ?>
                              
                            </div>
                          </div>

                        </div>

                        </div>



                      <!-- Classic Modal -->
                      <div class="modal fade" id="edit_subclass<?= $key ?><?= $key1 ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="material-icons">clear</i>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form class="contact-form" action="<?= base_url(); ?>/update_subclass" method="post"
                                accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="form-group row">
                                  <div class="col-lg-12">
                                    <label>Subclass Name</label>
                                    <input type="text" name="subclass" class="form-control"
                                      value="<?= $value1['subclass'] ?>">
                                    <input type="hidden" name="community_id" value="<?= $value1['community_id']; ?>">
                                    <input type="hidden" name="id" value="<?= $value1['id']; ?>">
                                  </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn bg-success text-white btn-link">Update</button>
                              </form>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!--  End Modal -->
                      <!-- Classic Modal -->
                      <div class="modal fade" id="delete_subclass<?= $key ?><?= $key1 ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Delete Subclass</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="material-icons">clear</i>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group row">
                                <div class="col-lg-12">
                                  <h6 class="text">Are you sure do you want to delete?</h6>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <a
                                href="<?= base_url() ?>/delete_subclass/<?= $value1['id'] ?>/<?= $value1['community_id'] ?>">
                                <button type="submit" class="btn bg-success text-white btn-link">Confirm</button>
                              </a>

                            </div>
                          </div>
                        </div>
                      </div>
                      <!--  End Modal -->

                    <?php endforeach; ?>

                    </div>

                  <?php endforeach;?>
                </div>
              </div>



          </div>
          <div class="community_hr my-2"></div>
          <div class="row mb-2">
            <div class="col-12">
              <a href="<?= base_url(); ?>/community-manage/members/<?= $community_list[0]->id; ?>">
                <h5 class="m-0">Members</h5>
              </a>
            </div>
          </div>
          <div class="community_hr my-2"></div>
          <div class="row mb-2">
            <div class="col-12">
              <a href="<?= base_url(); ?>/community-manage/reports/<?= $community_list[0]->id; ?>">
                <h5 class="m-0">Reports</h5>
              </a>
            </div>
          </div>
          <div class="community_hr my-2"></div>
          <div class="row mb-2">
            <div class="col-12">
              <a href="<?= base_url(); ?>/community-manage/blocked-users/<?= $community_list[0]->id; ?>">
                <h5 class="m-0">Blocked Users</h5>
              </a>
            </div>
          </div>
          <div class="community_hr my-2"></div>
          <div class="row mb-2">
            <div class="col-12">
              <a href="<?= base_url(); ?>/community-manage/settings/<?= $community_list[0]->id; ?>">
                <h5 class="m-0">Settings</h5>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="community-feed bg-white">

        <div class="page-header header-filter m-auto" style="background-image: url('<?= base_url(); ?>/public/admin/uploads/community/<?= $community_list[0]->name; ?>')"> 
        </div>

        <div class="">
            <nav class="" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Communities</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Test Community</li>
                </ol>
            </nav>

            <div class="container d-flex  community-join_inner ">

                <div class="col-lg-12 p-0">
                    <div class="community-section">


                    <div class="tab-content">

                    <div class="tab-pane active" id="settings">
                        <?php if (session('msg')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session('msg') ?>
                            </div>
                        <?php endif; ?>
                        <!-- Users in community -->

                        <h3>Community Settings</h3>
                        <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_ac">Add Assistant Manager</button> -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form ">
                                    <form class="contact-form" action="<?= base_url(); ?>/manager/save-community" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control h3" placeholder="Title" value="<?= $community[0]->title ?>">
                                        </div>
                                        <input type="hidden" name="com_photo_id" value="<?= $community[0]->com_photo_id; ?>">
                                        <input type="hidden" name="id" value="<?= $community[0]->id; ?>">

                                        <div class="form-group">
                                            <textarea name="content" class="form-control" cols="5" rows="2" placeholder="Description"><?= $community[0]->content ?></textarea>
                                        </div>

                                        <div class="togglebutton">
                                            <label>
                                                <input type="checkbox" name="community_type" <?= ($community[0]->community_type     == '1' ? 'checked' : null) ?>>
                                                <span class="toggle"></span>
                                                Private Community
                                            </label>
                                        </div>
                                        <label for="color">Select your theme color:</label>
                                        <input type="color" name="color" value="<?= $community[0]->color; ?>" class="myField"><br>
                                        <label for="color">Select your text color:</label>
                                        <input type="color" name="text_color" value="<?= $community[0]->text_color; ?>">
                                        <hr>
                                        <div class="form-group">
                                            <h6>Edit Community Cover Photo</h6>
                                            <a href="#" data-toggle="modal" data-target="#edit_cover<?= $key ?>">
                                                <img src="<?= base_url(); ?>/public/admin/uploads/community/<?= $community[0]->name ?>" alt="" width="50%" height="50%">
                                            </a>
                                            <input type="file" name="file" class="text-center center-block file-upload form-control" accept=".png, .jpg, .jpeg">
                                        </div>
                                        <hr>
                                        <div class="row">
                                            
                                            <div class="form-group col-sm-6">
                                                <label>Upvote Name</label><br>
                                                <input name="upvote_name" value=" <?= $community[0]->upvote_name ?>" type="text" class="form-control">
                                            </div>
                                           
                                        </div>

                                        <hr>
                                        <button type="submit" class="btn btn-primary btn-sm">Save
                                            Community</button>
                                    </form>
                                </div>

                            </div>

                        </div>
                        <div class="card card-body mt-0">
                            <h6>Community Join in Question</h6>

                            <div class="form-group">
                                <form action="<?= base_url(); ?>/community_questions" method="post">
                                    <label>Question</label>
                                    <input type="text" name="questions" class="form-control" value="<?= $community[0]->questions ?>">
                                    <input type="hidden" name="community_id" class="form-control" value="<?= $community[0]->id ?>">
                                    <button type="submit" class="btn btn-primary btn-sm"> Save</button>
                                </form>
                            </div>
                        </div>


                        <div class="card card-body mt-0">
                            <h6>Settings</h6>

                            <div class="form-group">
                                <label>Remove Community</label><br>

                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#remove-community">Remove</button>

                            </div>
                        </div>


                    </div>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>

<!-- Classic Modal -->
<div class="modal fade" id="add_category" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">
          <form class="contact-form" action="<?= base_url(); ?>/add_category" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <div class="form-group row">
              <div class="col-lg-12">
                <label>Category Name</label>
                <input type="text" name="category_name" class="form-control">
                <input type="hidden" name="community_id" value="<?= $community_id; ?>">
              </div>
            </div>


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn bg-success text-white btn-link">Submit</button>
          </form>
          <!-- <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button> -->
        </div>
      </div>
    </div>
  </div>
  <!--  End Modal -->

  


<!-- Classic Modal -->
<div class="modal fade" id="remove-community" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Community</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <div class="modal-body">
                        <h6>Are you sure do you want to delete this community?</h6>

                        <form action="<?= base_url() ?>/remove_community" method="POST">
                            <input type="hidden" name="id" value="<?= $community[0]->id ?>">
                            <button type="submit" class="btn btn-danger btn-sm"> Remove</button>
                        </form>
                    </div>

                </div>
                </hr><br>
            </div>

        </div>
    </div>
</div>
<!--  End Modal -->

<!-- Classic Modal -->
<div class="modal fade" id="edit_cover" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary py-3 text-white align-items-center">
                <h5 class="modal-title m-0">Update Cover Photo</h5>
                <button type="button" class="close bg-danger text-white btn-link p-2 rounded-circle" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="" class="avatar img-circle img-thumbnail">
                            <h6>Upload a different photo...</h6>
                            <form action="<?php echo base_url('/update_community_cover'); ?>" name="ajax_form" id="ajax_form" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                                <input type="file" name="file" class="text-center center-block file-upload" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="com_photo_id" value="<?= $community[0]->com_photo_id ?>">
                                <input type="hidden" name="community_id" value="<?= $community[0]->id ?>">
                                <div class="form-group"><br>
                                    <hr>
                                    <button type="submit" id="send_form" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                        </hr><br>
                    </div>

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