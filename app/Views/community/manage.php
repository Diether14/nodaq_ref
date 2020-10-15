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

    .rounded-circle:hover {
        opacity: 0.9;
        cursor: pointer;
    }

    .img-cover:hover {
        opacity: 0.9;
        cursor: pointer;
    }

</style>

<div class="row">
    <?= view('templates/manage-sidebar'); ?>
    <div class="community-feed">

        <div class="page-header header-filter m-auto img-cover" data-toggle="modal" data-target="#cover"
            style="background-image: url('<?= base_url(); ?>/public/admin/uploads/community/<?= $community_list[0]->name; ?>')">
        </div>

        <div class="">
            <nav class="container " aria-label="breadcrumb">
                <ol class="breadcrumb m-0 ">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Communities</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Test Community</li>
                </ol>
            </nav>

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
                            <div class="d-flex">
                            
                                <div class="tab-content bg-white pt-0 mt-0 col-lg-12">
                                    <div class="tab-pane fade show active" id="grid" role="tabpanel"
                                        aria-labelledby="community-grid-tab">
                                        <div id="grid-layout" class="card-body pt-0 mt-3">

                                        <div class="accordion border border-light rounded p-3" id="create_post_accordion">
                                            
                                        <div class="">
                                        <div class="" id="create_post_header">
                                            <h2 class="m-0">
                                                <button class="btn btn-link btn-block text-left m-0" type="button"
                                                    data-toggle="collapse" data-target="#create_post_body" aria-expanded="false"
                                                    aria-controls="collapseOne">
                                                    Write new post <i class="fa fa-news"></i>
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="create_post_body" class="collapse" aria-labelledby="create_post_header"
                                            data-parent="#create_post_accordion">
                                            <input type="hidden" name="base" value="<?= base_url(); ?>">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="pb-1">
                                                        <div class="input-group">
                                                            <input type="text" id="title" name="title" class="form-control"
                                                                placeholder="Add Your Heading Text Here" value="" required>
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
                                                    placeholder="Tags">
                                            </div>
                                            <div>
                                            </div>
                                            <input type="hidden" name="category_id" value="<?= $subclass['category_id']; ?>">
                                            <input type="hidden" name="subclass_id" value="<?= $subclass['id']; ?>">
                                            <input type="hidden" name="community_id" id="community-id"
                                                value="<?= $community_list[0]->id; ?>">
                                            <div class="ce-example__button" id="saveButton">
                                                Save Post
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                            <?php if (!empty($postsContent)) : ?>
                                            <div class="row">
                                                <?php foreach ($postsContent as $key => $value) : ?>
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
                                                        <img class="card-img-top"
                                                            style=" object-fit: cover; height: 200px"
                                                            src="<?= $thumbnail ?>" alt="">
                                                        <?php
                                                        } else {
                                                            ?>
                                                        <img class="card-img-top" style=" object-fit: cover;"
                                                            src="<?= base_url(); ?>/public/dummy/post.jpg" alt="">
                                                        <!-- <img class="card-img-top" style=" object-fit: cover;" src="<?= base_url(); ?>/public/dummy/post.jpg" alt=""> -->
                                                        <?php
                                                        }
                                                        ?>
                                                        <div class="card-body">
                                                            <h4 class="card-title">
                                                                <?= character_limiter($value->title, 40) ?>
                                                            </h4>
                                                            <h6 class=" text-muted "> <a
                                                                    href="#"><?= $value->nickname; ?></a>
                                                            </h6>
                                                            <h6 class="card-subtitle mb-2 text-muted">
                                                                <?= date('M d, Y',strtotime($value->updated_at)) ?>
                                                            </h6>
                                                            <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>"
                                                                class=" btn btn-primary btn-sm stretched-link">
                                                                Read More
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php endforeach; ?>
                                            </div>
                                            <?php else : ?>
                                            <div class="col-lg-12  mb-4">
                                                <div class="card justify-content-center text-center"
                                                    style="height:30vh;">
                                                    <div class="card-bod">
                                                        <h4 class="card-title justify-content-center">No Post Yet
                                                        </h4>
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
                                                            <img style=" object-fit: cover;height: 100px; width: auto;"
                                                                src="<?= base_url(); ?>/public/post_photos/<?= $value->thumbnail; ?>"
                                                                alt="">
                                                            <?php else : ?>
                                                            <img style=" object-fit: cover;height: 100px; width: auto;"
                                                                src="<?= base_url(); ?>/public/dummy/post.jpg" alt="">
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
                                                                <span
                                                                    class="badge badge-pill badge-info"><?= $value1 ?></span>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </span>
                                                            <span>
                                                                <h6 class=" text-muted ">Posted By: <a
                                                                        href="#"><?= $value->nickname; ?></a></h6>
                                                                <h6 class="card-subtitle mb-2 text-muted">
                                                                    <?= $value->updated_at ?>
                                                                </h6>
                                                            </span>
                                                            <span>
                                                                <a
                                                                    href="<?= base_url(); ?>/post-view/<?= $value->id ?>">
                                                                    <button class="btn btn-primary btn-sm">read
                                                                        more</button>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php endforeach; ?>
                                            <?php else : ?>
                                            <div class="col-lg-12  mb-4">
                                                <div class="card justify-content-center text-center"
                                                    style="height:30vh;">
                                                    <div class="card-bod">
                                                        <h4 class="card-title justify-content-center">No Post Yet
                                                        </h4>
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
                                                                <span
                                                                    class="badge badge-pill badge-info"><?= $value1 ?></span>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </span>
                                                            <span>
                                                                <h6 class=" text-muted ">Posted By: <a
                                                                        href="#"><?= $value->nickname; ?></a></h6>
                                                                <h6 class="card-subtitle mb-2 text-muted">
                                                                    <?= $value->updated_at ?>
                                                                </h6>
                                                            </span>
                                                            <span>
                                                                <a
                                                                    href="<?= base_url(); ?>/post-view/<?= $value->id ?>">
                                                                    <button class="btn btn-primary btn-sm">read
                                                                        more</button>
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php endforeach; ?>
                                            <?php else : ?>
                                            <div class="col-lg-12  mb-4">
                                                <div class="card justify-content-center text-center"
                                                    style="height:30vh;">
                                                    <div class="card-bod">
                                                        <h4 class="card-title justify-content-center">No Post Yet
                                                        </h4>
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
                                                            <span
                                                                class="badge badge-pill badge-info"><?= $value1 ?></span>
                                                            <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?= $value->nickname; ?></td>
                                                        <td><?= $value->updated_at ?></td>
                                                        <td>
                                                            <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>">
                                                                <button class="btn btn-primary btn-sm">read
                                                                    more</button>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <?php else : ?>
                                            <div class="col-lg-12  mb-4">
                                                <div class="card justify-content-center text-center"
                                                    style="height:30vh;">
                                                    <div class="card-bod">
                                                        <h4 class="card-title justify-content-center">No Post Yet
                                                        </h4>
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
        <div class="modal fade" id="add_category" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="contact-form" action="<?= base_url(); ?>/add_category" method="post"
                            accept-charset="utf-8" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Category Name</label>
                                    <input type="text" name="category_name" class="form-control">
                                    <input type="hidden" name="community_id" value="<?= $community_id; ?>">
                                </div>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn bg-success text-white btn-link">Submit</button>
                        </form>
                        <!-- <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!--  End Modal -->


        <!-- Classic Modal -->
        <div class="modal fade" id="cover" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Cover Picture</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="text-center">
                            <img src="" class="avatar img-circle img-thumbnail">
                            <h6>Upload a different photo...</h6>
                            <form action="<?php echo base_url('/update_community_cover');?>" method="post"
                                accept-charset="utf-8" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $community_list[0]->com_photo_id; ?>"
                                    name="com_photo_id">
                                <input type="file" name="file" class="text-center center-block file-upload"
                                    accept=".png, .jpg, .jpeg">
                                <div class="form-group"><br>
                                    <hr>
                                    <button type="submit" id="send_form" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                        </hr><br>
                    </div>

                </div>
            </div>
        </div>
        <!--  End Modal -->


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

                    if (title == '' || content == '' || community_id == '' || tags == '' || category_id == '' || subclass_id == '') {
                        alert('Please fill out the fields!');
                    } else {
                        $.ajax({
                            type: "POST",
                            url: base_url + '/save_post',
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