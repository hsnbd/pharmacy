@extends('./admin_main')
@section('content')
    <div class="content-inner">
      <!-- Page Header-->
      <header class="page-header">
        <div class="container-fluid">
          <h2 class="no-margin-bottom">Medicines</h2>
        </div>
      </header>
      <!-- Breadcrumb-->
      <div class="breadcrumb-holder container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Medicines</li>
        </ul>
      </div>
      @if (Session::has('msg'))
          <div class="text-center text-success">
              {{Session::get('msg')}}
          </div>
      @endif
      <section class="tables">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h3 class="h4 mr-auto">Medicine List </h3>
                  <a class="btn btn-sm btn-warning" href="{{url('/')}}/admin/medicine/import">Import Medicine</a> &nbsp;
                  <a class="btn btn-sm btn-primary" href="{{url('/')}}/admin/medicine/new">Add New</a>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-hover">
                      {{ $medicines->links() }}
                      <br />
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($medicines as $i => $med)
                          <tr>
                            <th scope="row">{{($medicines->currentpage()-1) * $medicines->perpage() + $i + 1}}</th>
                            <td><img src="{{glob(public_path("/images/product/med-" . $med->id. ".*")) ?  url("/") . "/images/product/med-" . $med->id. ".jpg" : url("/")  . "/images/product/demo.jpg" }}" alt="" width="100px"></td>
                            <td><a href="{{url('/')}}/admin/medicine/show/{{$med->id}}">{{$med->name}}</a></td>
                            <td>{{$med->price}}</td>
                            <td>{{$med->stock}}</td>
                            <td>
                                <a href="{{url('/')}}/admin/medicine/edit/{{$med->id}}"><i class="btn btn-sm btn-info fa fa-edit"></i></a>
                                <a href="{{url('/')}}/admin/medicine/delete/{{$med->id}}"><i class="btn btn-sm btn-danger fa fa-trash-o"></i></a>
                            </td>
                          </tr>
                      @endforeach

                    </tbody>

                  </table>
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
@endsection
