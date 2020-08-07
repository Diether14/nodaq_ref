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

<div class="main">
    <div id="users" class="container card">
        <div class="section p-0">

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-pills-icons flex-column p-3" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link " href="<?= base_url() ?>/manage-community/<?= $community_id ?>">
                                    <i class="material-icons">dashboard</i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="<?= base_url() ?>/manage-community/category/<?= $community_id ?>">
                                    <i class="material-icons">category</i>
                                    Category
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link"
                                    href="<?= base_url(); ?>/manage-community/users/<?= $community_id ?>">
                                    <i class="material-icons">people</i>
                                    Community Users
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link"
                                    href="<?= base_url(); ?>/manage-community/reported-posts/<?= $community_id ?>">
                                    <i class="material-icons">report</i>
                                    Reported Posts
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link active"
                                    href="<?= base_url(); ?>/manage-community/community-settings/<?= $community_id ?>">
                                    <i class="material-icons">settings</i>
                                    Settings
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9 card-body">
                        <div class="tab-content">

                            <div class="tab-pane active" id="settings">
                                <?php if(session('msg')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session('msg') ?>
                                </div>
                                <?php endif; ?>
                                <!-- Users in community -->

                                <h3>Community Settings</h3>
                                <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_ac">Add Assistant Manager</button> -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form ">
                                            <form class="contact-form"
                                                action="<?= base_url(); ?>/manager/save-community" method="post"
                                                accept-charset="utf-8" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <input type="text" name="title" class="form-control h3"
                                                        placeholder="Title" value="<?= $community[0]->title ?>">
                                                </div>
                                                <input type="hidden" name="com_photo_id"
                                                    value="<?= $community[0]->com_photo_id; ?>">
                                                <input type="hidden" name="id" value="<?= $community[0]->id; ?>">

                                                <div class="form-group">
                                                    <textarea name="content" class="form-control" cols="5" rows="2"
                                                        placeholder="Description"><?= $community[0]->content ?></textarea>
                                                </div>

                                                <div class="togglebutton">
                                                    <label>
                                                        <input type="checkbox" name="community_type"
                                                            <?= ($community[0]->community_type	 == '1' ? 'checked': null)?>>
                                                        <span class="toggle"></span>
                                                        Private Community
                                                    </label>
                                                </div>
                                                <label for="color">Select your theme color:</label>
                                                <input type="color" name="color" value="<?= $community[0]->color; ?>"
                                                    class="myField"><br>
                                                <label for="color">Select your text color:</label>
                                                <input type="color" name="text_color"
                                                    value="<?= $community[0]->text_color; ?>">
                                                <hr>
                                                <div class="form-group">
                                                    <h6>Edit Community Cover Photo</h6>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#edit_cover<?= $key ?>">
                                                        <img src="<?= base_url(); ?>/public/admin/uploads/community/<?= $community[0]->name ?>"
                                                            alt="" width="50%" height="50%">
                                                    </a>
                                                    <input type="file" name="file"
                                                        class="text-center center-block file-upload form-control"
                                                        accept=".png, .jpg, .jpeg">
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h6>Set up upvote and devote</h6>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Upvote Name</label><br>
                                                        <input name="upvote_name"
                                                            value=" <?= $community[0]->upvote_name ?>" type="text"
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label>Devote Name</label><br>
                                                        <input name="devote_name"
                                                            value="<?= $community[0]->devote_name ?> " type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                                <hr>
                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                    Community</button>
                                                <button type="button" class="btn btn-info btn-sm">Preview
                                                    Community</button>

                                            </form>
                                        </div>

                                    </div>

                                </div>
                                <div class="card card-body mt-0">
                                    <h6>Community Join in Question</h6>

                                    <div class="form-group">
                                        <form action="<?= base_url(); ?>/community_questions" method="post">
                                            <label>Question</label>
                                            <input type="text" name="questions" class="form-control"
                                                value="<?= $community[0]->questions ?>">
                                            <input type="hidden" name="community_id" class="form-control"
                                                value="<?= $community[0]->id ?>">
                                            <button type="submit" class="btn btn-primary btn-sm"> Save</button>
                                        </form>
                                    </div>
                                </div>


                                <div class="card card-body mt-0">
                                    <h6>Settings</h6>

                                    <div class="form-group">
                                        <label>Remove Community</label><br>

                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#remove-community">Remove</button>

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
<div class="modal fade" id="remove-community" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Community</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <div class="modal-body">
                        <h6>Are you sure do you want to delete this community?</h6>

                        <form action="<?= base_url() ?>/remove_community" method="POST">
                            <input type="hidden" name="id" value="<?= $community[0]->id ?>">
                            <button type="submit" class="btn btn-danger btn-sm"> Remove</button>
                        </form>
                    </div>

                </div>
                </hr><br>
            </div>

        </div>
    </div>
</div>
<!--  End Modal -->

<!-- Classic Modal -->
<div class="modal fade" id="edit_cover" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary py-3 text-white align-items-center">
                <h5 class="modal-title m-0">Update Cover Photo</h5>
                <button type="button" class="close bg-danger text-white btn-link p-2 rounded-circle"
                    data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="" class="avatar img-circle img-thumbnail">
                            <h6>Upload a different photo...</h6>
                            <form action="<?php echo base_url('/update_community_cover');?>" name="ajax_form"
                                id="ajax_form" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                                <input type="file" name="file" class="text-center center-block file-upload"
                                    accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="com_photo_id" value="<?= $community[0]->com_photo_id ?>">
                                <input type="hidden" name="community_id" value="<?= $community[0]->id ?>">
                                <div class="form-group"><br>
                                    <hr>
                                    <button type="submit" id="send_form" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                        </hr><br>
                    </div>

                </div>
                </hr><br>
            </div>

        </div>
    </div>
</div>
<!--  End Modal -->



<script>
$(document).ready(function() {


    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(".file-upload").on('change', function() {
        readURL(this);
    });

});


// function readURL(input, id) {
//     id = id || '#blah';
//     if (input.files &amp;&amp; input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function (e) {
//             $(id)
//                     .attr('src', e.target.result)
//                     .width(200)
//                     .height(150);
//         };

//         reader.readAsDataURL(input.files[0]);
//     }
//  }
</script>