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
    <link href="<?= base_url(); ?>/public/assets/scss/main.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url(); ?>/public/user/assets/demo/demo.css" rel="stylesheet" />
    <!-- tags input plugin -->

    <link href="<?= base_url(); ?>/public/assets/taginput/tagsinput.css" rel="stylesheet" type="text/css">

    <!-- editor.js -->
    <link href="https://fonts.googleapis.com/css?family=PT+Mono" rel="stylesheet">
    <link href="<?= base_url(); ?>/public/editorjs/assets/demo.css" rel="stylesheet">
    <script src="<?= base_url(); ?>/public/editorjs/assets/json-preview.js"></script>
  

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

<?php if(session()->get('isLoggedIn')): ?>
<body class="profile-page sidebar-collapse">
    <?php 
      $uri = service('uri');
    ?>
    <nav class="navbar  fixed-top navbar-expand-lg bg-primary">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="/weendi/dashboard">
                    <img src="<?= base_url(); ?>/public/images/weendi-white.png" alt="" width="100"> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>



            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <form action="<?= base_url() ?>/search/all" class="form-inline ml-2">
                            <div class="form-group has-white">
                                <input type="text" name="q" class="form-control" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-white btn-raised btn-fab btn-round">
                                <i class="material-icons">search</i>
                            </button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>/dashboard" class="nav-link">
                            <i class="fa fa-home"></i> Simple SNS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link">
                            <i class="fa fa-key"></i> Authentication
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url(); ?>/emoticon-store" class="nav-link">
                            <i class="fa fa-smile-o"></i> Emoticon Store
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

                            <a href="<?= base_url() ?>/community" class="dropdown-item">My Community</a>
                            <a href="<?= base_url() ?>/Admin" class="dropdown-item">Manage Community</a>
                            <a href="<?= base_url() ?>/my-emoticon-store" class="dropdown-item">My Emoticon Store</a>
                            <hr>
                            <a href="/weendi/profile" class="dropdown-item">Profile</a>

                            <a href="/weendi/settings" class="dropdown-item">Settings</a>

                            <a href="#" data-toggle="modal" data-target="#logoutModal" class="dropdown-item">Sign
                                out</a>

                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>



    <?php endif; ?>