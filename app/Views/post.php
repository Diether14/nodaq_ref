<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('public/user/assets/img/bg3.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand text-center">
          <h1>Create Post</h1>
          <!-- <h3 class="title text-center">Subtitle</h3> -->
        </div>
      </div>
    </div>
  </div>
</div>
<div class="">
  <div class="container">
    <div class="section">

      <div class="col-lg-12 col-md-12">
        <div class="card container">
            <div class="form-group ">
            <div class="input-group">
                <input type="text" id="title" name="title" class="form-control" placeholder="Blog title..."
                  value="<?=  $user['nickname']; ?>" required>
              </div>
            </div>
        </div>
        <div class="card my-auto mx-auto" >
            <div id="editor">
                <h1>Hello world!</h1>
                <p>I'm an instance of <a href="https://ckeditor.com">CKEditor</a>.</p>
        </div>
        
        </div>
        <div>
        <!-- <div class="card container p-3">
        <div class="input-group">
              <input type="file" name="file" class="text-center center-block file-upload" accept=".png, .jpg, .jpeg">
            </div>
        </div>
        </div> -->
        <div class="mt-3">

        <button id="save_post" class="btn btn-primary">Save</button>

        </div>
    </div>
  </div>
</div>
