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
<div class="page-header header-filter m-auto" data-parallax="true"
    style="background-image: url(<?= base_url(); ?>/public/admin/uploads/community/<?= $community_current[0]->name; ?>)">
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
                                <li class="breadcrumb-item active"><a href="#">Edit Post</a></li>
                            </ol>
                        </nav>
                     

                    </div>
                    <div class="col-sm-12 community-single-card_title">
                        <div class="community-single-card_profile">

                            <div class="community-single_nickname">
                                <?php if(session()->get('id') == $user['id']): ?>

                                <a href="<?= base_url(); ?>/profile">
                                    <h4 class="card-title mt-0 pt-3">
                                        <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $profile_photo1['name'] ?>"
                                            alt="Circle Image" class="rounded-circle1 img-fluid z-depth-2">

                                        <?= $user['nickname']; ?>
                                    </h4>
                                </a>
                                <?php else: ?>
                                <a href="<?= base_url(); ?>/view-profile/<?= $user['id']; ?>">
                                    <h4 class="card-title mt-0 pt-3">
                                        <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $profile_photo1['name'] ?>"
                                            alt="Circle Image" class="rounded-circle1 img-fluid z-depth-2">

                                        <?= $user['nickname']; ?>
                                    </h4>
                                </a>
                                <?php endif; ?>
                                <p class="text ">

                                    <time class="timeago" datetime="<?= $blog['updated_at']; ?>"></time>


                                </p>
                            </div>

                        </div>
                        <div id="create_post_body">
                            <input type="hidden" name="base" value="<?= base_url(); ?>">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="pb-1">
                                        <div class="input-group">
                                            <input type="text" id="title" name="title" class="form-control"
                                                placeholder="Add Your Heading Text Here" value="<?= $blog['title'] ?>" required>
                                        </div>
                           
                                    </div>
                                </div>
                            </div>
                            <div class="ce-example__content _ce-example__content--small"
                                style="padding-bottom: 0px !important;">
                                <div id="editorjs"></div>
                            </div>

                            <div class="">
                                <input type="text" data-role="tagsinput" class="form-control" id="tags" name="tags"
                                    placeholder="Tags" value="<?= $blog['tags'] ?>">
                            </div>
                            <div>
                            </div>
                            <input type="hidden" name="category_id" value="<?= $blog['category_id']; ?>">
                            <input type="hidden" name="subclass_id" value="<?= $blog['subclass_id']; ?>">
                            <input type="hidden" name="community_id" id="community-id"
                                value="<?= $blog['community_id']; ?>">
                            <div class="ce-example__button" id="saveButton">
                                Save Post
                            </div>
                        </div>
                  
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>




<?php if (session('msg')) : ?>
<script type="text/javascript">
    alertify.warning('<?= session('msg') ?>');
</script>
<?php endif ?>

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

        document.querySelector("#saveButton").addEventListener('click', function () {
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

                console.log('test');return;

                if (title == '' || content == '' || community_id == '' || tags == '' || category_id == '' || subclass_id == '') {
                    alert('Please fill out the fields!');
                } else {
                    $.ajax({
                        type: "POST",
                        url: base_url + '/edit_post',
                        data: data,
                        dataType: "JSON",
                        success: function (data) {
                            alertify.success(data.msg);
                            location.reload();
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert('There is an error!');
                        }
                    });
                }
            });

        });
    </script>