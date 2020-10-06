
<div class="main">
  <div class="container ">
    <div class="section">
    <div class="col-sm-12">
            <nav class="mt-3  bg-white" aria-label="breadcrumb">
        <ol class="breadcrumb m-0  bg-white">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Settings</a></li>
            <li class="breadcrumb-item active" aria-current="page">Personal Settings</li>
        </ol>
    </nav>
            </div>
      <div class="col-lg-12 col-md-12">
        <div class="row">
          <div class="col-md-3">
            <ul class="nav nav-pills nav-pills-icons flex-column" role="tablist">

              <li class="nav-item">
                <a class="nav-link active" href="#personal" role="tab" data-toggle="tab">
                  <i class="material-icons">person</i>
                  Personal Settings
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#profile" role="tab" data-toggle="tab">
                  <i class="material-icons">info</i>
                  Profile Settings
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#password" role="tab" data-toggle="tab">
                  <i class="material-icons">more_vert</i>
                  Password Settings
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-8">
            <div class="tab-content">
              <div class="tab-pane active" id="personal">
                <div class="card p-3">
                  <div class="card-title">
                    <h4>Nickname Settings</h4>
                  </div>
                  <?php if(session()->get('success_nickname')): ?>
                  <div class="alert alert-success" role="alert">
                    <?= session()->get('success_nickname') ?>
                  </div>
                  <?php endif; ?>

                  <form class="contact-form" action="<?= base_url() ?>/update_mode" method="post">

                    <div class="togglebutton">
                      <label>

                        <input type="checkbox" name="mode" <?= ($user_settings['user_mode'] == '1' ? 'checked': null)?>>

                        <span class="toggle"></span>
                        Anonymous mode
                      </label>
                    </div>

                    <div class="togglebutton">
                      <label>

                        <input type="checkbox" name="nickname"
                          <?= ($user_settings['user_nickname'] == '1' ? 'checked': null)?>>

                        <span class="toggle"></span>
                        Show Nickname
                      </label>
                    </div>
<hr class="m-3">
<div class="card-title">
                    <h4>Display</h4>
                  </div>
                  <div class="togglebutton">
                      <label>

                        <input type="checkbox" name="nickname"
                          <?= ($user_settings['user_nickname'] == '1' ? 'checked': null)?>>

                        <span class="toggle"></span>
                        Dark Mode
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-raised mt-3" id="btnSubmit">
                      Save
                    </button>

                  </form>
                </div>
              </div>


              <div class="tab-pane" id="profile">

                <h2 class="text-center title">Update Profile Information</h2>
                <?php if(session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session()->get('success') ?>
                </div>
                <?php endif; ?>
                <form class="contact-form" action="<?php base_url(); ?>/update_profile_info" method="post">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Nickname</label>
                        <input type="text" name="nickname" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Email</label>
                        <input type="email" name="email" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Birthdate</label>
                        <input type="date" name="birthdate" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Gender</label>
                        <select name="gender" class="form-control" id="exampleFormControlSelect1">
                          <option>Select Gender</option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        </select>
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
                  <div class="row">
                    <div class="col-md-4 ml-auto mr-auto text-center">
                      <button type="submit" class="btn btn-primary btn-raised">
                        Update
                      </button>
                    </div>
                  </div>
                </form>
              </div>


              <div class="tab-pane" id="password">

                <h2 class="text-center title">Update Password</h2>
                <?php if(session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session()->get('success') ?>
                </div>
                <?php endif; ?>
                <form class="contact-form" action="<?= base_url() ?>/settings" method="post">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Nickname</label>
                        <input type="text" name="nickname" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Email</label>
                        <input type="email" name="email" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Password</label>
                        <input type="password" name="password" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Confirm Password</label>
                        <input type="password" name="password_confirm" class="form-control">
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
                  <div class="row">
                    <div class="col-md-4 ml-auto mr-auto text-center">
                      <button type="submit" class="btn btn-primary btn-raised">
                        Update
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- <div class="row">
        <div class="col-md-6">
          <h2 class="text-center title">Update Profile</h2>
          <?php if(session()->get('success')): ?>
          <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
          </div>
          <?php endif; ?>
          <form class="contact-form" action="/weendi/settings" method="post">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Nickname</label>
                  <input type="text" name="nickname" class="form-control">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label class="bmd-label-floating">Email</label>
                  <input type="email" name="email" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Password</label>
                  <input type="password" name="password" class="form-control">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Confirm Password</label>
                  <input type="password" name="password_confirm" class="form-control">
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
            <div class="row">
              <div class="col-md-4 ml-auto mr-auto text-center">
                <button type="submit" class="btn btn-primary btn-raised">
                  Update
                </button>
              </div>
            </div>
          </form>
        </div>
      </div> -->
    </div>
  </div>
</div>
</div>
<script>
  $('document').ready(function () {
    $("#btnSubmit").attr("disabled", true);

  });
</script>