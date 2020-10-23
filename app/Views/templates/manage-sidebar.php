<div class="community-sidebar h-100" >
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
    
    <div class="community_hr my-2"></div>
      <div class="community_joined">
        <div class="community_joined_row">
          <div class="btn-group">
            <a href="<?= base_url(); ?>/manage-members/<?= $community_list[0]->slug; ?>/<?= $community_list[0]->id; ?>/<?= $community_category[0]['id'] ?>/<?= $community_category[0]['subclass'][0]['id'] ?>" class="btn btn-round btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Members (10)"><i class="fa fa-users"></i></a>
            <a href="<?= base_url(); ?>/manage-reports/<?= $community_list[0]->slug; ?>/<?= $community_list[0]->id; ?>/<?= $community_category[0]['id'] ?>/<?= $community_category[0]['subclass'][0]['id'] ?>" class="btn btn-round btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Reports"><i class="fa fa-chart-bar"></i></a>
            <a href="<?= base_url(); ?>/manage-blocked-users/<?= $community_list[0]->slug; ?>/<?= $community_list[0]->id; ?>/<?= $community_category[0]['id'] ?>/<?= $community_category[0]['subclass'][0]['id'] ?>" class="btn btn-round btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Blocked Users"><i class="fa fa-user-slash"></i></a>
            <a href="<?= base_url(); ?>/manage-settings/<?= $community_list[0]->slug; ?>/<?= $community_list[0]->id; ?>/<?= $community_category[0]['id'] ?>/<?= $community_category[0]['subclass'][0]['id'] ?>" class="btn btn-round btn-outline-primary" data-toggle="tooltip" data-placement="top" title="Settings"><i class="fa fa-cog"></i></a>
          </div>

          <div class="row mb-2">
            <div class="col-12 row align-items-center">
              <h5 class="m-0">Categories</h5>
              <div class="float-right">

                <button type="button" class="btn btn-sm bg-transparent" data-toggle="modal" data-target="#add_category"><i
                    class="fa fa-plus text-primary shadow-none"></i></button>
              </div>

            </div>


            <?php $uri = service('uri'); ?>
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
                        <?php if($key != 0): ?>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item " data-toggle="modal" data-target="#add_subclass<?= $key ?>">Add Subclass</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#edit_category<?= $key ?>">Edit</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#delete_category<?= $key ?>">Delete</a>
                          </div>
                        <?php else: ?>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item " data-toggle="modal" data-target="#add_subclass<?= $key ?>">Add Subclass</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#edit_category<?= $key ?>">Edit</a>
                          </div>
                        <?php endif; ?>
                      </div>
                    </button>
   
                    <?= ($uri->getSegment(2) ==  'home' ? 'active': null)?>
                    <div id="collapseCategory<?= $key ?>" class="collapse w-100 <?= $uri->getSegment(5) == $value['id'] ? 'show': null ?>" data-parent="#accordion-sidebar">

                    <?php foreach ($value['subclass'] as $key1 => $value1) : ?>
                      <div class="d-flex p-3 align-items-center col-sm-12 <?= $uri->getSegment(6) == $value1['id'] ? 'bg-light': null ?>">

                        <div class="col-sm-11 p-0" id="headingOne">
                        <a href="<?= base_url(); ?>/community-manage/<?= $community_list[0]->slug; ?>/<?= $value['community_id'] ?>/<?= $value['id'] ?>/<?= $value1['id'] ?>" class="d-block text-left " >
                            <b><?= $value1['subclass'] ?></b>
                        </a>
                        </div>

                        <div class="col-sm">
                          <div class="dropdown">
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
                  <?php endforeach;?>
                </div>
              </div>
          </div>


        </div>
      </div>
  </div>

