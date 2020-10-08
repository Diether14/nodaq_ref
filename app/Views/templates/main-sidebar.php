
<div class="community-sidebar" data-parallax="true">
    <div class="community_header row align-items-center">
        <div class="community_title">
            <h3>Communities</h3>
        </div>
    </div>
    <div class="community_new">
        <button type="button" class="btn btn-block bg-transparent community_new_btn" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus pr-2"></i>New Community
        </button>
    </div>
    <div class="community_hr my-4"></div>
    <div class="input-group mb-3 community_search">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-search"></i></span>
        </div>
        <input type="text" name="txtSearchCommunity" id="txtSearchCommunity" class="form-control" placeholder="Search..">
    </div>
    <?php $uri = service('uri'); ?>
    <div id="sidebar-main">
        <div class="list-group">
            <a href="<?= base_url(); ?>/home">
                <button type="button" class="list-group-item list-group-item-action <?= ($uri->getSegment(2) ==  'home' ? 'active': null)?>"> Recommended</button>
            </a>
            <a href="<?= base_url(); ?>/communities">
                <button type="button" class="list-group-item list-group-item-action <?= ($uri->getSegment(2) ==  'communities' ? 'active': null)?>">Communities</button>
            </a>
        </div>
        <!-- communities you manage -->
            <div class="community_hr my-4"></div>
            <div class="community_managed_section">
                <div class="justify-content-center">
                    <ul class="nav nav-pills nav-pills-icons" data-tabs="tabs">
                        <li class="nav-item">
                            <a class="nav-link active"  href="#tabManagedCommunities" data-toggle="tab">Managed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link "  href="#tabPersonalCommunities" data-toggle="tab">Personal</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="tabManagedCommunities" class="tab-pane active">
                        <?php if(!empty($communities_you_manage)): ?>
                            <?php foreach ($communities_you_manage as $key => $value) : ?>
                                <div class="row mb-4">
                                    <script>console.log(<?= json_encode($value)?>)</script>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a href="<?= base_url(); ?>/community-manage/<?= $value->slug ?>/<?= $value->id ?>/<?= $communities_you_manage_subclass[$key]['category_id'] ?>/<?= $communities_you_manage_subclass[$key]['id'] ?>">
                                                    <img class="img-fluid rounded" src="<?= base_url(); ?>/public/admin/uploads/community/<?= $value->name ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a href="<?= base_url(); ?>/community-manage/<?= $value->slug ?>/<?= $value->id ?>/<?= $communities_you_manage_subclass[$key]['category_id'] ?>/<?= $communities_you_manage_subclass[$key]['id'] ?>">
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
                        <?php endif; ?>
                    </div>
                    <div id="tabPersonalCommunities" class="tab-pane">
                        <?php if(!empty($your_communities)): ?>
                            <div class="community_joined">
                                <div class="community_joined_row">
                                
                                    <?php foreach ($your_communities as $key => $value) : ?>
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <a href="#">
                                                        <img class="img-fluid rounded" src="<?= base_url(); ?>/public/admin/uploads/community/<?= $value->name ?>" alt="">
                                                    </a>
                                                </div>
                                                <!-- 20/16 -->
                                                
                                                <div class="col-lg-6">
                                                    <a href="<?= base_url(); ?>/square/<?= $value->slug ?>/<?= $value->community_id ?>/<?= $your_communities_subclass[$key]['category_id'] ?>/<?= $your_communities_subclass[$key]['id'] ?>">
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
                
                
            </div>
        <!-- end of communities you manage -->
        
        <!-- communities you manage -->
        
        
    </div>
    
    
    <div id="sidebar-search" style="display: none">
        <div class="container">
            <div id="sidebar-searchLoading">
                Searching...
            </div>
            <div id="sidebar-searchResults">
                
            </div>
        </div>
    </div>

</div>

<script>
    document.querySelector('#txtSearchCommunity').addEventListener('keydown', event => {
        setTimeout(() => {
            if(event.target.value != ''){
                document.querySelector('#sidebar-main').style.display = "none"
                document.querySelector('#sidebar-search').style.display = "block"
                document.querySelector('#sidebar-searchResults').style.display = "none"
                document.querySelector('#sidebar-searchLoading').style.display = "block"
                
                setTimeout(() => {
                    let data = {
                        "searchQuery": event.target.value
                    }
                    $.ajax({
                        url: `<?= base_url()?>/community/search`,
                        method: 'post',
                        data: data,
                        dataType: "JSON",
                        success: function(res){
                            document.querySelector('#sidebar-searchResults').innerHTML = ""
                            res.map(item => {
                                document.querySelector('#sidebar-searchResults').innerHTML += `

                                    <div class="col-12 mb-2">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a href="#">
                                                    <img class="img-fluid rounded" src="<?= base_url(); ?>/public/admin/uploads/community/<?= $value->name ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="col-lg-6">
                                                <p class="card-title">${item.title} </p>

                                            </div>
                                        </div>
                                    </div>

                                `
                            })
                        }
                    });

                    document.querySelector('#sidebar-searchLoading').style.display = "none"
                    document.querySelector('#sidebar-searchResults').style.display = "block"
                }, 1000);
            }else{
                document.querySelector('#sidebar-search').style.display = "none"
                document.querySelector('#sidebar-main').style.display = "block"
            }
        }, 1000);
    })
</script>