<!-- style="background-image: url('../assets/img/bg7.jpg'); background-size: cover; background-position: top center;" -->
<!-- style="background-image: url('public/user/assets/img/bg7.jpg'); background-size: cover; background-position: top center;" -->


<body class="login-page sidebar-collapse" >
<div class="page-header " >
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
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
              <div class="h3 text-center mt-5">Create an Account!</div>
              <div class="card-body">
              <?php if(session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->get('success') ?>
                </div>
              <?php endif; ?>
                <!-- <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="First Name...">
                </div> -->
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Password...">
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
                <button type="submit" class="btn btn-primary btn-link btn-wd btn-s">Get Started</button>
              </div>
              <hr style="width:80%; margin-top:0;">
              <div class="text-center mb-4">
              <a class="small" href="#">Forgot Password?</a><br>
              <a class="small" href="/weendi/register" class="btn btn-primary btn-link btn-wd btn-lg">Don't have an account?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>