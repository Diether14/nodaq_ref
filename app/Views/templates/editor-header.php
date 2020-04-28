<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="public/assets/ckeditor/ckeditor.js"></script>
	  <script src="public/assets/ckeditor/samples/js/sample.js"></script>
    <link rel="stylesheet" href="public/assets/ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="public/assets/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
<!-- 
    <script src="public/ckeditor.js"></script>
	  <script src="js/sample.js"></script>
	  <link rel="stylesheet" href="css/samples.css">
	  <link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css">
     -->
</head>
<body>
    <?php 
      $uri = service('uri');
    ?>
    
<nav class="navbar navbar-expand-lg navbar-light bg-dark bg-custom">
  <div class="container ">
  <a class="navbar-brand" href="/weendigo" style="font-weight:bold;font-size:36px;">WEENDI</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <?php if(session()->get('isLoggedIn')): ?>

    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item <?= ($uri->getSegment(1) ==  'dashboard' ? 'active': null) ?>" >
        <a class="nav-link" href="/weendigo/dashboard">Dashboard </a>
      </li>
      <li class="nav-item <?= ($uri->getSegment(1) ==  'profile' ? 'active': null) ?>" > 
        <a class="nav-link" href="/weendigo/profile"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
      </li> -->
      <!-- <form class="ml-5 form-inline">
        <input class="form-control mr-sm-1" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-light my-2 my-sm-0" type="submit"><i  class="fa fa-search" ></i></button>
      </form>
       -->
    </ul>
    <ul class="navbar-nav">
    <!-- <a href="#"></a></li> -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="img-responsive" src="https://www.stickpng.com/assets/images/588a64f5d06f6719692a2d13.png" width="50" height="50" alt="Contact customer">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/weendigo/profile">Settings</a>
          <a class="dropdown-item" href="/weendigo/logout">Guest Book</a>
          <a class="dropdown-item" href="/weendigo/logout">Authentication</a>
          <a class="dropdown-item" href="/weendigo/logout">Emoticon Store</a>
          
        </div>
      </li>
    </ul>
    <ul class="navbar-nav">
    <!-- <a href="#"></a></li> -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="img-responsive" src="https://img.pngio.com/deafult-profile-icon-png-image-free-download-searchpngcom-profile-icon-png-673_673.png" width="50" height="45" alt="Contact customer">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/weendigo/profile">Profile</a>
          <a class="dropdown-item" href="/weendigo/logout">Logout</a>
        </div>
      </li>
    </ul>
    


  <?php else: ?>
  
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?= ($uri->getSegment(1) ==  '' ? 'active': null) ?>" >
        <a class="nav-link" href="/weendigo">Login </a>
      </li>
      <li class="nav-item <?= ($uri->getSegment(1) ==  'register' ? 'active': null) ?>">
        <a class="nav-link" href="/weendigo/register">Register</a>
      </li>
      
    </ul>
    <?php endif; ?>
    </div>
  </div>
</nav>
