<style>
  .community_photo:hover {
    opacity: 0.9;
    cursor: pointer;
  }
</style>
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
              <th>Reported By</th>
              <th>Title</th>
              <th>Report Content</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Reported By</th>
              <th>Title</th>
              <th>Report Content</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($reports_list as $key => $value): ?>
            <tr>
              <td><?= $value->nickname; ?></td>
              <td><?= $value->title; ?></td>
              <td><?= $value->report_content; ?></td>
              <td>
              <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="modal"
                  data-target="#view<?= $key ?>">
                  <i class="fas fa-eye"></i>
              </td>
            </tr>

            <div class="modal fade" id="view<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Report</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <div class="">

                      <div class="card-title text-center">
                        <div class="pt-3">
                          <div class="">
                            <h4><?= $value->title ?> </h4><h6 class="small">Reported By: <?= $value->nickname ?></h6>
                            
                          </div>
                        </div>

                      </div>



                      <div class="card card-body text-center">
                        
                        <p class="card-description"><?= $value->report_content ?>
                        </p>
                        <button class="btn btn-primary">View Post</button>
                      </div>
                    
                    </div>
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