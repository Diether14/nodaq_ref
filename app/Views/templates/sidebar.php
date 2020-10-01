<div class="community-sidebar" data-parallax="true">
            <div class="community_header row align-items-center">
                <div class="community_title">
                    <h3>Communities</h3>
                </div>
            </div>
            <div class="community_new">
                <button type="button" class="btn btn-block bg-transparent community_new_btn" data-toggle="modal"
                    data-target="#myModal"><i class="fa fa-plus pr-2"></i>New Community</button>
            </div>
            <div class="community_hr my-4"></div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                </div>
                <input type="text" name="txtSearchCommunity" id="txtSearchCommunity" class="form-control"
                    placeholder="Search..">
            </div>

            <div id="community-sidebar-search" class="d-none">
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="#">
                                    asdf
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <p class="card-title">adfasdf</p>
                                <span class="badge badge-pill badge-dark">Private</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $uri = service('uri'); ?>
            <div id="community-sidebar" class="d-block">
                <div class="list-group">
                    <a href="<?= base_url(); ?>/community-home">
                        <button type="button" class="list-group-item list-group-item-action <?= ($uri->getSegment(2) ==  'community-home' ? 'active': null)?>"> Recommended</button>
                    </a>
                    <a href="<?= base_url(); ?>/communities">
                        <button type="button" class="list-group-item list-group-item-action <?= ($uri->getSegment(2) ==  'communities' ? 'active': null)?>">Communities</button>
                    </a>
                </div>
               
                <!-- communities you manage -->
                <?php if(!empty($communities_you_manage)): ?>
                <div class="community_hr my-4"></div>
                <div class="community_managed_section">
                    <div class="community_managed_row">
                        <h4 class="community_subtitle">
                            Communities You Manage
                        </h4>
                        <?php foreach ($communities_you_manage as $key => $value) : ?>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="#">
                                            <img class="img-fluid rounded" src="<?= base_url(); ?>/public/admin/uploads/community/<?= $value->name ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="<?= base_url(); ?>/community-manage/<?= $value->id ?>">
                                            <p class="card-title"><?= character_limiter($value->title, 20); ?></p>
                                        </a>
                                        <?php if($value->community_type == '0'): ?>
                                        <span class="badge badge-pill badge-secondary">Public</span>
                                        <?php else: ?>
                                        <span class="badge badge-pill badge-dark">Private</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
                <!-- end of communities you manage -->

                <!-- communities you manage -->
                <?php if(!empty($your_communities)): ?>
                <div class="community_hr my-4"></div>
                <div class="community_joined">
                    <div class="community_joined_row">
                        <h4 class="community_subtitle">
                            Your Communities
                        </h4>
                        <?php foreach ($your_communities as $key => $value) : ?>
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                    
                                        <a href="#">
                                            <img class="img-fluid rounded"
                                                src="<?= base_url(); ?>/public/admin/uploads/community/<?= $value->name ?>"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="<?= base_url(); ?>/community-manage/<?= $value->id ?>">
                                            <p class="card-title"><?= character_limiter($value->title, 20); ?></p>
                                        </a>
                                        <?php if($value->community_type == '0'): ?>
                                        <span class="badge badge-pill badge-secondary">Public</span>
                                        <?php else: ?>
                                        <span class="badge badge-pill badge-dark">Private</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>


        </div>