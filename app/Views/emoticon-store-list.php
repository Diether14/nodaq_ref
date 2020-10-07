<style>
  .custom-card {
    min-height: 200px;
    max-height: 500px;
  }
  .modal-backdrop {
    position: absolute !important;
  }
  .modal-backdrop.show {
    opacity: 0 !important;
}
</style>

<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('<?= base_url(); ?>/public/user/uploads/stickers/<?= $emoticon_list[0]->name ?>')">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">Emoticon Store</h1>
        <h4>Every landing page needs a small description after the big bold title, that&apos;s why we added this text
          here. Add here all the information that can make you or your product create the first impression.</h4>
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
    <div class="col-lg-12">
    <form class="form-inline ml-auto">
                  <div class="form-group has-white">
                    <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-white btn-raised btn-fab btn-round">
                    <i class="material-icons">search</i>
                  </button>
                </form>
                </div>
                  <h2 class="title"><?= $emoticon_list[0]->title ?> Stickers</h2>
      <?php if (session('msg')) : ?>
                <div class="mx-auto my-auto alert alert-primary alert-dismissible">
                  <?= session('msg') ?>
                  <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                </div>
                <?php endif ?>
                <button class="btn btn-sm btn-primary">Buy ($4.99)</button>
      <div class="team">
        <div class="row">

        <div class="col-md-3">

        <div class="team-player">
          <div class="card card-plain custom-card card-body justify-content-center">
            
            <a class="btn btn-link" data-toggle="modal" data-target="#myModal">
              <span style="font-size:50px; color:#9C27B0" class="fa fa-plus"></span></a>
          </div>
        </div>
        </div>
        <?php foreach ($emoticon_package as $key => $value): ?>
        <a href="#" data-toggle="modal" data-target="#showStickers_<?= $key ?>">
          <div class="col-md-3 ">
            <div class="team-player">

              <div class="card  card-plain ">
                  <div class="view overlay">
                  <img class="card-img-top rounded-0 custom-card" src="<?=base_url() ?>/public/user/uploads/stickers/pack/<?= $value->name ?>" alt="Card image cap">
                  <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                  </a>
                </div>

              </div>
            </div>
          </div>
          
          </a>

          <!-- Classic Modal -->
        <div class="modal fade" id="showStickers_<?= $key ?>" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <!-- <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="material-icons">clear</i>
                </button>
              </div> -->

              <div class="modal-body">
                <div class="text-center">
                  <img src="<?=base_url() ?>/public/user/uploads/stickers/pack/<?= $value->name ?>" class="avatar img-circle img-thumbnail"
                    alt="avatar">
                 
                </div>
                </hr><br>
                <a href="<?= base_url(); ?>/delete-single-sticker/<?= $value->id; ?>/<?= $value->emoticon_store_id ?>">
                <button type="button" class="btn btn-danger">
                  Delete
                </button>
                </a>
                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                Close
              </button>
              </div>
             
            </div>
          </div>
        </div>
        <!--  End Modal -->


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
        <h5 class="modal-title">Upload Sticker Bundle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="material-icons">clear</i>
        </button>
      </div>

      <div class="modal-body">
        <div class="text-center">
          <!-- <img src="<?= base_url();?>/public/assets/img/bg-sticker.png" class="avatar img-circle img-thumbnail"
            alt="avatar"> -->
          <h6>Select multiple stickers...</h6>
          <form class="contact-form" action="<?= base_url(); ?>/add_multiple_sticker" method="post" accept-charset="utf-8"
            enctype="multipart/form-data">

            <input type="file" name="file[]" class="text-center center-block file-upload" accept=".png, .jpg, .jpeg" multiple>
            <input type="hidden" name="emoticon_store_id" value="<?= $id ?>">
           
            <div class="form-group"><br>
              <hr>
              <button type="submit" id="send_form" class="btn btn-primary">Submit</button>
            </div>
          </form>

        </div>
        </hr><br>
      </div>

    </div>
  </div>
</div>
<!--  End Modal -->

<script>
  $(document).ready(function () {


    var readURL = function (input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('.avatar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }


    $(".file-upload").on('change', function () {
      readURL(this);
    });

  });


// function readURL(input, id) {
//     id = id || '#blah';
//     if (input.files &amp;&amp; input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function (e) {
//             $(id)
//                     .attr('src', e.target.result)
//                     .width(200)
//                     .height(150);
//         };

//         reader.readAsDataURL(input.files[0]);
//     }
//  }
</script>