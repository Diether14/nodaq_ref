<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Community List</h1>
  <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Community List </h6>
    </div>
    <div class="card-body">
    <?php if (session('msg')) : ?>
        <div class="card bg-info text-white shadow">
                    <div class="card-body">
                    <?= session('msg') ?>
            
                    </div>
                  </div>
                  <br>
    <?php endif; ?>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Title</th>
              <th>Content</th>
              <th>Community Type</th>
              <th>Image</th>

              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Title</th>
              <th>Content</th>
              <th>Community Type</th>
              <th>Image</th>

              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($community_list as $key => $value): ?>
            <tr>
              <td><?= $value->title; ?></td>
              <td><?= $value->content; ?></td>
              <td>
                <?php if ($value->community_type == '1') {
                            echo 'Private Community';
                        }else{
                            echo 'Public Community';
                        } ?>

              </td>
              <td><img src="public/admin/uploads/community/<?= $value->name; ?>" alt="" height="120" width="120"></td>
              <td class="d-flex">
                <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="modal"
                  data-target="#view<?= $key ?>">
                  <i class="fas fa-eye"></i>
                </a>
                <span class="pl-1"></span>
                <a href="#" class="btn btn-secondary btn-circle btn-sm"  data-toggle="modal"
                  data-target="#edit<?= $key ?>">
                  <i class="fas fa-recycle"></i>
                </a>
                <span class="pl-1"></span>
                <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal"
                  data-target="#delete<?= $key ?>">
                  <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>

            <div class="modal fade" id="view<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Community</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <div class="">
                      <div class="text-center">
                        <h4><?= $value->title ?></h4>
                      </div>

                      <div class="text-center">

                        <img src="public/admin/uploads/community/<?= $value->name; ?>" width="255" height="255" alt=""
                          class="p-2">
                        <p><?= $value->content ?></p>
                      </div>
                      <div class="text-center">
                        <h6>
                          <?php if ($value->community_type == '1') {
                            echo 'Private Community';
                        }else{
                            echo 'Public Community';
                        } ?>

                        </h6>
                      </div>
                    </div>





                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                  </div>
                </div>
              </div>
            </div>



            <div class="modal fade" id="edit<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Update Community</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">

                  <form class="contact-form" action="update_community"  method="post" accept-charset="utf-8" enctype="multipart/form-data">

                  <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Title" value="<?= $value->title ?>">
                  </div>
                  <div class="form-group">
                    <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Content"><?= $value->content ?></textarea>
                  </div>
                  <div class="form-group">
                    <input type="file" name="file" value="<?= $value->name ?>" class="text-center center-block file-upload" accept=".png, .jpg, .jpeg">
                  </div>
                  <div class="togglebutton">
                        <label>
                          <input type="checkbox" name="community_type" <?= ($value->community_type	 == '1' ? 'checked': null)?>>
                          <span class="toggle"></span>
                          Private Community
                        </label>
                      </div>
 
                  <button type="submit" class="btn btn-primary">Save Community</button>

                  </form>   





                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" id="delete<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Delete Community</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">

                  <p>Are you sure?</p>

                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="delete_community/<?= $value->id; ?>"><button class="btn btn-danger" type="button">Delete</button></a>
                  </div>
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
<!-- /.container-fluid -->

</div>