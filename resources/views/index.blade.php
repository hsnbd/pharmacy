@extends('master')
@section('content')

      <!--feature image -->
    <div class="feature-image">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 text-right">
                    <h1 class="display-4 text-primary">Shop Over The Counter Products</h1>
                        <div class="col-md-5 pull-right">
                            <h4 >We're Here to Help You Feel Great</h4>
                            <p>
                                Browse our extensive selection of health and wellness products. Popular categories include:
                            </p>
                            <table class="table borderless">
                              <tbody>
                                <tr>
                                     <td><a href="">Diabetic Supplies</a></td>
                                     <td><a href="">Diet & Nutrition</a></td>
                                </tr>
                                <tr>
                                    <td><a href="">Allergy & Sinus</a></td>
                                    <td><a href="">Cold & Flu</a></td>
                                </tr>
                                <tr>
                                    <td><a href="">Pain & Fever</a></td>
                                    <td><a href="">Digestive Health</a></td>
                                </tr>
                                <tr>
                                      <td><a href="">Hair Care</a></td>
                                      <td><a href="">Pet Care</a></td>
                                </tr>
                              </tbody>
                            </table>

                            <form class="form-inline">
                              <div class="form-group">
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Examples: Bayer Contour, OneTouch Ultra">
                                  </div>
                                  <button type="submit" class="btn btn-primary form-control" style="width:135px;margin-left:15px" >Submit</button>
                              </div>
                            </form>

                              <p style="margin-top: 30px">
                                  <a class="text-black font-weight-bold" href="">Browse all OTC Products</a>
                              </p>
                        </div>

                </div>
            </div>
        </div>
    </div>

    <!--Happy customer -->
    <div class="happy-customer">
        <div class="container">
            <div class="row">
                <h2 class="display-4 text-primary col-md-12">Our Happy Customers</h2>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item col-md-12 active">
                      <p>
                          “Health Warehouse has always been very professional and the customer service is excellent.”
                          <br />
                          <br />
                          <img class="rounded-circle" src="../images/200x200.jpg" width="30px">&nbsp; &nbsp; Mr. Hasan
                      </p>
                    </div>
                    <div class="carousel-item col-md-12">
                      <p>“
                          Very fast, good price, quality service !!”
                          <br />
                          <br />
                          <img class="rounded-circle" src="../images/200x200.jpg" width="30px">&nbsp; &nbsp; Mr. Hasan
                      </p>
                    </div>
                    <div class="carousel-item col-md-12">
                      <p>
                          “Your service is great and the prices are fantastic!”
                          <br />
                          <br />
                          <img class="rounded-circle" src="../images/200x200.jpg" width="30px">&nbsp; &nbsp; Mr. Hasan
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-12" style="margin-top: 60px;">
                    <button class="btn btn-primary">View More</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript" src="/js/script.js"></script>
@endpush
