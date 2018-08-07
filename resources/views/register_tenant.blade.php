@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">Register</div>
          <div class="panel-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form data-toggle="validator" method="post" action="{{url('register_tenant')}}"  enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="txtMovieTitle">Designation</label>
                    <select id="ddlGenge" class="form-control" name="designation" required>
                      <option value="">Choose a Title</option>
                      <option value="Miss">Miss</option>
                      <option value="Mrs">Mrs</option>
                      <option value="Mr">Mr</option>
                    </select>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-offset-1 col-md-6">
                  <div class="form-group">
                    <label for="ddlGenge">Gender</label>
                    <select id="ddlGenge" class="form-control" name="gender" required>
                      <option value="">Choose a Gender</option>
                      <option value="Female">Female</option>
                      <option value="Male">Male</option>
                      <option value="Others">Others</option>
                    </select>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="txtDirector">First Name</label>
                    <input id="txtDirector" type="text" class="form-control" name="firstname" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-offset-1 col-md-6">
                  <div class="form-group">
                    <label for="txtWriter">Last Name</label>
                    <input id="txtWriter" type="text" class="form-control" name="lastname" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="txtDirector">Date of birth</label>
                    <input id="txtDirector" type="date" class="datepicker form-control" name="dateofbirth" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-offset-1 col-md-6">
                  <div class="form-group">
                    <label for="txtWriter">Occupation</label>
                    <input id="txtWriter" type="text" class="form-control" name="occupation" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="txtDirector">Address</label>
                    <input id="txtDirector" type="text" class="form-control" name="address" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-offset-1 col-md-6">
                  <div class="form-group">
                    <label for="txtWriter">State</label>
                    <select id="ddlGenge" class="form-control" name="state" required>
                      <option value="">Choose a state</option>
                      <option value="ABUJA">ABUJA FCT</option>
                      <option value="ABIA">ABIA</option>
                      <option value="ADAMAWA">ADAMAWA</option>
                      <option value="AKWA IBOM">AKWA IBOM</option>
                      <option value="ANAMBRA">ANAMBRA</option>
                      <option value="BAUCHI">BAUCHI</option>
                      <option value="BAYELSA">BAYELSA</option>
                      <option value="BENUE">BENUE</option>
                      <option value="BORNO">BORNO</option>
                      <option value="CROSS RIVER">CROSS RIVER</option>
                      <option value="DELTA">DELTA</option>
                      <option value="EBONYI">EBONYI</option>
                      <option value="EDO">EDO</option>
                      <option value="EKITI">EKITI</option>
                      <option value="ENUGU">ENUGU</option>
                      <option value="GOMBE">GOMBE</option>
                      <option value="IMO">IMO</option>
                      <option value="JIGAWA">JIGAWA</option>
                      <option value="KADUNA">KADUNA</option>
                      <option value="KANO">KANO</option>
                      <option value="KATSINA">KATSINA</option>
                      <option value="KEBBI">KEBBI</option>
                      <option value="KOGI">KOGI</option>
                      <option value="KWARA">KWARA</option>
                      <option value="LAGOS">LAGOS</option>
                      <option value="NASSARAWA">NASSARAWA</option>
                      <option value="NIGER">NIGER</option>
                      <option value="OGUN">OGUN</option>
                      <option value="ONDO">ONDO</option>
                      <option value="OSUN">OSUN</option>
                      <option value="OYO">OYO</option>
                      <option value="PLATEAU">PLATEAU</option>
                      <option value="RIVERS">RIVERS</option>
                      <option value="SOKOTO">SOKOTO</option>
                      <option value="TARABA">TARABA</option>
                      <option value="YOBE">YOBE</option>
                      <option value="ZAMFARA">ZAMFARA</option>
                    </select>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="txtWriter">Contact Number</label>
                    <input id="txtWriter" type="phone" class="form-control" name="phone" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-offset-1 col-md-6">
                  <div class="form-group">
                    <label for="txtDirector">Email</label>
                    <input id="txtDirector" type="email" class="form-control" name="email" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="txtDirector">Password</label>
                    <input id="txtDirector" type="password" class="form-control" name="password" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
                <div class="col-md-offset-1 col-md-6">
                  <div class="form-group">
                    <label for="txtWriter">Retype Password</label>
                    <input id="txtWriter" type="password" class="form-control" data-match="#password" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="txtDirector">Photograph</label>
                    <input id="fileInput" type="file" data-buttonname="btn-outline btn-primary" data-iconname="ti-zip" class="filestyle" name="photo" required>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
              <div>
                <h4>Apartment session</h4>
                <div class="row">
                  <div class="col-md-offset-3 col-md-6">
                    <div class="form-group">
                      <label for="ddlGenge">Asset Category</label>
                      <select id="category_id" class="form-control" name="asset_id" required>
                        <option value="">Choose a Property</option>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="txtDirector">Apartment Type</label>
                      <select id="description" class="form-control" name="asset_description" required>
                        <option value=""></option>
                      </select>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-offset-1 col-md-6">
                    <div class="form-group">
                      <label for="txtWriter">Location</label>
                      <select id="address" class="form-control" name="asset_address" required>
                        <option>Choose an Address</option>
                        <option value=""></option>
                      </select>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="txtDirector">Annual Rent Value</label>
                      <input id="price" class="form-control" name="price" required>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-offset-1 col-md-6">
                    <div class="form-group">
                      <label for="txtWriter">Referrral Code</label>
                      <input id="referral_code" type="text" class="form-control" name="referral_code" required>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                  <button type="submit" class="btn btn-primary">
                    Register
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#category_id").change(function(event) {
        var id = $(this).val();
        $.ajax({
          url: '/select_category_ajax',
          method: "POST",
          data: {category_id : id, _token: '{{ csrf_token() }}'},
          success: function(res){
            $("#description").html('');

            $("#description").html(res.options);
          }
        });
      });
      $("#description").change(function(event) {
        var description = $(this).val();
        var myarr = description.split(":");
        var realDesc = myarr[1];
        $.ajax({
          url: '/agent/select_location_ajax',
          method: "POST",
          data: {description : realDesc, _token: '{{ csrf_token() }}'},
          success: function(res){
            $("#address").html('');

            $("#address").html(res.options);
          }
        });
      });
      $("#address").change(function(event) {
        var address = $(this).val();
        $.ajax({
          url: '/select_price_ajax',
          method: "POST",
          data: {address : address, _token: '{{ csrf_token() }}'},
          success: function(res){
            $("#price").html('');

            $("#price").html(res.input);
          }
        });
      });
    });


    $( ".target" ).change(function() {
      alert( "Handler for .change() called." );
    });
  </script>
@endsection
