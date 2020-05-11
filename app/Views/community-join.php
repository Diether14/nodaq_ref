
<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('<?= base_url(); ?>/public/admin/uploads/community/<?= $community_list[0]->name; ?>')">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title"><?= $community_list[0]->title; ?></h1>
        <h4><?= $community_list[0]->content; ?></h4>
        <br>
        <?php if(empty($users_community)): ?>
        <form class="contact-form" action="<?= base_url(); ?>/join_community" method="post">
          <input type="hidden" name="community_id" value="<?= $community_list[0]->id; ?>">
          <button type="submit" class="btn btn-primary btn-raised btn-lg">
            Join Community
          </button>
        </form>  
        <?php else: ?>
          <button class="btn btn-primary btn-raised btn-lg">
            Joined
          </button>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<div class="main">
  <div class="container">

    <div class="section text-center">
      <h2 class="title">...</h2>
      <?php if (session('msg')) : ?>
        <div class="card bg-info text-white shadow">
                    <div class="card-body">
                    <?= session('msg') ?>
            
                    </div>
                  </div>
                  <br>
    <?php endif; ?>
      <div class="team text-center">
        <div class="row">
       
          

        </div>
      </div>
    </div>

    
  </div>

</div>
