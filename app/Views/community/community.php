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

<div class="page-header header-filter m-auto" data-parallax="true"
    style="background-image: url('<?= base_url(); ?>/public/admin/uploads/community/<?= $community_list[0]->name; ?>')">
    <!-- <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title"><?= $community_list[0]->title; ?></h1>
        <h4><?= $community_list[0]->content; ?></h4>
        <br>
        <?php if (empty($users_community)) : ?>
        <form class="contact-form" action="<?= base_url(); ?>/join_community" method="post">
          <input type="hidden" name="community_id" value="<?= $community_list[0]->id; ?>">
          <button type="submit" class="btn btn-primary btn-raised btn-lg">
            Join Community
          </button>
        </form>
        <?php else : ?>
        <button class="btn btn-primary btn-raised btn-lg">
          Joined
        </button>
        <?php endif; ?>
      </div>
    </div>
  </div> -->
</div>

<div class="card">
    <nav class="container mt-3  bg-white" aria-label="breadcrumb">
        <ol class="breadcrumb m-0  bg-white">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Communities</a></li>
            <li class="breadcrumb-item active" aria-current="page">Test Community</li>
        </ol>
    </nav>

    <div class="container d-flex  p-0 community-join_inner">

        <div class="col-lg-12 bg-gray p-0">
            <div class="community-section">


                <?php if (session('msg')) : ?>
                <div class="alert alert-info">
                    <div class="container">
                        <div class="alert-icon">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                        </button>
                        <b>Info alert:</b>
                        <?= session('msg') ?>
                    </div>
                </div>
                <br>
                <?php endif; ?>
                <?php if (empty($users_community) && $community_list[0]->community_type == '1') : ?>
                <?php else : ?>
                <div class="col-md-12 px-0 of-hidden">
                    <?php if (empty($users_community)) : ?>
                    <div class="alert alert-info">
                        <div class="container">
                            <div class="alert-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="material-icons">clear</i></span>
                            </button>
                            <b>Info alert:</b> You must join to the community first, inorder to be able to add post and
                            add comments.
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- <div class="row py-2" style="background-color:<?= $community_list[0]->color; ?>"> -->
                    <div class="row pt-2 bg-white community-info m-0">
                        <div class="d-flex align-items-center w-100  px-2">
                            <div class="col-lg-12 row community-info-area  align-items-center">
                                <div class="col-sm-4 d-flex justify-content-start">
                                    <div class="col-12 ">
                                        <h3 class="community-title">
                                            <?= $community_list[0]->title; ?>
                                        </h3>
                                        <?php if($community_list['community_type'] == '1'): ?>
                                        <i class="fa fa-lock"></i>
                                        <small class="community-status fw-600">Private Community </small>
                                        <?php else: ?>
                                        <i class="fa fa-lock"></i>
                                        <small class="community-status fw-600">Public Community </small>
                                        <?php endif; ?>
                                        <div class="justify-content-center ">
                                        <?php 
                                        if ($users_community[0]->status == '1') : ?>
                                            <button type="submit" class="btn btn-primary btn-raised btn-sm">
                                                Joined
                                            </button>
                                            <?php else : ?>
                                            <button class="btn btn-primary btn-raised btn-sm">
                                                Join In
                                            </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <ul class="nav nav-pills nav-pills justify-content-end px-0 view-options"
                                        role="tablist">
                                        <li class="nav-item ">
                                            <a class="nav-link p-0 m-0 active show" href="#grid" role="tab"
                                                id="community-grid-tab" data-toggle="pill" aria-controls="grid"
                                                aria-selected="true">
                                                <i class="fa fa-th"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link p-0 m-0" href="#list" role="tab" data-toggle="pill"
                                                aria-controls="list" id="community-list-tab" aria-selected="false">
                                                <i class="fa fa-list "></i>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link p-0 m-0" href="#longbars" role="tab" data-toggle="pill"
                                                aria-controls="longbars" id="community-longbars-tab"
                                                aria-selected="false">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link p-0 m-0" href="#bars" role="tab" data-toggle="pill"
                                                aria-controls="bars" id="community-bars-tab" aria-selected="false">
                                                <i class="fa fa-align-justify"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <div class="team-player create-post">
                                                <div class="card custom-card card-body justify-content-center m-0 p-0">
                                                    <?php if (!empty($users_community)) : ?>
                                                    <a class="nav-link" data-toggle="modal" data-target="#myModal">
                                                        <i class="fa fa-plus"></i></a>
                                                    <?php else : ?>
                                                    <a id="not_joined" class="btn btn-link">
                                                        <i class="fa fa-plus"></i> </a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex col-12 px-0 community-after-options justify-content-center">
                        
                            <ul class="nav nav-pills nav-pills-icons justify-content-center community-tab-opts px-0"
                                role="tablist">
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
                    </div>
                    <div class="d-flex">
                        <div class="tab-content pt-0 mt-0 col-lg-12">
                            <div class="tab-pane fade show active" id="grid" role="tabpanel"
                                aria-labelledby="community-grid-tab">
                                <div class="card-body pt-0 row">
                                    <?php if(!empty($posts[0])): ?>
                                    <?php foreach ($posts[0] as $key => $value) : ?>

                                    <div class="col-lg-4 mb-4">
                                        <div class="card text-center">
                                            <?php if($value->thumbnail): ?>
                                                <img class="card-img-top" style=" object-fit: cover;"
                                                    src="<?= base_url(); ?>/public/post_photos/<?= $value->thumbnail; ?>" alt="">
                                            <?php else: ?>
                                                <img class="card-img-top" style=" object-fit: cover;"
                                                src="<?= base_url(); ?>/public/dummy/post.jpg" alt="">
                                            <?php endif; ?>
                                            <div class="card-body">
                                                <h4 class="card-title"><?= character_limiter($value->title, 40) ?></h4>
                                                <h6 class="card-subtitle mb-2 text-muted"><?= $value->category_name ?> | <?= $value->subclass ?></h6>
                                                <?php if($value->tags): ?>
                                                <?php 
                                                       $tags = explode (",", $value->tags);      
                                                ?>
                                                <?php foreach ($tags as $key1 => $value1): ?>
                                                    <span class="badge badge-pill badge-info"><?= $value1 ?></span>
                                                <?php endforeach; ?>
                                                <?php endif; ?>

                                            </div>

                                            <h6 class=" text-muted ">Posted By: <a href="#"><?= $value->nickname; ?></a>
                                            </h6>
                                            <h6 class="card-subtitle mb-2 text-muted"><?= $value->updated_at ?></h6>
                                            <!-- <a class="px-2 " href="#"><?= $value->updated_at ?></a> -->
                                            <div class="card-footer justify-content-center">
                                            <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>">
                                                <button class="btn btn-primary btn-sm">read more</button>
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <div class="col-lg-4  mb-4">
                                        <div class="card justify-content-center text-center">
                                            <!-- <img class="card-img-top"style=" object-fit: cover;" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg" alt=""> -->
                                            <div class="card-body ">
                                                <h4 class="card-title ">No Post Yet</h4>
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
<div class="modal  fade community-create-post" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-primary py-3 align-items-center">
                <h5 class="create-post-title modal-title w-100 fw600 m-0 text-white">Create Post</h5>
                <button type="button " class="close bg-danger text-white btn-link p-2 rounded-circle"
                    data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>
          
            <div class="modal-body ">
            <form method="post" id="upload_form" enctype="multipart/form-data">
            <input type="hidden" name="base" value="<?= base_url(); ?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pb-1">
                        <div class="input-group">
                            <input type="text" id="title" name="title" class="form-control" placeholder="Add Your Heading Text Here"
                                value="" required>
                        </div>
                    </div>
                </div>

                </div>
                
                <div class="ce-example__content _ce-example__content--small"  style="padding-bottom: 0px !important;">
                    <div id="editorjs"></div>
                </div>
               
                <div class="">
                    <input type="text" data-role="tagsinput" class="form-control" id="tags" name="tags" placeholder="Tags" >
                </div> 
                <div>    
                </div>
                <input type="hidden" name="community_id" id="community-id" value="<?= $community_list[0]->id; ?>">
                <div class="ce-example__button" id="saveButton">
                    Save Post
                </div>
            </div>
          
            <div class="modal-footer d-block">
                <button type="button" class="btn bg-danger text-white btn-link float-right"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary float-left">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
 