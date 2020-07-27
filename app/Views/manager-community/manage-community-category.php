<style>
  .dashboard-card {
    min-height: 100px;
    max-height: 100px;
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
  function add() {
    var new_chq_no = parseInt($('#total_chq').val()) + 1;
    var new_input = "<input class='form-control' type='text'  name='subclass[]' id='new_" + new_chq_no + "' placeholder='Type here...'>";
    $('#sub').append(new_input);
    $('#total_chq').val(new_chq_no)
  }
  function remove() {
    var last_chq_no = $('#total_chq').val();
    if (last_chq_no > 1) {
      $('#new_' + last_chq_no).remove();
      $('#total_chq').val(last_chq_no - 1);
    }
  }

  function hideAll() {
    if($( ".collapse" ).hasClass( "show" )){
      $(".collapse").removeClass("show");
      $(".eye").removeClass("fa fa-eye-slash");
      $(".eye").addClass("fa fa-eye");
    }else{
      $(".eye").removeClass("fa fa-eye");
      $(".collapse").addClass("show");
      $(".eye").addClass("fa fa-eye-slash");
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
                <a class="nav-link " href="<?= base_url() ?>/manage-community/<?= $community_id ?>">
                  <i class="material-icons">dashboard</i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?= base_url() ?>/manage-community/category/<?= $community_id ?>">
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
                <a class="nav-link" href="<?= base_url(); ?>/manage-community/community-settings/<?= $community_id ?>">
                  <i class="material-icons">settings</i>
                  Settings
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-9 card-body">
            <div class="tab-content">



              <?php if(session('msg')): ?>
              <div class="alert alert-success" role="alert">
                <?= session('msg') ?>
              </div>
              <?php endif; ?>
              <h2>Category</h2>
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_category"><i
                  class="fa fa-plus"></i> Add
                Category</button>
              <div style="float:right">
                <button class="btn btn-secondary btn-fab btn-round hide-all" onclick="hideAll()">
                  <i class="eye fa fa-eye-slash" aria-hidden="true"></i>
                  <div class="ripple-container"></div>
                </button>

              </div>


              <div class="accordion" id="accordionExample">
                <?php foreach ($community_category as $key => $value): ?>
                <div class="card">
                  <div class="" id="headingOne">
                    <h2 class="m-0">
                      <button type="button" class="btn btn-link" data-toggle="collapse"
                        data-target="#collapseOne<?= $key ?>">
                        <b><?= $value['category_name'] ?></b></button>
                    </h2>
                  </div>
                  <div id="collapseOne<?= $key ?>" class="collapse" aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body">

                      <div class="col-sm-12">
                        <div class="d-flex">
                          <button class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#add_subclass<?= $key ?>"><i class="fa fa-plus"></i> Add Subclass</button>
                          <button class="btn btn-success btn-sm" data-toggle="modal"
                            data-target="#edit_category<?= $key ?>"><i class="fa fa-recycle"></i> Update
                            Category</button>
                          <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete_category<?= $key ?>"><i class="fa fa-trash"></i> Delete
                            Category</button>


                        </div>
                        <table class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>

                              <th width="60%">
                                <p style="color:#999999">Subclass</p>
                              </th>
                              <th>
                                <p style="color:#999999">Action</p>
                              </th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($value['subclass'] as $key1 => $value1): ?>
                            <tr>
                              <td>
                                <p style="color:#999999"><?= $value1['subclass'] ?></p>
                              </td>
                              <td>
                                <button class="btn btn-success btn-sm" data-toggle="modal"
                                  data-target="#edit_subclass<?= $key1 ?>"> Update</button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal"
                                  data-target="#delete_subclass<?= $key1 ?>"> Delete</button>

                              </td>

                            </tr>
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
                                          <input type="hidden" name="community_id"
                                            value="<?= $value1['community_id']; ?>">
                                          <input type="hidden" name="id" value="<?= $value1['id']; ?>">
                                        </div>
                                      </div>


                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-link">Submit</button>
                                    </form>
                                    <button type="button" class="btn btn-danger btn-link"
                                      data-dismiss="modal">Close</button>
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
                                      <button type="submit" class="btn btn-link">Delete Subclass</button>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-link"
                                      data-dismiss="modal">Close</button>
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

                            <div id="new_chq">
                              <label>Subclass</label>

                            </div>

                            <div id="sub">

                            </div>
                            <input type="hidden" value="<?= $value['community_id'] ?>" name="community_id">
                            <input type="hidden" value="<?= $value['id'] ?>" name="category_id">
                            <input class='form-control' name='subclass' type='text' placeholder='Type here...'>
                          </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-link">Save</button>
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
                            <input type="hidden" name="community_id" value="<?= $value['community_id']; ?>">
                            <input type="hidden" name="id" value="<?= $value['id']; ?>">
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