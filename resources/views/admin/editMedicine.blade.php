@extends('./admin_main')
@push('scripts')
    <script src="{{url('/')}}/admin/vendor/jquery-validation/jquery.validate.min.js"></script>
@endpush

@section('content')
    <div class="content-inner">
      <!-- Page Header-->
      <header class="page-header">
        <div class="container-fluid">
          <h2 class="no-margin-bottom">Medicine</h2>
        </div>
      </header>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Medicine</li>
        </ul>
      </div>

      @if($errors->any())
          <ul class="text-center text-danger">
              @foreach ($errors->all() as $error)
                  <li>{{$error}}</li>
              @endforeach
          </ul>
      @else
         @if (Session::has('msg'))
             <div class="text-center text-success">
                 {{Session::get('msg')}}
             </div>
         @endif
      @endif
      <!-- Forms Section-->
      <section class="forms">
        <div class="container-fluid">
          <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h3 class="h4 mr-auto">Edit Medicine | <span class="text-danger">{{$med->name}}</span></h3>
                  <a class="btn btn-sm btn-primary" href="{{route('med.view')}}">Go Back</a>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" method="post" action="{{url('/')}}/admin/medicine/update" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{$med->id}}">

                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label class="form-control-label">Medicine Name</label>
                        <input type="text" name="name" class="form-control" value="{{$med->name}}">
                      </div>
                      <div class="col-sm-6">
                        <label class="form-control-label">Description</label>
                        <input type="text" name="description" class="form-control" value="{{$med->description}}">
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <div class="col-sm-3">
                          <label class="form-control-label">Price</label>
                          <input type="text" name="price" class="form-control" value="{{$med->price}}">
                      </div>
                      <div class="col-sm-3">
                          <label class="form-control-label">Discount</label>
                          <input type="text" name="discount" class="form-control" value="{{$med->discount}}">
                      </div>
                      <div class="col-sm-3">
                          <label class="form-control-label">Stock</label>
                          <input type="text" name="stock" class="form-control" value="{{$med->stock}}">
                      </div>
                      <div class="col-sm-3">
                          <label class="form-control-label">Least Order</label>
                          <input type="text" name="lorder" class="form-control" value="{{$med->least_order}}">
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                          <div class="col-sm-3 select">
                              <select name="scat" class="form-control">
                                <option style="display:none;" selected>Categories</option>
                                @foreach ($categories as $cat)
                                    <optgroup label="{{$cat->name}}">
                                      @if ($cat->subCategories->count())
                                          @foreach ($cat->subCategories as $scat)
                                              <option value="{{$scat->id}}" {{$med->SubCategory->id == $scat->id ? "selected":""}}>{{$scat->name}}</option>
                                          @endforeach
                                      @endif
                                    </optgroup>
                                @endforeach
                              </select>
                          </div>
                          <div class="col-sm-3 select">
                            <select name="unit" class="form-control">
                              <option style="display:none;" selected>Unit</option>
                              @foreach ($units as $unt)
                                  <option value="{{$unt->id}}"  {{$med->unit->id == $unt->id ? "selected":""}}>{{$unt->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-sm-3 select">
                            <select name="generic" class="form-control">
                              <option style="display:none;" selected>Generic</option>
                              @foreach ($generics as $gen)
                                  <option value="{{$gen->id}}" {{$med->generic->id == $gen->id ? "selected":""}}>{{$gen->name}}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="col-sm-3 select">
                            <select name="power" class="form-control">
                              <option style="display:none;" selected>Power</option>
                              @foreach ($powers as $pwr)
                                  <option value="{{$pwr->id}}" {{$med->power->id == $pwr->id ? "selected":""}}>{{$pwr->name}}</option>
                              @endforeach
                            </select>
                        </div>
                        </div>
                    <div class="line"></div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label>Old Image</label>
                            <img src="{{glob(public_path("/images/product/med-" . $med->id. ".*")) ?  url("/") . "/images/product/med-" . $med->id. ".jpg" : url("/")  . "/images/product/demo.jpg" }}" alt="" width="100%">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Upload New Medicine Image</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-secondary btn-file">
                                    Browse… <input type="file" name="image" id="imgInp">
                                </span>
                            </span>
                            <input type="text" class="form-control"  readonly>
                        </div>
                        <img id='img-upload'/>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-3">
                        <a href="{{url('/')}}/admin/medicine/view" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Footer-->
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Your company &copy; 2017-2019</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>

    <script type="text/javascript">
        $(document).ready( function() {
            $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
            });

            $('.btn-file :file').on('fileselect', function(event, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function(){
                readURL(this);
            });
        });
    </script>
@endsection
