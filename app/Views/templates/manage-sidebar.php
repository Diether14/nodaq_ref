<div class="community-sidebar overflow-auto" >
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
                        <?php endif; ?>
                      </div>
                    </button>
   
                    <?= ($uri->getSegment(2) ==  'home' ? 'active': null)?>
                    <div id="collapseCategory<?= $key ?>" class="collapse w-100 <?= $uri->getSegment(5) == $value['id'] ? 'show': null ?>" data-parent="#accordion-sidebar">

                    <?php foreach ($value['subclass'] as $key1 => $value1) : ?>
                      <div class="d-flex p-3 align-items-center col-sm-12 <?= $uri->getSegment(6) == $value1['id'] ? 'bg-light': null ?>">

                        <div class="col-sm-11 p-0" id="headingOne">
                        <a href="<?= base_url(); ?>/community-manage/<?= $value['community_id'] ?>/<?= $value['id'] ?>/<?= $value1['id'] ?>" class="d-block text-left " >
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

                  <?php endforeach;?>
                </div>
              </div>
          </div>

          <div class="community_hr my-2"></div>
          <div class="row mb-2">
            <div class="col-12">
              
              <a href="<?= base_url(); ?>/community-manage/members/<?= $community_list[0]->id; ?>">
                <h5 class="m-0 list-group-item list-group-item-action <?= ($uri->getSegment(3) ==  'members' ? 'active': null)?>">Members</h5>
              </a>
            </div>
          </div>
          <div class="community_hr my-2"></div>
          <div class="row mb-2">
            <div class="col-12">
              <a href="<?= base_url(); ?>/community-manage/reports/<?= $community_list[0]->id; ?>">
                <h5 class="m-0 list-group-item list-group-item-action <?= ($uri->getSegment(3) ==  'reports' ? 'active': null)?>">Reports</h5>
              </a>
            </div>
          </div>
          <div class="community_hr my-2"></div>
          <div class="row mb-2">
            <div class="col-12">
              <a href="<?= base_url(); ?>/community-manage/blocked-users/<?= $community_list[0]->id; ?>">
                <h5 class="m-0 list-group-item list-group-item-action <?= ($uri->getSegment(3) ==  'blocked-users' ? 'active': null)?>" >Blocked Users</h5>
              </a>
            </div>
          </div>
          <div class="community_hr my-2"></div>
          <div class="row mb-2">
            <div class="col-12">
              <a href="<?= base_url(); ?>/community-manage/settings/<?= $community_list[0]->id; ?>">
                <h5 class="m-0 list-group-item list-group-item-action <?= ($uri->getSegment(3) ==  'settings' ? 'active': null)?>">Settings</h5>
              </a>
            </div>
          </div>
        </div>
      </div>
  </div>

