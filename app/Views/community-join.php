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

  .custom-card{
    min-height: 200px;
    max-height: 500px;    
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
      <hr class="m-0">

      
      <div class="row">
        <div class="col-md-12">
        <h2 class="title mt-5 mb-0 ml-3">Posts</h2>
      

          <div class="card-body pt-0">
            <div class="tab-content">
              <div class="tab-pane active" id="home">

                <div class="row">
          
                  <div class="col-md-4">

                    <div class="team-player">
                      <div class="card custom-card card-body justify-content-center">
                        
                        <a class="btn btn-link" data-toggle="modal" data-target="#myModal">
                          <span style="font-size:50px; color:#9C27B0" class="fa fa-plus"></span></a>
                      </div>
                    </div>
                  </div>

                  <?php foreach($posts as $key => $value): ?>
                  <div class="col-md-4 ">

                    <div class="team-player ">
                      <div class="custom-card card p-3">

                        <div class="profile-photo-small d-flex">

                          <?php if(!empty($value->name)): ?>

                          <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>"
                            alt="Circle Image" class="rounded-circle img-fluid z-depth-2">

                          <?php else: ?>
                          <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                            class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar">

                          <?php endif; ?>

                          <div class=" m-0 p-0 ">
                            <h4 class="card-title pl-2 mt-0 mb-0"><?= $value->nickname; ?>
                            </h4>
                            <p class="small pl-2 m-0">1 hour ago</p><br>
                            <p class="text p-0 m-0">
                              <?= $value->content ?>

                            </p>

                          </div>

                        </div>


                        <p class="card-description"><?= $value->description ?></p>

                        <div class="card-footer justify-content-center">
                          <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>" class="btn btn-link m-0 p-2"><i
                              class="fa fa-eye m-0 p-0"></i> 10 Views </a>
                          <a href="#" class="btn btn-link m-0 p-2"><i class="fa fa-comments m-0 p-0"></i> 50 Comments</a>    
                          <a href="#" class="btn btn-link m-0 p-2"><i class="fa fa-share m-0 p-0"></i> 2 Shares</a>
              
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endforeach; ?>


                  <?php foreach($shared as $key => $value): ?>

                  <div class="col-md-4">
                    <div class="custom-card card ">

                     <div class="team-player">
                      <div class="profile-photo-small m-2 d-flex">
                       
                        <?php if(!empty($value->name)): ?>

                        <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>"
                          alt="Circle Image" class="rounded-circle img-fluid z-depth-2">

                        <?php else: ?>
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                          class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar">

                        <?php endif; ?> 

                        <div class="m-0 p-0">
                          
                          <h4 class="card-title pl-2 mt-0 mb-0"><?= $value->nickname; ?>
                          <span class="fa fa-share small" style="float-right"></span>
                          </h4>
                          <p class="small pl-2 m-0">1 hour ago </p>
                          <p class="text p-0 m-0">
                            <?= $value->content ?>

                          </p>

                        </div>

                      </div>

                      </div>
                      <div class="card-footer justify-content-center">
                        <a href="<?= base_url(); ?>/post-share/<?= $value->id ?>/<?= $community_id ?>" class="btn btn-link m-0 p-2"><i
                              class="fa fa-eye m-0 p-0"></i> 10 Views </a>
                              <a href="#" class="btn btn-link m-0 p-2"><i class="fa fa-comments m-0 p-0"></i> 50 Comments</a>  
                          <a href="#" class="btn btn-link m-0 p-2"><i class="fa fa-share m-0 p-0"></i> 2 Shares</a>

                        </div>
                    </div>
                    
                  </div>
                  <?php endforeach; ?>




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
              <input type="text" id="title" name="title" class="form-control" placeholder="Title..." value="" required>
            </div>
          </div>
        </div>
        <div class="card container">
          <div class="form-group">
            <textarea name="description" class="form-control" placeholder="Description..." cols="30"
              rows="5"></textarea>
          </div>
        </div>

        <div class="card my-auto mx-auto">
          <h4 class="h4 p-3">Post Content</h4>
          <div id="editor">
            <h1>Hello world!</h1>
            <p>I'm an instance of <a href="https://ckeditor.com">CKEditor</a>.</p>
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