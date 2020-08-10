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
    <div id="users" class=" container card">
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
                                <a class="nav-link active"
                                    href="<?= base_url(); ?>/manage-community/reported-posts/<?= $community_id ?>">
                                    <i class="material-icons">report</i>
                                    Reported Posts
                                </a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link"
                                    href="<?= base_url(); ?>/manage-community/community-settings/<?= $community_id ?>">
                                    <i class="material-icons">settings</i>
                                    Settings
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9 card-body">
                        <div class="tab-content">

                            <div class="tab-pane active" id="reported_posts">
                                <?php if(session('msg')): ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session('msg') ?>
                                </div>
                                <?php endif; ?>
                                <!-- Users in community -->

                                <h2>Reported Posts</h2>
                                <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_ac">Add Assistant Manager</button> -->
                                <div class="row">


                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Reported By</th>
                                                    <th>Post Title</th>
                                                    <th>Reported Details</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($reported_posts as $key => $value): ?>
                                                <tr>
                                                    <td><?= $value->nickname ?></td>
                                                    <td><?= $value->title ?></td>
                                                    <td><?= $value->report_content ?></td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm" data-toggle="modal"
                                                            data-target="#view<?= $key ?>"> View</button>
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#ban_user<?= $key ?>"> Ban User</button>

                                                    </td>

                                                </tr>

                                                <div class="modal fade" id="view<?= $key ?>" tabindex="-1"
                                                    role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div
                                                                class="modal-header bg-primary py-3 text-white align-items-center">
                                                                <h5 class="modal-title">Report info</h5>
                                                                <button type="button"
                                                                    class="close bg-danger text-white btn-link p-2 rounded-circle"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <i class="material-icons">clear</i>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <label>Post Title</label><br>
                                                                <h6><?= $value->title ?></h6><br>
                                                                <label>Report Content</label><br>
                                                                <h6><?= $value->report_content ?></h6><br>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="button"
                                                                    class="btn bg-danger text-white btn-link float-right"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  End Modal -->

                                                <!-- Classic Modal -->
                                                <div class="modal fade" id="ban_user<?= $key ?>" tabindex="-1"
                                                    role="dialog">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div
                                                                class="modal-header bg-primary py-3 align-items-center">
                                                                <h5
                                                                    class="create-post-title modal-title w-100 fw600 m-0 text-white">
                                                                    Reason</h5>
                                                                <button type="button"
                                                                    class="close bg-danger text-white btn-link p-2 rounded-circle"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <i class="material-icons">clear</i>
                                                                </button>
                                                            </div>
                                                            <form class="contact-form"
                                                                action="<?= base_url(); ?>/ban_user" method="post"
                                                                accept-charset="utf-8" enctype="multipart/form-data">
                                                                <div class="modal-body">
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-12">
                                                                            <div class="form-group row">
                                                                                <div class="col-lg-12">
                                                                                    <textarea name="ban_reason"
                                                                                        class="form-control" value=""
                                                                                        required rows="5" placeholder="Something else"></textarea>
                                                                                    <input type="hidden"
                                                                                        name="community_id"
                                                                                        value="<?= $value->community_id; ?>">
                                                                                    <input type="hidden" name="id"
                                                                                        value="<?= $value->id; ?>">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <button type="submit"
                                                                        class="btn bg-success text-white btn-link float-left">Save</button>
                                                                    <!-- 
                                                                    <button type="button"
                                                                        class="btn bg-danger text-white btn-link float-left"
                                                                        data-dismiss="modal">Close</button> -->
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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


</script>