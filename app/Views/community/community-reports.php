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
                    <?php foreach ($community_category as $key => $value) : ?>
                    <div class="d-flex p-3 bg-light align-items-center col-sm-12 pt-4">
           
                        <div class="col-sm-11 p-0" id="headingOne">
                            <a href="#" class="d-block text-left" data-toggle="collapse" data-target="#collapseOne<?= $key ?>">
                                <b><?= $value['category_name'] ?></b></a>
                        </div>
                        <div class="col-sm">
                            <div class="dropdown float-right">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

            <div class="container ">

                <div class="col-lg-12  p-0">
                    <div class="community-section">


                    <?php if(session('msg')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session('msg') ?>
                                </div>
                                <?php endif; ?>
                                <!-- Users in community -->
                                <h2 class="pl-3">Reported Posts</h2>
                             
                                <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_ac">Add Assistant Manager</button> -->
                                <div class="row">


                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Reported By</th>
                                                    <th>Post Title</th>
                                                    <th>Reported Details</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($reported_posts as $key => $value): ?>
                                                <tr>
                                                    <td><?= $value->nickname ?></td>
                                                    <td><?= $value->title ?></td>
                                                    <td><?= $value->report_content ?></td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                            data-target="#view<?= $key ?>"> View</button>
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#ban_user<?= $key ?>"> Ban User</button>

                                                    </td>

                                                </tr>

                                                <div class="modal fade" id="view<?= $key ?>" tabindex="-1"
                                                    role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div
                                                                class="modal-header bg-primary py-3 text-white align-items-center">
                                                                <h5 class="modal-title">Report info</h5>
                                                                <button type="button"
                                                                    class="close bg-danger text-white btn-link p-2 rounded-circle"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <i class="material-icons">clear</i>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <label>Post Title</label><br>
                                                                <h6><?= $value->title ?></h6><br>
                                                                <label>Report Content</label><br>
                                                                <h6><?= $value->report_content ?></h6><br>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="button"
                                                                    class="btn bg-danger text-white btn-link float-right"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  End Modal -->

                                                <!-- Classic Modal -->
                                                <div class="modal fade" id="ban_user<?= $key ?>" tabindex="-1"
                                                    role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div
                                                                class="modal-header bg-primary py-3 align-items-center">
                                                                <h5
                                                                    class="create-post-title modal-title w-100 fw600 m-0 text-white">
                                                                    Reason</h5>
                                                                <button type="button"
                                                                    class="close bg-danger text-white btn-link p-2 rounded-circle"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <i class="material-icons">clear</i>
                                                                </button>
                                                            </div>
                                                            <form class="contact-form"
                                                                action="<?= base_url(); ?>/ban_user" method="post"
                                                                accept-charset="utf-8" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-12">
                                                                                    <textarea name="ban_reason"
                                                                                        class="form-control" value=""
                                                                                        required rows="5" placeholder="Something else"></textarea>
                                                                                    <input type="hidden"
                                                                                        name="community_id"
                                                                                        value="<?= $value->community_id; ?>">
                                                                                    <input type="hidden" name="id"
                                                                                        value="<?= $value->id; ?>">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <button type="submit"
                                                                        class="btn bg-success text-white btn-link float-left">Save</button>
                                                                    <!-- 
                                                                    <button type="button"
                                                                        class="btn bg-danger text-white btn-link float-left"
                                                                        data-dismiss="modal">Close</button> -->
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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