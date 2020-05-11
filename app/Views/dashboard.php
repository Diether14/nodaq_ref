  <div class="page-header header-filter" data-parallax="true" style="background-image: url('public/user/assets/img/profile_city.jpg')">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1 class="title">Welcome to weendi.</h1>
          <h4>Every landing page needs a small description after the big bold title, that&apos;s why we added this text here. Add here all the information that can make you or your product create the first impression.</h4>
          <br>
          <!-- <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
            <i class="fa fa-play"></i> Watch video
          </a> -->
        </div>
      </div>
    </div>
  </div>
  <div class="main">
    <div class="container">
      
      <div class="section text-center">
        <h2 class="title">Select Community</h2>
        <div class="team">
          <div class="row">
            <?php foreach ($community_list as $key => $value): ?>
           
              <div class="col-md-4">
              <div class="team-player">
                
                <div class="card card-plain">
      
                    <h4 class="card-title">
                  
                    <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-bars pl-3" style="float:left;"></i></a>
                    <a href="community-join/<?= $value->id;  ?>"><?= $value->title ?> </a></h4>
                    
                    <div class="view overlay">
                    <img class="card-img-top rounded-0" src="public/admin/uploads/community/<?= $value->name ?>" alt="Card image cap">
                    <a href="#!">
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>


                  <div class="card-body" >
                    <p class="card-description"><?= $value->content ?>
                      </p>
                  </div>
                  <div class="card-footer justify-content-center">
                  <div class="togglebutton">
                    <label>
                        <input type="checkbox" checked="">
                        <span class="toggle"></span>
                        Toggle is on
                       </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
            <?php endforeach; ?>
            
          </div>
        </div>
      </div>
  
      <div class="section text-center">
        <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
            <h2 class="title">Articles</h2>
          
          <div class="row">
          <div class="col-md-12 ml-auto mr-auto">
            <div class="profile-tabs">
              <ul class="nav nav-pills nav-pills-icons justify-content-center" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#studio" role="tab" data-toggle="tab">
                    <i class="material-icons">camera</i> Blog
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#works" role="tab" data-toggle="tab">
                    <i class="material-icons">palette</i> Work
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#favorite" role="tab" data-toggle="tab">
                    <i class="material-icons">favorite</i> Favorite
                  </a>
                </li>
              </ul>
            </div>

          <div class="tab-content tab-space">
          <div class="tab-pane active" id="studio">
            
      <div class="row">
      <?php foreach ($blog as $key => $value): ?> 
      <a href="/weendi/blog-view/<?= $value['id']; ?>">
      <div class="col-lg-4 mb-4">
        <div class="card h-100 text-center">
          <img class="card-img-top" src="http://placehold.it/750x450" alt="">
          <div class="card-body">
            <h4 class="card-title"><?= $value['title'] ?></h4>
            <h6 class="card-subtitle mb-2 text-muted">Position</h6>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus aut mollitia eum ipsum fugiat odio officiis odit.</p>
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
          <div class="tab-pane text-center" id="works">
            
            


          </div>
          <div class="tab-pane text-center" id="favorite">
            <div class="row">
              <div class="col-md-12">
                test2
              </div>
            </div>
          </div>
        </div>

        <ul class="pagination pagination-primary ">
                <!--
                            color-classes: "pagination-primary", "pagination-info", "pagination-success", "pagination-warning", "pagination-danger"
                        -->
                <li class="page-item"><a href="javascript:void(0);" class="page-link">1</a></li>
                <li class="page-item"><a href="javascript:void(0);" class="page-link">...</a></li>
                <li class="page-item"><a href="javascript:void(0);" class="page-link">5</a></li>
                <li class="page-item"><a href="javascript:void(0);" class="page-link">6</a></li>
                <li class="active page-item"><a href="javascript:void(0);" class="page-link">7</a></li>
                <li class="page-item"><a href="javascript:void(0);" class="page-link">8</a></li>
                <li class="page-item"><a href="javascript:void(0);" class="page-link">9</a></li>
                <li class="page-item"><a href="javascript:void(0);" class="page-link">...</a></li>
                <li class="page-item"><a href="javascript:void(0);" class="page-link">12</a></li>
              </ul>
          </div>
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
              <h5 class="modal-title">Update Profile Picture</h5>
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
