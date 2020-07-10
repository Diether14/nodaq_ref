<style>
  .custom-card {
    min-height: 330px;
    max-height: 330px;
  }

  .card-img-top {
    max-height: 200px;
    min-height: 200px;
    border-radius: 0%;
  }
</style>

<div class="page-header header-filter" data-parallax="true" style="background-image: url('public/user/assets/img/profile_city.jpg')">
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

<div class="main row px-5 ">

  <div class="col-lg-8 card card-body communities of-scroll">

    <h2 class="title text-center m-0"><i class="fa fa-globe pr-3"></i>Communities</h2>
    <div class="team">
      <div class="row">
        <?php foreach ($community_list as $key => $value) : ?>

          <div class="col-md-4">
            <div class="team-player">

              <div class="card h-100 custom-card ">
                <div class="row m-0 align-items-center" style="background-color: <?= $value->color; ?>">
                <div class="col-1 p-0 m-0">
                  <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-bars px-3" style="float:left;"></i></a>

                  </div>
                  <div class="col-11 p-0 m-0 text-center community-title card-title ">
                <h4 class="p-3 my-0 card-title p-3 my-0" >
                <a href="community-join/<?= $value->id;  ?>" style="color: <?= $value->text_color; ?>"><?= character_limiter($value->title, 18) ?> </a>
</h4>
                  </div>
                </div>
                 
                <div class="view overlay">
                  <img class="card-img-top rounded-0" src="public/admin/uploads/community/<?= $value->name ?>" alt="Card image cap">
                  <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                  </a>
                </div>
                <!-- <div class="card-body">
                  <p class="card-description">
                  </p>
                </div> -->
                <div class="card-footer justify-content-center p-0 my-3">
                  <div class="togglebutton d-flex w-100">
                    <div class="float-right col-sm-9 ">
                      <p class="text">Created By: <b><?= $value->nickname ?></b></p>
                    </div>
                    <div class="col-sm-3 p-0">
                    <label>
                      <input type="checkbox" checked="">
                      <span class="toggle"></span>
                    </label><br>
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
                <?php foreach ($blog as $key => $value) : ?>
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

  <div class="col-lg-4 card card-body of-scroll">
    <div class="text-danger  font-weight-bold m-0 ">
      <h3 class="title m-0">Hot</h3>

    </div>
    <hr>
    <div class="col-lg-12 mx-0 px-0 ">
      <div class="list-group card rounded-0 m-0 p-0">
        <div class="row p-2 align-items-center justify-content-center">
        <div class="col-sm-4">
          <img src="https://wtwp.com/wp-content/uploads/2015/06/placeholder-image.png" class="img-fluid " alt="">
            </div>
          <div class="col-sm-8 ">
            <a href="#" class=" pl-0">
             <div class="pl-0">
              <h3 class="title m-1">Item 1</h3>
              <p class="p-0 m-0 text-muted fs-14 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu egestas augue. Sed et convallis nis</p>
             </div> </a>
          </div>
        </div>
      </div>
      <div class="list-group card rounded-0 m-0 p-0">
        <div class="row p-2 align-items-center justify-content-center">
        <div class="col-sm-4">
          <img src="https://wtwp.com/wp-content/uploads/2015/06/placeholder-image.png" class="img-fluid " alt="">
            </div>
          <div class="col-sm-8 ">
            <a href="#" class=" pl-0">
             <div class="pl-0">
              <h3 class="title m-1">Item 1</h3>
              <p class="p-0 m-0 text-muted fs-14 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu egestas augue. Sed et convallis nis</p>
             </div> </a>
          </div>
        </div>
      </div>
      <div class="list-group card rounded-0 m-0 p-0">
        <div class="row p-2 align-items-center justify-content-center">
        <div class="col-sm-4">
          <img src="https://wtwp.com/wp-content/uploads/2015/06/placeholder-image.png" class="img-fluid " alt="">
            </div>
          <div class="col-sm-8 ">
            <a href="#" class=" pl-0">
             <div class="pl-0">
              <h3 class="title m-1">Item 1</h3>
              <p class="p-0 m-0 text-muted fs-14 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu egestas augue. Sed et convallis nis</p>
             </div> </a>
          </div>
        </div>
      </div>
      <div class="list-group card rounded-0 m-0 p-0">
        <div class="row p-2 align-items-center justify-content-center">
        <div class="col-sm-4">
          <img src="https://wtwp.com/wp-content/uploads/2015/06/placeholder-image.png" class="img-fluid " alt="">
            </div>
          <div class="col-sm-8 ">
            <a href="#" class=" pl-0">
             <div class="pl-0">
              <h3 class="title m-1">Item 1</h3>
              <p class="p-0 m-0 text-muted fs-14 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu egestas augue. Sed et convallis nis</p>
             </div> </a>
          </div>
        </div>
      </div>
      <div class="list-group card rounded-0 m-0 p-0">
        <div class="row p-2 align-items-center justify-content-center">
        <div class="col-sm-4">
          <img src="https://wtwp.com/wp-content/uploads/2015/06/placeholder-image.png" class="img-fluid " alt="">
            </div>
          <div class="col-sm-8 ">
            <a href="#" class=" pl-0">
             <div class="pl-0">
              <h3 class="title m-1">Item 1</h3>
              <p class="p-0 m-0 text-muted fs-14 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu egestas augue. Sed et convallis nis</p>
             </div> </a>
          </div>
        </div>
      </div>
      <div class="list-group card rounded-0 p-2 m-0 p-0">
        <div class="row align-items-center justify-content-center">
        <div class="col-sm-4">
          <img src="https://wtwp.com/wp-content/uploads/2015/06/placeholder-image.png" class="img-fluid " alt="">
            </div>
          <div class="col-sm-8 ">
            <a href="#" class=" pl-0">
             <div class="pl-0">
              <h3 class="title m-1">Item 1</h3>
              <p class="p-0 m-0 text-muted fs-14 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu egestas augue. Sed et convallis nis</p>
             </div> </a>
          </div>
        </div>
      </div>
      <div class="list-group card rounded-0 p-2 m-0 p-0">
        <div class="row align-items-center justify-content-center">
        <div class="col-sm-4">
          <img src="https://wtwp.com/wp-content/uploads/2015/06/placeholder-image.png" class="img-fluid " alt="">
            </div>
          <div class="col-sm-8 ">
            <a href="#" class=" pl-0">
             <div class="pl-0">
              <h3 class="title m-1">Item 1</h3>
              <p class="p-0 m-0 text-muted fs-14 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu egestas augue. Sed et convallis nis</p>
             </div> </a>
          </div>
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
                <input type="checkbox" name="mode" <?= ($user_settings['user_mode'] == '1' ? 'checked' : null) ?>>
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