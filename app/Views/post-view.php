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

<div class="page-header header-filter" data-parallax="true"
  style="background-image: url(<?= base_url(); ?>/public/admin/uploads/community/<?= $community_current[0]->name; ?>)">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ml-auto mr-auto">
        <div class="brand">
          <h1 class="title"><?= $community_current[0]->title; ?></h1>
          <h4 class="small-description"><?= $community_current[0]->content ?></h4>
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
          </button>
           You must join to the community first, inorder to be able to add post and add comments. 
        </div>
      </div>
      <?php endif; ?>

        <h2 class="title"><?= $blog['title'] ?> </h2><br>

        <div style="float:right">
          <p class="text mt-0 pt-2 "><?php 
 
              echo $blog['updated_at']; ?>

        </div>
        <div class="media m-0 ">
          <div class="profile-photo-small mr-2">
            <?php if(!empty($profile_photo1['name'])): ?>

            <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $profile_photo1['name'] ?>" alt="Circle Image"
              class="rounded-circle1 img-fluid z-depth-2">

            <?php else: ?>
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
              class="img-raised rounded-circle1 img-fluid  z-depth-2" alt="avatar">

            <?php endif; ?>

          </div>

          <h5 class="mt-0 pt-2"><?= $user['nickname']; ?></h5>

        </div>


        <hr class="mt-0">
        <p class="text"><?= $blog['description'] ?></p>
        <div class="card">

          <!-- Card content -->
          <div class="card-body">
            <div class="collapse-content">
              <?= $blog['content']; ?>

            </div>

          </div>
          <div class="justify-content-left p-2">
            <hr>
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
            <a href="#"  class="btn btn-link not_joined"><i class="fa fa-share pr-1"></i>
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
            <a href="#" class="btn btn-link not_joined" class="btn btn-link"><i
                class="fa fa-exclamation pr-1"></i> Report Post</a>
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

        <div class="col-12 mb-5">
          <div class="row">
            <div class="col-12">
              <div class="bg-white pl-4 rounded shadow-sm h-100 text-center">
              <?php if (session('vote')) : ?>
              <div class="alert alert-success" role="alert">
                <?= session('vote') ?>
              </div>
              <?php endif ?>
              <?php if(empty($users_community)) : ?>
              
                  <button  class="not_joined btn btn-danger btn-circle btn-circle-xl" style="background-color:#E74C3C;"><i
                      class="fa fa-chevron-up"></i></button>
                  <p class="lead  mb-0 small"><b>Upvote</b></p>
         
                <h1 class="m-0"><?= $vote_totals ?></h1>
               
                  <button  class="not_joined btn btn-danger btn-circle btn-circle-xl" style="background-color:#8E44AD;"><i
                      class="fa fa-chevron-down"></i></button>

                  <p class="lead mb-0 small"><b>Devote</b></p>
               
              <?php else: ?>
                <?php if(!empty($com['upvote_name']) && !empty($com['devote_name'])): ?>
         
                <form action="<?= base_url(); ?>/add_upvote" method="post">
                  <input type="hidden" name="post_id" value="<?= $blog['id'] ?>">
                  <input type="hidden" name="community_id" value="<?= $blog['community_id'] ?>">

                  <button class="btn btn-danger btn-circle btn-circle-xl <?= ($vote['status'] ==  '1' ? 'disabled': null)?>" type="submit"
                    style="background-color:#E74C3C;"><i class="fa fa-chevron-up"></i></button>
                  <p class="lead  mb-0 small"><b><?= $com['upvote_name'] ?></b></p>
                </form>
                <h1 class="m-0"><?= $vote_totals ?></h1>
                <form action="<?= base_url(); ?>/add_devote" method="post">
                  <input type="hidden" name="post_id" value="<?= $blog['id'] ?>">
                  <input type="hidden" name="community_id" value="<?= $blog['community_id'] ?>">
                  <button class="btn btn-danger btn-circle btn-circle-xl <?= ($vote['status'] ==  '0' ? 'disabled': null)?>" style="background-color:#8E44AD;"><i
                      class="fa fa-chevron-down"></i></button>

                  <p class="lead mb-0 small"><b><?= $com['devote_name'] ?></b></p>
                </form>
                <?php else: ?>
                <form action="<?= base_url(); ?>/add_upvote" method="post">
                  <button class="btn btn-danger btn-circle btn-circle-xl" style="background-color:#E74C3C;"><i
                      class="fa fa-chevron-up"></i></button>
                  <p class="lead  mb-0 small"><b>Upvote</b></p>
                </form>
                <h1 class="m-0"><?= $vote_totals ?></h1>
                <form action="<?= base_url(); ?>/add_devote" method="post">
                  <button class="btn btn-danger btn-circle btn-circle-xl" style="background-color:#8E44AD;"><i
                      class="fa fa-chevron-down"></i></button>

                  <p class="lead mb-0 small"><b>Devote</b></p>
                </form>
                <?php endif; ?>
                
                <?php endif; ?>
              </div>
            </div>


          </div>
        </div>

        <div id ="comments" class="card my-4">
          <h5 class="card-title ml-3">Leave a Comment:</h5>

          <div class="card-body">
            <form class="contact-form" action="/weendi/add_comment" method="post">
              <div class="form-group">
              <?php if(empty($users_community)) : ?>
                <textarea class="form-control" rows="3">You must join to the community first!</textarea>
              <?php else: ?>  
                <textarea name="content" class="form-control" rows="3"></textarea>
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
          <div class="profile-photo-small mr-2">
            <?php if(!empty($value->name)): ?>

            <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>" alt="Circle Image"
              class="rounded-circle1 img-fluid z-depth-2">

            <?php else: ?>
            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
              class="img-raised rounded-circle1 img-fluid  z-depth-2" alt="avatar">

            <?php endif; ?>

          </div>
          <div class="media-body">

            <h5 class="mt-0"><?= $value->nickname; ?></h5>
            <?= $value->content; ?>
          </div>
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
          <textarea name="share_content" class="form-control" cols="30" rows="10"
            placeholder="Type Something..."></textarea>

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