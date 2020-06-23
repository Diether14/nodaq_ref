<style>
 
 .custom-card {
    min-height: 270px;
    max-height: 500px;
  }
  .modal-backdrop.show {
    opacity: 0 !important;
    position: absolute !important;
}
.modal-content {
  top: 60px;
}

/* modal show */
.modal-backdrop {
    z-index: 1040 !important;
    display: none;    
  }
  .modal-dialog {
      margin: 32px auto;
      z-index: 1100 !important;
  }

</style>

<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('public/user/assets/img/profile_city.jpg')">
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
    <!-- <form class="form-inline ml-auto">
                  <div class="form-group has-white">
                    <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-white btn-raised btn-fab btn-round">
                    <i class="material-icons">search</i>
                  </button>
                </form> -->
                </div>
    <h2 class="title"> Stickers</h2>
      <?php if (session('msg')) : ?>
                <div class="mx-auto my-auto alert alert-primary alert-dismissible">
                  <?= session('msg') ?>
                  <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                </div>
                <?php endif ?>
      <div class="team">
        <div class="row">

      
        <?php foreach ($emoticon_list as $key => $value): ?>
       
          <div class="col-md-3 ">
            <div class="team-player">

              <div class="card  custom-card ">

                <h4 class="card-title p-3 my-0" style="background-color: ">

                  <!-- <a href="#" data-toggle="modal"  data-target="#edit_<= $key ?>"><i class="fa fa-cog pl-1 pt-1"
                      style="float:left;"></i></a> -->
                      <a href="<?= base_url(); ?>/emoticon-store-list/<?= $value->id ?>">
                  <?= character_limiter($value->title, 15) ?>
                  </a>
                </h4>
                <div class="view overlay">
                  <img class="card-img-top rounded-0" src="public/user/uploads/stickers/<?= $value->name ?>" alt="Card image cap">
                  <a href="#!">
                    <div class="mask rgba-white-slight"></div>
                  </a>
                </div>

                <div class="card-footer justify-content-center">

                  <div style="float-right">
                    <p class="text">By: <b><?= $value->nickname ?></b></p>
                  </div>

                </div>
              </div>
            </div>
          </div>
        
          
     <?php endforeach; ?>

        

        </div>
      </div>
    </div>

  </div>

</div>


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