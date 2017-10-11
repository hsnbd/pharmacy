@extends('master')
@section('content')

      <!--medByCat -->
    <div class="medByCat">
        <div class="container">
            <div class="row ">

                <div class="col-md-12">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#!">Home</a></li>
                      <li class="breadcrumb-item"><a href="#!">Library</a></li>
                      <li class="breadcrumb-item active">Data</li>
                    </ol>
                </div>

                <div class="col-md-12">
                    <h5 class="display-5" style="display:inline-block">Checkout </h5>
                    <a style="float:right" class="btn btn-secondary" href="#"><i class="fa fa-arrow-left"></i> Return to Cart</a>
                </div>

                <div class="col-md-12 cart">
                    <div class="side-shipping col-md-6">
                        <span class="circle">1</span>
                        Shipping Info
                    </div>
                    <div class="side-payment col-md-6">
                        <span class="circle">2</span>
                        Payment And Order Review
                    </div>
                </div>

                <div class="col-md-12">
                    <h4 class="display-5">Checkout Method</h4>
                    <hr>
                </div>

                <div class="col-md-12 text-center log-user">
                    <h3 class="display-5"><a data-toggle="modal" data-target=".login-form" href="">Login</a></h3>
                    <br />
                    Or
                    <br />
                    <br />
                    <h3 class="display-5"><a data-toggle="modal" data-target=".sign-up-form" href="">Register and save time!</a></h3>
                    <p>Register with us for future convenience: Fast and easy check out Easy access to your order history and status</p>
                </div>





            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript" src="/js/script.js"></script>
@endpush
