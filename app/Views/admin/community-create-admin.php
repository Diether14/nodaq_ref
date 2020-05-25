<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Admin Users</h1>
  <div class="row">

    <div class="col-lg-12">

      <!-- Basic Card Example -->
      <div class="card shadow mb-4">

        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Create Admin</h6>
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

          <form class="user" action="<?= base_url(); ?>/community-create-admin" method="post">

            <div class="form-group row">
              <div class="col-lg-6">
               <div class="form-">
                    <p for="nickname" class="mb-0">Nickname</p>
 
                  <input type="text" name="nickname" class="form-control" placeholder="Enter Nickname" value="">

              </div>
              </div>
              <div class="col-lg-6">

              <div class="form-group">
                    <p for="user_type" class="mb-0">User Type</p>
 
                  <select name="user_type" class="form-control" id="exampleFormControlSelect1">
                    <option>Select User Type</option>
                    <!-- <option>Community</option> -->
                    <option value="1">Manager</option>
                    <option value="2">Assistant Manager</option>
                  </select>

                </div>

              </div>
            </div>


                    <div class="form-group">
                    <p for="email" class="mb-0">Email</p>
 
              <input type="email" name="email" class="form-control" placeholder="Enter Email" value="">
          
            </div>
            <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0 mt-2">
                    <div class="form-group">
                    <p for="birthdate" class="mb-0">Birthdate</p>
                    <input type="date" name="birthdate" class="form-control" id="birthdate">
                   </div>

                    </div>
                    <div class="col-sm-6">

                      <div class="form-group">
                       <p for="gender" class="mb-0 mt-2">Gender</p>
                        <select name="gender" class="form-control" id="exampleFormControlSelect1">
                          <option>Select Gender</option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        </select>
           
                      </div>


                    </div>
                  </div>

            <div class="form-group row mt-3">
              <div class="col-sm-6 mb-3 mb-sm-0">
              <div class="form-group">
                    <p for="password" class="mb-0">Password</p>
 
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                </div>

              </div>
              <div class="col-sm-6">
              <div class="form-group">
                    <p for="birthdate" class="mb-0">Confirm Password</p>
 
                  <input type="password" class="form-control" name="password_confirm" id="password_confirm" value=""
                    placeholder="Repeat Password">
                </div>


              </div>
            </div>
            <?php if(isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary btn-wd btn-s">Add User</button>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>