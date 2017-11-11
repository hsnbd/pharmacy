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
                  <h3 class="h4 mr-auto">Import Medicine List</h3>
                  <a class="btn btn-sm btn-primary" href="{{url('/')}}/admin/medicine/view">View All</a>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" method="post" action="{{url('/')}}/admin/medicine/import/store" enctype="multipart/form-data">
                      {{ csrf_field() }}
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label class="form-control-label">Import Medicine List (.csv)</label>
                        <input type="file" name="medicinesExcel">
                      </div>
                    </div>
                    <div class="line"></div>
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-3">
                        <a href="{{url('/')}}/admin/medicine/view" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
