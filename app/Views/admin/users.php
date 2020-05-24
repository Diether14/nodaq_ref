<style>
  .community_photo:hover {
    opacity: 0.9;
    cursor: pointer;
  }
</style>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Users List</h1>
  <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Users </h6>
    </div>
    <div class="card-body">
      <?php if (session('success')) : ?>
      <div class="card bg-info text-white shadow">
        <div class="card-body">
          <?= session('success') ?>

        </div>
      </div>
      <br>
      <?php endif; ?>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nickname</th>
              <th>email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Nickname</th>
              <th>email</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($users as $key => $value): ?>
            <tr>
              <td><?= $value['nickname']; ?></td>
              <td><?= $value['email']; ?></td>
              <td>
                <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="modal"
                  data-target="#view<?= $key ?>">
                  <i class="fas fa-eye"></i></a>

                <a href="#" class="btn btn-success btn-circle btn-sm" data-toggle="modal"
                  data-target="#edit<?= $key ?>">
                  <i class="fas fa-recycle"></i></a>
              </td>
            </tr>

            <div class="modal fade" id="view<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body text-center">

                    <?php if(!empty($profile_photo[$key]['name'])): ?>

                    <img src="public/user/uploads/profiles/<?= $profile_photo[$key]['name'] ?>" alt="Circle Image"
                      class="img-raised rounded-circle img-fluid img-thumbnail" alt="avatar">

                    <?php else: ?>
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                      class="img-raised rounded-circle img-fluid img-thumbnail" alt="avatar" width="304" height="236">

                    <?php endif; ?>

                    <h4 class="header"><?= $value['nickname']; ?></h4>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <form action="<?= base_url(); ?>/update_admin_user" method="post" >
                  <h4 class="header">Edit User Type</h4>

                    <div class="input-group">
                      <div class="input-group-prepend">

                      </div>
                      <select name="user_type" class="form-control" id="exampleFormControlSelect1">
                        <option value="0">Select User Type</option>
                        <!-- <option>Community</option> -->
                        <option value="1">Manager</option>
                        <option value="2">Assistant Manager</option>
                                              </select>
                      <input type="hidden" name="user_id" value="<?= $value['id']; ?>">
                    </div>
                    <button class="btn btn-primary mt-3" type="submit"> Save Changes</button>

                  </div>
                 
                  </form>


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