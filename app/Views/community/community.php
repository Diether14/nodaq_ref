<style>
    .modal-lg {
        max-width: 80% !important;
    }

    .label-info {
        background-color: #5bc0de;
        display: inline-block;
        padding: 0.2em 0.6em 0.3em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 0.25em;
    }

    .custom-card {
        min-height: 200px;
        max-height: 200px;
        height: 400px;
    }

    /* .card .card-body,
    .card .card-footer {
        padding: 0 !important;
    } */
    /* .rounded-circle1 {
    height: 42px !important;
  } */
</style>

<div class="row">
    <div class="community-sidebar dm_bg-dark" data-parallax="true">
        <div class="community_header row align-items-center">
            <div class="community_title text-center col-sm">
                <h3 class="community-title my-2">
                    <?= $community_list[0]->title; ?>
                </h3>
                <?php if ($community_list['community_type'] == '1') : ?>
                    <i class="fa fa-lock"></i>
                    <small class="community-status fw-600">Private Community </small>
                <?php else : ?>
                    <i class="fa fa-lock"></i>
                    <small class="community-status fw-600">Public Community </small>
                <?php endif; ?>
                <div class="text-center">
                <?php if(!empty($users_community[0])): ?>
                    <?php if($users_community[0]->status == 0): ?>
                        <button class="btn btn-sm btn-primary">Requested</button>
                    <?php elseif($users_community[0]->status == 1): ?> 
                        <button class="btn btn-sm btn-primary">Joined</button>
                    <?php endif; ?>
                <?php else: ?> 
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Join In</button> 
                <?php endif; ?>
                
                </div>
            </div>
        </div>

        <div class="community_hr my-4"></div>
        <div class="community_joined">
            <div class="community_joined_row">
                <h4 class="community_subtitle">
                    Community Settings
                </h4>
                <div class="row mb-2">
                    <div class="row mb-2">
                        <div class="col-12 row align-items-center">
                            <h5 class="m-0">Categories</h5>

                        </div>
                        <?php foreach ($community_category as $key => $value) : ?>
                            <div class="d-flex p-3 bg-light align-items-center col-sm-12 pt-4">

                                <div class="col-sm-11 p-0" id="headingOne">
                                    <a href="#" class="d-block text-left" data-toggle="collapse" data-target="#collapseOne<?= $key ?>">
                                        <b><?= $value['category_name'] ?></b></a>
                                </div>
                                <div class="col-sm">
                                    <div class="dropdown float-right">
                                        <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <!-- <i class="fa fa-cog"></i> -->
                                        </a>

                                    </div>

                                </div>

                            </div>

                            <?php if (empty($value['subclass'])) : ?>
                                <div id="collapseOne<?= $key ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <?php else : ?>
                                    <div id="collapseOne<?= $key ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <?php endif; ?>

                                    <?php if (!empty($value['subclass'])) : ?>
                                        <?php foreach ($value['subclass'] as $key1 => $value1) : ?>
                                            <div class="d-flex p-3 bg-light align-items-center col-sm-12">
                                                <div class="col-sm-11 p-0" id="headingOne">
                                                    <a href="<?= base_url(); ?>/play/<?= $community_list[0]->slug ?>/<?= $community_list[0]->id;  ?>/<?= $value1['id'] ?>">
                                                   
                                                        <b><?= $value1['subclass'] ?></b></a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <div class="d-flex p-3 bg-light align-items-center col-sm-12">
                                            <div class="col-sm-11 p-0" id="headingOne">
                                                <a href="<?= base_url(); ?>/community/<?= $community_list[0]->id ?>/<?= $value['id'] ?>" class="d-block text-left">
                                                    <b>Notice</b></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    </div>

                                <?php endforeach; ?>
                                </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="community-feed bg-white dm_bg-dark2">

            <div class="page-header header-filter m-auto" style="background-image: url('<?= base_url(); ?>/public/admin/uploads/community/<?= $community_list[0]->name; ?>')">

            </div>

            <div class="col-sm ">
                <div class="container row my-2">
                    <div class="col-md-6">
                        <nav class="nav" aria-label="breadcrumb">
                            <ol class="breadcrumb bg-white">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>/community-home">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>/communities">Communities</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Test Community</li>

                            </ol>
                        </nav>
                        
                    </div>
                    <div class="col-sm">
                        <ul class="nav nav-pills nav-pills justify-content-end px-0 align-items-center view-options" role="tablist">
                            <li class="nav-item " onclick="toggleView(0)">
                                <a class="nav-link p-0 m-0 rounded active show" href="#grid" role="tab" id="community-grid-tab" data-toggle="pill" aria-controls="grid" aria-selected="true">
                                    <i class="fa fa-th"></i>
                                </a>
                            </li>
                            <li class="nav-item " onclick="toggleView(1)">
                                <a class="nav-link p-0 m-0 rounded" href="#list" role="tab" data-toggle="pill" aria-controls="list" id="community-list-tab" aria-selected="false">
                                    <i class="fa fa-list "></i>
                                </a>
                            </li>
                            <li class="nav-item " onclick="toggleView(2)">
                                <a class="nav-link p-0 m-0 rounded" href="#longbars" role="tab" data-toggle="pill" aria-controls="longbars" id="community-longbars-tab" aria-selected="false">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                            <li class="nav-item " onclick="toggleView(3)">
                                <a class="nav-link p-0 m-0 rounded" href="#bars" role="tab" data-toggle="pill" aria-controls="bars" id="community-bars-tab" aria-selected="false">
                                    <i class="fa fa-align-justify"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <hr/>

                <?php if (!empty($users_community[0])) : ?>
                    <?php if($users_community[0]->status == 1): ?>           
                        <div class="accordion border border-light rounded p-3" id="create_post_accordion">
                            <div class="">
                                <div class="" id="create_post_header">
                                    <h2 class="m-0">
                                        <button class="btn btn-link btn-block text-left m-0" type="button" data-toggle="collapse" data-target="#create_post_body" aria-expanded="false" aria-controls="collapseOne">
                                            Write new post <i class="fa fa-news"></i>
                                        </button>
                                    </h2>
                                </div>

                                <div id="create_post_body" class="collapse" aria-labelledby="create_post_header" data-parent="#create_post_accordion">
                                <input type="hidden" name="base" value="<?= base_url(); ?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="pb-1">
                                        <div class="input-group">
                                            <input type="text" id="title" name="title" class="form-control" placeholder="Add Your Heading Text Here" value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ce-example__content _ce-example__content--small" style="padding-bottom: 0px !important;">
                                <div id="editorjs"></div>
                            </div>

                            <div class="">
                                <input type="text" data-role="tagsinput" class="form-control" id="tags" name="tags" placeholder="Tags">
                            </div>
                            <div>
                            </div>
                            <input type="hidden" name="category_id" value="<?= $subclass['category_id']; ?>">
                            <input type="hidden" name="subclass_id" value="<?= $subclass['id']; ?>">
                            <input type="hidden" name="community_id" id="community-id" value="<?= $community_list[0]->id; ?>">
                            <div class="ce-example__button" id="saveButton">
                                Save Post
                            </div>
                                </div>
                            </div>

                        </div>
                    <?php else: ?>
                        <script type="text/javascript">
                            alertify.warning('You are not joined to this community!');
                        </script>
                    <?php endif; ?>
                <?php else: ?>
                    <!-- <div class="alert alert-info">
                                        <div class="container">
                                            <div class="alert-icon">
                                                <i class="material-icons">info_outline</i>
                                            </div>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                                            </button>
                                            <b>Info alert:</b> You are not joined to this community!
                                        </div>
                                    </div>
                                                                         -->
                                <script type="text/javascript">
                                    alertify.warning('You are not joined to this community!');
                                </script>
              
                <?php endif; ?>
                <div class="container d-flex  p-0 community-join_inner">

                    <div class="col-lg-12 bg-gray p-0">
                        <div class="community-section">


                            <?php if (session('msg')) : ?>
                                <script type="text/javascript">
                                    alertify.success('<?= session('msg') ?>');
                               </script>            
                            <?php endif; ?>
                            <?php if (empty($users_community) && $community_list[0]->community_type == '1') : ?>
                            <?php else : ?>
                                <div class="col-md-12 px-0 of-hidden">
                                    
                                    <!-- <div class="row py-2" style="background-color:"> -->
                                    <!-- <div class="pt-2 community-info m-0">
                                        <div class="d-flex col-12 px-0 community-after-options justify-content-center">

                                            <ul class="nav nav-pills nav-pills-icons justify-content-center community-tab-opts px-0" role="tablist">
                                                <li class="nav-item active">
                                                    <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                                                        Hot
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#schedule-1" role="tab" data-toggle="tab">
                                                        Burning
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                                                        Notice
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> -->
                                  

                                    <div class="d-flex">
                                        <div class="tab-content bg-white pt-0 mt-0 col-lg-12">
                                            <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="community-grid-tab">
                                                <div id="grid-layout" class="card-body pt-0">
                                                    <?php if (!empty($posts[0])) : ?>
                                                        <div class="row">
                                                            <?php foreach ($posts[0] as $key => $value) : ?>


                                                                <div class="col-xs-12 col-sm-6 col-md-3">
                                                                    <div class="card text-center">
                                                                        <?php
                                                                                    $postContent = unserialize($value->content);
                                                                                    $hasImage = false;
                                                                                    $thumbnail = null;
                                                                                    foreach ($postContent as $key => $content) {
                                                                                        if ($content["type"] == "image") {
                                                                                            $thumbnail = $content["data"]["file"]["url"];
                                                                                            break;
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                        <?php
                                                                                    if ($thumbnail != null) {
                                                                                        ?>
                                                                            <img class="card-img-top" style=" object-fit: cover; height: 200px" src="<?= $thumbnail ?>" alt="">
                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                            <img class="card-img-top" style=" object-fit: cover;" src="<?= base_url(); ?>/public/dummy/post.jpg" alt="">
                                                                            <!-- <img class="card-img-top" style=" object-fit: cover;" src="<?= base_url(); ?>/public/dummy/post.jpg" alt=""> -->
                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                        <div class="card-body">
                                                                            <h4 class="card-title">
                                                                                <?= character_limiter($value->title, 40) ?>
                                                                            </h4>

                                                                            <h6 class=" text-muted "> <a href="#"><?= $value->nickname; ?></a>
                                                                            </h6>
                                                                            <h6 class="card-subtitle mb-2 text-muted">
                                                                                <?= date('M d, Y',strtotime($value->updated_at)) ?>
                                                                            </h6>
                                                                            <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>" class=" btn btn-primary btn-sm stretched-link">
                                                                                Read More
                                                                            </a>
                                                                        </div>


                                                                    </div>
                                                                </div>

                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php else : ?>
                                                        <div class="col-lg-12  mb-4">
                                                            <div class="card justify-content-center text-center" style="height:30vh;">
                                                                <div class="card-bod">
                                                                    <h4 class="card-title justify-content-center">No Post Yet</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div id="horizontal-layout" class="card-body pt-0 row " style="display: none">
                                                    <?php if (!empty($posts[0])) : ?>
                                                        <?php foreach ($posts[0] as $key => $value) : ?>

                                                            <div class="col-xs-12 col-sm-12 ">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <?php if ($value->thumbnail) : ?>
                                                                                <img style=" object-fit: cover;height: 100px; width: auto;" src="<?= base_url(); ?>/public/post_photos/<?= $value->thumbnail; ?>" alt="">
                                                                            <?php else : ?>
                                                                                <img style=" object-fit: cover;height: 100px; width: auto;" src="<?= base_url(); ?>/public/dummy/post.jpg" alt="">
                                                                            <?php endif; ?>
                                                                            <span>
                                                                                <h4 class="card-title">
                                                                                    <?= character_limiter($value->title, 40) ?>
                                                                                </h4>
                                                                                <?php if ($value->tags) : ?>
                                                                                    <?php
                                                                                                    $tags = explode(",", $value->tags);
                                                                                                    ?>
                                                                                    <?php foreach ($tags as $key1 => $value1) : ?>
                                                                                        <span class="badge badge-pill badge-info"><?= $value1 ?></span>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </span>
                                                                            <span>
                                                                                <h6 class=" text-muted ">Posted By: <a href="#"><?= $value->nickname; ?></a></h6>
                                                                                <h6 class="card-subtitle mb-2 text-muted">
                                                                                    <?= $value->updated_at ?>
                                                                                </h6>
                                                                            </span>
                                                                            <span>
                                                                                <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>">
                                                                                    <button class="btn btn-primary btn-sm">read more</button>
                                                                                </a>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php endforeach; ?>
                                                    <?php else : ?>
                                                        <div class="col-lg-12  mb-4">
                                                            <div class="card justify-content-center text-center" style="height:30vh;">
                                                                <div class="card-bod">
                                                                    <h4 class="card-title justify-content-center">No Post Yet</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div id="list-layout" class="card-body pt-0 row " style="display: none">
                                                    <?php if (!empty($posts[0])) : ?>
                                                        <?php foreach ($posts[0] as $key => $value) : ?>

                                                            <div class="col-xs-12 col-sm-12 ">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="d-flex w-100 justify-content-between">
                                                                            <span>
                                                                                <h4 class="card-title">
                                                                                    <?= character_limiter($value->title, 40) ?>
                                                                                </h4>

                                                                                <?php if ($value->tags) : ?>
                                                                                    <?php
                                                                                                    $tags = explode(",", $value->tags);
                                                                                                    ?>
                                                                                    <?php foreach ($tags as $key1 => $value1) : ?>
                                                                                        <span class="badge badge-pill badge-info"><?= $value1 ?></span>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </span>
                                                                            <span>
                                                                                <h6 class=" text-muted ">Posted By: <a href="#"><?= $value->nickname; ?></a></h6>
                                                                                <h6 class="card-subtitle mb-2 text-muted">
                                                                                    <?= $value->updated_at ?>
                                                                                </h6>
                                                                            </span>
                                                                            <span>
                                                                                <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>">
                                                                                    <button class="btn btn-primary btn-sm">read more</button>
                                                                                </a>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php endforeach; ?>
                                                    <?php else : ?>
                                                        <div class="col-lg-12  mb-4">
                                                            <div class="card justify-content-center text-center" style="height:30vh;">
                                                                <div class="card-bod">
                                                                    <h4 class="card-title justify-content-center">No Post Yet</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div id="table-layout" class="card-body pt-0 row " style="display: none">
                                                    <?php if (!empty($posts[0])) : ?>
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <th>Tags</th>
                                                                    <th>Author</th>
                                                                    <th>Updated</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($posts[0] as $key => $value) : ?>
                                                                    <tr>
                                                                        <td><?= character_limiter($value->title, 40) ?></td>
                                                                        <td>
                                                                            <?php if ($value->tags) : ?>
                                                                                <?php
                                                                                                $tags = explode(",", $value->tags);
                                                                                                ?>
                                                                                <?php foreach ($tags as $key1 => $value1) : ?>
                                                                                    <span class="badge badge-pill badge-info"><?= $value1 ?></span>
                                                                                <?php endforeach; ?>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?= $value->nickname; ?></td>
                                                                        <td><?= $value->updated_at ?></td>
                                                                        <td>
                                                                            <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>">
                                                                                <button class="btn btn-primary btn-sm">read more</button>
                                                                            </a>
                                                                        </td>
                                                                    </tr>

                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    <?php else : ?>
                                                        <div class="col-lg-12  mb-4">
                                                            <div class="card justify-content-center text-center" style="height:30vh;">
                                                                <div class="card-bod">
                                                                    <h4 class="card-title justify-content-center">No Post Yet</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Classic Modal -->
            <div class="modal  fade " id="myModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content ">
                        <div class="modal-header bg-primary py-3 align-items-center">
                            <h5 class="create-post-title modal-title w-100 fw600 m-0 text-white">Join In</h5>
                            <button type="button " class="close bg-danger text-white btn-link p-2 rounded-circle" data-dismiss="modal" aria-label="Close">
                                <i class="material-icons">clear</i>
                            </button>
                        </div>

                        <div class="modal-body ">
                        <form class="contact-form" action="<?= base_url(); ?>/join_community" method="post">
                            <div class="form-group">
                                <label>Reason</label>
                                <textarea name="answer" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <input type="hidden" name="community_id" value="<?= $community_list[0]->id; ?>">
                            <button type="submit" class="btn btn-primary btn-raised btn-sm">
                            Submit
                            </button>
                        </form>
                        </div>

                        <div class="modal-footer d-block">
                            <button type="button" class="btn bg-danger text-white btn-link float-right" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <script>
        var viewLayout = 0
        window.onload = () => {
            console.log("page onload function")
        }
        toggleView = id => {
            viewLayout = id
            document.querySelector('#grid-layout').style.display = "none";
            document.querySelector('#horizontal-layout').style.display = "none";
            document.querySelector('#list-layout').style.display = "none";
            document.querySelector('#table-layout').style.display = "none";

            switch (viewLayout) {
                case 0:
                    document.querySelector('#grid-layout').style.display = "block";
                    break;
                case 1:
                    document.querySelector('#horizontal-layout').style.display = "block";
                    break;
                case 2:
                    document.querySelector('#list-layout').style.display = "block";
                    break;
                case 3:
                    document.querySelector('#table-layout').style.display = "block";
                    break;
                default:
                    break;
            }

        }
        toggleView(0);

        document.querySelector("#saveButton").addEventListener('click', function() {
            editor.save().then((savedData) => {
                // cPreview.show(savedData, document.getElementById("output"));
                console.log(savedData.blocks);
                var base_url = $('input[name=base]').val();
                var title = $("input[name=title]").val();
                var community_id = $("input[name=community_id]").val();
                var content = savedData;
                var tags = $("input[name=tags]").val();
                var category_id = $("input[name=category_id]").val();
                var subclass_id = $("input[name=subclass_id]").val();

                var data = {
                    'content': content,
                    'title': title,
                    'community_id': community_id,
                    'tags': tags,
                    'category_id': category_id,
                    'subclass_id': subclass_id
                };

                if (title == '' || content == '' || community_id == '' || tags == '' || category_id == '' || subclass_id == '') {
                    alert('Please fill out the fields!');
                } else {
                    $.ajax({
                        type: "POST",
                        url: base_url + '/save_post',
                        data: data,
                        dataType: "JSON",
                        success: function(data) {
                            alertify.success(data.msg);
                            location.reload();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert('There is an error!');
                        }
                    });
                }
            });
        });
    </script>