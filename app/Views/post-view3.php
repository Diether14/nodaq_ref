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

<div class="page-header header-filter" data-parallax="true" style="background-image: url(<?= base_url(); ?>/public/admin/uploads/community/<?= $community_current[0]->name; ?>)">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ml-auto mr-auto">
                <div class="brand">
                    <h1 class="title">
                        <?= $community_current[0]->title; ?>
                    </h1>
                    <h4 class="small-description">
                        <?= $community_current[0]->content ?>
                    </h4>
                    <a href="<?= base_url(); ?>/community-join/<?= $blog['community_id'] ?>"><button
              class="btn btn-primary btn-raised btn-lg">View Community</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<div class="main">
    <div class="container">
        <div class="section">
            <div class="col-lg-12 col-md-12">
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
                <div class="row">
                    <div class="">
                        <div class="col-sm-12">

                        </div>
                        <div class="col-sm-12">
                            <div style="float:right">
                                <p class="text mt-0 pt-2 ">
                                    <?php echo $blog['updated_at']; ?>
                                </p>
                            </div>
                            <div class="media m-0 ">
                                <?php if($user_settings['user_mode'] == '1'): ?>
                                <div class="profile-photo-small mr-2">

                                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image" class="img-raised rounded-circle1 img-fluid  z-depth-2" alt="avatar">
                                </div>

                                <?php if(session()->get('id') == $user['id']): ?>
                                <a href="<?= base_url(); ?>/profile">
                                    <h4 class="card-title mt-0 pt-2">Anounymous
                                </a>
                                <?php else: ?>
                                <a href="<?= base_url(); ?>/view-profile/<?= $user['id']; ?>">
                                    <h4 class="card-title mt-0 pt-2">Anounymous
                                </a>
                                <?php endif; ?>


                                <?php else: ?>
                                <div class="profile-photo-small mr-2">
                                    <?php if(!empty($profile_photo1['name'])): ?>

                                    <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $profile_photo1['name'] ?>" alt="Circle Image" class="rounded-circle1 img-fluid z-depth-2">

                                    <?php else: ?>
                                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image" class="img-raised rounded-circle1 img-fluid  z-depth-2" alt="avatar">

                                    <?php endif; ?>

                                </div>

                                <?php if(session()->get('id') == $user['id']): ?>
                                <a href="<?= base_url(); ?>/profile">
                                    <h4 class="card-title mt-0 pt-2">
                                        <?= $user['nickname']; ?>
                                </a>
                                <?php else: ?>
                                <a href="<?= base_url(); ?>/view-profile/<?= $user['id']; ?>">
                                    <h4 class="card-title mt-0 pt-2">
                                        <?= $user['nickname']; ?>
                                </a>
                                <?php endif; ?>

                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <p class="text">
                                <?= $blog['description'] ?>
                            </p>
                            <div class="card">
                                <div class="header-title col-sm-12 border">
                                    <h2 class="title">
                                        <?= $blog['title'] ?>
                                    </h2>
                                </div>
                                <div class="card-body col-sm-12">
                                    <div class="collapse-content" contenteditable="false">

                                        <?= $blog['content']; ?>

                                    </div>

                                </div>
                                <div class="justify-content-left p-2">
                                    <hr>
                                    <div class="row">
                                        <?php if (session('vote')) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= session('vote') ?>
                                        </div>
                                        <?php endif ?>
                                        <?php if(empty($users_community)) : ?>

                                        <button class="not_joined btn  btn-primary btn-fab btn-round" style="background-color:#E74C3C;"><i
                            class="fa fa-chevron-up"></i></button>
                                        <p class="lead  mb-0 small"><b>Upvote</b></p>

                                        <h1 class="m-0">
                                            <?= $vote_totals ?>
                                        </h1>

                                        <button class="not_joined btn btn-primary btn-fab btn-round" style="background-color:#8E44AD;"><i
                            class="fa fa-chevron-down"></i></button>

                                        <p class="lead mb-0 small"><b>Devote</b></p>

                                        <?php else: ?>
                                        <?php if(!empty($com['upvote_name']) && !empty($com['devote_name'])): ?>
                                        <div class="col-sm-4">
                                            <form class="form-action-button" action="<?= base_url(); ?>/add_upvote" method="post">
                                                <input type="hidden" name="post_id" value="<?= $blog['id'] ?>">
                                                <input type="hidden" name="community_id" value="<?= $blog['community_id'] ?>">

                                                <button class="btn btn-primary btn-fab btn-round <?= ($vote['status'] ==  '1' ? 'disabled': null)?>" type="submit" style="background-color:#E74C3C;"><i class="fa fa-chevron-up"></i></button>
                                                <p class="lead  mb-0 small"><b><?= $com['upvote_name'] ?></b></p>
                                            </form>
                                            <h1 class="m-0">
                                                <?= $vote_totals ?>
                                            </h1>
                                            <form class="form-action-button" action="<?= base_url(); ?>/add_devote" method="post">
                                                <input type="hidden" name="post_id" value="<?= $blog['id'] ?>">
                                                <input type="hidden" name="community_id" value="<?= $blog['community_id'] ?>">
                                                <button class="btn btn-primary btn-fab btn-round <?= ($vote['status'] ==  '0' ? 'disabled': null)?>" style="background-color:#8E44AD;"><i class="fa fa-chevron-down"></i></button>

                                                <p class="lead mb-0 small"><b><?= $com['devote_name'] ?></b></p>
                                            </form>
                                            <?php else: ?>
                                            <form class="form-action-button" action="<?= base_url(); ?>/add_upvote" method="post">
                                                <button class="btn btn-primary btn-fab btn-round" style="background-color:#E74C3C;"><i
                                  class="fa fa-chevron-up"></i></button>
                                                <p class="lead  mb-0 small"><b>Upvote</b></p>
                                            </form>
                                            <h1 class="m-0">
                                                <?= $vote_totals ?>
                                            </h1>
                                            <form class="form-action-button" action="<?= base_url(); ?>/add_devote" method="post">
                                                <button class="btn btn-primary btn-fab btn-round" style="background-color:#8E44AD;"><i
                                  class="fa fa-chevron-down"></i></button>

                                                <p class="lead mb-0 small"><b>Devote</b></p>
                                            </form>
                                            <?php endif; ?>

                                            <?php endif; ?>
                                        </div>
                                        <div class="col-sm-8">
                                        <a href="#comments" class="btn btn-link not_joined"><i class="fa fa-chevron-up pr-1"></i>
                                        <a href="#comments" class="btn btn-link not_joined"><i class="fa fa-chevron-down pr-1"></i>
                                            <?php if(empty($users_community)) : ?>

                                            <a href="#comments" class="btn btn-link not_joined"><i class="fa fa-comment pr-1"></i>
                                  <?php 
                                              if(1000 >= 1000){ 
                                                echo round((1200/1000),1). 'K'; 
                                              }elseif(1000000 >= 1000000){
                                                echo round((1000000/1000000),1). 'M';
                                              }else{
                                                echo '50';
                                              } ?>
                                  Comments</a>
                                            <a href="#" class="btn btn-link not_joined"><i class="fa fa-share pr-1"></i>
                                  <?php 
                                              if(1000 >= 1000){ 
                                                echo round((1200/1000),1). 'K'; 
                                              }elseif(1000000 >= 1000000){
                                                echo round((1000000/1000000),1). 'M';
                                              }else{
                                                echo '50';
                                              } ?>
                                  Share Post</a>

                                            <?php if(empty($report)): ?>
                                            <a href="#" class="btn btn-link not_joined" class="btn btn-link"><i class="fa fa-exclamation pr-1"></i>
                                  Report Post</a>
                                            <?php else: ?>

                                            <a href="#" class="btn btn-link not_joined"><i class="fa fa-exclamation pr-1"></i> Reported</a>
                                            <?php endif; ?>

                                            <?php else: ?>
                                            <a href="#comments" class="btn btn-link"><i class="fa fa-comment pr-1"></i>
                                  <?php 
                                              if(1000 >= 1000){ 
                                                echo round((1200/1000),1). 'K'; 
                                              }elseif(1000000 >= 1000000){
                                                echo round((1000000/1000000),1). 'M';
                                              }else{
                                                echo '50';
                                              } ?>
                                  Comments</a>
                                            <a href="#" data-toggle="modal" data-target="#share" class="btn btn-link"><i class="fa fa-share pr-1"></i>
                                  <?php 
                                              if(1000 >= 1000){ 
                                                echo round((1200/1000),1). 'K'; 
                                              }elseif(1000000 >= 1000000){
                                                echo round((1000000/1000000),1). 'M';
                                              }else{
                                                echo '50';
                                              } ?>
                                  Share Post</a>

                                            <?php if(empty($report)): ?>
                                            <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-link " class="btn btn-link"><i
                                    class="fa fa-exclamation pr-1"></i> Report Post</a>
                                            <?php else: ?>

                                            <a href="#" class="btn btn-link"><i class="fa fa-exclamation pr-1"></i> Reported</a>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-12 mb-5">
                    <div class="row">



                    </div>
                </div>

                <div id="comments" class="card my-4">
                    <h5 class="card-title ml-3">Leave a Comment:</h5>

                    <div class="card-body">
                        <form class="contact-form" action="/weendi/add_comment" method="post">
                            <div class="form-group">
                                <?php if(empty($users_community)) : ?>
                                <textarea class="form-control" rows="3">You must join to the community first!</textarea>
                                <?php else: ?>
                                <textarea cols="80" id="editor1" name="content" rows="10" data-sample-short></textarea>
                                <?php endif; ?>
                            </div>
                            <input type="hidden" name="post_id" value="<?= $blog['id']?>">
                            <?php if(empty($users_community)) : ?>
                            <button type="button" id="not_joined" class="btn btn-primary">Submit</button>
                            <?php else: ?>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
                <div class="ml-5 title">
                    <?php if (session('msg')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session('msg') ?>
                    </div>
                    <?php endif ?>
                    <h5 class="title">Comments</h5>

                </div>
                <?php if(empty($post_comments)): ?>
                <p class="text-center">No comment yet</p>
                <?php else: ?>
                <?php foreach ($post_comments as $key => $value): ?>
                <div class="media ml-5 mr-5 mb-5">
                    <?php if($value->user_mode == '1'): ?>
                    <div class="profile-photo-small mr-2">

                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image" class="img-raised rounded-circle1 img-fluid  z-depth-2" alt="avatar">


                    </div>

                    <div class="media-body" contenteditable="false">
                        <?php if(session()->get('id') == $value->user_id): ?>
                        <a href="<?= base_url(); ?>/profile">
                            <h5 class="mt-0">Anounymous</h5>
                        </a>
                        <?php else: ?>
                        <a href="<?= base_url(); ?>/view-profile/<?= $user['id']; ?>">
                            <h5 class="mt-0">Anounymous</h5>
                        </a>
                        <?php endif; ?>
                        <?= $value->content; ?>
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
                    <textarea name="report_content" class="form-control" cols="30" rows="10" placeholder="Reason..."></textarea>
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


<!-- Classic Modal -->
<div class="modal fade" id="share" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Share Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
        </button>
            </div>
            <div class="modal-body">
                <form class="form" action="<?= base_url(); ?>/share_post" method="post">
                    <input type="hidden" name="post_id" value="<?= $blog['id']?>">
                    <input type="hidden" name="community_id" value="<?= $blog['community_id']?>">
                    <textarea name="share_content" class="form-control" cols="30" rows="10" placeholder="Type Something..."></textarea>

                    <select class="custom-select mb-2" id="inputGroupSelect01">

            <option selected>Select Community</option>
            <?php foreach ($community as $key => $value):?>
            <option value="<?= $value->id ?>"><?= $value->title ?></option>
            <?php endforeach; ?>
          </select>


                    <button class="btn btn-primary" type="submit">Share Post</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--  End Modal -->

<script>
    var users = [{
                id: 1,
                avatar: 'm_1',
                fullname: 'Charles Flores',
                username: 'cflores'
            }, {
                id: 2,
                avatar: 'm_2',
                fullname: 'Gerald Jackson',
                username: 'gjackson'
            }, {
                id: 3,
                avatar: 'm_3',
                fullname: 'Wayne Reed',
                username: 'wreed'
            }, {
                id: 4,
                avatar: 'm_4',
                fullname: 'Louis Garcia',
                username: 'lgarcia'
            }, {
                id: 5,
                avatar: 'm_5',
                fullname: 'Roy Wilson',
                username: 'rwilson'
            }, {
                id: 6,
                avatar: 'm_6',
                fullname: 'Matthew Nelson',
                username: 'mnelson'
            }, {
                id: 7,
                avatar: 'm_7',
                fullname: 'Randy Williams',
                username: 'rwilliams'
            }, {
                id: 8,
                avatar: 'm_8',
                fullname: 'Albert Johnson',
                username: 'ajohnson'
            }, {
                id: 9,
                avatar: 'm_9',
                fullname: 'Steve Roberts',
                username: 'sroberts'
            }, {
                id: 10,
                avatar: 'm_10',
                fullname: 'Kevin Evans',
                username: 'kevans'
            },

            {
                id: 11,
                avatar: 'w_1',
                fullname: 'Mildred Wilson',
                username: 'mwilson'
            }, {
                id: 12,
                avatar: 'w_2',
                fullname: 'Melissa Nelson',
                username: 'mnelson'
            }, {
                id: 13,
                avatar: 'w_3',
                fullname: 'Kathleen Allen',
                username: 'kallen'
            }, {
                id: 14,
                avatar: 'w_4',
                fullname: 'Mary Young',
                username: 'myoung'
            }, {
                id: 15,
                avatar: 'w_5',
                fullname: 'Ashley Rogers',
                username: 'arogers'
            }, {
                id: 16,
                avatar: 'w_6',
                fullname: 'Debra Griffin',
                username: 'dgriffin'
            }, {
                id: 17,
                avatar: 'w_7',
                fullname: 'Denise Williams',
                username: 'dwilliams'
            }, {
                id: 18,
                avatar: 'w_8',
                fullname: 'Amy James',
                username: 'ajames'
            }, {
                id: 19,
                avatar: 'w_9',
                fullname: 'Ruby Anderson',
                username: 'randerson'
            }, {
                id: 20,
                avatar: 'w_10',
                fullname: 'Wanda Lee',
                username: 'wlee'
            }
        ],
        tags = [
            'american',
            'asian',
            'baking',
            'breakfast',
            'cake',
            'caribbean',
            'chinese',
            'chocolate',
            'cooking',
            'dairy',
            'delicious',
            'delish',
            'dessert',
            'desserts',
            'dinner',
            'eat',
            'eating',
            'eggs',
            'fish',
            'food',
            'foodgasm',
            'foodie',
            'foodporn',
            'foods',
            'french',
            'fresh',
            'fusion',
            'glutenfree',
            'greek',
            'grilling',
            'halal',
            'homemade',
            'hot',
            'hungry',
            'icecream',
            'indian',
            'italian',
            'japanese',
            'keto',
            'korean',
            'lactosefree',
            'lunch',
            'meat',
            'mediterranean',
            'mexican',
            'moroccan',
            'nom',
            'nomnom',
            'paleo',
            'poultry',
            'snack',
            'spanish',
            'sugarfree',
            'sweet',
            'sweettooth',
            'tasty',
            'thai',
            'vegan',
            'vegetarian',
            'vietnamese',
            'yum',
            'yummy'
        ];

    CKEDITOR.replace('editor1', {
        plugins: 'mentions,emoji,basicstyles,undo,link,wysiwygarea,toolbar',
        contentsCss: [
            'http://cdn.ckeditor.com/4.14.1/full-all/contents.css',
            'https://ckeditor.com/docs/vendors/4.14.1/ckeditor/assets/mentions/contents.css'
        ],
        height: 150,
        toolbar: [{
            name: 'document',
            items: ['Undo', 'Redo']
        }, {
            name: 'basicstyles',
            items: ['Bold', 'Italic', 'Strike']
        }, {
            name: 'links',
            items: ['EmojiPanel', 'Link', 'Unlink']
        }],
        mentions: [{
            feed: dataFeed,
            itemTemplate: '<li data-id="{id}">' +
                '<img class="photo" src="assets/mentions/img/{avatar}.jpg" />' +
                '<strong class="username">{username}</strong>' +
                '<span class="fullname">{fullname}</span>' +
                '</li>',
            outputTemplate: '<a href="mailto:{username}@example.com">@{username}</a><span>&nbsp;</span>',
            minChars: 0
        }, {
            feed: tags,
            marker: '#',
            itemTemplate: '<li data-id="{id}"><strong>{name}</strong></li>',
            outputTemplate: '<a href="https://example.com/social?tag={name}">{name}</a><span>&nbsp;</span>',
            minChars: 1
        }]
    });

    function dataFeed(opts, callback) {
        var matchProperty = 'username',
            data = users.filter(function(item) {
                return item[matchProperty].indexOf(opts.query.toLowerCase()) == 0;
            });

        data = data.sort(function(a, b) {
            return a[matchProperty].localeCompare(b[matchProperty], undefined, {
                sensitivity: 'accent'
            });
        });

        callback(data);
    }
</script>