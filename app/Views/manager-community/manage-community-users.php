<!-- <div class="page-header header-filter" data-parallax="true"
  style="background-image: url('<?= base_url(); ?>/public/user/assets/img/bg3.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h1>Manage Community</h1>
          <h3 class="title text-center">Subtitle</h3>
        </div>
      </div>
    </div>
  </div>
</div> -->
<div class="main">
  <div class="container" id="users">
    <div class="section p-0">
    <div class="col-sm-12">
            <nav class="mt-3  bg-white" aria-label="breadcrumb">
        <ol class="breadcrumb m-0  bg-white">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Manage Community</a></li>
            <li class="breadcrumb-item" ><a href="#"> Test Community</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Roles</li>
        </ol>
    </nav>
            </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-md-3">
            <ul class="nav nav-pills nav-pills-icons flex-column p-3" role="tablist">

              <li class="nav-item">
                <a class="nav-link " href="<?= base_url() ?>/manage-community/<?= $community_id ?>">
                  <i class="material-icons">dashboard</i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>/manage-community/category/<?= $community_id ?>">
                  <i class="material-icons">category</i>
                  Category
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="<?= base_url(); ?>/manage-community/users/<?= $community_id ?>">
                  <i class="material-icons">people</i>
                  User roles
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>/manage-community/reported-posts/<?= $community_id ?>">
                  <i class="material-icons">report</i>
                  Reported Posts
                </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>/manage-community/block-list/<?= $community_id ?>">
                  <i class="material-icons">block</i>
                  Block List
                </a>
              </li> -->

              <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>/manage-community/community-settings/<?= $community_id ?>">
                  <i class="material-icons">settings</i>
                  Settings
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-9 card-body">
            <div class="tab-content">

              <div class="tab-pane active" id="users">
                <?php if(session('msg')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session('msg') ?>
                </div>
                <?php endif; ?>
                <!-- Users in community -->

                <h2>Community Users</h2>
                <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_ac">Add Assistant Manager</button> -->
                <div class="row ">


                  <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Status</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($users as $key => $value): ?>
                        <tr>
                          <td><?= $value->nickname ?></td>

                          <td><?php if($value->status == 1){
                          echo 'Active';
                        }elseif($value->status == 0){
                          echo 'Pending';
                        }elseif($value->status == 2){
                          echo 'Assistant Manager';
                        }
                         ?></td>
                          <td>

                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                              data-target="#view<?= $key ?>">View</button>
                            <?php if($value->status == 1): ?>
                            <button class="btn btn-info btn-sm" data-toggle="modal"
                              data-target="#make_ac<?= $key ?>">Make AC</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                              data-target="#ban_user<?= $key ?>">Ban User</button>
                            <?php elseif($value->status == 0): ?>
                            <button class="btn btn-info btn-sm" data-toggle="modal"
                              data-target="#accept_user<?= $key ?>">Accept</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal"
                              data-target="#reject_user<?= $key ?>">Reject</button>
                            <?php elseif($value->status == 2): ?>
                            <button class="btn btn-info btn-sm" data-toggle="modal"
                              data-target="#ac_settings<?= $key ?>">AC Settings</button>
                            <button class="btn btn-primary btn-sm" data-toggle="modal"
                              data-target="#remove_ac<?= $key ?>">Remove AC</button>

                            <?php endif; ?>


                          </td>
                        </tr>
                        <!-- Classic Modal -->
                        <div class="modal fade" id="view<?= $key ?>" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-primary py-3 align-items-center">
                                <h5 class="create-post-title modal-title w-100 fw600 m-0 text-white">View Profile</h5>
                                <button type="button" class="close bg-danger text-white btn-link p-2 rounded-circle" data-dismiss="modal" aria-label="Close">
                                  <i class="material-icons">clear</i>
                                </button>
                              </div>

                              <div class="modal-body">
                                <div class="form-group row">
                                  <div class="col-lg-12">
                                    <div class="form-group row">
                                      <div class="col-lg-12">
                                        <div class="modal-body text-center">

                                          <?php if(!empty($value->name)): ?>

                                          <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>"
                                            alt="Circle Image" class="img-raised  img-fluid img-thumbnail" alt="avatar"
                                            width="304" height="236">

                                          <?php else: ?>
                                          <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                                            class="img-raised  img-fluid img-thumbnail" alt="avatar" width="304"
                                            height="236">

                                          <?php endif; ?>

                                          <h4 class="header"><?= $value->nickname; ?></h4>
                                        </div>



                                      </div>
                                    </div>

                                  </div>
                                </div>
                                <div class="modal-footer">
<!-- 
                                  <button type="button" class="btn btn-danger btn-link"
                                    data-dismiss="modal">Close</button> -->
                                </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!--  End Modal -->
                        <!-- Classic Modal -->
                        <div class="modal fade" id="ac_settings<?= $key ?>" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Assistant Manager Settings</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <i class="material-icons">clear</i>
                                </button>
                              </div>
                              <form class="contact-form" action="<?= base_url(); ?>/ac_settings" method="post"
                                accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="modal-body">
                                  <div class="form-group row">
                                    <div class="col-lg-12">
                                      <div class="form-group row">
                                        <div class="col-lg-12">
                                          <div class="modal-body text-center">

                                            <?php if(!empty($value->name)): ?>

                                            <img
                                              src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>"
                                              alt="Circle Image" class="img-raised  img-fluid img-thumbnail"
                                              alt="avatar" width="304" height="236">

                                            <?php else: ?>
                                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                              alt="Circle Image" class="img-raised  img-fluid img-thumbnail"
                                              alt="avatar" width="304" height="236">

                                            <?php endif; ?>

                                            <h4 class="header"><?= $value->nickname; ?></h4>
                                          </div>

                                          <h4>Permissions</h4>
                                          <div class="card card-body">
                                            <h6>Community Settings</h6>
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input name="remove_comments" class="form-check-input" type="checkbox"
                                                  <?php if($value->remove_comments == '1'){ echo 'checked'; }  ?>>
                                                Remove Comments
                                                <span class="form-check-sign">
                                                  <span class="check"></span>
                                                </span>
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input name="remove_posts" class="form-check-input" type="checkbox"
                                                  <?php if($value->remove_posts == '1'){ echo 'checked'; }  ?>>
                                                Remove Posts
                                                <span class="form-check-sign">
                                                  <span class="check"></span>
                                                </span>
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input name="punish_users" class="form-check-input" type="checkbox"
                                                  <?php if($value->punish_users == '1'){ echo 'checked'; }  ?>>
                                                Punish Users
                                                <span class="form-check-sign">
                                                  <span class="check"></span>
                                                </span>
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input name="remove_posts_from_hotboard" class="form-check-input"
                                                  type="checkbox"
                                                  <?php if($value->remove_posts_from_hotboard == '1'){ echo 'checked'; }  ?>>
                                                Remove posts from hot board
                                                <span class="form-check-sign">
                                                  <span class="check"></span>
                                                </span>
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input name="edit_cover_photo" class="form-check-input" type="checkbox"
                                                  <?php if($value->edit_cover_photo == '1'){ echo 'checked'; }  ?>>
                                                Edit cover photo
                                                <span class="form-check-sign">
                                                  <span class="check"></span>
                                                </span>
                                              </label>
                                            </div>
                                          </div>
                                          <div class="card card-body">
                                            <h6>Community Category Settings</h6>
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input name="edit_categories" class="form-check-input" type="checkbox"
                                                  <?php if($value->edit_categories == '1'){ echo 'checked'; }  ?>>
                                                Edit categories
                                                <span class="form-check-sign">
                                                  <span class="check"></span>
                                                </span>
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input name="edit_subclass" class="form-check-input" type="checkbox"
                                                  <?php if($value->edit_subclass == '1'){ echo 'checked'; }  ?>>
                                                Edit subclass
                                                <span class="form-check-sign">
                                                  <span class="check"></span>
                                                </span>
                                              </label>
                                            </div>
                                          </div>
                                          <div>

                                          </div>
                                          <div class="card card-body">
                                            <h6>Notifications</h6>
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input name="notice" class="form-check-input" type="checkbox"
                                                  <?php if($value->notice == '1'){ echo 'checked'; }  ?>>
                                                Notice
                                                <span class="form-check-sign">
                                                  <span class="check"></span>
                                                </span>
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input name="general" class="form-check-input" type="checkbox"
                                                  <?php if($value->general == '1'){ echo 'checked'; }  ?>>
                                                General
                                                <span class="form-check-sign">
                                                  <span class="check"></span>
                                                </span>
                                              </label>
                                            </div>
                                            <div class="form-check">
                                              <label class="form-check-label">
                                                <input name="politic" class="form-check-input" type="checkbox"
                                                  <?php if($value->politic == '1'){ echo 'checked'; }  ?>>
                                                Politic
                                                <span class="form-check-sign">
                                                  <span class="check"></span>
                                                </span>
                                              </label>
                                            </div>

                                          </div>
                                        </div>


                                        <!-- <label>Reason</label>
                                    <input type="text" name="remove_ac_reason" class="form-control"
                                      value="" required> -->
                                        <input type="hidden" name="community_id" value="<?= $value->community_id; ?>">
                                        <input type="hidden" name="user_id" value="<?= $value->user_id; ?>">

                                      </div>
                                    </div>

                                  </div>
                                </div>
                                <div class="modal-footer">

                                  <button type="submit" class="btn bg-success text-white btn-link">Save Settings</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!--  End Modal -->

                        <!-- Classic Modal -->
                        <div class="modal fade" id="ban_user<?= $key ?>" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Ban User from community</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <i class="material-icons">clear</i>
                                </button>
                              </div>
                              <form class="contact-form" action="<?= base_url(); ?>/ban_user" method="post"
                                accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="modal-body">
                                  <div class="form-group row">
                                    <div class="col-lg-12">
                                      <div class="form-group row">
                                        <div class="col-lg-12">
                                          <label>Reason</label>
                                          <input type="text" name="ban_reason" class="form-control" value="" required>
                                          <input type="hidden" name="community_id" value="<?= $value->community_id; ?>">
                                          <input type="hidden" name="id" value="<?= $value->id; ?>">

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">

                                  <button type="submit" class="btn btn-link">Remove</button>

                                  <button type="button" class="btn btn-danger btn-link"
                                    data-dismiss="modal">Close</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!--  End Modal -->

                        <!-- Classic Modal -->
                        <div class="modal fade" id="remove_ac<?= $key ?>" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Remove Assistant Manager(AC)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <i class="material-icons">clear</i>
                                </button>
                              </div>
                              <form class="contact-form" action="<?= base_url(); ?>/remove_ac" method="post"
                                accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="modal-body">
                                  <div class="form-group row">
                                    <div class="col-lg-12">
                                      <div class="form-group row">
                                        <div class="col-lg-12">
                                          <label>Reason</label>
                                          <input type="text" name="remove_ac_reason" class="form-control" value=""
                                            required>
                                          <input type="hidden" name="community_id" value="<?= $value->community_id; ?>">
                                          <input type="hidden" name="id" value="<?= $value->id; ?>">

                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">

                                  <button type="submit" class="btn btn-link">Remove</button>

                                  <button type="button" class="btn btn-danger btn-link"
                                    data-dismiss="modal">Close</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!--  End Modal -->

                        <!-- Classic Modal -->
                        <div class="modal fade" id="make_ac<?= $key ?>" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Make Assistant Manager(AC)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <i class="material-icons">clear</i>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group row">
                                  <div class="col-lg-12">
                                    <h6 class="text">Are you sure do you want to make this user as your Assitant
                                      Manager?</h6>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <a href="<?= base_url() ?>/make_ac/<?= $value->id ?>/<?= $value->community_id ?>">
                                  <button type="submit" class="btn btn-link">Accept</button>
                                </a>
                                <button type="button" class="btn btn-danger btn-link"
                                  data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--  End Modal -->

                        <!-- Classic Modal -->
                        <div class="modal fade" id="accept_user<?= $key ?>" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-primary py-3 align-items-center">
                                <h5 class="create-post-title modal-title w-100 fw600 m-0 text-white">Accept User</h5>
                                <button type="button" class="close bg-danger text-white btn-link p-2 rounded-circle" data-dismiss="modal" aria-label="Close">
                                  <i class="material-icons">clear</i>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group row">
                                  <div class="col-lg-12">
                                    <h6 class="text">Are you sure do you want to accept the User?</h6>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <a href="<?= base_url() ?>/accept_user/<?= $value->id ?>/<?= $value->community_id ?>">
                                  <button type="submit" class="btn bg-success text-white btn-link float-right">Accept</button>
                                </a>
                                <!-- <button type="button" class="btn btn-danger btn-link"
                                  data-dismiss="modal">Close</button> -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--  End Modal -->

                        <!-- Classic Modal -->
                        <div class="modal fade" id="reject_user<?= $key ?>" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header bg-primary py-3 align-items-center">
                                <h5 class="create-post-title modal-title w-100 fw600 m-0 text-white">Reject User</h5>
                                <button type="button" class="close bg-danger text-white btn-link p-2 rounded-circle" data-dismiss="modal" aria-label="Close">
                                  <i class="material-icons">clear</i>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="form-group row">
                                  <div class="col-lg-12">
                                    <h6 class="text">Are you sure do you want to reject the User?</h6>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <a href="<?= base_url() ?>/reject_user/<?= $value->id ?>/<?= $value->community_id ?>">
                                  <button type="submit" class="btn bg-danger text-white btn-link float-right">Reject</button>
                                </a>
                                <!-- <button type="button" class="btn btn-danger btn-link"
                                  data-dismiss="modal">Close</button> -->
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--  End Modal -->

                        <?php endforeach; ?>
                      </tbody>
                    </table>
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
</div>


</script>