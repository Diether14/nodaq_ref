<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="public/assets/css/style.css">
    <title>weendigo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="public/dist/css/flat-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- Bootstrap 4 requires Popper.js -->
    <script src="https://unpkg.com/popper.js@1.14.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
    <script src="public/dist/scripts/flat-ui.js"></script>



</head>
<body  style="background-color:#F0F0F0">
    <?php 
      $uri = service('uri');
    ?>
  
  <!-- <nav class="navbar navbar-default bg-white navbar-lg navbar-expand-lg" role="navigation"> -->
  <nav class="navbar navbar-inverse navbar-embossed navbar-expand-lg" role="navigation">
  <div class="container">
  <a class="navbar-brand" href="/weendigo">Weendigo</a>
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-01"></button>
  <div class="collapse navbar-collapse" id="navbar-collapse-01">

  <?php if(session()->get('isLoggedIn')): ?>
    <ul class="nav navbar-nav mr-auto">
    <li class="<?= ($uri->getSegment(2) ==  'dashboard' ? 'active': null)?>"><a href="/weendigo">Home</a></li>
    <li class="<?= ($uri->getSegment(2) ==  'register' ? 'active': null) ?>"><a href="/weendigo">Emoticon Store</a></li>
    <li class="<?= ($uri->getSegment(2) ==  'register' ? 'active': null) ?>"><a href="/weendigo">Authentication</a></li>
    <li class="<?= ($uri->getSegment(2) ==  'register' ? 'active': null) ?>"><a href="/weendigo">Guest Book</a></li>
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
      </ul>
      <div class="collapse navbar-collapse justify-content-end">

<div class="btn-group">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
    Profile
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="/weendigo/profile">Profile</a></li>
    <li><a href="#">Settings</a></li>
    <li class="divider"></li>
    <li><a href="/weendigo/logout">Logout</a></li>
  </ul>
</div>

</div>   
   <?php else: ?>

  
<ul class="nav navbar-nav mr-auto">
      <li class="<?= ($uri->getSegment(2) ==  '' ? 'active': null)?>"><a href="/weendigo">Login</a></li>
      <li class="<?= ($uri->getSegment(2) ==  'register' ? 'active': null) ?>"><a href="/weendigo/register">Register</a></li>
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

</div>    
    <?php endif; ?>
  </div>
  </div>
</nav>