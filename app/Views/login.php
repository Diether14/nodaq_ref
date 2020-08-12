<!-- style="background-image: url('../assets/img/bg7.jpg'); background-size: cover; background-position: top center;" -->
<!-- style="background-image: url('public/user/assets/img/bg7.jpg'); background-size: cover; background-position: top center;" -->


<body class="login-page sidebar-collapse" >
<div class="page-header " >
    <div class="container">

      <div class="row">
        <div class="col-lg-5 col-md-6 ml-auto mr-auto">
          <div class="card card-login rounded-0 p-3">
            <form class="user" action="/weendi/login" method="post">
              <!-- <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Welcome to Weendi</h4> -->
                <!-- <div class="social-line">
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-facebook-square"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a href="#pablo" class="btn btn-just-icon btn-link">
                    <i class="fa fa-google-plus"></i>
                  </a>
                </div> -->
              <!-- </div> -->
              <div class="text-center my-3 site-title">
              <img src="<?= base_url(); ?>/public/images/weendi.png" alt="" width="300" > </a>
              </div>
              <!-- <p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
              <div class="card-body my-5">
              <?php if(session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->get('success') ?>
                </div>
              <?php endif; ?>
                <!-- <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text px-0">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="First Name...">
                </div> -->
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
      </div>
    </div>