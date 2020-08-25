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
    if ($(".collapse").hasClass("show")) {
      $(".collapse").removeClass("show");
      $(".eye").removeClass("fa fa-eye-slash");
      $(".eye").addClass("fa fa-eye");
    } else {
      $(".eye").removeClass("fa fa-eye");
      $(".collapse").addClass("show");
      $(".eye").addClass("fa fa-eye-slash");
    }

  }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
  <div class="container">
    <div class="section p-0">
      <div class="col-sm-12">
        <nav class="mt-3  bg-white" aria-label="breadcrumb">
          <ol class="breadcrumb m-0  bg-white">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Manage Community</a></li>
            <li class="breadcrumb-item active" aria-current="page">Test Community</li>
          </ol>
        </nav>
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-md-3">
            <ul class="nav nav-pills nav-pills-icons flex-column  p-3" role="tablist">

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
                  User roles
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



              <?php if (session('msg')) : ?>
              <div class="alert alert-success" role="alert">
                <?= session('msg') ?>
              </div>
              <?php endif; ?>
              <div class="row align-items-center px-3">
                <div class="px-2 col-sm-10 d-flex align-items-center">

                  <h4 class="m-0 pr-3 bor">Categories</h4>
                  <a class="border border-light btn-transparent btn-sm p-3" data-toggle="modal"
                    data-target="#add_category"><i class="fa fa-plus"></i> Add
                    new</a>
                </div>
                <div class="float-right px-2">
                  <button class="btn btn-secondary btn-fab btn-round hide-all" onclick="hideAll()">
                    <i class="eye fa fa-eye-slash" aria-hidden="true"></i>
                    <div class="ripple-container"></div>
                  </button>

                </div>
              </div>


              <div class="accordion" id="accordionExample">
                <?php foreach ($community_category as $key => $value) : ?>
                <div class="card">
                  <div class="d-flex p-3 bg-light align-items-center">

                    <div class="col-sm-11" id="headingOne">
                      <a href="#" class="d-block text-left" data-toggle="collapse"
                        data-target="#collapseOne<?= $key ?>">
                        <b><?= $value['category_name'] ?></b></a>
                    </div>
                    <div class="col-sm">
                      <div class="dropdown float-right">
                        <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          <!-- <i class="fa fa-cog"></i> -->
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item " data-toggle="modal" data-target="#add_subclass<?= $key ?>">Add
                            Subclass</a>
                          <a class="dropdown-item" data-toggle="modal" data-target="#edit_category<?= $key ?>">Edit
                            Category</a>
                          <a class="dropdown-item" data-toggle="modal"
                            data-target="#delete_category<?= $key ?>">Delete</a>
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
                      <div class="card-body">

                        <div class="col-sm-12">
                          <div class="d-flex">

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
                              <?php foreach ($value['subclass'] as $key1 => $value1) : ?>
                              <tr>
                                <td>
                                  <p style="color:#999999"><?= $value1['subclass'] ?></p>
                                </td>
                                <td>
                                  <button class="btn btn-success btn-sm" data-toggle="modal"
                                    data-target="#edit_subclass<?= $key1 ?>"><i class="fa fa-edit"></i></button>
                                  <button class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#delete_subclass<?= $key1 ?>"><i class="fa fa-trash"></i></button>

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
                                      <form class="contact-form" action="<?= base_url(); ?>/update_subclass"
                                        method="post" accept-charset="utf-8" enctype="multipart/form-data">
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
                                        <button type="submit"
                                          class="btn bg-success text-white btn-link">Confirm</button>
                                      </a>

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

                              </div>

                              <div id="sub">

                              </div>
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
          <button type="submit" class="btn bg-success text-white btn-link">Submit</button>
          </form>
          <!-- <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button> -->
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