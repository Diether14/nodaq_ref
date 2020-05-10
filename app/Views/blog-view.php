<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="public/assets/css/style.css">
    <title>Weendi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <link href="../public/user/assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../public/user/assets/demo/demo.css" rel="stylesheet" />

<!-- <body  style="background-color:#F0F0F0">
    <?php 
       $uri = service('uri');
    ?>
  

  <?php if(session()->get('isLoggedIn')): ?>
      <!-- <nav class="navbar navbar-default bg-white navbar-lg navbar-expand-lg" role="navigation"> -->
    <!-- <nav class="navbar navbar-inverse navbar-embossed navbar-expand-lg" role="navigation">
    <div class="container">
    <a class="navbar-brand" href="/weendi">Weendi</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-01"></button>
    <div class="collapse navbar-collapse" id="navbar-collapse-01"> -->


    <!-- <ul class="nav navbar-nav mr-auto">
    <li class="< ($uri->getSegment(2) ==  'dashboard' ? 'active': null)?>"><a href="/weendi">Home</a></li>
    <li class="< ($uri->getSegment(2) ==  'register' ? 'active': null) ?>"><a href="/weendi">Emoticon Store</a></li>
    <li class="< ($uri->getSegment(2) ==  'register' ? 'active': null) ?>"><a href="/weendi">Authentication</a></li>
    <li class="< ($uri->getSegment(2) ==  'register' ? 'active': null) ?>"><a href="/weendi">Guest Book</a></li> -->
    <!-- <form class="navbar-form form-inline my-2 my-lg-0 " action="#" role="search" >
      <div class="form-group">
        <div class="input-group">
          <input class="form-control border" id="navbarInput-01" type="search" placeholder="Search">
          <span class="input-group-btn">
            <button type="submit" class="btn border"><span class="fui-search"></span></button>
          </span>
        </div>
      </div>
    </form> -->
      <!-- </ul>
      <div class="collapse navbar-collapse justify-content-end">

<div class="btn-group">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
    Profile
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="/weendi/profile">Profile</a></li>
    <li><a href="#">Settings</a></li>
    <li class="divider"></li>
    <li><a href="/weendi/logout">Logout</a></li>
  </ul>
</div>

</div>    -->

<!--  
<ul class="nav navbar-nav mr-auto">
     
    </ul>

                          
    <div class="collapse navbar-collapse justify-content-end">

<div class="btn-group">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
    English
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="#">Profile</a></li>
    <li><a href="#">Settings</a></li>
    <li class="divider"></li>
    <li><a href="/weendigo/logout">Logout</a></li>
  </ul>
</div>

</div>     -->
    <?php endif; ?>
  <!-- </div>
  </div>
</nav> --> 



  <?php if(session()->get('isLoggedIn')): ?>

    <body class="profile-page sidebar-collapse">
<?php 
      $uri = service('uri');
    ?>


   <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg" color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/weendi/dashboard">
          Weendi </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Weendi</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                      Simple SNS
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                      Authentication
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="javascript:;" class="nav-link">
                      Emoticon Store
                    </a>
                  </li>
        <li class="dropdown nav-item">
                    <a href="javascript:;" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                      <div class="profile-photo-small">
                      <?php if(!empty($profile_photo['name'])): ?>  

                        <img src="../public/user/uploads/profiles/<?= $profile_photo['name'] ?>" alt="Circle Image" class="rounded-circle img-fluid">           
          
                        <?php else: ?>
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image" class="img-raised rounded-circle img-fluid" alt="avatar">
                      
                      <?php endif; ?>
                       
                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                    <!-- <a href="javascript:;" class="dropdown-item">John Smith</a> -->
                      <a href="/weendi/profile" class="dropdown-item">Profile</a>
                      <a href="/weendi/settings" class="dropdown-item">Settings</a>
                     
                      <a href="/weendi/logout" class="dropdown-item">Sign out</a>
                    </div>
                  </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php endif; ?>


<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('../public/user/assets/img/bg3.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h1>View Blog</h1>
          <!-- <h3 class="title text-center">Subtitle</h3> -->
        </div>
      </div>
    </div>
  </div>
</div>

</div>
  <div class="container">
    <div class="section">
       <div class="col-lg-12 col-md-12">
            <div class="card container">
      
            <!-- Card content -->
            <div class="card-body d-flex flex-row">
              <!-- Avatar -->
              <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">
              <!-- Content -->
          
            </div>
            <!-- Card image -->
            <div class="view overlay">
              <img class="card-img-top rounded-0" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/full page/2.jpg" alt="Card image cap">
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <!-- Card content -->
            <div class="card-body">
              <div class="collapse-content">
                <!-- Text -->

                  <h4 class="card-title"><?= $blog['title']; ?></h4>
                  <h6 class="card-subtitle mb-2 text-muted">Position</h6>
                  <p class="card-text"><?= $blog['content']; ?></p>
        
                <!-- Button -->
                <!-- <a class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 collapsed" data-toggle="collapse" href="#collapseContent" aria-expanded="false" aria-controls="collapseContent"></a>
                <i class="fas fa-share-alt text-muted float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
                <i class="fas fa-heart text-muted float-right p-1 my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i> -->
              </div>
            </div>

            </a>
            <!-- Card -->
          </div>
        <div class="card my-4">
          <h5 class="card-title ml-3">Leave a Comment:</h5>
          <?php if (session('msg')) : ?>
            <div class="alert alert-success" role="alert">
                  <?= session('msg') ?>
                </div>
                <?php endif ?>
          <div class="card-body">
          <form class="contact-form" action="/weendi/add_comment" method="post">
              <div class="form-group">
                <textarea name="content" class="form-control" rows="3"></textarea>
              </div>
              <input type="hidden" name="post_id" value="<?= $blog['id']?>">
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          
        <?php foreach ($post_comments as $key => $value): ?>
        <div class="media mb-4 ml-3">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">

            <h5 class="mt-0">Commenter Name</h5>
            <?= $value['content']; ?>
          </div>
        </div>
        <?php endforeach; ?>

        </div>

            </div>
       
         </div>
        </div>
    </div>
 
    <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://www.creative-tim.com/">
              Creative Tim
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/presentation">
              About Us
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/blog">
              Blog
            </a>
          </li>
          <li>
            <a href="https://www.creative-tim.com/license">
              Licenses
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com/" target="_blank">Creative Tim</a> for a better web.
      </div>
    </div>
  </footer>
  </div>

  <script src="../public/user/assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../public/user/assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../public/user/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../public/user/assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="../public/user/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../public/user/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="../public/user/assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>

</body>
</html>
