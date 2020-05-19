<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Community</h1>
  <div class="row">

    <div class="col-lg-12">

      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
     
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Create Community</h6>
        </div>
        <div class="card-body">
        <?php if (session('msg')) : ?>
        <div class="card bg-info text-white shadow">
                    <div class="card-body">
                    <?= session('msg') ?>
            
                    </div>
                  </div>
                  <br>
    <?php endif; ?>

        <form class="contact-form" action="save_community"  method="post" accept-charset="utf-8" enctype="multipart/form-data">

            <div class="form-group">
              <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
          
            <div class="form-group">
              <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Content"></textarea>
            </div>
            <div class="form-group">
              <input type="file" name="file" class="text-center center-block file-upload" accept=".png, .jpg, .jpeg">
            </div>
            <div class="togglebutton">
                  <label>
                    <input type="checkbox" name="community_type" <?= ($user_settings['user_mode'] == '1' ? 'checked': null)?>>
                    <span class="toggle"></span>
                    Private Community
                  </label>
            </div>

            <label for="color">Select your theme color:</label>
            <input type="color" name="color" value="#FFFFFF">
            <label for="color">Select your text color:</label>
            <input type="color" name="text_color" value="#555555">
            <hr>
            <button type="submit" class="btn btn-primary">Save Community</button>

          </form>

        </div>
      </div>

    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>