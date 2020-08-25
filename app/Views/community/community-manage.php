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
  <div class="community-sidebar">
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
          <?php foreach ($community_category as $key => $value) : ?>
          <div class="d-flex p-3 bg-light align-items-center col-sm-12 pt-4">

            <div class="col-sm-11 p-0" id="headingOne">
              <a href="#" class="d-block text-left" data-toggle="collapse" data-target="#collapseOne<?= $key ?>">
                <b><?= $value['category_name'] ?></b></a>
            </div>
            <div class="col-sm">
              <div class="dropdown float-right">
                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <!-- <i class="fa fa-cog"></i> -->
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item " data-toggle="modal" data-target="#add_subclass<?= $key ?>">Add Subclass</a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#edit_category<?= $key ?>">Edit Category</a>
                  <a class="dropdown-item" data-toggle="modal" data-target="#delete_category<?= $key ?>">Delete</a>
                </div>
              </div>

            </div>

          </div>

          <?php if (empty($value['subclass'])) : ?>
          <div id="collapseOne<?= $key ?>" class="collapse" aria-labelledby="headingOne"
            data-parent="#accordionExample">
            <?php else : ?>
            <div id="collapseOne<?= $key ?>" class="collapse show" aria-labelledby="headingOne"
              data-parent="#accordionExample">
              <?php endif; ?>
              
              
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
                            <a class="dropdown-item" data-toggle="modal" data-target="#edit_subclass<?= $key1 ?>">Edit Category</a>
                            <a class="dropdown-item" data-toggle="modal" data-toggle="modal" data-target="#delete_subclass<?= $key1 ?>">Delete</a>
                          </div>
                        </div>

                      </div>

                      </div>



                    <!-- Classic Modal -->
                    <div class="modal fade" id="edit_subclass<?= $key1 ?>" tabindex="-1" role="dialog">
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
                    <div class="modal fade" id="delete_subclass<?= $key1 ?>" tabindex="-1" role="dialog">
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
          

          <div class="modal fade" id="add_subclass<?= $key ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Add Subclass</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="<?= base_url(); ?>/add_subclass" method="post">
                    <div class="form-group row">
                      <div class="col-lg-12">

                        <input type="hidden" value="<?= $value['community_id'] ?>" name="community_id">
                        <input type="hidden" value="<?= $value['id'] ?>" name="category_id">
                        <input class='form-control' name='subclass' type='text' placeholder='Enter Subclass'>
                      </div>
                    </div>


                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn bg-success text-white btn-link">Add</button>
                  </form>
                  <!-- <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button> -->
                </div>
              </div>
            </div>
          </div>
          <!--  End Modal -->


          <!-- Classic Modal -->
          <div class="modal fade" id="edit_category<?= $key ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Category</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                  </button>
                </div>
                <div class="modal-body">
                  <form class="contact-form" action="<?= base_url(); ?>/update_category" method="post"
                    accept-charset="utf-8" enctype="multipart/form-data">
                    <div class="form-group row">
                      <div class="col-lg-12">
                        <label>Category Name</label>
                        <input type="text" name="category_name" class="form-control"
                          value="<?= $value['category_name'] ?>">
                        <input type="hidden" name="community_id" value="<?= $value['community_id']; ?>">
                        <input type="hidden" name="id" value="<?= $value['id']; ?>">
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
          <div class="modal fade" id="delete_category<?= $key ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Delete Category</h5>
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
                  <a href="<?= base_url() ?>/delete_category/<?= $value['id'] ?>/<?= $value['community_id'] ?>">
                    <button type="submit" class="btn bg-success text-white btn-link">Confirm</button>
                  </a>
                  <!-- <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button> -->
                </div>
              </div>
            </div>
          </div>
          <!--  End Modal -->

          <?php endforeach; ?>
        </div>
        <div class="community_hr my-4"></div>
        <div class="row mb-2">
          <div class="col-12">
            <a href="<?= base_url(); ?>/community-manage/members/<?= $community_list[0]->id; ?>">
              <h5 class="m-0">Members</h5>
            </a>
          </div>
        </div>
        <div class="community_hr my-4"></div>
        <div class="row mb-2">
          <div class="col-12">
            <a href="<?= base_url(); ?>/community-manage/reports/<?= $community_list[0]->id; ?>">
              <h5 class="m-0">Reports</h5>
            </a>
          </div>
        </div>
        <div class="community_hr my-4"></div>
        <div class="row mb-2">
          <div class="col-12">
            <a href="<?= base_url(); ?>/community-manage/blocked-users/<?= $community_list[0]->id; ?>">
              <h5 class="m-0">Blocked Users</h5>
            </a>
          </div>
        </div>
        <div class="community_hr my-4"></div>
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
  <div class="community-feed">

    <div class="page-header header-filter m-auto"
      style="background-image: url('<?= base_url(); ?>/public/admin/uploads/community/<?= $community_list[0]->name; ?>')">
    </div>

    <div class="">
      <nav class="container " aria-label="breadcrumb">
        <ol class="breadcrumb m-0 ">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Communities</a></li>
          <li class="breadcrumb-item active" aria-current="page">Test Community</li>
        </ol>
      </nav>

      <div class="container d-flex  p-0 community-join_inner">

        <div class="col-lg-12 bg-gray p-0">
          <div class="community-section">


            <?php if (session('msg')) : ?>
            <div class="alert alert-info">
              <div class="container">
                <div class="alert-icon">
                  <i class="material-icons">info_outline</i>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true"><i class="material-icons">clear</i></span>
                </button>
                <b>Info alert:</b>
                <?= session('msg') ?>
              </div>
            </div>
            <br>
            <?php endif; ?>
            <?php if (empty($users_community) && $community_list[0]->community_type == '1') : ?>
            <?php else : ?>
            <div class="col-md-12 px-0 of-hidden">
              <?php if (empty($users_community)) : ?>
              <div class="alert alert-info">
                <div class="container">
                  <div class="alert-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                  </button>
                  <b>Info alert:</b> You must join to the community first, inorder to be able to add post and add
                  comments.
                </div>
              </div>
              <?php endif; ?>
              <!-- <div class="row py-2" style="background-color:<?= $community_list[0]->color; ?>"> -->
              <div class="row pt-2 bg-white community-info m-0">
                <div class="d-flex align-items-center w-100  px-2">
                  <div class="col-lg-12 row community-info-area  align-items-center">
                    <div class="col-sm-8">
                      <ul class="nav nav-pills nav-pills justify-content-end px-0 view-options" role="tablist">
                        <li class="nav-item ">
                          <a class="nav-link p-0 m-0 active show" href="#grid" role="tab" id="community-grid-tab"
                            data-toggle="pill" aria-controls="grid" aria-selected="true">
                            <i class="fa fa-th"></i>
                          </a>
                        </li>
                        <li class="nav-item ">
                          <a class="nav-link p-0 m-0" href="#list" role="tab" data-toggle="pill" aria-controls="list"
                            id="community-list-tab" aria-selected="false">
                            <i class="fa fa-list "></i>
                          </a>
                        </li>
                        <li class="nav-item ">
                          <a class="nav-link p-0 m-0" href="#longbars" role="tab" data-toggle="pill"
                            aria-controls="longbars" id="community-longbars-tab" aria-selected="false">
                            <i class="fa fa-bars"></i>
                          </a>
                        </li>
                        <li class="nav-item ">
                          <a class="nav-link p-0 m-0" href="#bars" role="tab" data-toggle="pill" aria-controls="bars"
                            id="community-bars-tab" aria-selected="false">
                            <i class="fa fa-align-justify"></i>
                          </a>
                        </li>
                        <li class="nav-item ">
                          <div class="team-player create-post">
                            <div class="card custom-card card-body justify-content-center m-0 p-0">
                              <?php if (!empty($users_community)) : ?>
                              <a class="nav-link" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-plus"></i></a>
                              <?php else : ?>
                              <a id="not_joined" class="btn btn-link">
                                <i class="fa fa-plus"></i> </a>
                              <?php endif; ?>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="d-flex col-12 px-0 community-after-options justify-content-center">

                  <ul class="nav nav-pills nav-pills-icons justify-content-center community-tab-opts px-0"
                    role="tablist">
                    <li class="nav-item active">
                      <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                        Hot
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="#schedule-1" role="tab" data-toggle="tab">
                        Burning
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                        Notice
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="d-flex">
                <div class="tab-content pt-0 mt-0 col-lg-12">
                  <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="community-grid-tab">
                    <div class="card-body pt-0 row">
                      <?php if(!empty($posts[0])): ?>
                      <?php foreach ($posts[0] as $key => $value) : ?>

                      <div class="col-lg-4 mb-4">
                        <div class="card text-center">
                          <?php if($value->thumbnail): ?>
                          <img class="card-img-top" style=" object-fit: cover;"
                            src="<?= base_url(); ?>/public/post_photos/<?= $value->thumbnail; ?>" alt="">
                          <?php else: ?>
                          <img class="card-img-top" style=" object-fit: cover;"
                            src="<?= base_url(); ?>/public/dummy/post.jpg" alt="">
                          <?php endif; ?>
                          <div class="card-body">
                            <h4 class="card-title">
                              <?= character_limiter($value->title, 40) ?>
                            </h4>
                            <h6 class="card-subtitle mb-2 text-muted">
                              <?= $value->category_name ?> |
                              <?= $value->subclass ?>
                            </h6>
                            <?php if($value->tags): ?>
                            <?php 
                                                                   $tags = explode (",", $value->tags);      
                                                            ?>
                            <?php foreach ($tags as $key1 => $value1): ?>
                            <span class="badge badge-pill badge-info"><?= $value1 ?></span>
                            <?php endforeach; ?>
                            <?php endif; ?>

                          </div>

                          <h6 class=" text-muted ">Posted By: <a href="#"><?= $value->nickname; ?></a>
                          </h6>
                          <h6 class="card-subtitle mb-2 text-muted">
                            <?= $value->updated_at ?>
                          </h6>
                          <!-- <a class="px-2 " href="#"><?= $value->updated_at ?></a> -->
                          <div class="card-footer justify-content-center">
                            <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>">
                              <button class="btn btn-primary btn-sm">read more</button>
                            </a>
                          </div>
                        </div>
                      </div>
                      <?php endforeach; ?>
                      <?php else: ?>
                      <div class="col-lg-4  mb-4">
                        <div class="card justify-content-center text-center">
                          <!-- <img class="card-img-top"style=" object-fit: cover;" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg" alt=""> -->
                          <div class="card-body ">
                            <h4 class="card-title ">No Post Yet</h4>
                          </div>
                        </div>
                      </div>
                      <?php endif; ?>
                    </div>
                  </div>



                </div>
              </div>
            </div>
            <?php endif; ?>
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
            <form class="contact-form" action="<?= base_url(); ?>/add_category" method="post" accept-charset="utf-8"
              enctype="multipart/form-data">
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