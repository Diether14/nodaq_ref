<style>
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
  .toggle.ios .toggle-handle { border-radius: 20rem; }

  .card-preview{
      height: 280px;
  }
</style>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>


<div class="container">

  <div class="col-lg-9 mt-3 mb-5">
    <div class="card">
      <h4 class="card-header">Settings</h4>
      <div class="col-lg-12 card-body">
        <!-- <button type="button" class="btn btn-light btn-lg rounded-6 mb-3"> Back</button> -->

        <div class="row">

          <form>
            <div class="form-inline">
              <div class="form-group mx-sm-3 mb-2">
                <label class="mr-2">Description </label>
                <input type="text" class="form-control"  placeholder="Type something" >
              </div>
              <button type="submit" class="btn btn-primary mb-2">Change</button>
            </div><br>
            <div class="form-inline">
              <div class="form-group mx-sm-3 mb-2">
                <label class="mr-2">Auto Image </label>
                <input type="text" class="form-control" placeholder="Type something">
              </div>
              <button type="submit" class="btn btn-primary mb-2">Change</button>
            </div><br>
            <div class="form-inline">
              <div class="form-group mx-sm-3">
                <label class="mr-2">Spamming block codes </label>
              </div>
              <button type="submit" class="btn btn-primary mb-2">Change</button>
            </div><br>
            <div class="row ml-4">
              <div class="form-group">
                <table class="table">
                  <col>
                  <colgroup span="2"></colgroup>
                  <colgroup span="2"></colgroup>
                  <tr>
                    <td rowspan="2"></td>
                
                  </tr>
                  <tr class="table-active">
                    <th scope="col">White star</th>
                    <th scope="col">Yellow star</th>
                  </tr>
                  <tr>
                    <th scope="row" class="table-active">Upvote/Devote</th>
                    <td><input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios"></td>
                    <td><input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios"></td>
                  </tr>
                  <tr>
                    <th scope="row" class="table-active">Post</th>
                    <td><input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios"></td>
                    <td><input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios"></td>
                  </tr>
                  <tr>
                    <th scope="row" class="table-active">Comment</th>
                    <td><input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios"></td>
                    <td><input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios"></td>
                  </tr>
                </table>
              </div>
            </div><br>
            <div class="form-group ml-3 mb-2">
            <label for="">Recommend other communities for users</label>  <br>
            <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios">
            </div>
            <div class="form-group ml-3 mt-3 mb-2">
            <label >Minimum vote count to list on hot boardChange</label><br>
            <input type="text" class="form-control" placeholder="Type something" style="width:50%;">
            <br>
            <label>Close this community (There will be a poll for 7 days and greater than 50% of people must agree that avobe white stars)</label>
            <button class="btn btn-primary btn-lg">Open close community poll</button>
            </div>
            <div class="form-group ml-3 mb-2">
            <input type="text" class="form-control" placeholder="Title" style="width:70%;"><br>
            <textarea class="form-control" cols="30" rows="10" style="width:70%;">Blah blah</textarea>
            </div>
            <div class="form-group ml-3 mb-2">
            <label>Change manager of this community (There will be a poll for 7 days and 50% of people must agree that among 50% of above yellow stars )</label>
          </div>
          <div class="col-6 mb-5">
            <div class="input-group mb-2">
            <div class="input-group-prepend" >
              <div class="input-group-text"><span class="fa fa-search"></span></div>
            </div>
            <input type="text" class="form-control" placeholder="Search for ID and select" >
          </div>
          
            </div>
            <div class="form-group ml-3 mb-2">
            <input type="text" class="form-control" placeholder="Title" style="width:70%;"><br>
            <textarea  class="form-control"  cols="30" rows="10" style="width:70%;">Blah blah</textarea><br>
            <button class="btn btn-primary btn-lg mt-3">Open close community poll</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>