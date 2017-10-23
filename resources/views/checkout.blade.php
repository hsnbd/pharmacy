@extends('master')
@section('content')
    <script type="text/javascript"> if (Cart.length < 1) { document.location.href = base_url; } </script>
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
                    <h5 class="display-5" style="display:inline-block">Shipping Info </h5>
                    <a style="float:right" class="btn btn-secondary" href="#"><i class="fa fa-arrow-left"></i> Return to Cart</a>
                </div>
                <div class="col-md-12 text-center log-user">
                    @guest
                        <h3 class="display-5"><a data-toggle="modal" data-target=".login-form" href="">Login</a></h3>
                        <br />
                        Or
                        <br />
                        <br />
                        <h3 class="display-5"><a data-toggle="modal" data-target=".sign-up-form" href="">Register and save time!</a></h3>
                        <p>Register with us for future convenience: Fast and easy check out Easy access to your order history and status</p>
                    @else
                        <form id="address"  method="post">

                            <div class="choice-address col-md-5 m-auto">
                                <div class="form-group">
                                    <input type="radio" name="address" value="previous" > Previous Address
                                    <input type="radio" name="address" value="new" checked> New Address
                                </div>
                                <div class="alert"> </div>
                            </div>
                            <ul class="prev-address list-inline"> </ul>
                            <div class="new-address m-auto col-md-4 text-left">
                                <div class="form-group">
                                    <label for="name" class="control-label">Name</label>
                        		    <input class="form-control" type="text" name="name" required autofocus>
                        		</div>
                                <div class="form-group">
                                    <label for="address" class="control-label">Address</label>
                        		    <textarea name="address"  class="form-control" required></textarea>
                        		</div>
                                <div class="form-group">
                                    <label for="name" class="control-label">Contact No</label>
                        		    <input class="form-control" type="number" name="contact" required>
                        		</div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Save Shipping" class="btn btn-primary">
                            </div>
                        </form>
                    @endguest
                </div>





            </div>
        </div>
    </div>

@endsection
{{-- 
@push('scripts')
    <script type="text/javascript" src="/js/script.js"></script>
@endpush --}}
