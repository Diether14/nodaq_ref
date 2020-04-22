<div class="container">
    <div class="row">
        <div class="col-12  col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper"> 
        <div class="card mx-5 my-5">    
        <h3 class="card-header">Login</h3>
            <div class="card-body">
                
                <?php if(session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form class="" action="/weendigo/login" method="post">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                    </div>
                    
                    <?php if(isset($validation)): ?> 
                        <div class="col-12"> 
                            <div class="alert alert-danger" role="alert">
                                <?= $validation->listErrors() ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="col-12 col-sm-8 text-right">
                            <a href="/weendigo/register">Don't have an account yet?</a>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>
</div>