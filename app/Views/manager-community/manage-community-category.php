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
<script>
function add(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
      var new_input="<input class='form-control' type='text'  name='subclass[]' id='new_"+new_chq_no+"' placeholder='Type here...'>";
      $('#sub').append(new_input);
      $('#total_chq').val(new_chq_no)
    }
    function remove(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
              <a class="nav-link " href="<?= base_url() ?>/manage-community/<?= $community_id ?>" >
                  <i class="material-icons">dashboard</i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?= base_url() ?>/manage-community/category/<?= $community_id ?>" >
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
              <a class="nav-link" href="<?= base_url(); ?>/manage-community/ip-management/<?= $community_id ?>">
                  <i class="material-icons">share</i>
                  IP Management
                </a>
              </li>
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

              <div class="tab-pane active" id="category">


                <?php if(session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session()->get('success') ?>
                </div>
                <?php endif; ?>
                <h2>Category</h2>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_category">Add
                  Category</button>
                
                <div class="row">

                <div class="table-responsive">
                  <table id="myTable" class="table table-striped table-bordered" style="width:100%">
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
                          <button class="btn btn-success btn-sm" data-toggle="modal" 
                          data-target="#add_subclass<?= $key ?>">Add Subclass</button>
                          <button class="btn btn-secondary btn-sm" data-toggle="modal"
                            data-target="#edit_category<?= $key ?>">Update Category</button>
                          <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete_category<?= $key ?>">Delete Category</button>
                        </td>
                      </tr>


                         <!-- Classic Modal -->
                      <div class="modal fade" id="add_subclass<?= $key ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="material-icons">clear</i>
                              </button>
                            </div>
                            <div class="modal-body">
                            <!-- action="<= base_url(); ?>/add_subclass" -->
                              <form class="form-subclass" >
                                <div class="form-group row">
                                  <div class="col-lg-12">
                               
   
                                    <div class="mb-3">
                                      <label></label>
                                      <button onclick="add()" type="button" class="btn btn-primary btn-sm">Add</button>
                                      <button onclick="remove()" type="button" class="btn btn-danger btn-sm ">remove</button>
                                      </div>
                                      <br>
                                    <div id="new_chq">
                                      <label>Subclass</label>
                                      
                                    </div>
                                    <input type="hidden" value="1" id="total_chq">
                                    <div id="sub">
                                    
                                    </div>
                                    <input type="hidden" value="<?= $value['community_id'] ?>" name="community_id[]">
                                    <input type="hidden" value="<?= $value['id'] ?>" name="category_id[]" >
                                    <input class='form-control' name='subclass[]' type='text' placeholder='Type here...'>
                                  </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                              <button type="button" class="add-subclass btn btn-link">Save</button>
                              </form>
                              <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
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
                              <a
                                href="<?= base_url() ?>/delete_category/<?= $value['id'] ?>/<?= $value['community_id'] ?>">
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