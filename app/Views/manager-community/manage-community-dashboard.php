<style>
.dashboard-card{
  min-height: 130px;
  max-height: 130px;
}

</style>
<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('<?= base_url(); ?>/public/user/assets/img/bg3.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h1>Manage Community</h1>
          <!-- <h3 class="title text-center">Subtitle</h3> -->
        </div>
      </div>
    </div>
  </div>
</div>
<div class="main">
  <div class="">
    <div class="section p-0">

      <div class="col-lg-12">
        <div class="row">
          <div class="col-md-3">
            <ul class="nav nav-pills nav-pills-icons flex-column  card p-3" role="tablist">

              <li class="nav-item">
                <a class="nav-link active" href="#personal" role="tab" data-toggle="tab">
                  <i class="material-icons">dashboard</i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#profile" role="tab" data-toggle="tab">
                  <i class="material-icons">category</i>
                  Category
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#password" role="tab" data-toggle="tab">
                  <i class="material-icons">assistant</i>
                  Manage Managers
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#password" role="tab" data-toggle="tab">
                  <i class="material-icons">report</i>
                  Reported List
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#password" role="tab" data-toggle="tab">
                  <i class="material-icons">share</i>
                  IP Management
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#password" role="tab" data-toggle="tab">
                  <i class="material-icons">settings</i>
                  Settings
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-9 p-3">
            <div class="tab-content">
              <div class="tab-pane active" id="personal">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card dashboard-card" >
                    <div class='card-body justify-content-center'>
                      <div class="text-center">
                        <i class="material-icons text-primary" style="font-size:40px;">article</i>
                        <p><b>312</b></p>
                        <h6 class="">Total Posts</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card dashboard-card" >
                    <div class='card-body justify-content-center'>
                      <div class="text-center">
                      <i class="material-icons text-success"  style="font-size:40px;">report</i>
                      <p><b>67</b></p>
                      <h6>Total Members</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card dashboard-card" >
                    <div class='card-body '>
                      <div class="text-center">
                      <i class="material-icons text-danger"  style="font-size:40px;">report</i>
                      <p><b>12</b></p>
                      <h6>Total Reported Posts</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
              </div>


              <div class="tab-pane" id="profile">

                <h2 class="text-center title">Update Profile Information</h2>
                <?php if(session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session()->get('success') ?>
                </div>
                <?php endif; ?>
                


              </div>


              <div class="tab-pane" id="password">

                <h2 class="text-center title">Update Password</h2>
                <?php if(session()->get('success')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session()->get('success') ?>
                </div>
                <?php endif; ?>
                


              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>
</div>
<script>
  $('document').ready(function () {
    $("#btnSubmit").attr("disabled", true);

  });
</script>