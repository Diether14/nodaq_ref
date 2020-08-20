<style>
  .dashboard-card {
    min-height: 130px;
    max-height: 130px;
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
</style>




<!-- 
<div class="page-header header-filter" data-parallax="true"
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
  <div class="container card" id="users">
    <div class="section p-0">

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
                <a class="nav-link" href="<?= base_url(); ?>/manage-community/users/<?= $community_id ?>">
                  <i class="material-icons">people</i>
                  Community Users
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>/manage-community/reported-posts/<?= $community_id ?>">
                  <i class="material-icons">report</i>
                  Reported Posts
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?= base_url(); ?>/manage-community/block-list/<?= $community_id ?>">
                  <i class="material-icons">block</i>
                  Blocked Users
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="<?= base_url(); ?>/manage-community/community-settings/<?= $community_id ?>">
                  <i class="material-icons">settings</i>
                  Settings
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-9 card-body">
            <div class="tab-content">

              <div class="tab-pane active" id="block-list">
                <?php if(session('msg')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session('msg') ?>
                </div>
                <?php endif; ?>
                <!-- Users in community -->

                <h2>Block List</h2>
                <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_ac">Add Assistant Manager</button> -->

                <div class="row">


                  <div class="table-responsive">
                    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Nickname</th>
                          <th>Ban Reason</th>
                          <th>Action</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($users as $key => $value): ?>
                        <tr> 
                          <td><?= $value->nickname; ?></td>
                          <td><?= $value->ban_reason; ?></td>
                          <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view<?= $key ?>">
                              View</button>
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#settings<?= $key ?>">
                              Settings</button>
                            <button class="btn btn-success btn-sm" data-toggle="modal"
                              data-target="#unblock<?= $key ?>"> Unblock</button>


                          </td>

                        </tr>

                        <div class="modal fade" id="unblock<?= $key ?>" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Unblock</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <i class="material-icons">clear</i>
                                </button>
                              </div>

                              <div class="modal-body">
                                <div class="form-group row">
                                  <div class="col-lg-12">
                                    <h6 class="text">Are you sure do you want Unblock the user?</h6>
                                  </div>
                                </div>
                              </div>

                              <div class="modal-footer">
                                <a href="<?= base_url() ?>/unblock/<?= $value->id ?>/<?= $value->community_id ?>">
                                  <button type="submit" class="btn btn-link">Unblock</button>
                                </a>
                                <button type="button" class="btn btn-danger btn-link"
                                  data-dismiss="modal">Close</button>
                              </div>

                            </div>
                          </div>
                        </div>
                  </div>

                  <div class="modal fade" id="view<?= $key ?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">View</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                      class="img-raised  img-fluid img-thumbnail" alt="avatar" width="304" height="236">

                                    <?php endif; ?>

                                    <h4 class="header"><b><?= $value->nickname; ?></b></h4>
                                    <p><?= $value->ban_reason ?> </p>
                                  </div>



                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="modal-footer">

                            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Classic Modal -->
                  <div class="modal fade" id="settings<?= $key ?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Settings</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons">clear</i>
                          </button>
                        </div>
                        <form class="contact-form" action="<?= base_url(); ?>/block_settings" method="post"
                          accept-charset="utf-8" enctype="multipart/form-data">
                          <div class="modal-body">
                            <h4><?= $value->nickname ?></h4>
                            <div class="card card-body">
                              <h6>Permission</h6>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input name="post" class="form-check-input" type="checkbox"
                                    <?php if($value->post == '1'){ echo 'checked'; }  ?>>
                                  Post
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input name="comment" class="form-check-input" type="checkbox"
                                    <?php if($value->comment == '1'){ echo 'checked'; }  ?>>
                                  Comment
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input name="share" class="form-check-input" type="checkbox"
                                    <?php if($value->share == '1'){ echo 'checked'; }  ?>>
                                  Share
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input name="report" class="form-check-input" type="checkbox"
                                    <?php if($value->report == '1'){ echo 'checked'; }  ?>>
                                  Report a Post
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input name="upvote_devote" class="form-check-input" type="checkbox"
                                    <?php if($value->upvote_devote == '1'){ echo 'checked'; }  ?>>
                                  Upvote and Devote
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                            <input type="hidden" name="id" value="<?= $value->id; ?>">
                            <input type="hidden" name="community_id" value="<?= $value->community_id; ?>">

                          </div>
                          <div class="modal-footer">

                            <button type="submit" class="btn btn-link">Save</button>

                            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                          </div>
                        </form>
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