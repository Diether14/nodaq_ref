<style>
.dashboard-card{
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
  <div class="">
    <div class="section p-0">

      <div class="col-lg-12">
        <div class="row">
          <div class="col-md-3">
            <ul class="nav nav-pills nav-pills-icons flex-column  card p-3" role="tablist">

              <li class="nav-item">
                <a class="nav-link active" href="#dashboard" role="tab" data-toggle="tab">
                  <i class="material-icons">dashboard</i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#category" role="tab" data-toggle="tab">
                  <i class="material-icons">category</i>
                  Category
                </a>
              </li>
           
              <li class="nav-item">
                <a class="nav-link" href="#users" role="tab" data-toggle="tab">
                  <i class="material-icons">people</i>
                  Users in community
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
          <div class="col-md-9 p-3">
            <div class="tab-content">
              <div class="tab-pane active" id="dashboard">
              <h2>Dashboard</h2>
              <div class="row">
                <div class="col-lg-4">
                  <div class="card dashboard-card" >
                    <div class='card-body justify-content-center'>
                      <div class="text-center">
                        <i class="material-icons text-primary" style="font-size:40px;">article</i>
                        <p><b>312</b></p>
                        <h6 class="">Total Posts</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card dashboard-card" >
                    <div class='card-body justify-content-center'>
                      <div class="text-center">
                      <i class="material-icons text-success"  style="font-size:40px;">report</i>
                      <p><b>67</b></p>
                      <h6>Total Members</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card dashboard-card" >
                    <div class='card-body '>
                      <div class="text-center">
                      <i class="material-icons text-danger"  style="font-size:40px;">report</i>
                      <p><b>12</b></p>
                      <h6>Total Reported Posts</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              </div>


              <div class="tab-pane" id="category">

                
                <?php if(session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session()->get('success') ?>
                </div>
                <?php endif; ?>
                <h2>Category</h2>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_category">Add Category</button>
                <div class="row">
              

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Category name</th>
                        <th>Created At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($community_category as $key => $value): ?>
                      <tr>
                        <td><?= $value['category_name'] ?></td>
                        <td><?= $value['updated_at'] ?></td>
                        <td>
                          <button class="btn btn-success btn-sm" >Add Subclass</button>
                          <button class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#edit_category<?= $key ?>">Update Category</button>
                          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_category<?= $key ?>">Delete Category</button>
                        </td>
                      </tr>
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
                              <form class="contact-form" action="<?= base_url(); ?>/update_category" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <div class="form-group row">
                                  <div class="col-lg-12">
                                    <label>Category Name</label>
                                    <input type="text" name="category_name" class="form-control" value="<?= $value['category_name'] ?>">
                                    <input type="hidden" name="community_id" value="<?= $community_id; ?>">
                                  </div>
                                </div>

                              
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-link">Submit</button>
                                </form>
                                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
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
                                <button type="submit" class="btn btn-link">Delete Category</button>
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


              <div class="tab-pane" id="acm">

               
                <?php if(session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session()->get('success') ?>
                </div>
                <?php endif; ?>
                <h2>Assistant Managers</h2>
                <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_ac">Add Assistant Manager</button> -->
                <div class="row">
               
                 
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th width="20%;">Username</th>
                        <th>Email</th>
                        <th>Date Created</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($users_community as $key => $value): ?>
                      <tr>
                        <td><?= $value->nickname ?></td>
                        <td><?= $value->email ?></td> 
                        <td>July 01, 2020</td>
                        <td>
                          <button class="btn btn-primary btn-sm">View</button>
                          <button class="btn btn-info btn-sm">Assistant Manager Settings</button>    
                          <button class="btn btn-danger btn-sm">Remove Assitant Manager</button> 
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>

              </div>

              <div class="tab-pane" id="report">
                <?php if(session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session()->get('success') ?>
                </div>
                <?php endif; ?>
                
                <div class="row">
                  <h2>Reported posts</h2>
                 
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Post Title</th>
                        <th>Created By</th>
                        <th>Reported By</th>
                        <th>Reported At</th> 
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Lorem Ipsum</td>
                        <td>Jhonny Smith</td>
                        <td>Joe Smith</td>
                        <td>July 03, 2020</td>
                        <td>
                          <button class="btn btn-danger btn-sm">Ban User</button> 
                        </td>
                      </tr>
                      <tr>
                        <td>Lorem Ipsum</td>
                        <td>Jhonny Smith</td>
                        <td>Joe Smith</td>
                        <td>July 03, 2020</td>
                        <td>
                          <button class="btn btn-danger btn-sm">Ban User</button> 
                        </td>
                      </tr>
                      <tr>
                        <td>Lorem Ipsum</td>
                        <td>Jhonny Smith</td>
                        <td>Joe Smith</td>
                        <td>July 03, 2020</td>
                        <td>
                          <button class="btn btn-danger btn-sm">Ban User</button> 
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="tab-pane" id="users">
              <?php if(session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session()->get('success') ?>
                </div>
                <?php endif; ?>
                <!-- Users in community -->
                
                <div class="col-lg-12 mb-0 pt-0">
                  <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">

                    <li class="nav-item">
                      <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                       Users

                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="#schedule-1" role="tab" data-toggle="tab">
                        Pending Users

                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="#schedule-1" role="tab" data-toggle="tab">
                        Banned Users

                      </a>
                    </li>
                  </ul>
                </div>
                <h2>Users in Community</h2>
                <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_ac">Add Assistant Manager</button> -->
                <div class="row">
               
                 
                  <table class="table table-striped">
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
               
                        <td><?php if($value->status == 1) echo 'Active' ?></td>
                        <td>
                          <button class="btn btn-primary btn-sm">View Profile</button>
                        
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>

                <h2>Pending Request</h2>
                <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_ac">Add Assistant Manager</button> -->
                <div class="row">
               
                 
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th width="20%;">ID</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Response</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($pending_users as $key => $value): ?>
                      <tr>
                        <td><?= $value->id ?></td>
                        <td><?= $value->nickname ?></td> 
                        <td><?php if($value->status == '0') echo 'Pending' ?></td>
                        <td>Image</td>
                        <td>
                          <button class="btn btn-primary btn-sm">View</button>
                          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#accept_user<?= $key ?>">Accept</button>    
                          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#reject_user<?= $key ?>">Reject</button> 
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

              <div class="tab-pane" id="settings">
                Settings                  
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
          <button type="submit" class="btn btn-link">Submit</button>
          </form>
          <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--  End Modal -->


<script>
  $('document').ready(function () {
    $("#btnSubmit").attr("disabled", true);

  });
</script>