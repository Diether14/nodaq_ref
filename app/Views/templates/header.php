<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/style.css">
  <title>Weendi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <link href="<?= base_url(); ?>/public/user/assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= base_url(); ?>/public/user/assets/demo/demo.css" rel="stylesheet" />


  <!-- CSS Just for demo purpose, don't include it in your project -->
  <script src="<?= base_url(); ?>/public/assets/ckeditor/ckeditor.js"></script>
  <script src="<?= base_url(); ?>/public/assets/ckeditor/samples/js/sample.js"></script>
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/ckeditor/samples/css/samples.css"> -->
  <link rel="stylesheet"
    href="<?= base_url(); ?>/public/assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

  <style>
    .rounded-circle {
      border-radius: 50% !important;
      width: 40px;
      max-width: 100%;
      height: 40px;
      background-position: center center;
      background-size: cover;
    }
  </style>
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="sr-only">Weendi</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="<?= base_url(); ?>/dashboard" class="nav-link">
              Home
            </a>
          </li>
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

                <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $profile_photo['name'] ?>"
                  alt="Circle Image" class="rounded-circle img-fluid z-depth-2">

                <?php else: ?>
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                  class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar">

                <?php endif; ?>

              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <a href="javascript:;" class="dropdown-item">John Smith</a> -->
              <a href="/weendi/profile" class="dropdown-item">Profile</a>
              <a href="/weendi/settings" class="dropdown-item">Settings</a>

              <a href="#" data-toggle="modal" data-target="#logoutModal" class="dropdown-item">Sign out</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php endif; ?>