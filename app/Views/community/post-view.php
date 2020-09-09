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

    #txtUserComment{
        border: 1px solid #999;
        padding: 10px;
        border-radius: 5px;
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
                            <div class="col-sm-12 d-flex    justify-content-center">
                           
                            <form action="<?= base_url() ?>/upvote" method="POST">
                                 <input name="post_id" type="hidden" value="<?= $blog['id'] ?>">
                                 <input name="community_id" type="hidden" value="<?= $blog['community_id'] ?>">
                                <?php if($upvote == NULL): ?>   
                                    <button type="submit" class="btn btn-link not_joined h6"><i class="fa fa-chevron-up pr-1 "></i>
                                    Upvote
                                    </button>
                                <?php else: ?>
                                    <button type="submit" class="btn btn-link text-success not_joined h6"><i class="fa fa-chevron-up pr-1 text-success"></i>
                                    Upvote
                                    </button>
                                <?php endif; ?>
                            </form>

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
                           
                                <?php else: ?>
                                    <a href="#comments" class="btn btn-link text-primary h6"><i class="fa fa-comment pr-1"></i>
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

                                <a href="#" class="btn btn-link h6 text-danger"><i class="text-danger fa fa-exclamation pr-1"></i> Reported</a>
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
                                <div class="form-group">
                                    <textarea name="txtUserComment" id="txtUserComment" class=" w-100" placeholder="Place your comments here" cols="30" rows="5" ></textarea>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary text-right" id="saveButton">Comment</button>
                                </div>
                                <!-- <div id="editorjs" class="cdx-block"></div> -->
                                <input type="hidden" name="base" value="<?= base_url(); ?>">
                            </div>
                        </div>
                            <div class="">
                                <?php if (session('msg')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= session('msg') ?>
                                </div>
                                <?php endif ?>
                                <h5 class="title py-4 m-0">Comments</h5>
                                <div class="col-sm-12">
                                    <?php if(empty($post_comments)): ?>
                                    <p class="text-center">No comment yet</p>
                                    <?php else: ?>
                                    <?php foreach ($post_comments as $key => $value): ?>
                                    <div class="media mb-3 p-2 border rounded">
                                        <?php if($value->user_mode == '1'): ?>
                                            <div class="profile-photo-small mr-2 d-flex">
                                                <div class="col-4">
                                                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image" class="img-raised rounded-circle1 img-fluid  z-depth-2" alt="avatar">
                                                </div>
                                                <div class="col-8">
                                                    <div class="media-body" contenteditable="false">
                                                        <?php if(session()->get('id') == $value->user_id): ?>
                                                            <a href="<?= base_url(); ?>/profile">
                                                                <h5 class="my-0">Anonymous</h5>
                                                                <input type="hidden" name="base" value="<?= base_url(); ?>">
                                                            </a>
                                                        <?php else: ?>
                                                            <a href="<?= base_url(); ?>/view-profile/<?= $user['id']; ?>">
                                                                <h5 class="my-0">Anonymous</h5>
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
                                                    <div class="d-flex justify-content-left">
                                                        <a href="<?= base_url(); ?>/profile">
                                                            <h5 class="my-0">
                                                                <strong>
                                                                    <?= $value->nickname; ?>
                                                                </strong>
                                                            </h5>
                                                        </a>
                                                    </div>
                                                    <time class="timeago" datetime="<?= $value->created_at; ?>"></time>
                                                    
                                                <?php else: ?>
                                                    <div class="d-flex justify-content-left">
                                                        <a href="<?= base_url(); ?>/view-profile/<?= $user['id']; ?>">
                                                            <h5 class="my-0">
                                                                <strong>
                                                                    <?= $value->nickname; ?>
                                                                </strong>
                                                            </h5>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                
                                                <?= $value->content?>
                                                <br/>
                                                <button id="reply-button-<?= $key?>" class="btn btn-sm btn-link"><i class="fa fa-reply"></i> Reply</button>
                                                <div id="reply-box-<?=$key?>" class="reply-box" style="display: none" >
                                                    <div class="d-flex w-100">
                                                        <div class="profile-photo-small mr-2">
                                                            <?php if(!empty($value->name)): ?>
                                                                <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>" alt="Circle Image" class="rounded-circle1 img-fluid">
                                                            <?php else: ?>
                                                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image" class="img-raised rounded-circle1 img-fluid  z-depth-2" alt="avatar">
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="form-group w-100 p-0">
                                                            <textarea name="txtReplyBox-<?= $key?>" id="txtReplyBox-<?= $key?>" class="form-control" cols="30" rows="3" placeholder="Leave a reply to this comment.."></textarea>
                                                            <button id="btnSendComment-<?= $key?>" type="button" class="btn btn-sm btn-primary" onclick="sendComment(<?= $key?>, <?= $value->id ?>)"><i class="fa fa-send"></i> Send</button>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="alert ">
                                                        <?php foreach($post_comment_replies as $replyKey => $reply){
                                                            if($reply->comment_id == $value->id){
                                                                ?>
                                                                    <div class="blockquote">
                                                                        <div class="d-flex w-100">
                                                                            <div class="profile-photo-small mr-2">
                                                                                <?php if(!empty($value->name)): ?>
                                                                                    <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>" alt="Circle Image" class="rounded-circle1 img-fluid">
                                                                                <?php else: ?>
                                                                                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image" class="img-raised rounded-circle1 img-fluid  z-depth-2" alt="avatar">
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <div class="d-flex w-100">
                                                                                <div>
                                                                                    <span class="heading"><strong>User</strong> <time class="timeago text-muted" datetime=" <?= $reply->date_posted ?>"></time></span>
                                                                                    <br/>
                                                                                    <span><?= $reply->comment?></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php
                                                            }
                                                        }?>
                                                </div>
                                                
                                                <script>
                                                    document.querySelector(`#reply-button-<?= $key?>`).addEventListener("click", () => {
                                                        const replyBoxes = document.querySelectorAll('.reply-box');
                                                        for(let i = 0 ; i < replyBoxes.length; i++){
                                                            replyBoxes[i].style.display = "none";
                                                        }
                                                        document.querySelector('#reply-box-<?=$key?>').style.display = "block";
                                                    })
                                                </script>

                                            </div>
                                            <time class="timeago" datetime=" <?= $value->created_at ?>"></time>

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


    <!-- Classic Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Report Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="material-icons">clear</i>
            </button>
                </div>
                <div class="modal-body">
                    <form class="form" action="<?= base_url(); ?>/report_post" method="post">
                        <input type="hidden" name="post_id" value="<?= $blog['id']?>">
                        <input type="hidden" name="community_id" value="<?= $blog['community_id']?>">
                        <label>Select Report</label>
                         <select name="report_option" class="form-control" required>
                         <option value=""></option>
                         <?php foreach ($report_options as $key => $value): ?>
                            <option value="<?= $value['id'] ?>"><?= $value['content'] ?></option>
                           
                         <?php endforeach ?>
                         </select>

                        <textarea name="report_content" class="form-control" cols="30" rows="5" placeholder="Reason..." required></textarea>
                        <button class="btn btn-danger" type="submit">Send Report</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--  End Modal -->


<script type="text/javascript">

    sendComment = (key, commentId) => {
        let data = {
            "post_id": <?= json_encode($blog)?>.id,            
            "user_id": <?= session()->get('id')?>,
            "comment_id": commentId,            
            "comment": document.querySelector(`#txtReplyBox-${key}`).value
        }
        $.ajax({
            url: `<?= base_url()?>/add_comment_reply`,
            method: 'post',
            data: data,
            dataType: "JSON",
            success: function(){
                document.querySelector(`#txtReplyBox-${key}`).value = "";
                window.alert("Reply successfully sent");
            },
            error: function(){
                window.alert("Error sending reply to this comment");
            }
        });
    }

    document.querySelector("#saveButton").addEventListener('click', function () {
        
        // cPreview.show(savedData, document.getElementById("output"));
        var base_url = $('input[name=base]').val();
        var post_id = $("input[name=post_id]").val();
        var content = document.querySelector("#txtUserComment").value;
        

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
</script>