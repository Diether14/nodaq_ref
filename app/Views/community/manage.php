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
  
  .rounded-circle:hover {
    opacity: 0.9;
    cursor: pointer;
}

.img-cover:hover {
    opacity: 0.9;
    cursor: pointer;
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
  <div class="community-feed">

    <div class="page-header header-filter m-auto img-cover" data-toggle="modal" data-target="#cover"
      style="background-image: url('<?= base_url(); ?>/public/admin/uploads/community/<?= $community_list[0]->name; ?>')">
    </div>

    <div class="">
      <nav class="container " aria-label="breadcrumb">
        <ol class="breadcrumb m-0 ">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Communities</a></li>
          <li class="breadcrumb-item active" aria-current="page">Test Community</li>
        </ol>
      </nav>

      <div class="container d-flex  p-0 community-join_inner">

        <div class="col-lg-12 bg-gray p-0">
          <div class="community-section">


            <?php if (session('msg')) : ?>
            <div class="alert alert-info">
              <div class="container">
                <div class="alert-icon">
                  <i class="material-icons">info_outline</i>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true"><i class="material-icons">clear</i></span>
                </button>
                <b>Info alert:</b>
                <?= session('msg') ?>
              </div>
            </div>
            <br>
            <?php endif; ?>
           
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


    <!-- Classic Modal -->
    <div class="modal fade" id="cover" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Cover Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <img src="" class="avatar img-circle img-thumbnail">
                    <h6>Upload a different photo...</h6>
                    <form action="<?php echo base_url('/update_community_cover');?>"  method="post"
                        accept-charset="utf-8" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $community_list[0]->com_photo_id; ?>" name="com_photo_id" >
                        <input type="file" name="file" class="text-center center-block file-upload"
                            accept=".png, .jpg, .jpeg">
                        <div class="form-group"><br>
                            <hr>
                            <button type="submit" id="send_form" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
                </hr><br>
            </div>

        </div>
    </div>
</div>
<!--  End Modal -->
