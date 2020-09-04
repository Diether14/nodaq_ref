<style>
    .rounded-circle1 {
        border-radius: 50% !important;
        width: 40px;
        height: 40px;
        background-position: center center;
        background-size: cover;
    }
    
    .btn-circle {
        width: 45px;
        height: 45px;
        line-height: 45px;
        text-align: center;
        padding: 0;
        border-radius: 50%;
    }
    
    .btn-circle i {
        position: relative;
        top: -1px;
    }
    
    .btn-circle-sm {
        width: 35px;
        height: 35px;
        line-height: 35px;
        font-size: 0.9rem;
    }
    
    .btn-circle-lg {
        width: 55px;
        height: 55px;
        line-height: 55px;
        font-size: 1.1rem;
    }
    
    .btn-circle-xl {
        width: 70px;
        height: 70px;
        line-height: 70px;
        font-size: 1.3rem;
    }
</style>
<div class="page-header header-filter m-auto" data-parallax="true" style="background-image: url(<?= base_url(); ?>/public/admin/uploads/community/<?= $community_current[0]->name; ?>)">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ml-auto mr-auto">
                <div class="brand">
                    <h1 class="title">
                        <?= $community_current[0]->title; ?>
                    </h1>
                
                    <a href="<?= base_url(); ?>/community/<?= $blog['community_id'] ?>"><button
                            class="btn btn-primary btn-raised btn-lg">View Community</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main bg-light">
    <div class="container px-0 m-auto">
        <div class="community-single">
            <div class="col-sm-12">
                <?php if(empty($users_community)) : ?>
                <div class="alert alert-info">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                        </button> You must join to the community first, inorder to be able to add post and add comments.
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-sm-12 px-0">
                <div class="community-single-card card rounded-0 p-4 my-0">
                    <div class="col-sm-12 m-0 p-0 page-breadcrumb">
                        <nav aria-label="breadcrumb ">
                            <ol class="breadcrumb m-0  bg-white">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Communities</a></li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <?= $community_current[0]->title; ?>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?= $blog['title'] ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-sm-12 community-single-card_title">
                        <div class="community-single-card_profile">
                            
                            <div class="community-single_nickname">
                                <?php if(session()->get('id') == $user['id']): ?>
                                
                                <a href="<?= base_url(); ?>/profile">
                                    <h4 class="card-title mt-0 pt-3">
                                    <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $profile_photo1['name'] ?>" alt="Circle Image" class="rounded-circle1 img-fluid z-depth-2">

                                        <?= $user['nickname']; ?>
                                    </h4>
                                </a>
                                <?php else: ?>
                                <a href="<?= base_url(); ?>/view-profile/<?= $user['id']; ?>">
                                    <h4 class="card-title mt-0 pt-3">
                                    <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $profile_photo1['name'] ?>" alt="Circle Image" class="rounded-circle1 img-fluid z-depth-2">

                                        <?= $user['nickname']; ?>
                                    </h4>
                                </a>
                                <?php endif; ?>
                                <p class="text ">
                                
                                    <time class="timeago" datetime="<?= $blog['updated_at']; ?>"></time>
                                        
                                    
                                </p>
                            </div>



                        </div>
                        <hr>
                        <div class="community-single-post-title card-body py-0">
                            <div class="header-title col-sm-12 py-0">
                                <h2 class="title py-0">
                                    <?= $blog['title'] ?>
                                </h2>
                            </div>
                            <div class="col-sm-12">
                                <div class="collapse-content" contenteditable="false">
                                
                                    <div id="blog-content" class="container-fluid">
                                    <!-- <pre> -->
                                        <?php
                                            $content = unserialize($blog['content']);
                                            // var_dump($content);
                                            // exit;
                                            array_map(function($item){
                                                switch($item["type"]){
                                                    case "header":
                                                        switch($item["data"]["level"]){
                                                            case "1";
                                                                ?>
                                                                    <h1><?= $item["data"]["text"]?> </h1>  
                                                                <?php
                                                                break;
                                                            case "2";
                                                                ?>
                                                                    <h2><?= $item["data"]["text"]?> </h2>  
                                                                <?php
                                                                break;
                                                            case "3";
                                                                ?>
                                                                    <h3><?= $item["data"]["text"]?> </h3>  
                                                                <?php
                                                                break;
                                                            case "4";
                                                                ?>
                                                                    <h4><?= $item["data"]["text"]?> </h4>  
                                                                <?php
                                                                break;
                                                            case "5";
                                                                ?>
                                                                    <h5><?= $item["data"]["text"]?> </h5>  
                                                                <?php
                                                                break;
                                                            case "6";
                                                                ?>
                                                                    <h6><?= $item["data"]["text"]?> </h6>  
                                                                <?php
                                                                break;
                                                            default:
                                                                break;
                                                        }
                                                        
                                                        break;
                                                    case "paragraph":
                                                        ?>
                                                            <p><?= $item["data"]["text"]?> </p>  
                                                        <?php
                                                        break;
                                                    case "list":
                                                        if($item["data"]["style"] == "unordered"){
                                                            ?>
                                                                <ul>
                                                                    <?php
                                                                        array_map(function($string){
                                                                            echo "<li>{$string}</li>";
                                                                        }, $item["data"]["items"]);
                                                                    ?>
                                                                </ul>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <ol>
                                                                    <?php
                                                                        array_map(function($string){
                                                                            echo "<li>{$string}</li>";
                                                                        }, $item["data"]["items"]);
                                                                    ?>
                                                                </ol>
                                                            <?php
                                                        }
                                                        break;
                                                    case "delimiter":
                                                        ?>
                                                            <div class="text-center">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        <?php
                                                    case "image":
                                                        ?>
                                                            <img src="<?= $item["data"]["file"]["url"]?>" class="img-fluid">
                                                        <?php
                                                    default:
                                                    
                                                        break;
                                                }
                                            }, $content)
                                        ?>
                                    </div>
                                    
                                </div>
                                <p>
                                    <span class="badge badge-pill badge-info"><?= $blog['description']; ?></span>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="card-footer m-0 py-0">
                            <!-- <div class="btn-group btn-group-sm" role="group" aria-label="">
                            <button type="button" class="btn"><i class="fa fa-chevron-circle-up"></i></button>
                            <button type="button" class="btn "><i class="fa fa-chevron-circle-down"></i></button>
                        </div> -->
                            <div class="col-sm-12 text-center">
                                <a href="#comments" class="btn btn-link not_joined h6"><i class="fa fa-chevron-up pr-1 text-success"></i>
                                Upvote
                            </a>
                              
                                <?php if(empty($users_community)) : ?>

                                <a href="#comments" class="btn btn-link not_joined h6"><i class="fa fa-comment pr-1"></i>
                                    <?php 
                                              if(1000 >= 1000){ 
                                                echo round((1200/1000),1). 'K'; 
                                              }elseif(1000000 >= 1000000){
                                                echo round((1000000/1000000),1). 'M';
                                              }else{
                                                echo '50';
                                              } ?>
                                    Comments</a>
                                <!-- <a href="#" class="btn btn-link not_joined h6"><i class="fa fa-share pr-1"></i>
                                    <?php 
                                              if(1000 >= 1000){ 
                                                echo round((1200/1000),1). 'K'; 
                                              }elseif(1000000 >= 1000000){
                                                echo round((1000000/1000000),1). 'M';
                                              }else{
                                                echo '50';
                                              } ?>
                                    Share Post</a> -->

                                <?php if(empty($report)): ?>
                                <a href="#" class="btn btn-link not_joined h6" class="btn btn-link"><i
                                        class="fa fa-exclamation pr-1 "></i>
                                    Report Post</a>
                                <?php else: ?>

                                <a href="#" class="btn btn-link not_joined h6"><i class="fa fa-exclamation pr-1 text-danger"></i>
                                    Reported</a>
                                <?php endif; ?>

                                <?php else: ?>
                                <a href="#comments" class="btn btn-link h6"><i class="fa fa-comment pr-1"></i>
                                    <?php 
                                              if(1000 >= 1000){ 
                                                echo round((1200/1000),1). 'K'; 
                                              }elseif(1000000 >= 1000000){
                                                echo round((1000000/1000000),1). 'M';
                                              }else{
                                                echo '50';
                                              } ?>
                                    Comments</a>
                                <!-- <a href="#" data-toggle="modal" data-target="#share" class="btn btn-link h6"><i
                                        class="fa fa-share pr-1"></i>
                                    <?php 
                                              if(1000 >= 1000){ 
                                                echo round((1200/1000),1). 'K'; 
                                              }elseif(1000000 >= 1000000){
                                                echo round((1000000/1000000),1). 'M';
                                              }else{
                                                echo '50';
                                              } ?>
                                    Share Post</a> -->

                                <?php if(empty($report)): ?>
                                <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-link h6" class="btn btn-link"><i class="fa fa-exclamation pr-1"></i> Report Post</a>
                                <?php else: ?>

                                <a href="#" class="btn btn-lin h5k"><i class="fa fa-exclamation pr-1"></i> Reported</a>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <hr>
                        <div id="comments" class=" my-4">
                            <h5 class="card-title p-3 m-0">Leave a Comment:</h5>

                            <div class="card-body">  
                            <input type="hidden" name="post_id" value="<?= $blog['id']?>">
                                <div class="ce-example__content _ce-example__content--small" style="padding-bottom: 0px !important;">
                                <div id="editorjs"></div>
                                <input type="hidden" name="base" value="<?= base_url(); ?>">
                            <button class="btn btn-primary btn-sm" id="saveButton">Comment</button>
                            </div>
                            </div>
                            <div class="title ">
                                <?php if (session('msg')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session('msg') ?>
                                </div>
                                <?php endif ?>
                                <h5 class="title p-4 m-0">Comments</h5>
                                <div class="col-sm-12">
                                    <?php if(empty($post_comments)): ?>
                                    <p class="text-center">No comment yet</p>
                                    <?php else: ?>
                                    <?php foreach ($post_comments as $key => $value): ?>
                                    <div class="media mb-5">
                                        <?php if($value->user_mode == '1'): ?>
                                        <div class="profile-photo-small mr-2 d-flex">
                                            <div class="col-4">

                                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image" class="img-raised rounded-circle1 img-fluid  z-depth-2" alt="avatar">
                                            </div>
                                            <div class="col-8">

                                                <div class="media-body" contenteditable="false">
                                                    <?php if(session()->get('id') == $value->user_id): ?>
                                                    <a href="<?= base_url(); ?>/profile">
                                                        <h5 class="my-0">Anounymous</h5>
                                                        <input type="hidden" name="base" value="<?= base_url(); ?>">                      </a>
                                                    <?php else: ?>
                                                    <a href="<?= base_url(); ?>/view-profile/<?= $user['id']; ?>">
                                                        <h5 class="my-0">Anounymous</h5>
                                                    </a>
                                                    <?php endif; ?>
                                                    <?= $value->content; ?>
                                                </div>
                                            </div>

                                        </div>


                                        <?php else: ?>

                                        <div class="profile-photo-small mr-2">
                                            <?php if(!empty($value->name)): ?>

                                            <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>" alt="Circle Image" class="rounded-circle1 img-fluid z-depth-2">

                                            <?php else: ?>
                                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image" class="img-raised rounded-circle1 img-fluid  z-depth-2" alt="avatar">

                                            <?php endif; ?>

                                        </div>

                                        <div class="media-body" contenteditable="false">
                                            <?php if(session()->get('id') == $value->user_id): ?>
                                            <a href="<?= base_url(); ?>/profile">
                                                <h5 class="my-0">
                                                    <?= $value->nickname; ?>
                                                </h5>
                                            </a>
                                            <?php else: ?>
                                            <a href="<?= base_url(); ?>/view-profile/<?= $user['id']; ?>">
                                                <h5 class="my-0">
                                                    <?= $value->nickname; ?>
                                                </h5>
                                            </a>
                                            <?php endif; ?>


                                            <?= $value->content; ?>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

<script type="text/javascript">
    document.querySelector("#saveButton").addEventListener('click', function () {
        editor.save().then((savedData) => {
            // cPreview.show(savedData, document.getElementById("output"));
            console.log(savedData.blocks);
            var base_url = $('input[name=base]').val();
            var post_id = $("input[name=post_id]").val();
            var content = savedData;
         

            var data = {
                'content': content,
                'post_id': post_id,
            };
            
            if(post_id == ''  || content == ''){
                    alert('Please fill out the fields!');
            }else{
                $.ajax({
                type: "POST",
                url  : base_url + '/add_comment',
                data:  data, 
                dataType: "JSON",  
                success: function(data)
                {
                    alert(data.msg);
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                    {
                    alert('There is an error!');
                    }
                    });
            }
        });
    });
</script>