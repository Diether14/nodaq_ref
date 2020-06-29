<style>
  .custom-card {
    min-height: 420px;
    max-height: 420px;
  }

  .card-img-top{
    max-height: 200px; 
    min-height: 200px;
    border-radius: 0%; 
  }
</style>

<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('public/user/assets/img/profile_city.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">Welcome to weendi.</h1>
        <h4>Every landing page needs a small description after the big bold title, that&apos;s why we added this text
          here. Add here all the information that can make you or your product create the first impression.</h4>
        <br>
      </div>
    </div>
  </div>
</div>

<div class="main">
  <div class="container">

    <div class="section text-center">

      <div class="col-12">
        <div class="row">
          <!-- <form class="form-inline ">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                  
                    <button type="submit" class="btn btn-white btn-raised btn-fab btn-round">
                    <i class="material-icons">search</i>
                  </button>
                  </div>
                </form> -->
        </div>
      </div>
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
                    style="color: <?= $value->text_color; ?>"><?= character_limiter($value->title, 18) ?> </a>
                </h4>
                <div class="view overlay">
                  <img class="card-img-top rounded-0" src="public/admin/uploads/community/<?= $value->name ?>"
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
                      <?php if($value->user_mode == '1'):?>
                        <p class="text">Created By: <b>Anonymous</b></p>
                        <?php else: ?>
                      <p class="text">Created By: <b><?= $value->nickname ?></b></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>

    <!-- <div class="section text-center">
      <div class="row">
        <div class="col-md-12 ml-auto mr-auto">
          <h2 class="title">Trending Posts</h2>

          <div class="row">
            <div class="col-md-12 ml-auto mr-auto">


              <div class="row">
                <?php foreach ($blog as $key => $value): ?>
                <a href="/weendi/post-view/<?= $value['id']; ?>">
                  <div class="col-lg-4 mb-4">
                    <div class="card h-100 text-center">
                      <img class="card-img-top" src="http://placehold.it/750x450" alt="">
                      <div class="card-body">
                        <h4 class="card-title"><?= $value['title'] ?></h4>
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
                <?php endforeach; ?>
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