<style>
  .community_photo:hover {
    opacity: 0.9;
    cursor: pointer;
  }
</style>
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $community['title']; ?></h1>
  <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><?= $community['title']; ?></h6>
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
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>Nickname</th>
              <th>Email</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            <tr>
            <?php foreach ($users as $key => $value):?>
              <td><?= $value->nickname ?></td>
              <td><?= $value->email ?></td>
              <td><?= $value->updated_at ?></td>
              <td>
              <a href="<?= base_url(); ?>/add_assistant_manager/<?= $users->id; ?>/<?= $community_id; ?>" class="btn btn-primary btn-circle btn-sm">
                  <i class="fas fa-user"></i>
              </a>
              <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="modal"
                  data-target="#view<?= $key?>">
                  <i class="fas fa-eye"></i>
              </a>
              <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal"
                  data-target="#ban">
                  <i class="fas fa-ban"></i>
              </a>
              </td>
            </tr>

            <div class="modal fade" id="ban<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ban User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <form class="contact-form" action="<?= base_url(); ?>/community_ban_user" method="post">

                      <h4>Nickname: <b><?= $users['nickname'] ?></b></h4>

                      <input type="hidden" name="user_id" value="<?= $users['id'] ?>">
                      <input type="hidden" name="community_id" value="<?= $community['id'] ?>">
                      <div class="form-group">
                        <textarea name="reason" class="form-control" cols="30" rows="10"
                          placeholder="Content"></textarea>
                      </div>

                      
                     
                      <button type="submit" class="btn btn-danger">Ban User</button>

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