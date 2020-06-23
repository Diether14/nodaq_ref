<style>
  .custom-card {
    min-height: 420px;
    max-height: 420px;
  }

  .custom-card1 {
    min-height: 300px;
    max-height: 350px;
  }

  .card-img-top{
    max-height: 200px; 
    min-height: 200px;
    border-radius: 0%; 
  }
</style>

<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('<?= base_url(); ?>/public/user/assets/img/profile_city.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">Search Results</h1>
        <h4>Search Results for <b>"<?= $q ?>"</b></h4>
        <br>
      </div>
    </div>
  </div>
</div>

<div class="main">
  <div class="container">

    <div class="section text-center">

      <?php if(!empty($community_list)): ?>
      <h2 class="title"><i class="fa fa-globe pr-3"></i>Communities</h2>
      <div class="team">
        <div class="row">
          <?php foreach ($community_list as $key => $value): ?>

          <div class="col-md-4">
            <div class="team-player">

              <div class="card h-100 custom-card " >

                <h4 class="card-title p-3 my-0" style="background-color: <?= $value->color; ?>">

                  <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-bars pl-3"
                      style="float:left;"></i></a>
                  <a href="community-join/<?= $value->id;  ?>"
                    style="color: <?= $value->text_color; ?>"><?= character_limiter($value->title, 15) ?> </a>
                </h4>
                <div class="view overlay">
                  <img class="card-img-top rounded-0" src="<?= base_url(); ?>/public/admin/uploads/community/<?= $value->name ?>"
                    alt="Card image cap">
                  <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                  </a>
                </div>
                <div class="card-body">
                  <p class="card-description"><?= character_limiter($value->content, 80); ?>
                  </p>
                </div>
                <div class="card-footer justify-content-center">
                  <div class="togglebutton">
                    <!-- <label>
                      <input type="checkbox" checked="">
                      <span class="toggle"></span>
                      Anonymous Mode
                    </label><br> -->
                    <div style="float-right">
                      <p class="text">Created By: <b><?= $value->nickname ?></b></p>
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
      <?php if(!empty($posts)): ?>
      <h2 class="title mb-0">Post</h2>
            <div class="row">
             
              <?php foreach($posts as $key => $value): ?>
              <div class="col-md-4">

                <div class="team-player">
                  <div class="card custom-card1 p-3">

                    <div class="profile-photo-small d-flex">

                      <?php if(!empty($value->name)): ?>

                      <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $value->name ?>" alt="Circle Image"
                        class="rounded-circle img-fluid z-depth-2">

                      <?php else: ?>
                      <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                        class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar">

                      <?php endif; ?>

                      <div class="m-0 p-0">
                        <h4 class="card-title pl-2 mt-0 mb-0"><?= $value->nickname; ?>
                        </h4>
                        <p class="small pl-2 m-0">1 hour ago</p>
                      </div>
                    </div>

                    <!-- <p class="card-text"><?= $value->description ?></p> -->
                    
                    <div class="card-body  m-0 p-0">
                          <p class="m-0 p-0 card-description"><?= character_limiter($value->description, 180) ?></p>
                    </div>
                    <div class="card-footer justify-content-center">
                          <?php if($value->post_id): ?>
                          <a href="<?= base_url(); ?>/post-share/<?= $value->post_id ?>/<?= $community_id ?>"
                            class="btn btn-link m-0 p-2"><i class="fa fa-eye m-0 p-0"></i> View Post </a>
                          <?php else: ?>
                          <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>" class="btn btn-link m-0 p-1"><i
                              class="fa fa-eye m-0 p-0"></i> View Post</a>
                          <?php endif; ?>
                          <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>" class="btn btn-link m-0 p-1"><i
                              class="fa fa-comments m-0 p-0"></i>
                            <?php if(1000 >= 1000){ 
                              echo round((1200/1000),1). 'K'; 
                            }elseif(1000000 >= 1000000){
                              echo round((1000000/1000000),1). 'M';
                            }else{
                              echo '50';
                            } ?> Comments</a>
                          <a href="<?= base_url(); ?>/post-view/<?= $value->id ?>" class="btn btn-link m-0 p-1"><i
                              class="fa fa-share m-0 p-0"></i>
                            <?php 
                          if(1000 >= 1000){ 
                            echo round((1200/1000),1). 'K'; 
                          }elseif(1000000 >= 1000000){
                            echo round((1000000/1000000),1). 'M';
                          }else{
                            echo '50';
                          } ?>


                            Shares</a>

                        </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>

            </div>
        <?php endif; ?>
    </div>

    <!-- <div class="section text-center">
      <div class="row">
        <div class="col-md-12 ml-auto mr-auto">
          <h2 class="title">Trending Posts</h2>

          <div class="row">
            <div class="col-md-12 ml-auto mr-auto">


              <div class="row">
                <php foreach ($blog as $key => $value): ?>
                <a href="/weendi/post-view/<= $value['id']; ?>">
                  <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center">
                      <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                      <div class="card-body">
                        <h4 class="card-title"><= $value['title'] ?></h4>
                        <h6 class="card-subtitle mb-2 text-muted">Position</h6>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut
                          mollitia eum ipsum fugiat odio officiis odit.</p>
                      </div>
                      <div class="card-footer">
                        <a href="#">name@example.com</a>
                      </div>
                    </div>
                  </div>
                </a>
                <php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
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
          <form class="contact-form" action="/weendi/update_mode" method="post">
            <div class="togglebutton">
              <label>
                <input type="checkbox" name="mode" <?= ($user_settings['user_mode'] == '1' ? 'checked': null)?>>
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
<!--  End Modal -->