<style>
  .modal-lg {
    max-width: 80% !important;
  }

  .rounded-circle {
    height: 42px !important;
  }
</style>

<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('<?= base_url(); ?>/public/admin/uploads/community/<?= $community_list[0]->name; ?>')">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title"><?= $community_list[0]->title; ?></h1>
        <h4><?= $community_list[0]->content; ?></h4>
        <br>
        <?php if(empty($users_community)): ?>
        <form class="contact-form" action="<?= base_url(); ?>/join_community" method="post">
          <input type="hidden" name="community_id" value="<?= $community_list[0]->id; ?>">
          <button type="submit" class="btn btn-primary btn-raised btn-lg">
            Join Community
          </button>
        </form>
        <?php else: ?>
        <button class="btn btn-primary btn-raised btn-lg">
          Joined
        </button>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="main">

  <div class="container">
    <div class="section">
      <?php if (session('msg')) : ?>
      <div class="card bg-info text-white shadow">
        <div class="card-body">
          <?= session('msg') ?>

        </div>
      </div>
      <br>
      <?php endif; ?>
      <div class="row">
        <div class="col-md-8">
          <h2 class="title"><?= $community_list[0]->title; ?></h2>
          <h4 class="text"><?= $community_list[0]->content; ?></h4>
        </div>
        <div class="col-md-4 d-flex p-5">
          <button class="btn btn-primary btn-block "><span class="fa fa-envelope pr-1"></span> Message
            Community</button>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-nav-tabs card-plain">
            <div class="card-header card-header-primary">
              <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
              <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                  <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#home" data-toggle="tab">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#updates" data-toggle="tab">Trending</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#history" data-toggle="tab">About</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body ">
              <div class="tab-content">
                <div class="tab-pane active" id="home">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="card card-body p-5">
                        <h4><b>Sample Content</b></h4>

                      </div>
                      <div class="card card-body p-5">
                        <h4><b>Sample Content</b></h4>

                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="card ">
                        <div class="card-body d-flex">
                          <div class="profile-photo-small p-1">
                            <?php if(!empty($profile_photo['name'])): ?>

                            <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $profile_photo['name'] ?>"
                              alt="Circle Image" class="rounded-circle img-fluid ">

                            <?php else: ?>
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                              class="img-raised rounded-circle img-fluid" alt="avatar">

                            <?php endif; ?>

                          </div>

                          <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal">
                            Create Post</button>
                        </div>
                      </div>

                      <?php foreach($posts as $key => $value): ?>
                      <a href="/weendi/blog-view/<?= $value['id']; ?>">
                      <div class="team-player">

                        <div class="card card-plain">

                          <h4 class="card-title p-2">

                            <!-- <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                              class="img-raised rounded-circle img-fluid" alt="avatar"> -->
                                <?= $value['title']; ?></h4>
                               
                            </p>
                          <div class="view overlay">
                            <img class="card-img-top rounded-0" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
                              alt="Card image cap">
                            <a href="#!">
                              <div class="mask rgba-white-slight"></div>
                            </a>
                          </div>


                          <div class="card-body">
                          <p class="card-description"><?= $value['content'] ?>
                          </div>
                          <div class="card-footer justify-content-center">
                            
                          </div>
                        </div>
                      </div>
                      <?php endforeach; ?>
                      </a>
                    </div>

                  </div>
                </div>
                <div class="tab-pane" id="updates">
                  <p> I will be the leader of a company that ends up being worth billions of dollars, because I got the
                    answers. I understand culture. I am the nucleus. I think that&#x2019;s a responsibility that I have,
                    to push possibilities, to show people, this is the level that things could be at. I think
                    that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level
                    that things could be at. </p>
                </div>
                <div class="tab-pane" id="history">
                  <p> I think that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is
                    the level that things could be at. I will be the leader of a company that ends up being worth
                    billions of dollars, because I got the answers. I understand culture. I am the nucleus. I think
                    that&#x2019;s a responsibility that I have, to push possibilities, to show people, this is the level
                    that things could be at.</p>
                </div>
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
              <input type="text" id="title" name="title" class="form-control" placeholder="Blog title..." value=""
                required>
            </div>
          </div>
        </div>
        <div class="card my-auto mx-auto">
          <div id="editor">
            <h1>Hello world!</h1>
            <p>I'm an instance of <a href="https://ckeditor.com">CKEditor</a>.</p>
          </div>

        </div>
        <div>
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