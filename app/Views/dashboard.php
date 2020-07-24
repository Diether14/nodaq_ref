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



<div class="main bg-light">
    <div class="container  mt-5 mb-0 rounded-0 card mx-auto">
        <div class="mx-auto mt-3">
            <ul class="nav nav-pills nav-pills-icons " role="tablist">

                <li class="nav-item">
                    <a class="nav-link p-4 active" href="#defCommunities" role="tab" data-toggle="tab">
                   Communities
                </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-4 " href="#recomCommunities" role="tab" data-toggle="tab">
                    Recommended
                </a>
                </li>
            </ul>

        </div>

        <div class="tab-content tab-space">
            <div class="tab-pane active show" id="defCommunities">
                <div class="team px-3">
               
                    <div class="row">
                     
                        <?php foreach ($community_list as $key => $value) : ?>

                        <div class="col-md-3">
                            <div class="team-player">

                                <div class="card h-100 custom-card ">
                                    <div class="row m-0 align-items-center" style="background-color: <?= $value->color; ?>">
                                        <div class="col-1 p-0 m-0">
                                            <a href="#" data-toggle="modal" data-target="#anonymousModal"><i class="fa fa-bars px-3" style="float:left;"></i></a>

                                        </div>
                                        <div class="col-10 p-0 m-0 text-center community-title  ">
                                            <h4 class="p-3 my-0  p-3 my-0">
                                                <a href="community-join/<?= $value->id;  ?>" style="color: <?= $value->text_color; ?>"><?= character_limiter($value->title, 18) ?> </a>
                                            </h4>
                                        </div>
                                        <div class="col-1 p-0 m-0">
                                            <a href="#communityInfo<?= $key ?>" data-toggle="modal" data-target="#communityInfo<?= $key ?>"><i class="fa fa-info-circle p-0" style="float:left;"></i></a>

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
                                            <div class="float-right col-sm-8 ">
                                                <a href="#" class=""><span class="badge badge-pill badge-success">Joined</span></a>
                                            </div>
                                            <div class="col-sm-4 p-0">
                                                <label>
                                    <i class=" fa fa-user-secret"></i>
                                    <input type="checkbox" checked="">
                                    <span class="toggle"></span>
                                  </label><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="communityInfo<?= $key ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary py-3 text-white align-items-center">
                                        <h5 class="modal-title m-0">
                                            <?= character_limiter($value->title, 18) ?>
                                        </h5>
                                        <button type="button" class="close bg-danger text-white btn-link p-2 rounded-circle" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">clear</i>
                      </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h3>Created by: <strong>Admin</strong></h3>
                                            <p>Community Status: <strong>Test</strong></p>
                                            <p>Community members: <strong>123</strong></p>
                                        </div>
                                        </hr><br>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="tab-pane " id="recomCommunities">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small>3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        <small>Donec id elit non mi porta.</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        <small class="text-muted">Donec id elit non mi porta.</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        <small class="text-muted">Donec id elit non mi porta.</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-lg-8 card card-body communities of-scroll m-auto">

        <h4 class="title  m-0">Communities</h4>

    </div> -->

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

    <!-- <div class="col-lg-4 card card-body of-scroll">
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
  </div> -->
</div>


<!-- Classic Modal -->
<div class="modal fade" id="anonymousModal" tabindex="-1" role="dialog">
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