<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('../public/user/assets/img/bg3.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h1>View Blog</h1>
          <!-- <h3 class="title text-center">Subtitle</h3> -->
        </div>
      </div>
    </div>
  </div>
</div>

</div>
  <div class="container">
    <div class="section">
       <div class="col-lg-12 col-md-12">
            <div class="card container">
      
            <!-- Card content -->
            <div class="card-body d-flex flex-row">
              <!-- Avatar -->
              <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">
              <!-- Content -->
          
            </div>
            <!-- Card image -->
            <div class="view overlay">
              <img class="card-img-top rounded-0" src="https://mdbootstrap.com/img/Photos/Horizontal/Food/full page/2.jpg" alt="Card image cap">
              <a href="#!">
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>
            <!-- Card content -->
            <div class="card-body">
              <div class="collapse-content">
                <!-- Text -->

                  <h4 class="card-title"><?= $blog['title']; ?></h4>
                  <h6 class="card-subtitle mb-2 text-muted">Position</h6>
                  <p class="card-text"><?= $blog['content']; ?></p>
        
                <!-- Button -->
                <!-- <a class="btn btn-flat red-text p-1 my-1 mr-0 mml-1 collapsed" data-toggle="collapse" href="#collapseContent" aria-expanded="false" aria-controls="collapseContent"></a>
                <i class="fas fa-share-alt text-muted float-right p-1 my-1" data-toggle="tooltip" data-placement="top" title="Share this post"></i>
                <i class="fas fa-heart text-muted float-right p-1 my-1 mr-3" data-toggle="tooltip" data-placement="top" title="I like it"></i> -->
              </div>
            <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">Report</button>
            
            </div>

            </a>
            <!-- Card -->
          </div>
        <div class="card my-4">
          <h5 class="card-title ml-3">Leave a Comment:</h5>
          <?php if (session('msg')) : ?>
            <div class="alert alert-success" role="alert">
                  <?= session('msg') ?>
                </div>
                <?php endif ?>
          <div class="card-body">
          <form class="contact-form" action="/weendi/add_comment" method="post">
              <div class="form-group">
                <textarea name="content" class="form-control" rows="3"></textarea>
              </div>
              <input type="hidden" name="post_id" value="<?= $blog['id']?>">
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
          
        <?php foreach ($post_comments as $key => $value): ?>
        <div class="media mb-4 ml-3">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">

            <h5 class="mt-0">Commenter Name</h5>
            <?= $value['content']; ?>
          </div>
        </div>
        <?php endforeach; ?>

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
          <textarea name="reason" class="form-control" cols="30" rows="10" placeholder="Reason..."></textarea>  
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
