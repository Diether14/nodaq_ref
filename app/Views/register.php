<div class="container">
    <div class="row">
        <div class="col-12  col-sm-8 offset-sm-2 col-md-6 offset-md-3   form-wrapper"> 
        <div class="card mx-5 my-5">    
        <div class="card-header">Register</div>
        <div class="card-body">
              
                <form class="" action="/weendigo/register" method="post">
                    <div class="row">
                    <div class="col-12 col-sm-12">
                    <div class="form-group">
                        <label for="nickname">Nickname</label>
                        <input type="text" class="form-control" name="nickname" id="nickname" value="<?= set_value('nickname'); ?>">
                    </div>
                    </div>
                  
                    <div class="col-12">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>">
                    </div>
                    </div>
                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                    </div>
                    </div>
                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="password_confirm">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
                    </div>
                    </div>

                    <?php if(isset($validation)): ?>
                        <div class="col-12"> 
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/weendigo">Already have an accout?</a>
                        </div>
                    </div>
                    
                </form>
            </div>
            </div>
        </div>
    </div>
    
</div>
