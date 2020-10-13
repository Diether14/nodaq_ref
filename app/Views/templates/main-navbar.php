<nav id="main-nav" class="navbar dm_bg-dark  fixed-top navbar-expand-lg p-0 m-0">
  <div class="container">
    <div class="navbar-translate">
      <a class="navbar-brand" href="<?= base_url(); ?>/home">
        <img src="<?= base_url(); ?>/public/images/weendi.png" alt="" width="100"> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>



    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">


        <!-- <li class="dropdown nav-item">
                        <a href="javascript:;" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown">
                            <div class="profile-photo-small">
                                <?php if(!empty($profile_photo['name'])): ?>

                                <img src="<?= base_url(); ?>/public/user/uploads/profiles/<?= $profile_photo['name'] ?>"
                                    alt="Circle Image" class="rounded-circle img-fluid z-depth-2">

                                <?php else: ?>
                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="Circle Image"
                                    class="img-raised rounded-circle img-fluid  z-depth-2" alt="avatar">

                                <?php endif; ?>

                            </div>
                        </a>
                    

  -->
        <!-- Topbar Search -->
        <form id="search_form" action="<?= base_url() ?>/search/all"
          class="d-none d-sm-inline-block form-inline ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control " name="q" placeholder="Search for..." aria-label="Search"
              aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn bg-transparent rounded-circle p-2" type="submit">
                <i class="fas fa-search fa-sm text-primary"></i>
              </button>
            </div>
          </div>
        </form>

        <!-- Nav Item - Alerts -->
        <li class="nav-item  no-arrow mx-1">
          <a class="nav-link btn bg-transparent  rounded-circle p-2 text-center d-flex justify-content-center align-items-center"
            href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-bell fa-fw text-primary"><span class="notification-badge bg-danger"></span></i>
            <!-- Counter - Alerts -->

          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
              NOTIFICATIONS
            </h6>
            <div id="notifContainer">
            </div>

            <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a> -->
            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
          </div>
        </li>


        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('nickname') ?></span>
            <img class="img-profile rounded-circle" src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a href="<?= base_url(); ?>/profile" class="dropdown-item" href="#">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
            </a>
            <a class="dropdown-item" href="<?= base_url(); ?>/settings">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
              Settings
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Activity Log
            </a>
            <a class="dropdown-item" href="#" id="dm-switch">
              <i class="fas fa-moon fa-sm fa-fw mr-2 text-gray-400"></i>
              Dark Mode
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  window.onload = () => {
    $.ajax({
      url: `<?=base_url()?>/notifications/get/a/a`,
      method: "get",
      dataType: "JSON",
      success: function (res) {
        console.log(res)
        res.data.map((item, i) => {
          if (i < 5) {
            let icon = null;
            let bg = null;
            switch (item.type) {
              case "aa": icon = 'fas fa-file-alt'; break;
              case "sb": icon = 'fas fa-user-plus'; break;
              case "rr": icon = 'fas fa-chart-pie'; break;
              case "ul": icon = 'fas fa-user'; break;
            }
            document.querySelector('#notifContainer').innerHTML +=
              `
                  <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                      <div class="icon-circle bg-primary">
                        <i class="${icon} text-white"></i>
                      </div>
                    </div>
                    <div>
                      <div class="small text-gray-500">December 12, 2019</div>
                      <span class="font-weight-bold">${item.content}</span>
                    </div>
                  </a>
                `
          }
        })
      }
    })
  }
</script>