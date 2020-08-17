<link rel="stylesheet" href="<?= base_url(); ?>/public/assets/simple-watch/css/simpleSwatchPicker.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="<?= base_url(); ?>/public/assets/simple-watch/js/jquery.simpleSwatchPicker.js"></script>

<style>
.modal {
    display: none;
    padding-top: 50px;
    overflow: auto;
    z-index: 9999;
}

.modal-backdrop {
    position: absolute !important;
}

.modal-backdrop.show {
    opacity: 0 !important;
}

.custom-card {
    min-height: 260px;
    max-height: 260px;
}

.card-img-top {
    max-height: 200px;
    min-height: 200px;
    border-radius: 0%;
    object-fit: cover;
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

<!-- <div class="page-header header-filter" data-parallax="true"
    style="background-image: url('public/user/assets/img/bg3.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <div class="brand text-center">
                    <h1>My Community</h1>
                    <h3 class="title text-center">Subtitle</h3>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="main bg-light ">
    <div class="container bg-white card">
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
                            <a class="nav-link active p-4" href="#dashboard-1" role="tab" data-toggle="tab">
                                My Community
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-4" href="#schedule-1" role="tab" data-toggle="tab">
                                Assistant Manager
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link p-4 bg-custom"  href="#schedule-1" data-toggle="modal" data-target="#myModal">
                                <h4 class="fa fa-plus text-primary fa-lg "></h4>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content tab-space">
                        <div class="tab-pane active" id="dashboard-1">
                            <div class="row">
                                <!-- <div class="col-md-4">
                                    <div class="team-player">
                                        <div class="card custom-card card-body justify-content-center">
                                            <a class="btn btn-link" data-toggle="modal" data-target="#myModal">
                                                <span style="font-size:50px; color:#9C27B0"
                                                    class="fa fa-plus"></span></a>
                                        </div>
                                    </div>
                                </div> -->
                                <?php if(!empty($community_list)): ?>
                                <?php foreach ($community_list as $key => $value): ?>
                                <!-- <a href="#" data-toggle="modal" data-target="#edit<?= $key ?>"> -->
                                <div class="col-md-4">
                                    <div class="team-player">
                                        <div class="card h-100 custom-card ">
                                            <div class="d-flex justify-content-center align-items-center"
                                                style="background-color: <?= $value->color; ?>">
                                                <!-- <div class="col-sm-1 p-0">
                                                <a href="#" data-toggle="modal" data-target="#edit<?= $key ?>"><i class="fa fa-cogs px-3" style="float:left;"></i></a>
                                                </div> -->
                                                <div class="col-sm-11 px-0">
                                                    <a href="community-join/<?= $value->id;  ?>">
                                                        <h4 class="card-title p-3 my-0">
                                                            <p class="text text-center justify-content-center m-0 p-0">
                                                                <?= character_limiter($value->title, 18) ?> </p>
                                                        </h4>
                                                    </a>
                                                </div>
                                                <div class="col-sm-1 p-0">
                                                    <a href="manage-community/<?= $value->id;  ?>" tabindex="0"
                                                        data-toggle="tooltip" title="Manage Community"><i
                                                            class="fa fa-cogs px-0" style="float:left;"></i></a>
                                                </div>
                                            </div>

                                            <div class="view overlay">
                                                <img class="card-img-top rounded-0"
                                                    src="public/admin/uploads/community/<?= $value->name ?>"
                                                    alt="Card image cap">
                                                <a href="#!">
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- </a> -->
                                <div class="modal fade" id="edit<?= $key ?>" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Community </h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <a href="community-join/<?= $value->id;  ?>"
                                                            style="color: <?= $value->text_color; ?>">
                                                            <div class="card">
                                                                <div class="card-body text-center">
                                                                    <span class="fa fa-globe" style="font-size: 40px">
                                                                    </span>
                                                                    <p>View as community</p>

                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>


                                                    <div class="col-lg-6">
                                                        <a href="manage-community/<?= $value->id;  ?>"
                                                            style="color: <?= $value->text_color; ?>">
                                                            <div class="card ">
                                                                <div class="card-body text-center">
                                                                    <span class="fa fa-cogs" style="font-size: 40px">
                                                                    </span>
                                                                    <p>Manage community</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="modal fade" id="edit<?= $key ?>" tabindex="-1" role="dialog"
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
                          <label for="color">Select your theme color:</label><br>
                          <input class="myField" type="hidden" name="color" value="<?= $value->color; ?>" >
                          <label for="color">Select your text color:</label><br>
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
                </div> -->


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

                                            <h4 class="card-title p-3 my-0"
                                                style="background-color: <?= $value->color; ?>">

                                                <a data-toggle="modal" data-target="#edit1<?= $key ?>"><i
                                                        class="fa fa-cog pl-3" style="float:left;"></i></a>
                                                <a href="community-join/<?= $value->id;  ?>"
                                                    style="color: <?= $value->text_color; ?>">
                                                    <p class="text-center justify-content-center m-0 p-0">
                                                        <?= character_limiter($value->title, 18); ?> </p>
                                                </a>
                                            </h4>
                                            <div class="view overlay">
                                                <img class="card-img-top rounded-0"
                                                    src="public/admin/uploads/community/<?= $value->name ?>"
                                                    alt="Card image cap">
                                                <a href="#!">
                                                    <div class="mask rgba-white-slight"></div>
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-description">
                                                    <?= character_limiter($value->content, 80) ?>
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
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Cancel</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="modal fade" id="edit1<?= $key ?>" tabindex="-1" role="dialog"
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
                          <label for="color">Select your theme color:</label><br>
                          <input type="hidden" name="color" value="<?= $value->color; ?>" class="myField">
                          <label for="color">Select your text color:</label><br>
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
                </div> -->

                                <?php endforeach; ?>
                                <?php else: ?>

                                    <div class="col-sm-12 justify-content-center align-items-center text-dark text-center">
                                    <h3 >Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic illum, velit perferendis sequi aut repellendus labore voluptatum minima at necessitatibus molestiae eos nulla rerum dicta, unde magnam. Sapiente, rem earum!</h3>
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
            <div class="modal-header bg-primary py-3 align-items-center">
                <h5 class="modal-title w-100 fw600 m-0 text-white">Create Community</h5>
                <button type="button" class="close bg-danger text-white btn-link p-2 rounded-circle"
                    data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">

                <form class="contact-form" action="<?= base_url(); ?>/user_save_community" method="post"
                    accept-charset="utf-8" enctype="multipart/form-data">

                    <div class="form-group col-sm-12">
                        <input type="text" name="title" class="form-control" placeholder="Title">
                    </div>
                    <div class="form-group col-sm-12">
                        <textarea name="content" class="form-control" cols="5" rows="1"
                            placeholder="Content"></textarea>
                    </div>
                    <div class="d-flex align-items-center">

                        <div class="col-sm-6">
                            <label for="">Community Photo</label>
                            <input type="file" name="file" class="text-center center-block file-upload form-control"
                                accept=".png, .jpg, .jpeg">
                        </div>
                        <div class="col-sm-6">
                            <div class="togglebutton d-flex align-items-center">
                                <label>
                                    <input type="checkbox" name="community_type"
                                        <?= ($user_settings['user_mode'] == '1' ? 'checked': null)?>>
                                    <span class="toggle"></span>
                                </label>
                                <h6> Private Community</h6>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <div class="col-sm-6 d-flex">
                          <div class="col-sm-8 pl-0">

                            <label for="color">Select your theme color:</label>
                          </div>
                          <div class="col-sm-4">
                            <input type="hidden" name="color" value="#FFFFFF" class="myField">
                        </div>
                                </div>
                                <div class="col-sm-6 d-flex">
                          <div class="col-sm-8 pl-0">

                          <label for="color">Select your text color:</label>
                          </div>
                          <div class="col-sm-4">
                          <input type="color" name="text_color" value="#555555">
                        </div>
                                </div>
                                </div>
                    <hr>
                    <div class="form-group row col-sm-12">
                        <div class="col-lg-6">
                            <label>Upvote Name</label>
                            <input type="text" name="upvote" class="form-control">
                        </div>

                        <div class="col-lg-6">
                            <label>Devote Name</label>
                            <input type="text" name="devote" class="form-control">
                        </div>

                    </div>
                    <div class="form-group row col-sm-12"> 
                        <div class="col-lg-12">
                            <label>Join In Question (set question when user join in)</label>
                            <input type="text" name="questions" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">CREATE</button>

                </form>

            </div>
        </div>
    </div>
</div>
<!--  End Modal -->



</div>
<script type="text/javascript">
$(".myField").simpleSwatchPicker();
// $("#myField1").simpleSwatchPicker();
// $("#myField2").simpleSwatchPicker();
</script>
<script>
$('document').ready(function() {
    $("#btnSubmit").attr("disabled", true);

});
</script>