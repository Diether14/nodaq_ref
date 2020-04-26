<style>
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
  .toggle.ios .toggle-handle { border-radius: 20rem; }

  .card-preview{
      height: 280px;
  }
</style>
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <div class="container-fluid mb-5 mt-4 col-lg-9">
    <div class="card" style="background-color: #E0E0E0;">
    <h4 class="ml-4 mt-3 mb-0">Type</h4>
    <div class="card-body">
        <div class="row">
        <div class="col-md-3 active" >
          <div class="card" style="background-color:#E74C3C; color:#FFFFFF;">
            <div class="card-body">
              <h6 class="card-title">Cafe</h6>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
            
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card" style="background-color:#1ABC9C ; color:#FFFFFF;">
            <div class="card-body">
              <h6 class="card-title">Blog</h6>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
           
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card" style="background-color:#3498DB; color:#FFFFFF;">
            <div class="card-body">
              <h6 class="card-title">Cartoon/Novel</h6>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card" style="background-color:#F1C40F; color:#FFFFFF;">
            <div class="card-body">
              <h6 class="card-title">Meeting/Event</h6>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is
                a little bit longer.</p>
             
            </div>
          </div>
        </div>

      </div>
      <!-- <div class="row text-center">
          <div class="col-12 mb-2">
            <a class="btn btn-outline-secondary mx-1 prev" href="javascript:void(0)" title="Previous">
              <i class="fa fa-lg fa-chevron-left"></i>
            </a>
            <a class="btn btn-outline-secondary mx-1 next" href="javascript:void(0)" title="Next">
              <i class="fa fa-lg fa-chevron-right"></i>
            </a>
          </div>
        </div> -->
        </div>
        </div>

        <div class="card card-body mt-4">
        <h4>Cafe</h4>
        <form >

            <div class="form-row">
            <div class="form-group ml-3">
                <label>Name of the Cafe</label>
            </div>
            <div class="form-group col-md-4 mx-sm-4 mb-2">
                <input type="text" class="form-control "  placeholder="Type something here">
            </div>
            <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios">

            <div class="form-group mx-sm-4 ml-2 mb-2">
                <input type="text" class="form-control"  placeholder="5~20 String,Number">
            </div>
            <div class="form-group mb-2 mr-3">
                <label>.weendi.com</label>
            </div>
            <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios">
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <div class="card card-preview"></div>
                    </div>
                    <div class="col-9">
                    <div class="input-group">
                        <label>Name of Board</label>
                        <div class="input-group">
                        <div class="d-flex">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control"  placeholder="Type something here">
                        </div>
                        <div class="form-group mb-2 ml-2">
                            <button type="button" class="btn  btn-dark btn-s "><i class="fa fa-plus"></i></button>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group ">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio">Notice</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio2">General</label>
                        </div>
                        </label>
                      </div>
                      </div>
                      <div class="form-group  col-md-4">
                          <input type="text" class="form-control "  placeholder="#general#food#something#else">
                      </div>
                      <div class="form-group col-md-3">
                      <select name="cars" class="form-control">
                          <option selected></option>
                          <option value="volvo">Email authenticated</option>
                          <option value="fiat">Phone authenticated</option>
                        </select>
                      </div>
                      <div class="form-group ">
                      <button class="btn"><i class="fa fa-book"></i></button>
                      <button class="btn"><i class="fa fa-bars"></i></button>
                      </div> 
                    </div>

                    <div class="input-group ">
                        <label>Checked one will be used for notice (select only one)</label>
                        <div class="input-group">
                        <div class="d-flex">
                        <div class="form-row">
                      <div class="form-group">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio3" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio3">Static Nickname (Nickname)</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio4" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio4">Dynamic Nickname</label>
                        </div>
                        </label>
                      </div>
                      </div>
                  
                        </div>
                        </div>
                    </div>

                    <div class="input-group ">
                    <label>Privacy</label>
                        <div class="input-group">
                  
                        <div class="form-row">
                      <div class="form-group mb-2">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio5" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio5">Public</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio6" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio6">Private</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio7" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio7">Invite only</label>
                        </div>
                        </label>
                      </div>
          
                      </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="form-row mt-3">
                          <div class="form-group mx-3">
                              <label>Nation (or state) of target users </label>
                          </div>
                          <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><span class="fa fa-search"></span></div>
                            </div>
                            
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Empty means all (In this case,language must be english only)">
                          </div>
                        </div>
                </div>
                
                <div class="form-row mt-3">
                          <div class="form-group mx-3">
                              <label>Primary language(s) up to two </label>
                          </div>
                          <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><span class="fa fa-search"></span></div>
                            </div>
                            
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Empty means all (In this case,language must be english only)">
                          </div>
                        </div> 
                </div>
              <div class="ml-3">
               <button class="btn btn-primary">Create</button>
               </div>
            </div>
        </form>
    </div>

    </div>


    <div class="card card-body mt-4">
        <h4>Blog</h4>
        <form >

            <div class="form-row">
            <div class="form-group ml-3">
                <label>Name of the Cafe</label>
            </div>
            <div class="form-group col-md-4 mx-sm-4 mb-2">
                <input type="text" class="form-control "  placeholder="Type something here">
            </div>
            <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios">

            <div class="form-group mx-sm-4 ml-2 mb-2">
                <input type="text" class="form-control"  placeholder="5~20 String,Number">
            </div>
            <div class="form-group mb-2 mr-3">
                <label>.weendi.com</label>
            </div>
            <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios">
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <div class="card card-preview"></div>
                    </div>
                    <div class="col-9">
                    <div class="input-group">
                        <label>Name of Board</label>
                        <div class="input-group">
                        <div class="d-flex">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control"  placeholder="Type something here">
                        </div>
                        <div class="form-group mb-2 ml-2">
                            <button type="button" class="btn  btn-dark btn-s "><i class="fa fa-plus"></i></button>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group ">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio">Notice</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio2">General</label>
                        </div>
                        </label>
                      </div>
                      </div>
                      <div class="form-group  col-md-4">
                          <input type="text" class="form-control "  placeholder="#general#food#something#else">
                      </div>
                      <div class="form-group col-md-3">
                      <select name="cars" class="form-control">
                          <option selected></option>
                          <option value="volvo">Email authenticated</option>
                          <option value="fiat">Phone authenticated</option>
                        </select>
                      </div>
                      <div class="form-group ">
                      <button class="btn"><i class="fa fa-book"></i></button>
                      <button class="btn"><i class="fa fa-bars"></i></button>
                      </div> 
                    </div>

                    <div class="input-group ">
                        <label>Checked one will be used for notice (select only one)</label>
                        <div class="input-group">
                        <div class="d-flex">
                        <div class="form-row">
                      <div class="form-group">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio3" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio3">Static Nickname (Nickname)</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio4" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio4">Dynamic Nickname</label>
                        </div>
                        </label>
                      </div>
                      </div>
                  
                        </div>
                        </div>
                    </div>

                    <div class="input-group ">
                    <label>Privacy</label>
                        <div class="input-group">
                  
                        <div class="form-row">
                      <div class="form-group mb-2">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio5" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio5">Public</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio6" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio6">Private</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio7" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio7">Invite only</label>
                        </div>
                        </label>
                      </div>
          
                      </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="form-row mt-3">
                          <div class="form-group mx-3">
                              <label>Nation (or state) of target users </label>
                          </div>
                          <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><span class="fa fa-search"></span></div>
                            </div>
                            
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Empty means all (In this case,language must be english only)">
                          </div>
                        </div>
                </div>
                
                <div class="form-row mt-3">
                          <div class="form-group mx-3">
                              <label>Primary language(s) up to two </label>
                          </div>
                          <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><span class="fa fa-search"></span></div>
                            </div>
                            
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Empty means all (In this case,language must be english only)">
                          </div>
                        </div> 
                </div>
              <div class="ml-3">
               <button class="btn btn-primary">Create</button>
               </div>
            </div>
        </form>
    </div>
    </div>
    
    <div class="card card-body mt-4">
        <h4>Cartoon/Novel</h4>
        <form >

            <div class="form-row">
            <div class="form-group ml-3">
                <label>Name of the Cafe</label>
            </div>
            <div class="form-group col-md-4 mx-sm-4 mb-2">
                <input type="text" class="form-control "  placeholder="Type something here">
            </div>
            <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios">

            <div class="form-group mx-sm-4 ml-2 mb-2">
                <input type="text" class="form-control"  placeholder="5~20 String,Number">
            </div>
            <div class="form-group mb-2 mr-3">
                <label>.weendi.com</label>
            </div>
            <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios">
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <div class="card card-preview"></div>
                    </div>
                    <div class="col-9">
                    <div class="input-group">
                        <label>Name of Board</label>
                        <div class="input-group">
                        <div class="d-flex">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control"  placeholder="Type something here">
                        </div>
                        <div class="form-group mb-2 ml-2">
                            <button type="button" class="btn  btn-dark btn-s "><i class="fa fa-plus"></i></button>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group ">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio">Notice</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio2">General</label>
                        </div>
                        </label>
                      </div>
                      </div>
                      <div class="form-group  col-md-4">
                          <input type="text" class="form-control "  placeholder="#general#food#something#else">
                      </div>
                      <div class="form-group col-md-3">
                      <select name="cars" class="form-control">
                          <option selected></option>
                          <option value="volvo">Email authenticated</option>
                          <option value="fiat">Phone authenticated</option>
                        </select>
                      </div>
                      <div class="form-group ">
                      <button class="btn"><i class="fa fa-book"></i></button>
                      <button class="btn"><i class="fa fa-bars"></i></button>
                      </div> 
                    </div>

                    <div class="input-group ">
                        <label>Checked one will be used for notice (select only one)</label>
                        <div class="input-group">
                        <div class="d-flex">
                        <div class="form-row">
                      <div class="form-group">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio3" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio3">Static Nickname (Nickname)</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio4" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio4">Dynamic Nickname</label>
                        </div>
                        </label>
                      </div>
                      </div>
                  
                        </div>
                        </div>
                    </div>

                    <div class="input-group ">
                    <label>Privacy</label>
                        <div class="input-group">
                  
                        <div class="form-row">
                      <div class="form-group mb-2">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio5" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio5">Public</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio6" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio6">Private</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio7" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio7">Invite only</label>
                        </div>
                        </label>
                      </div>
          
                      </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="form-row mt-3">
                          <div class="form-group mx-3">
                              <label>Nation (or state) of target users </label>
                          </div>
                          <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><span class="fa fa-search"></span></div>
                            </div>
                            
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Empty means all (In this case,language must be english only)">
                          </div>
                        </div>
                </div>
                
                <div class="form-row mt-3">
                          <div class="form-group mx-3">
                              <label>Primary language(s) up to two </label>
                          </div>
                          <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><span class="fa fa-search"></span></div>
                            </div>
                            
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Empty means all (In this case,language must be english only)">
                          </div>
                        </div> 
                </div>
              <div class="ml-3">
               <button class="btn btn-primary">Create</button>
               </div>
            </div>
        </form>
    </div>
    </div>
    
    
    <div class="card card-body mt-4">
        <h4>Meeting/Event</h4>
        <form >

            <div class="form-row">
            <div class="form-group ml-3">
                <label>Name of the Cafe</label>
            </div>
            <div class="form-group col-md-4 mx-sm-4 mb-2">
                <input type="text" class="form-control "  placeholder="Type something here">
            </div>
            <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios">

            <div class="form-group mx-sm-4 ml-2 mb-2">
                <input type="text" class="form-control"  placeholder="5~20 String,Number">
            </div>
            <div class="form-group mb-2 mr-3">
                <label>.weendi.com</label>
            </div>
            <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-style="ios">
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3">
                        <div class="card card-preview"></div>
                    </div>
                    <div class="col-9">
                    <div class="input-group">
                        <label>Name of Board</label>
                        <div class="input-group">
                        <div class="d-flex">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control"  placeholder="Type something here">
                        </div>
                        <div class="form-group mb-2 ml-2">
                            <button type="button" class="btn  btn-dark btn-s "><i class="fa fa-plus"></i></button>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group ">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio">Notice</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio2">General</label>
                        </div>
                        </label>
                      </div>
                      </div>
                      <div class="form-group  col-md-4">
                          <input type="text" class="form-control "  placeholder="#general#food#something#else">
                      </div>
                      <div class="form-group col-md-3">
                      <select name="cars" class="form-control">
                          <option selected></option>
                          <option value="volvo">Email authenticated</option>
                          <option value="fiat">Phone authenticated</option>
                        </select>
                      </div>
                      <div class="form-group ">
                      <button class="btn"><i class="fa fa-book"></i></button>
                      <button class="btn"><i class="fa fa-bars"></i></button>
                      </div> 
                    </div>

                    <div class="input-group ">
                        <label>Checked one will be used for notice (select only one)</label>
                        <div class="input-group">
                        <div class="d-flex">
                        <div class="form-row">
                      <div class="form-group">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio3" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio3">Static Nickname (Nickname)</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio4" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio4">Dynamic Nickname</label>
                        </div>
                        </label>
                      </div>
                      </div>
                  
                        </div>
                        </div>
                    </div>

                    <div class="input-group ">
                    <label>Privacy</label>
                        <div class="input-group">
                  
                        <div class="form-row">
                      <div class="form-group mb-2">
                      <div class="form-check-inline">
                        <label class="form-check-label">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio5" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio5">Public</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio6" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio6">Private</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" class="custom-control-input" id="customRadio7" name="example" value="customEx">
                          <label class="custom-control-label" for="customRadio7">Invite only</label>
                        </div>
                        </label>
                      </div>
          
                      </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="form-row mt-3">
                          <div class="form-group mx-3">
                              <label>Nation (or state) of target users </label>
                          </div>
                          <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><span class="fa fa-search"></span></div>
                            </div>
                            
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Empty means all (In this case,language must be english only)">
                          </div>
                        </div>
                </div>
                
                <div class="form-row mt-3">
                          <div class="form-group mx-3">
                              <label>Primary language(s) up to two </label>
                          </div>
                          <div class="col-auto">
                          <label class="sr-only" for="inlineFormInputGroup">Username</label>
                          <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><span class="fa fa-search"></span></div>
                            </div>
                            
                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Empty means all (In this case,language must be english only)">
                          </div>
                        </div> 
                </div>
              <div class="ml-3">
               <button class="btn btn-primary">Create</button>
               </div>
            </div>
        </form>
    </div>
    </div>


  </div>



  