@extends('./admin_main')
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

     @if (Session::has('msg'))
         <div class="text-center text-success">
             {{Session::get('msg')}}
         </div>
     @endif

      <!-- Forms Section-->
      <section class="forms">
        <div class="container-fluid">
          <div class="row">
            <!-- Form Elements -->
            <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <div class="mr-auto">
                      <h3 class="h4">{{$med->name}}</h3>
                  </div>
                  <a href="{{url('/')}}/admin/medicine/edit/{{$med->id}}"><i class="btn btn-sm btn-info fa fa-edit"></i></a>
                  <a href="{{url('/')}}/admin/medicine/delete/{{$med->id}}"><i class="btn btn-sm btn-danger fa fa-trash-o"></i></a>
                  <a class="btn btn-sm btn-primary" href="{{url('/')}}/admin/medicine/view">Go Back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{glob(public_path("/images/product/med-" . $med->id. ".*")) ?  url("/") . "/images/product/med-" . $med->id. ".jpg" : url("/")  . "/images/product/demo.jpg" }}" alt="" width="100%">
                        </div>
                        <div class="col-md-6">
                            <table>
                                <tr>
                                    <td><strong>Categories: </strong></td>
                                    <td>{{$med->subCategory->category->name}} || <i>{{$med->subCategory->name}}</i></td>
                                </tr>
                                <tr>
                                    <td><strong>Generic: </strong></td>
                                    <td>{{$med->generic->name}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Unit: </strong></td>
                                    <td>{{$med->unit->name}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Power: </strong></td>
                                    <td>{{$med->power->name}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Stock: </strong></td>
                                    <td>{{$med->stock}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Least Order: </strong></td>
                                    <td>{{$med->least_order}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Delivery Time: &nbsp;&nbsp;&nbsp;</strong></td>
                                    <td>Within Three Working Day</td>
                                </tr>
                                <tr>
                                    <td><strong>Caution: </strong></td>
                                    <td>Stay Safe From Children</td>
                                </tr>
                                <tr>
                                    <td><strong>Discount: </strong></td>
                                    <td>{{$med->discount}}%</td>
                                </tr>
                                <tr>
                                    <td><strong class="text-danger">Price: </strong></td>
                                    <td><strong>{{$med->price}}.00 ৳</strong></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <p><h4>Description: </h4> {{$med->description}}</p>
                        </div>
                    </div>
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
