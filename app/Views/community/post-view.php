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

    /* #txtUserComment{
        border: 1px solid #999;
        padding: 10px;
        border-radius: 5px;
    } */
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
    
            <?php if (!empty($community[0])) : ?>    
                <?php if($community[0]->status == 0): ?>
                    <script type="text/javascript">
                        alertify.warning('You are not joined to this community!');
                    </script>
                <?php endif; ?>
                <?php else: ?>
                    <script type="text/javascript">
                        alertify.warning('You are not joined to this community!');
                    </script>
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
                        <?php if($blog['user_id'] == session()->get('id')): ?>
                            <div class="dropdown float-right">
                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cog"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#edit_post">Edit</a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#delete_post">Delete</a>
                                </div>
                            </div>
                        <?php endif; ?>
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
                                <br>
                                <?php 
                                    $str = explode(",",$blog['tags']);    
                                    foreach ($str as $key => $value): 
                                ?>
                                    <span class="badge badge-pill badge-info">
                                    <?= $value; ?>
                                    </span>
                                
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="card-footer m-0 py-0">
                            <!-- <div class="btn-group btn-group-sm" role="group" aria-label="">
                            <button type="button" class="btn"><i class="fa fa-chevron-circle-up"></i></button>
                            <button type="button" class="btn "><i class="fa fa-chevron-circle-down"></i></button>
                        </div> -->
                            <div class="col-sm-12 d-flex    justify-content-center">
                            <?php if($community[0]->status == 1): ?>
                            <form action="<?= base_url() ?>/upvote" method="POST">
                                 <input name="post_id" type="hidden" value="<?= $blog['id'] ?>">
                                 <input name="community_id" type="hidden" value="<?= $blog['community_id'] ?>">
                                <?php if($upvote == NULL): ?>   
                                    <button type="submit" class="btn btn-link h6"><i class="fa fa-chevron-up pr-1 "></i>
                                    <?= $vote_totals ?> Upvote
                                    </button>
                                <?php else: ?>
                                    <button type="submit" class="btn btn-link text-success h6"><i class="fa fa-chevron-up pr-1 text-success"></i>
                                    <?= $vote_totals ?> Upvote
                                    </button>
                                <?php endif; ?>
                            </form>

                                    <a href="#comments" class="btn btn-link h6"><i class="fa fa-comment pr-1"></i>
                                        <?= $comments_total ?>
                                        Comments
                                    </a>


                                    <button type="button" data-toggle="modal" data-target="#share-modal" class="btn btn-link h6">
                                        <i class="fa fa-share pr-1"></i>
                                        Share Post
                                    </button>

                                    <?php if(empty($report)): ?>
                                        <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-link h6"><i class="fa fa-exclamation -1"></i> Report Post</a>
                                    <?php else: ?>

                                    <a href="#" class="btn btn-link h6 text-danger"><i class="text-danger fa fa-exclamation pr-1"></i> Reported</a>
                                    <?php endif; ?>

                            <?php else: ?>
                                    <button type="submit" class="btn btn-link text-link not_joined h6"><i class="fa fa-chevron-up pr-1 "></i>Upvote</button>
                                  
                                    <button class="btn btn-link h6 not_joined"><i class="fa fa-comment pr-1"></i>
                                        <?= $comments_total ?>
                                        Comments
                                    </button>


                                    <button type="button" class="btn btn-link h6 not_joined">
                                        <i class="fa fa-share pr-1"></i>
                                        Share Post
                                    </button>

                                    <button class="btn btn-link h6 not_joined"><i class="fa fa-exclamation -1"></i> Report Post</button>
                                   
                            <?php endif; ?>


                            </div>
                        </div>
                        <hr>
                        <div id="comments" class=" my-4">
                            <h5 class="card-title p-3 m-0">Leave a Comment:</h5>
                            <div class="card-body">  
                                <input type="hidden" name="post_id" value="<?= $blog['id']?>" >
                                <div class="ce-example__content _ce-example__content--small" style="padding-bottom: 0px !important;">
                                <div class="form-group">
                                    <p class=" emoji-picker-container">
                                        <textarea name="txtUserComment" id="txtUserComment" class="w-100" placeholder="Place your comments here" cols="30" rows="5" data-emojiable="true" data-emoji-input="unicode"></textarea>
                                    </p>
                                </div>
                                <div class="text-right">
                                <?php if($community[0]->status == 1): ?>
                                    <button class="btn btn-primary text-right" id="saveButton">Comment</button>
                                <?php else: ?>
                                    <button class="btn btn-primary text-right not_joined" >Comment</button>
                                <?php endif; ?>
                                </div>
                                <!-- <div id="editorjs" class="cdx-block"></div> -->
                                <input type="hidden" name="base" value="<?= base_url(); ?>">
                            </div>
                        </div>
                            <div class="">
                               

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


    <div class="modal fade" id="share-modal" tabindex="5">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title text-white">
                        Share Post
                    </span>
                    <button type="button" data-dismiss="modal" class="btn btn-link btn-sm">
                        <i class="fa fa-close text-white"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="#txtShareContent">Write Post</label>
                        <textarea name="txtShareContent" id="txtShareContent" cols="30" rows="3" class="form-control" placeholder="Say something about this post"></textarea>
                    </div>
                    <span>Which community would you like to share to?</span>
                    <div class="community-list">
                        <?php 
                            foreach($communities as $cKey => $item){
                                if($item["user_id"] == $community[0]->user_id){
                                    ?>
                                        <div class="card m-0" onclick="sharePost(<?= $item["id"]?>)">
                                            <div class="card-body">
                                                <strong>
                                                    <i class="fa fa-newspaper"></i> <?= $item["title"]?><?= ($item["id"] == $community[0]->id)?" (current)":""?>
                                                </strong>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Classic Modal -->
    <div class="modal fade" id="edit_post" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="material-icons">clear</i>
            </button>
          </div>
          
          <div class="modal-body">
              <label>Are you sure do you want edit this post?</label>
          </div>
          <div class="modal-footer">
            <a href="<?= base_url(); ?>/post-edit/<?=  $blog['id'] ?>"><button type="button" class="btn bg-secondary text-white btn-link">Edit</button></a>
            <button type="button" class="btn btn-danger btn-link" daxta-dismiss="modal">Cancel</button>
            
            <!-- <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button> -->
          </div>
        </div>
      </div>
    </div>
    <!--  End Modal -->

    <!-- Classic Modal -->
    <div class="modal fade" id="delete_post" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i class="material-icons">clear</i>
            </button>
          </div>
          <div class="modal-body">
            <form class="contact-form" action="<?= base_url(); ?>/delete-post/<?=  $blog['id'] ?>/<?= $community_current[0]->id ?>" method="post" accept-charset="utf-8"
              enctype="multipart/form-data">
              <label>Are you sure do you want to delete this post?</label>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn bg-danger text-white btn-link">Delete</button>
            <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancel</button>
            </form>
            <!-- <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button> -->
          </div>
        </div>
      </div>
    </div>
    <!--  End Modal -->

<?php if (session('msg')) : ?>
<script type="text/javascript">
    alertify.warning('<?= session('msg') ?>');
</script>                                
<?php endif ?>

<script type="text/javascript">
    // $(function() {
    //     // Initializes and creates emoji set from sprite sheet
    //     window.emojiPicker = new EmojiPicker({
    //         emojiable_selector: '[data-emojiable=true]',
    //         assetsPath: '<?= base_url()?>/assets/img/',
    //         popupButtonClasses: 'fa fa-smile-o'
    //     });
    //     // Finds all elements with `emojiable_selector` and converts them to rich emoji input fields
    //     // You may want to delay this step if you have dynamically created input fields that appear later in the loading process
    //     // It can be called as many times as necessary; previously converted input fields will not be converted again
    //     window.emojiPicker.discover();
    // });
    
    window.onload = () => {
        window.emojiPicker = new EmojiPicker({
            emojiable_selector: '[data-emojiable=true]',
            assetsPath: '<?= base_url()?>/public/assets/img/emoji-picker',
            popupButtonClasses: 'fa fa-smile-o'
        });
        window.emojiPicker.discover();
    }

    sharePost = postId => {
        // let data = <?=json_encode($community)?>[0];
        let data = {
            'community_id': <?= $community[0]->id?>,
            'post_id': <?= $blog['id']?>,
            'share_content': document.querySelector('#txtShareContent').value
        }
        
        $.ajax({
            url: `<?= base_url()?>/share_post`,
            method: 'post',
            data: data,
            dataType: "JSON",
            success: function(){
                // document.querySelector(`#txtReplyBox-${key}`).value = "";
                alertify.success('Post Shared');
                location.reload();
            },
            error: function(){
                window.alert("Unable to share post due to an error.");
            }
        });
    }

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
                alertify.success('Reply successfully sent');
                location.reload();
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
            type: "POST",s
            url  : base_url + '/add_comment',
            data:  data, 
            dataType: "JSON",  
            success: function(data)
            {
                alertify.success(data.msg);
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