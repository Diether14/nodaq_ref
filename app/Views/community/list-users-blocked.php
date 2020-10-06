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
  <?= view('templates/manage-sidebar'); ?>
  <div class="community-feed bg-white">

    <div class="page-header header-filter m-auto"
      style="background-image: url('<?= base_url(); ?>/public/admin/uploads/community/<?= $community_list[0]->name; ?>')">
    </div>

    <div class="">
      <nav class="" aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Communities</a></li>
          <li class="breadcrumb-item active" aria-current="page">Test Community</li>
        </ol>
      </nav>

      <div class="container d-flex  p-0 community-join_inner ">

        <div class="col-lg-12  p-0">
          <div class="community-section">



            <h2 class="pl-3">Block List</h2>
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
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#unblock<?= $key ?>">
                          Unblock</button>


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
                            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
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