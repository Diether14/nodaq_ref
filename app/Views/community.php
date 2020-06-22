<style>
  .modal {
    display: none;
    /* Hidden by default */

    padding-top: 50px;
    /* Location of the box - don't know what this does?  If it is to move your modal down by 100px, then just change top below to 100px and remove this*/

    overflow: auto;
    /* Enable scroll if needed */

    z-index: 9999;
    /* Sit on top - higher than any other z-index in your site*/
  }

  .modal-backdrop {
    position: absolute !important;
  }

  .modal-backdrop.show {
    opacity: 0 !important;
  }

  .custom-card {
    min-height: 420px;
    max-height: 420px;
  }

  .card-img-top {
    max-height: 200px;
    min-height: 200px;
    border-radius: 0%;
  }
/* modal show */
  .modal-backdrop {
    z-index: 1040 !important;
    display: none;    
  }
  .modal-dialog {
      margin: 32px auto;
      z-index: 1100 !important;
  }
</style>

<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('public/user/assets/img/bg3.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h1>My Community</h1>
          <!-- <h3 class="title text-center">Subtitle</h3> -->
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main">
  <div class="container">
    <div class="section">



      <div class="col-lg-12 col-md-12">
    

        <?php if (session('msg')) : ?>
        <div class="card bg-info text-white shadow">
          <div class="card-body">
            <?= session('msg') ?>

          </div>
        </div>
           <?php endif; ?>

        <div class="col-lg-12 mb-0 pt-0">
          <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">

            <li class="nav-item">
              <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                My Community

              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#schedule-1" role="tab" data-toggle="tab">
                Your Manager's Community

              </a>
            </li>
          </ul>
          <div class="tab-content tab-space">
            <div class="tab-pane active" id="dashboard-1">

              <div class="row">
                <div class="col-md-4">


                  <div class="team-player">
                    <div class="card custom-card card-body justify-content-center">

                      <a class="btn btn-link" data-toggle="modal" data-target="#myModal">
                        <span style="font-size:50px; color:#9C27B0" class="fa fa-plus"></span></a>
                    </div>
                  </div>
                </div>


                <?php if(!empty($community_list)): ?>
                <?php foreach ($community_list as $key => $value): ?>
                <div class="col-md-4">
                  <div class="team-player">

                    <div class="card h-100 custom-card ">

                      <h4 class="card-title p-3 my-0" style="background-color: <?= $value->color; ?>">


                        <a href="#" data-toggle="modal" data-target="#edit<?= $key ?>"><i class="fa fa-cog pl-3"
                            style="float:left;"></i></a>
                        <a href="community-join/<?= $value->id;  ?>" style="color: <?= $value->text_color; ?>">
                          <p class="text-center justify-content-center m-0 p-0"><?= character_limiter($value->title, 18) ?> </p>
                        </a>
                      </h4>
                      <div class="view overlay">
                        <img class="card-img-top rounded-0" src="public/admin/uploads/community/<?= $value->name ?>"
                          alt="Card image cap">
                        <a href="#!">
                          <div class="mask rgba-white-slight"></div>
                        </a>
                      </div>
                      <div class="card-body">
                        <p class="card-description"><?= character_limiter($value->content, 80); ?>
                        </p>
                      </div>
                      <div class="card-footer justify-content-center">

                        <div style="float-right">
                          <p class="text">Created By: <b><?= $value->nickname ?></b></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div style="position: absolute">
                <div class="modal fade" id="edit<?= $key ?>" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Update Community </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <form class="contact-form" action="update_community" method="post" accept-charset="utf-8"
                          enctype="multipart/form-data">

                          <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Title"
                              value="<?= $value->title ?>">
                          </div>
                          <input type="hidden" name="com_photo_id" value="<?= $value->com_photo_id; ?>">
                          <input type="hidden" name="id" value="<?= $value->id; ?>">

                          <div class="form-group">
                            <textarea name="content" class="form-control" cols="30" rows="10"
                              placeholder="Content"><?= $value->content ?></textarea>
                          </div>

                          <div class="togglebutton">
                            <label>
                              <input type="checkbox" name="community_type"
                                <?= ($value->community_type	 == '1' ? 'checked': null)?>>
                              <span class="toggle"></span>
                              Private Community
                            </label>
                          </div>
                          <label for="color">Select your theme color: </label>
                          <input type="color" name="color" value="<?= $value->color; ?>"><br>
                          <label for="color">Select your text color:</label>
                          <input type="color" name="text_color" value="<?= $value->text_color; ?>">
                          <br>

                          <button type="submit" class="btn btn-primary">Save Community</button>

                        </form>




                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                      </div>
                    </div>
                  </div>
                </div>
                </div>

                <?php endforeach; ?>
                <?php else: ?>

                <div class="col-md-4">


                  <div class="team-player">
                    <div class="card custom-card card-body justify-content-center">

                      <p class="text-center">No Created Community Yet</p>
                    </div>
                  </div>
                </div>
                <?php endif; ?>

              </div>


            </div>
            <div class="tab-pane" id="schedule-1">
              <div class="row">
                <?php if(!empty($community_list_manager)): ?>
                <?php foreach ($community_list_manager as $key => $value): ?>
                <div class="col-md-4">
                  <div class="team-player">

                    <div class="card h-100 custom-card ">

                      <h4 class="card-title p-3 my-0" style="background-color: <?= $value->color; ?>">

                        <a data-toggle="modal" data-target="#edit1<?= $key ?>"><i class="fa fa-cog pl-3"
                            style="float:left;"></i></a>
                        <a href="community-join/<?= $value->id;  ?>" style="color: <?= $value->text_color; ?>">
                          <p class="text-center justify-content-center m-0 p-0"><?= character_limiter($value->title, 18); ?> </p>
                        </a>
                      </h4>
                      <div class="view overlay">
                        <img class="card-img-top rounded-0" src="public/admin/uploads/community/<?= $value->name ?>"
                          alt="Card image cap">
                        <a href="#!">
                          <div class="mask rgba-white-slight"></div>
                        </a>
                      </div>
                      <div class="card-body">
                        <p class="card-description"><?= character_limiter($value->content, 80) ?>
                        </p>
                      </div>
                      <div class="card-footer justify-content-center">
                        <div class="togglebutton">

                          <div style="float-right">
                            <p class="text">Created By: <b><?= $value->nickname ?></b></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="modal fade" id="edit1<?= $key ?>" tabindex="-1" role="dialog"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Update Community </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <form class="contact-form" action="update_community" method="post" accept-charset="utf-8"
                          enctype="multipart/form-data">

                          <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Title"
                              value="<?= $value->title ?>">
                          </div>
                          <input type="hidden" name="com_photo_id" value="<?= $value->com_photo_id; ?>">
                          <input type="hidden" name="id" value="<?= $value->id; ?>">

                          <div class="form-group">
                            <textarea name="content" class="form-control" cols="30" rows="10"
                              placeholder="Content"><?= $value->content ?></textarea>
                          </div>

                          <div class="togglebutton">
                            <label>
                              <input type="checkbox" name="community_type"
                                <?= ($value->community_type	 == '1' ? 'checked': null)?>>
                              <span class="toggle"></span>
                              Private Community
                            </label>
                          </div>
                          <label for="color">Select your theme color: </label>
                          <input type="color" name="color" value="<?= $value->color; ?>"><br>
                          <label for="color">Select your text color:</label>
                          <input type="color" name="text_color" value="<?= $value->text_color; ?>">
                          <br>

                          <button type="submit" class="btn btn-primary">Save Community</button>

                        </form>





                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                      </div>
                    </div>
                  </div>
                </div>

                <?php endforeach; ?>
                <?php else: ?>

                <div class="col-md-4">


                  <div class="team-player">
                    <div class="card custom-card card-body justify-content-center">

                      <p class="text-center">No Created Community Yet</p>
                    </div>
                  </div>
                </div>
                <?php endif; ?>

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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Community</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
        </button>
      </div>
      <div class="modal-body">

        <form class="contact-form" action="<?= base_url(); ?>/user_save_community" method="post" accept-charset="utf-8"
          enctype="multipart/form-data">

          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Title">
          </div>

          <div class="form-group">
            <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Content"></textarea>
          </div>
          <label for="">Community Photo</label>
          <input type="file" name="file" class="text-center center-block file-upload form-control"
            accept=".png, .jpg, .jpeg">
          <br>
          <div class="togglebutton">
            <label>
              <input type="checkbox" name="community_type" <?= ($user_settings['user_mode'] == '1' ? 'checked': null)?>>
              <span class="toggle"></span>
              Private Community
            </label>
          </div>

          <label for="color">Select your theme color:</label>
          <input type="color" name="color" value="#FFFFFF">
          <label for="color">Select your text color:</label>
          <input type="color" name="text_color" value="#555555">

          <div class="form-group row">
            <div class="col-lg-6">
              <label>Upvote Name</label>
              <input type="text" name="upvote" class="form-control">
            </div>

            <div class="col-lg-6">
              <label>Devote Name</label>
              <input type="text" name="devote" class="form-control">
            </div>

          </div>

          <button type="submit" class="btn btn-primary">Save Community</button>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--  End Modal -->



</div>
<script>
  $('document').ready(function () {
    $("#btnSubmit").attr("disabled", true);

  });
</script>