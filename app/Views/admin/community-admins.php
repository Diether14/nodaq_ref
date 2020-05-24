<style>
  .community_photo:hover {
    opacity: 0.9;
    cursor: pointer;
  }
</style>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Admin Users</h1>
  <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    <div class="d-flex">
      <h6 class="font-weight-bold text-primary pr-3">Admin list</h6>
      </div>
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
              <th>Nickname</th>
              <th>Email</th>
              <th>User Type</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>Nickname</th>
              <th>Email</th>
              <th>User Type</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
        <?php foreach ($community_admins as $key => $value): ?>
            <tr>
              <td><?= $value['nickname'] ?></td>
              <td><?= $value['email'] ?></td>
              <?php if($value['user_type'] == '3'): ?>
                <td>Admin</td>
              <?php elseif($value['user_type'] == '1'): ?>
                <td>Manager</td>              
              <?php elseif($value['user_type'] == '2'): ?>
                <td>Assistant Manager</td>
              <?php endif; ?>
              <td><?= $value['updated_at'] ?></td>
              <td>
              <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="modal"
                  data-target="#view">
                  <i class="fas fa-eye"></i>
              </a>
              
              </td>
            </tr>
        <?php endforeach; ?>
            

          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>