<!-- style="background-image: url('../assets/img/bg7.jpg'); background-size: cover; background-position: top center;" -->
<!-- style="background-image: url('public/user/assets/img/bg7.jpg'); background-size: cover; background-position: top center;" -->

<style>
.primary {
    color: #6A4E9C;
}

.login-container {
    width: 100%;
    height: 100vh;
    padding: 35%;
}

.login-image {
    object-fit: cover;
    width: 100%;
    height: 100vh;
}
</style>

<body class="login-page sidebar-collapse">
    <div class="row">
        <div class="col-sm-12 col-md-6 m-0 p-0 image-container">
            <img class="login-image" src="<?= base_url()?>/public/images/login-wallpaper.jpg" alt="">
        </div>
        <div class="col-sm-12 col-md-6 m-0 p-0">
            <div class="bg-primary login-container px-5">
                <div class="card card-login rounded-0 m-0">
                    <form class="user" action="<?= base_url(); ?>/login" method="post">
                        <div class="text-center my-3 site-title">
                            <img src="<?= base_url(); ?>/public/images/nodaq.png" alt="" width="300"> </a>
                        </div>
                        <!-- <p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                        <div class="card-body my-5">
                            <?php if(session()->get('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->get('success') ?>
                            </div>
                            <?php endif; ?>
                            <ul class="nav nav-pills nav-fill">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#loginWithEmail" data-toggle="tab" role="tab" >Login with Email</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#loginWithID" data-toggle="tab" role="tab">Login with ID</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="loginChoiceTabs">
                                <div class="tab-pane fade show active" id="loginWithEmail" role="tabpanel">
                                    <div class="input-group m-2 d-block">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text px-0">
                                                Email
                                            </span>
                                        </div>
                                        <input type="email" name="email" class="form-control w-100"
                                            placeholder="Email...">
                                    </div>
                                    <div class="input-group m-2 d-block">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text px-0">
                                                Password
                                            </span>
                                        </div>
                                        <input type="password" name="password" class="form-control w-100"
                                            placeholder="Password...">
                                    </div>
                                    <?php if(isset($validation)): ?>
                                    <div class="col-12">
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->listErrors() ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="loginWithID" role="tabpanel">
                                    <div class="input-group m-2 d-block">
                                        <div class="input-group-prepend ">
                                            <span class="input-group-text px-0">
                                                ID
                                            </span>
                                        </div>
                                        <input type="email" name="email" class="form-control w-100"
                                            placeholder="Email...">
                                    </div>
                                    <div class="input-group m-2 d-block">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text px-0">
                                                Password
                                            </span>
                                        </div>
                                        <input type="password" name="password" class="form-control w-100"
                                            placeholder="Password...">
                                    </div>
                                    <?php if(isset($validation)): ?>
                                    <div class="col-12">
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->listErrors() ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-wd btn-s">Sign In</button>
                        </div>
                        <hr style="width:80%; margin-top:0;">
                        <div class="text-center mb-4 d-flex row px-5">
                            <div class="col-sm-12 ">

                                <a class="" href="#">Forgot your Password?</a>
                            </div>
                            <div class="col-sm-12  d-block">

                                <p>Don't have an account? <a class="" href="/register"
                                        class="btn btn-primary btn-link btn-wd btn-lg h3">Register here</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="page-header " > -->
    <!-- <div class="container"> -->
    <!-- <div class="row d-none">
      <div class="col-lg-5 col-md-6 ml-auto mr-auto">
        <div class="card card-login rounded-0 p-3">
          <form class="user" action="<?= base_url(); ?>/login" method="post">
            <div class="text-center my-3 site-title">
            <img src="<?= base_url(); ?>/public/images/weendi.png" alt="" width="300" > </a>
            </div>
            <div class="card-body my-5">
            <?php if(session()->get('success')): ?>
              <div class="alert alert-success" role="alert">
                  <?= session()->get('success') ?>
              </div>
            <?php endif; ?>
              <div class="input-group m-2 d-block">
                <div class="input-group-prepend ">
                  <span class="input-group-text px-0">
                    Email
                  </span>
                </div>
                <input type="email" name="email" class="form-control w-100" placeholder="Email...">
              </div>
              <div class="input-group m-2 d-block">
                <div class="input-group-prepend">
                  <span class="input-group-text px-0">
                    Password
                  </span>
                </div>
                <input type="password" name="password" class="form-control w-100" placeholder="Password...">
              </div>
              <?php if(isset($validation)): ?> 
              <div class="col-12"> 
                  <div class="alert alert-danger" role="alert">
                      <?= $validation->listErrors() ?>
                  </div>
              </div> 
          <?php endif; ?>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-wd btn-s">Sign In</button>
            </div>
            <hr style="width:80%; margin-top:0;">
            <div class="text-center mb-4 d-flex row px-5">
              <div class="col-sm-12 ">

                <a class="" href="#">Forgot your Password?</a>
              </div>
              <div class="col-sm-12  d-block">
                
                <p>Don't have an account? <a class="" href="/weendi/register" class="btn btn-primary btn-link btn-wd btn-lg h3">Register here</a></p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> -->
    <!-- </div> -->
    <!-- </div> -->