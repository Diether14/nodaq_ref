<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="<?= base_url(); ?>/public/assets/css/style.css">
    <title>Weendi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    
    <link href="<?= base_url(); ?>/public/admin/template/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <link href="<?= base_url(); ?>/public/user/assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
    <link href="<?= base_url()?>/public/assets/css/emoji-picker/emoji.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/public/assets/scss/main.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?= base_url(); ?>/public/user/assets/demo/demo.css" rel="stylesheet" />
    
    <!-- mention js -->
    <!-- <link href="<?= base_url(); ?>/public/user/assets/js/plugins/mentionjs/recommended-styles.css" rel="stylesheet" /> -->
    
    <!-- tags input plugin -->
    <link href="<?= base_url(); ?>/public/assets/taginput/tagsinput.css" rel="stylesheet" type="text/css">

    <!-- editor.js -->
    <link href="https://fonts.googleapis.com/css?family=PT+Mono" rel="stylesheet">
    <link href="<?= base_url(); ?>/public/editorjs/assets/demo.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">



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
<body class="profile-page sidebar-collapse" id="nodaq-body">
    <?php 
      $uri = service('uri');

      include('main-navbar.php');
      
    ?>

    



    <?php endif; ?>