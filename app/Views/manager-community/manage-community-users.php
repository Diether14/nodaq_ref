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





<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('<?= base_url(); ?>/public/user/assets/img/bg3.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h1>Manage Community</h1>
          <!-- <h3 class="title text-center">Subtitle</h3> -->
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main">
  <div id="users">
    <div class="section p-0">

      <div class="col-lg-12">
        <div class="row">
          <div class="col-md-3">
            <ul class="nav nav-pills nav-pills-icons flex-column  card p-3" role="tablist">

              <li class="nav-item">
                <a class="nav-link " href="<?= base_url(); ?>/manage-community/<?= $community_id ?>">
                  <i class="material-icons">dashboard</i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="<?= base_url(); ?>/manage-community/category/<?= $community_id ?>">
                  <i class="material-icons">category</i>
                  Category
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="#users" role="tab" data-toggle="tab">
                  <i class="material-icons">people</i>
                  Community Users
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#report" role="tab" data-toggle="tab">
                  <i class="material-icons">report</i>
                  Reported Posts
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#acm" role="tab" data-toggle="tab">
                  <i class="material-icons">assistant</i>
                  Manage Managers
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#ip" role="tab" data-toggle="tab">
                  <i class="material-icons">share</i>
                  IP Management
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#settings" role="tab" data-toggle="tab">
                  <i class="material-icons">settings</i>
                  Settings
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-9 card-body">
            <div class="tab-content">

              <div class="tab-pane active" id="users">
                <?php if(session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session()->get('success') ?>
                </div>
                <?php endif; ?>
                <!-- Users in community -->

                <h2>Community Users</h2>
                <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_ac">Add Assistant Manager</button> -->
                <div class="row">


                <div class="table-responsive">
                  <table id="myTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th width="20%;">ID</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($users as $key => $value): ?>
                      <tr>
                        <td><?= $value->id ?></td>
                        <td><?= $value->nickname ?></td>

                        <td><?php if($value->status == 1 && $value->assistant_manager == 0){
                          echo 'Active';
                        }elseif($value->status == 0 && $value->assistant_manager == 0){
                          echo 'Pending';
                        }elseif($value->status == 1 && $value->assistant_manager == 1){
                          echo 'Assistant Manager';
                        }
                         ?></td>
                        <td>
                        <button class="btn btn-primary btn-sm">View</button>
                        <?php if($value->status == 1 && $value->assistant_manager == 0): ?>
                          <button class="btn btn-secondary btn-sm">Make AC</button>
                          <button class="btn btn-danger btn-sm">Ban User</button>
                        <?php elseif($value->status == 0 && $value->assistant_manager == 0): ?>
                          <button class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#accept_user<?= $key ?>">Accept</button>
                          <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#reject_user<?= $key ?>">Reject</button>
                        <?php elseif($value->status == 1 && $value->assistant_manager == 1): ?>
                          <button class="btn btn-secondary btn-sm">AC Settings</button>
                          <button class="btn btn-primary btn-sm">Remove AC</button>
                        <?php endif; ?>
                          

                        </td>
                      </tr>


                          <!-- Classic Modal -->
                      <div class="modal fade" id="accept_user<?= $key ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Accept User</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                <button type="submit" class="btn btn-link">Accept</button>
                              </a>
                              <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--  End Modal -->

                      <!-- Classic Modal -->
                      <div class="modal fade" id="reject_user<?= $key ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Reject User</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                <button type="submit" class="btn btn-link">Reject</button>
                              </a>
                              <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
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

