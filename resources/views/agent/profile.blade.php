@include('partials.head')
  <body data-sidebar-color="sidebar-light" class="sidebar-light">
    <!-- Header start-->
   @include('partials.topnav')
    <!-- Header end-->
    <div class="main-container">
      <!-- Main Sidebar start-->
             @include('partials.sidenav')
      <!-- Main Sidebar end-->
      <div class="page-container">
        <div class="page-header clearfix">
         
        
        </div>
        <div class="page-content container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="widget">
                <div class="widget-heading">
                  <h3 class="widget-title">Your Profile</h3>
                </div>
                <div class="widget-body">
                  <form>
 
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">First Name</label>
                          <input id="txtDirector" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Last Name</label>
                          <input id="txtWriter" type="text" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Date of Birth</label>
                          <input id="txtDirector" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Gender</label>
                          <input id="txtWriter" type="text" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Company Name</label>
                          <input id="txtDirector" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Company Address</label>
                          <input id="txtWriter" type="text" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtDirector">Email</label>
                          <input id="txtDirector" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="txtWriter">Phone</label>
                          <input id="txtWriter" type="text" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="txtWebsite">Portal Url</label>
                          <input id="txtWebsite" type="text" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                   
                   
                    <br/>

                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Right Sidebar start-->
    
    </div>
    <!-- Demo Settings start-->
    
    <!-- Demo Settings end-->
@include('partials.foot')