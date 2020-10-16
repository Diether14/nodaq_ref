<div class="main bg-light">
    <div class="container">
        <div class="section ">
            <div class="my-3">
                <h3>Search Results for "
                    <?= $q ?>"</h3>
            </div>
            <hr>
            <div class="col-sm-6 bg-white px-0">
                <ul class="nav nav-pills nav-pills-icons px-0" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link p-4" href="#all-reults" role="tab" data-toggle="tab">
                            All
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-4 active" href="#community-results" role="tab" data-toggle="tab">
                            Communities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-4" href="#posts-reults" role="tab" data-toggle="tab">
                            Posts
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-12 card m-0">

                <div class="tab-content tab-space">
                    <div class="tab-pane " id="all-reults">
                        <?php if(!empty($community_list)): ?>

                        <div class="team">
                            <div class="row">
                                <?php foreach ($community_list as $key => $value): ?>

                                <div class="col-md-8 m-auto">
                                    <div class="tab-pane fade active show" id="list" role="tabpanel"
                                        aria-labelledby="community-bars-tab">
                                        <div class="col-sm-12">

                                            <div class="card my-2 col-sm-12">
                                                <div class="row py-3 px-3 ">

                                                    <div class="col-md-3 align-items-center d-flex">
                                                        <a href="#">
                                                            <img class="img-fluid rounded"
                                                                src="<?= base_url(); ?>/public/admin/uploads/community/<?= $value->name ?>"
                                                                alt="">
                                                        </a>
                                                    </div>

                                                    <div class="col-md-9">
                                                        <h4 class="card-title py-3 my-0">

                                                            <a href="community/<?= $value->id;  ?> "><?= character_limiter($value->title, 15) ?>
                                                            </a>
                                                            <a href="#" data-toggle="modal" data-target="#myModal"><i
                                                                    class="fa fa-ellipsis-h pl-3"
                                                                    style="float: right;"></i></a>
                                                            <a href="#communityInfo<?= $key ?>" data-toggle="modal"
                                                                data-target="#communityInfo<?= $key ?>"><i
                                                                    class="fa fa-info-circle p-0"
                                                                    style="float:right;"></i></a>
                                                        </h4>
                                                        <hr class="m-0">
                                                        <p class="card-text">
                                                            <?= character_limiter('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at nulla sit amet nulla ornare eleifend') ?>
                                                        </p>
                                                        <p class="card-text">
                                                            <?=rand(200, 20000);?> members</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                        <?php endif; ?>
                        <hr>
                        <?php if(!empty($posts)): ?>
                        <div class="row">

                            <?php foreach($posts as $key => $value): ?>
                            <div class="col-md-8 m-auto">

                                <div class="team-player">
                                    <div class="card custom-card1 p-3">

                                        <div class="profile-photo-small d-flex">

                                            <?php if(!empty($value->name)): ?>

                                            <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>"
                                                alt="Circle Image" class="rounded-circle img-fluid z-depth-2">

                                            <?php else: ?>
                                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                                alt="Circle Image"
                                                class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar">

                                            <?php endif; ?>

                                            <div class="m-0 p-0">
                                                <div class="d-flex align-items-center">

                                                    <h4 class="card-title pl-2 mt-0 mb-0">
                                                        <?= $value->nickname; ?>
                                                    </h4><i class="fa fa-caret-right mx-2"></i>
                                                    <h4 class="card-title mt-0 mb-0">Test Community</h4>
                                                </div>
                                                <p class="small pl-2 m-0">1 hour ago</p>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="card-body  m-0 p-0">
                                            <p class="m-0    p-0 card-description">
                                                test
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane active" id="community-results">
                        <?php if(!empty($community_list)): ?>

                        <div class="team">
                            <div class="row">
                                <?php foreach ($community_list as $key => $value): ?>

                                <div class="col-md-8 m-auto">
                                    <div class="tab-pane fade active show" id="list" role="tabpanel"
                                        aria-labelledby="community-bars-tab">
                                        <div class="col-sm-12">

                                            <div class="card my-2 col-sm-12">
                                                <div class="row py-3 px-3 ">

                                                    <div class="col-md-3 align-items-center d-flex">
                                                        <a href="#">
                                                            <img class="img-fluid rounded"
                                                                src="<?= base_url(); ?>/public/admin/uploads/community/<?= $value->name ?>"
                                                                alt="">
                                                        </a>
                                                    </div>

                                                    <div class="col-md-9">
                                                        <h4 class="card-title py-3 my-0">

                                                            <a href="community/<?= $value->id;  ?> "><?= character_limiter($value->title, 15) ?>
                                                            </a>
                                                            <a href="#" data-toggle="modal" data-target="#myModal"><i
                                                                    class="fa fa-ellipsis-h pl-3"
                                                                    style="float: right;"></i></a>
                                                            <a href="#communityInfo<?= $key ?>" data-toggle="modal"
                                                                data-target="#communityInfo<?= $key ?>"><i
                                                                    class="fa fa-info-circle p-0"
                                                                    style="float:right;"></i></a>
                                                        </h4>
                                                        <hr class="m-0">
                                                        <p class="card-text">
                                                            <?= character_limiter('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at nulla sit amet nulla ornare eleifend') ?>
                                                        </p>
                                                        <p class="card-text">
                                                            <?=rand(200, 20000);?> members</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane" id="posts-reults">
                        <?php if(!empty($posts)): ?>
                        <div class="row">

                            <?php foreach($posts as $key => $value): ?>
                            <div class="col-md-8 m-auto">

                                <div class="team-player">
                                    <div class="card custom-card1 p-3">

                                        <div class="profile-photo-small d-flex">

                                            <?php if(!empty($value->name)): ?>

                                            <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>"
                                                alt="Circle Image" class="rounded-circle img-fluid z-depth-2">

                                            <?php else: ?>
                                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                                                alt="Circle Image"
                                                class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar">

                                            <?php endif; ?>
                                            <div class="m-0 p-0">
                                                <div class="d-flex align-items-center">

                                                    <h4 class="card-title pl-2 mt-0 mb-0">
                                                        <?= $value->nickname; ?>
                                                    </h4><i class="fa fa-caret-right mx-2"></i>
                                                    <h4 class="card-title mt-0 mb-0">Test Community</h4>
                                                </div>
                                                <p class="small pl-2 m-0">1 hour ago</p>
                                            </div>
                                        </div>
                                        <hr>


                                        <div class="card-body  m-0 p-0">
                                            <p class="m-0 p-0 card-description">
                                                test description
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                        <?php endif; ?>
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
                <h5 class="modal-title">Anonymous mode?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    <form class="contact-form" action="<?= base_url() ?>/update_mode" method="post">
                        <div class="togglebutton">
                            <label>
                                <input type="checkbox" name="mode"
                                    <?= ($user_settings['user_mode'] == '1' ? 'checked': null)?>>
                                <span class="toggle"></span>
                                Anonymous mode
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-raised mt-3" id="btnSubmit">
                            Save
                        </button>
                    </form>
                </div>
                </hr><br>
            </div>
        </div>
    </div>
</div>