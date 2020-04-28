<style>
  .nav-link[data-toggle].collapsed:before {
    content: " ▾";
  }

  .nav-link[data-toggle]:not(.collapsed):before {
    content: " ▴";
  }
</style>
<!-- Page Content -->
<div class="container">
    <div class="row justify-content-center">
    <img src="https://dummyimage.com/640x360/fff/aaa" class="img-fluid" width="640" height="360" alt="Responsive image">
    
    </div>
    <div class="row">
    
    <!-- Post Content Column -->
    <div class="col-md-3">
      
    <div class="card text-center" style="width: 16rem;">
        <img class="card-img-top"
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQEaKLjyiVsq7Jch5AQBREAHsBZxhjFZa9HSWxtV-x8InEalpgV&usqp=CAU"
          alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Nickname</h5>
          <p class="card-text">User description Here</p>
          <p class="card-text">Guest Book</p>
        </div>
    </div>

      <!-- Side Widget -->
      <div class="card mt-4 mb-3">
        <ul class="nav flex-column flex-nowrap overflow-hidden">
          <li class="nav-item">
            <a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse"
              data-target="#submenu1"><i class=""></i> <span class="d-none d-sm-inline">General</span></a>
            <div class="collapse" id="submenu1" aria-expanded="false">
              <ul class="flex-column pl-2 nav">
                <li class="nav-item"><a class="nav-link py-0" href="#"><span>subclass1</span></a></li>
                <li class="nav-item"><a class="nav-link py-0" href="#"><span>subclass2</span></a></li>
                <li class="nav-item"><a class="nav-link py-0" href="#"><span>subclass3</span></a></li>
              </ul>
            </div>
            <a class="nav-link collapsed text-truncate" href="#submenu2" data-toggle="collapse"
              data-target="#submenu2"><i class=""></i> <span class="d-none d-sm-inline">Notice</span></a>
            <div class="collapse" id="submenu2" aria-expanded="false">
              <ul class="flex-column pl-2 nav">
                <li class="nav-item"><a class="nav-link py-0" href="#"><span>subclass1</span></a></li>
                <li class="nav-item"><a class="nav-link py-0" href="#"><span>subclass2</span></a></li>
                <li class="nav-item"><a class="nav-link py-0" href="#"><span>subclass3</span></a></li>
              </ul>
            </div>
           
          </li>

        </ul>
      </div>
<!--  -->

    </div>

    <div class="col-lg-9 ">
      
      <div class="row">
        <div class="col-lg-6">

          <div class="row align-items-center">
            <div class="col-6">
              <h4>Notice</h4>
            </div>
            <div class="col-6 mb-2">
              <button class="btn btn-xs"><span class="fa fa-book"></span></button>
              <button class="btn btn-xs"><span class="fa fa-list"></span></button>
              <button class="btn btn-xs"><span class="fa fa-info"></span> More</button>
            </div>
          </div>

          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>[subclass]</th>
                <th>Title</th>
                <th>Details</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
              </tr>
              <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
              </tr>
              <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="col-lg-6 ">
        <div class="row align-items-center">
            <div class="col-6">
              <h4>General</h4>
            </div>
            <div class="col-6 mb-2">
              <button class="btn btn-xs"><span class="fa fa-book"></span></button>
              <button class="btn btn-xs"><span class="fa fa-list"></span></button>
              <button class="btn btn-xs"><span class="fa fa-info"></span> More</button>
            </div>
          </div>
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>[subclass]</th>
                <th>Title</th>
                <th>Details</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
              </tr>
              <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
              </tr>
              <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
              </tr>
            </tbody>
          </table>
        </div>


      </div>
      </div>
      </div>
    
</div>