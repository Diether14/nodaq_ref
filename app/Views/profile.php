<div class="container mb-5">
    <div class="row">
        <div class="col-12  col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white form-wrapper"> 
            <div class="card">
                <div class="card-header">
                <h3><?= $user['firstname'].' ' .$user['lastname'] ?></h3>
                </div>
                <div class="card-body">
                <?php if(session()->get('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <form class="" action="/weendigo/profile" method="post">
                    <div class="row">
                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" value="<?= set_value('firstname', $user['firstname']); ?>">
                    </div>
                    </div>
                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" value="<?= set_value('lastname', $user['lastname']); ?>">
                    </div>
                    </div>
                    <div class="col-12">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" readonly id="email" value="<?= $user['email']; ?>">
                    </div>
                    </div>
                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="" required>
                    </div>
                    </div>
                    <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="password_confirm">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="" required>
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
                            <button type="submit" class="btn btn-primary">update</button>
                        </div>
                      
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<br><br><br>
</div>