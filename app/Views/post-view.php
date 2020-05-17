<div class="page-header header-filter" data-parallax="true"
  style="background-image: url(<?= base_url(); ?>/public/admin/uploads/community/<?= $profile_photo['name']; ?>)">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ml-auto mr-auto">
        <div class="brand">
          <h1 class="title"><?= $blog['title']; ?></h1>
          <h4 class="small-description"><?= $blog['description'] ?></h4>
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

        <div class="card">

          <!-- Card content -->
          <div class="card-body">
            <div class="collapse-content">
              <?= $blog['content']; ?>

            </div>

          </div>
          <div class="justify-content-left p-2">
            <hr>
            
            <a href="#" class="btn btn-link"><i class="fa fa-comment pr-1"></i> 20</a>
            <a href="#" data-toggle="modal" data-target="#share"  class="btn btn-link"><i class="fa fa-share pr-1" ></i> Share</a>

            <?php if(empty($report)): ?>
                <a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-link " class="btn btn-link"><i class="fa fa-exclamation pr-1"></i> Report Post</a>
            <?php else: ?>

            <a href="#" class="btn btn-link"><i class="fa fa-exclamation pr-1"></i> Reported</a>
            <?php endif; ?>

          </div>
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
          <textarea name="share_content" class="form-control" cols="30" rows="10" placeholder="Reason..."></textarea>
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