<style>
  .community_photo:hover {
    opacity: 0.9;
    cursor: pointer;
  }
</style>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Community</h1>
  <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Post List</h6>
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
              <th>Description</th>
              <th>Posted By</th>
              <th>Upvotes</th>
              <th>Devotes</th>
              <th>Status</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
          <tr>
              <th>Title</th>
              <th>Description</th>
              <th>Posted By</th>
              <th>Upvotes</th>
              <th>Devotes</th>
              <th>Status</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
          <?php foreach ($post_list as $key => $value): ?>
            <tr>
            
              <td><?= $value->title ?></td>
              <td><?= $value->description ?></td>
              <td><?= $value->nickname ?></td>
              <td>123</td>
              <td>123</td>
              <td>Banned</td>
              <td><?= $value->updated_at ?></td>
              <td>
              <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="modal"
                  data-target="#view<?= $key?>">
                  <i class="fas fa-eye"></i>
              </a>
       
      
              <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal"
                  data-target="#ban<?= $key ?>">
                  <i class="fas fa-ban"></i>
              </a>
              </td>
            
            </tr>

            <div class="modal fade" id="ban<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ban Post</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <form class="contact-form" action="<?= base_url(); ?>/community_ban_post" method="post">

                   
                    
                  <input type="hidden" name="post_id" value="<?= $value->id ?>">
                      <input type="hidden" name="community_id" value="<?= $value->community_id ?>">
                      <div class="form-group">
                        <textarea name="reason" class="form-control" cols="30" rows="10"
                          placeholder="Reason"></textarea>
                      </div>

                      
                     
                      <button type="submit" class="btn btn-danger">Delete Post</button>

                    </form>
                    
                  </div>


                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

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