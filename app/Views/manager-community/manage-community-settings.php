<style>
  .dashboard-card {
    min-height: 130px;
    max-height: 130px;
  }

  /* modal show */
  .modal-backdrop {
    z-index: 1040 !important;
    display: none;
  }

  .modal-dialog {
    margin: 80px auto;
    z-index: 1100 !important;
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
  <div id="users">
    <div class="section p-0">

      <div class="col-lg-12">
        <div class="row">
          <div class="col-md-3">
            <ul class="nav nav-pills nav-pills-icons flex-column  card p-3" role="tablist">

              <li class="nav-item">
                <a class="nav-link " href="<?= base_url(); ?>/manage-community/<?= $community_id ?>">
                  <i class="material-icons">dashboard</i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="<?= base_url(); ?>/manage-community/category/<?= $community_id ?>">
                  <i class="material-icons">category</i>
                  Category
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="<?= base_url(); ?>/manage-community/users/<?= $community_id ?>">
                  <i class="material-icons">people</i>
                  Community Users
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link"  href="<?= base_url(); ?>/manage-community/reported_posts/<?= $community_id ?>">
                  <i class="material-icons">report</i>
                  Reported Posts
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#acm" role="tab" data-toggle="tab">
                  <i class="material-icons">assistant</i>
                  Manage Managers
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#ip" role="tab" data-toggle="tab">
                  <i class="material-icons">share</i>
                  IP Management
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#settings" role="tab" data-toggle="tab">
                  <i class="material-icons">settings</i>
                  Settings
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-9 card-body">
            <div class="tab-content">

              <div class="tab-pane active" id="settings">
                <?php if(session('msg')): ?>
                <div class="alert alert-success" role="alert">
                  <?= session('msg') ?>
                </div>
                <?php endif; ?>
                <!-- Users in community -->

                <h2>Community Settings</h2>
                <!-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_ac">Add Assistant Manager</button> -->
                <div class="row">
                  <div class="col-lg-12">
                  <div class="form card card-body">
                  <h4>Edit Community</h4>
                    <form class="contact-form" action="update_community" method="post" accept-charset="utf-8"
                            enctype="multipart/form-data">

                            <div class="form-group">
                              <input type="text" name="title" class="form-control" placeholder="Title"
                                value="<?= $value->title ?>">
                            </div>
                            <input type="hidden" name="com_photo_id" value="<?= $value->com_photo_id; ?>">
                            <input type="hidden" name="id" value="<?= $value->id; ?>">

                            <div class="form-group">
                              <textarea name="content" class="form-control" cols="30" rows="10"
                                placeholder="Content"><?= $value->content ?></textarea>
                            </div>

                            <div class="togglebutton">
                              <label>
                                <input type="checkbox" name="community_type"
                                  <?= ($value->community_type	 == '1' ? 'checked': null)?>>
                                <span class="toggle"></span>
                                Private Community
                              </label>
                            </div>
                            <label for="color">Select your theme color:</label>
                            <input type="color" name="color" value="<?= $value->color; ?>" class="myField"><br>
                            <label for="color">Select your text color:</label>
                            <input type="color" name="text_color" value="<?= $value->text_color; ?>"><hr>
                            <div class="form-group"> 
                              <h6>Edit Community Cover Photo</h6>
                              
                              <img src="<?= base_url(); ?>/public/user/assets/img/bg3.jpg" alt="" width="50%" height="50%"> 
                              <input type="file" name="file" class="text-center center-block file-upload form-group" accept=".png, .jpg, .jpeg">
                            </div><hr>
                            <h6>Set up upvote and devote</h6>
                            <div class="form-group">
                              <label>Upvote Name</label><br>
                              <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Devote Name</label><br>
                              <input type="text" class="form-control">
                            </div><hr>
                            <button type="submit" class="btn btn-primary btn-sm">Save Community</button>
                            <button type="submit" class="btn btn-info btn-sm" >Preview Community</button>
                          
                          </form>
                  </div>
                  
                  </div>
                  
                </div>
               
                
                 <div class="card card-body mt-0">
                    <h6>Settings</h6>
                    <div class="form-group">
                      <label>Reset Community</label><br>
                      <button class="btn btn-primary btn-sm"> Reset</button>
                    </div>
                    <div class="form-group">
                      <label>Remove Community</label><br>
                      <button class="btn btn-danger btn-sm"> Remove</button>
                    </div>
                  </div>
                
              </div>








            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>
</div>


</script>