<style>
  .modal-lg {
    max-width: 80% !important;
  }

  /* .rounded-circle1 {
    height: 42px !important;
  } */
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
          <div class="card">
            <!-- <div class="card-header card-header-primary">
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
            </div> -->
            <div class="card-body ">
              <div class="tab-content">
                <div class="tab-pane active" id="home">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="card card-body p-5">
                        <h4><b>Sample Content</b></h4>

                      </div>
                      <div class="card card-body p-5">
                        <h4><b>Sample Content</b></h4>

                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="card ">
                        <div class="card-body d-flex">
                          <div class="profile-photo-small p-1 ">
                            <!-- <?php if(!empty($profile_photo['name'])): ?>

                            <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $profile_photo['name'] ?>"
                              alt="Circle Image" class="rounded-circle img-fluid ">

                            <?php else: ?>
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                              class="img-raised rounded-circle img-fluid" alt="avatar">

                            <?php endif; ?> -->

                          </div>

                          <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal">
                            Create Post</button>
                        </div>
                      </div><hr>

                             

                      <?php foreach($posts as $key => $value): ?>
                      <div class="team-player">
                        <div class="card p-3">
          
                          <h4 class="card-title"><?= $value->title; ?>
                            <br>
                            <small class="card-description text-muted">Posted By: <?= $value->nickname ?></small>
                          </h4>
                          
                            <p class="card-description"><?= $value->description ?></p>
                         
                          <div class="justify-content-left">
                          <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>" class="card-link">Read More </a>
                         
                        </div>
                      </div>
                      </div>
                      <?php endforeach; ?>

                      <?php foreach($shared as $key => $value): ?>
                      <h1>Test Shared Post</h1>
                  
                      <div class="team-player">
                        <div class="card p-3">
          
                          <h4 class="card-title"><?= $value->title; ?>
                            <br>
                            <small class="card-description text-muted">Shared By: <?= $value->nickname ?></small>
                          </h4>
                          
                            <p class="card-description"><?= $value->description ?></p>
                         
                          <div class="justify-content-left">
                          <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>" class="card-link">Read More </a>
                         
                        </div>
                      </div>
                
                      </div>
                      <?php endforeach; ?>
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
              <input type="text" id="title" name="title" class="form-control" placeholder="Title..." value=""
                required>
            </div>
          </div>
        </div>
        <div class="card container">
        <div class="form-group">
              <textarea  name="description" class="form-control" placeholder="Description..." cols="30" rows="5"></textarea>
          </div>
        </div>

        <div class="card my-auto mx-auto">
        <h4 class="h4 p-3">Post Content</h4>
          <div id="editor">
            <h1>Hello world!</h1>
            <p>I'm an instance of <a href="https://ckeditor.com">CKEditor</a>.</p>
          </div>

        </div>
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