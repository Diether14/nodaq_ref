<!-- style="background-image: url('public/user/assets/img/bg7.jpg'); background-size: cover; background-position: top center;" -->

<body class="login-page sidebar-collapse">
  <div class="container">


    <div class="page-header">
      <!-- Nested Row within Card Body -->
      <div class="container ">
        <div class="row">
          <div class="col-lg-6 col-md-6 ml-auto mr-auto">
            <div class="card card-login">
              <div class="p-4">
                <div class="text-center">
                  <div class="h3  mb-2">Register</div>
                </div>
                <form class="user" action="/weendi/register" method="post">

                  <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">

                      <div class="input-group">
                        <div class="input-group-prepend">
                          <!-- <span class="input-group-text">
                      <i class="material-icons">person</i>
                    </span>-->
                        </div>
                        <input type="text" name="nickname" class="form-control" placeholder="Nickname..."
                          value="<?= set_value('nickname'); ?>">
                      </div>

                    </div>
                    <!-- <div class="col-sm-6">

                  <div class="input-group">
                  
                  <select class="form-control" id="exampleFormControlSelect1" style="height: calc(2.3rem ) !important;">
                    <option>Select User Type</option>
                    <option>Community</option>
                    <option>Manager</option>
                    <option>Assistant Manager</option>
                  </select>
   
                </div>
              
              </div> -->
                  </div>

                  <!-- <div class="input-group">
                  <div class="input-group-prepend"> -->
                  <!-- <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span> -->
                  <!-- </div>
                  <input type="text" name="nickname" class="form-control" placeholder="Nickname..." value="<?= set_value('nickname'); ?>">
                </div> -->
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <!-- <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span> -->
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="Email..."
                      value="<?= set_value('email'); ?>">
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <!-- <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span> -->
                        </div>
                        <input type="password" class="form-control  form-control-user" name="password" id="password"
                          placeholder="Password">
                      </div>

                    </div>
                    <div class="col-sm-6">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <!-- <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span> -->
                        </div>
                        <input type="password" class="form-control  form-control-user" name="password_confirm"
                          id="password_confirm" value="" placeholder="Repeat Password">
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
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-link btn-wd btn-s">Register</button>
                  </div>

                  <!-- <hr> -->
                  <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
              <i class="fab fa-google fa-fw"></i> Register with Google
            </a>
            <a href="index.html" class="btn btn-facebook btn-user btn-block">
              <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
            </a> -->
                </form>
                <hr style="margin-top: 0px; width: 90%">
                <div class="text-center">
                  <a class="small" href="#">Forgot Password?</a><br>
                  <a class="small" href="/weendi">Already have an account? Login!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>