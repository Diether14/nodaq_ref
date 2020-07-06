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
        min-height: 270px;
        max-height: 500px;
        height: 400px;  
    }
    
    .card .card-body,
    .card .card-footer {
        padding: 0 !important;
    }
    /* .rounded-circle1 {
    height: 42px !important;
  } */
</style>

<div class="page-header header-filter" data-parallax="true" style="background-image: url('<?= base_url(); ?>/public/admin/uploads/community/<?= $community_list[0]->name; ?>')">
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


<div class="main row">

    <div class="col-lg-3 card card-body m-0">
        <div class="sidebar-item text-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row-item">
                        <h3 class="community-title">
                            <?= $community_list[0]->title; ?>
                        </h3>
                    </div>
                    <div class="row-item">
                        <i class="fa fa-lock"></i>
                        <small class="community-status fw-600">Private Community</small>
                    </div>
                    <div class="row-item">
                        <?php if (empty($users_community)) : ?>
                        <form class="contact-form" action="<?= base_url(); ?>/join_community" method="post">
                            <input type="hidden" name="community_id" value="<?= $community_list[0]->id; ?>">
                            <button type="submit" class="btn btn-primary btn-raised btn-sm">
                  Join Community
                </button>
                        </form>
                        <?php else : ?>
                        <button class="btn btn-primary btn-raised btn-sm">
                Joined
              </button>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <h5 class="pt-3 pb-0 bold">Categories</h5>
                   
                </div>
                <div class="col-sm-12 px-0 mx-0">
                    <div class="accordion" id="accordionExample">
                        <div class="card my-0 rounded-0 ">
                            <div class="text-center bg-primary" id="headingOne">
                                <h2 class="my-0">
                                    <button class="btn btn-link btn-block dropdown-toggle text-left text-white" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Category 2
        </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <ul class="list-group px-4">
                                        <li class="list-group-item">Sub Class1</li>
                                        <li class="list-group-item " style="background:#dcdcdc">Sub Class1</li>
                                        <li class="list-group-item">Sub Class1</li>
                                        <li class="list-group-item">Sub Class1</li>
                                        <li class="list-group-item">Sub Class1</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card my-0 rounded-0">
                            <div class="text-center" id="headingTwo">
                                <h2 class="my-0">
                                    <button class="btn btn-link btn-block dropdown-toggle text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Category 3
        </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <ul class="list-group px-4">
                                        <li class="list-group-item">Sub Class1</li>
                                        <li class="list-group-item">Sub Class1</li>
                                        <li class="list-group-item">Sub Class1</li>
                                        <li class="list-group-item">Sub Class1</li>
                                        <li class="list-group-item">Sub Class1</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card my-0 ">
                            <div class="text-center" id="headingThree">
                                <h2 class="my-0">
                                    <button class="btn btn-link btn-block dropdown-toggle text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Category 1
        </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <ul class="list-group px-4">
                                        <li class="list-group-item">Sub Class1</li>
                                        <li class="list-group-item">Sub Class1</li>
                                        <li class="list-group-item">Sub Class1</li>
                                        <li class="list-group-item">Sub Class1</li>
                                        <li class="list-group-item">Sub Class1</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="sidebar-item">
            <div class="row">
                <div class="col-lg">

                </div>
                <div class="col-lg">

                </div>
                <div class="col-lg">

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <!-- <div class="card-body text-center">
    <div class="row">
      <div class="col-lg">
        <h3 class="community-title"><?= $community_list[0]->title; ?></h3>
        <div class="col-lg">
          <i class="fa fa-lock"></i>
          <small class="community-status">Private Community</small> <small class="lh-1 fw-600">.</small> <small class="community-member_count">100 members</small>
        </div>
      </div>
    </div>
  </div> -->
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

            <div class="row">


                <div class="col-md-12 px-0">
                    <?php if (empty($users_community)) : ?>
                    <div class="alert alert-info">
                        <div class="container">
                            <div class="alert-icon">
                                <i class="material-icons">info_outline</i>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                  </button>
                            <b>Info alert:</b> You must join to the community first, inorder to be able to add post and add comments.
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- <div class="row py-2" style="background-color:<?= $community_list[0]->color; ?>"> -->
                    <div class="row pt-2">
                        <div class="row row align-items-center w-100 py-3 px-2">
                            <div class="col-sm-8 d-flex justify-content-start">
                                <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                                    <li class="nav-item ">
                                        <a class="nav-link p-0 m-0 active show" href="#grid" role="tab" id="community-grid-tab" data-toggle="pill" aria-controls="grid" aria-selected="true">
                                            <i class="fa fa-th"></i>

                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link p-0 m-0" href="#list" role="tab" data-toggle="pill" aria-controls="list" id="community-list-tab" aria-selected="false">
                                            <i class="fa fa-list "></i>

                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link p-0 m-0" href="#bars" role="tab" data-toggle="pill" aria-controls="bars" id="community-bars-tab" aria-selected="false">
                                            <i class="fa fa-bars"></i>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
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
                            </div>
                        </div>

                        <!-- <div class="pt-2 col-12">
                            <hr>
                        </div> -->
                        <div class="col-sm-12 mb-0 pt-0 d-flex justify-content-center  text-white pt-3">
                            <ul class="nav nav-pills nav-pills-icons justify-content-center community-tab-opts" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
                      All Post
                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#schedule-1" role="tab" data-toggle="tab">
                      Minor Hot Board
                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
                      Notice
                    </a>
                                </li>
                                <!-- <li class="nav-item">
                <a class="nav-link" href="#community-about" role="tab" data-toggle="tab">

                  About
                </a>
              </li> -->
                            </ul>
                        </div>

                    </div>
                    <div class="tab-content tab-space pt-0 mt-0">
                        <div class="tab-pane fade show active" id="grid" role="tabpanel" aria-labelledby="community-grid-tab">
                            <div class="card-body pt-0">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home">

                                        <div class="tab-content-section row">



                                            <?php for ($i = 0; $i <= 1; $i++) : ?>
                                            <?php foreach ($posts[$i] as $key => $value) : ?>
                                            <div class="col-md-4 ">

                                                <div class="team-player ">
                                                    <div class="custom-card card p-3">

                                                        <div class="profile-photo-small d-flex">

                                                            <?php if (!empty($value->name)) : ?>

                                                            <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>" alt="Circle Image" class="rounded-circle img-fluid z-depth-2">

                                                            <?php else : ?>
                                                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image" class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar">

                                                            <?php endif; ?>

                                                            <div class=" m-0 p-0 ">
                                                                <?php if (session()->get('id') == $value->user_id) : ?>
                                                                <a href="<?= base_url(); ?>/profile">
                                                                    <h4 class="card-title pl-2 mt-0 mb-0">
                                                                        <?= $value->nickname; ?>
                                                                </a>
                                                                <?php else : ?>
                                                                <a href="<?= base_url(); ?>/view-profile/<?= $value->user_id; ?>">
                                                                    <h4 class="card-title pl-2 mt-0 mb-0">
                                                                        <?= $value->nickname; ?>
                                                                </a>
                                                                <?php endif; ?>
                                                                </h4>
                                                                <p class="small pl-2 m-0">
                                                                    <?php
                                                                  echo $value->updated_at;
                                                                  // echo date('h:i A', $value->updated_at);     
                                                                  ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <p class="text">
                                                            <?= $value->content ?>
                                                        </p>
                                                        <div class="card-body">
                                                            <img src="https://melcap.com/wp-content/uploads/2017/04/placeholder.jpg" class="img-fluid " alt="">
                                                            <p class="m-0 p-0 card-description">
                                                                <?= character_limiter($value->description, 180) ?>
                                                            </p>
                                                        </div>
                                                        <div class="card-footer justify-content-center">
                                                            <?php if ($value->post_id) : ?>
                                                            <a href="<?= base_url(); ?>/post-share/<?= $value->post_id ?>/<?= $community_id ?>" class="btn btn-link m-0 p-2"><i class="fa fa-eye m-0 p-0"></i> View Post </a>
                                                            <?php else : ?>
                                                            <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>" class="btn btn-link m-0 p-1"><i class="fa fa-eye m-0 p-0"></i> View Post</a>
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; ?>


                                            <?php endfor; ?>

                                            <!-- <php foreach($shared as $key => $value): ?> -->

                                            <!-- <div class="col-md-4">
                <div class="custom-card card ">

                 <div class="team-player">
                  <div class="profile-photo-small m-2 d-flex">
                   
                    <php if(!empty($value->name)): ?>

                    <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>"
                      alt="Circle Image" class="rounded-circle img-fluid z-depth-2">

                    <php else: ?>
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                      class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar">

                    <php endif; ?> 

                    <div class="m-0 p-0">
                      
                      <h4 class="card-title pl-2 mt-0 mb-0"><= $value->nickname; ?>
                      <span class="fa fa-share small" style="float-right"></span>
                      </h4>
                      <p class="small pl-2 m-0">1 hour ago </p>
                      <p class="text p-0 m-0">
                        <= $value->content ?>

                      </p>

                    </div>

                  </div>

                  </div>
                  <div class="card-footer justify-content-center">
                    <a href="<= base_url(); ?>/post-share/<= $value->id ?>/<= $community_id ?>" class="btn btn-link m-0 p-2"><i
                          class="fa fa-eye m-0 p-0"></i> 10 Views </a>
                          <a href="#" class="btn btn-link m-0 p-2"><i class="fa fa-comments m-0 p-0"></i> 50 Comments</a>  
                      <a href="#" class="btn btn-link m-0 p-2"><i class="fa fa-share m-0 p-0"></i> 2 Shares</a>

                    </div>
                </div>
                
              </div> -->
                                            <!-- <php //endforeach; ?> -->




                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="bars" role="tabpanel" aria-labelledby="community-list-tab">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Subclass</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i <= 1; $i++) : ?>
                                    <?php foreach ($posts[$i] as $key => $value) : ?>
                                    <tr>
                                        <td scope="row">Coffee</td>
                                        <td>Title1</td>
                                        <td>
                                            <?= $value->nickname; ?>
                                        </td>
                                        <td>12:25</td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endfor; ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="community-bars-tab">
                        <?php for ($i = 0; $i <= 1; $i++) : ?>
                                    <?php foreach ($posts[$i] as $key => $value) : ?>
                            <div class="row py-3 px-3 ">
                          
                                <div class="col-sm-3">
                                    <a href="#">
                                        <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="">
                                    </a>
                                </div>
                                
                                <div class="col-sm-9">
                                    <h2 class="card-title"><?= $value->nickname; ?></h2>
                                    <p class="card-text">samp</p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                                    <?php endfor; ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <?php endif; ?>
    </div>

</div>
</div>

<!-- Classic Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
        </button>
            </div>
            <div class="modal-body">

                <div class="card container">
                    <div class="form-group ">
                        <div class="input-group">
                            <input type="text" id="title" name="title" class="form-control" placeholder="Title..." value="" required>
                        </div>
                    </div>
                </div>
                <div class="card container">
                    <div class="form-group">
                        <textarea name="description" class="form-control" placeholder="Tags..." cols="30" rows="5"></textarea>
                    </div>
                </div>

                <div class="card my-auto mx-auto">
                    <h4 class="h4 p-3">Post Content</h4>


                    <div id="editor">
                        <h1>Hello world!</h1>
                        <p>I'm an instance of <a href="https://ckeditor.com">CKEditor</a>.</p>
                        <!-- <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                            class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar"> -->
                    </div>

                </div>
                <!-- <div class="card container p-3 ">
        <label for="">Tag People</label>
        <input type="text" data-role="tagsinput" class="form-control" >
        </div> -->
                <!-- <div> -->
                <!-- <div class="card container p-3">
        <div class="input-group">
              <input type="file" name="file" class="text-center center-block file-upload" accept=".png, .jpg, .jpeg">
            </div>
        </div>
        </div> -->
                <input type="hidden" name="community_id" id="community-id" value="<?= $community_list[0]->id; ?>">
                <div class="mt-3">

                    <button id="save_post" class="btn btn-primary">Save</button>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--  End Modal -->