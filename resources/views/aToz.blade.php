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

                <div class="col-md-3">
                    <div class="catList">
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                            <li class="widget-container widget_nav_menu"><!-- widgets list -->
                                <h1 class="title-widget">Categoy Name</h1>
                                <ul>
                                    <li><a href="#">Enquiry Form</a></li>
                                    <li><a href="#">Online Test Series</a></li>
                                    <li><a href="#">Grand Tests Series</a></li>
                                    <li><a href="#">Subject Wise Test Series</a></li>
                                    <li><a href="#">Smart Book</a></li>
                                    <li><a href="#">Test Centres</a></li>
                                    <li><a href="#">Admission Form</a></li>
                                    <li><a href="#">Computer Live Test</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="medList">
                        <h3 class="display-5">Alphabet</h3>
                        <div class="aToz">
                            <a href="#">A</a>
                            <a href="#">B</a>
                            <a href="#">C</a>
                            <a href="#">D</a>
                            <a href="#">E</a>
                            <a href="#">F</a>
                            <a href="#">G</a>
                            <a href="#">H</a>
                            <a href="#">I</a>
                            <a href="#">J</a>
                            <a href="#">K</a>
                            <a href="#">L</a>
                            <a href="#">M</a>
                            <a href="#">N</a>
                            <a href="#">O</a>
                            <a href="#">P</a>
                            <a href="#">Q</a>
                            <a href="#">R</a>
                            <a href="#">S</a>
                            <a href="#">T</a>
                            <a href="#">U</a>
                            <a href="#">V</a>
                            <a href="#">W</a>
                            <a href="#">X</a>
                            <a href="#">Y</a>
                            <a href="#">Z</a>
                        </div>
                        <span class="text-micro">Showing items 1-2 of 2</span>
                        <div class="list-top row">
                            <form method="post" class="mr-auto">
                                <select class="" name="type">
                                    <option value="1" selected>Newest</option>
                                    <option value="1" >Oldest</option>
                                </select>
                            </form>

                            <ul class="pagination">
                                <li class="page-item ">
                                  <a class="page-link" href="#!" tabindex="-1"> << </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#!">1</a></li>
                                <li class="page-item active">
                                  <a class="page-link" href="#!">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#!">3</a></li>
                                <li class="page-item">
                                  <a class="page-link" href="#!"> >> </a>
                                </li>
                            </ul>
                        </div>

                        <div class="list-body">
                            <ul class="list-unstyled clear-margins">
                                <li class="med-item">
                                    <div class="media">
                                          <img class="d-flex mr-3" src="/images/200x200.jpg" alt="Generic placeholder image" width="100px">
                                          <div class="media-body">
                                            <a href="#" >
                                                <h5 class="mt-0">Medicine Name</h5>
                                            </a>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                          </div>
                                          <div class="d-flex align-self-center ml-3 text-right">
                                             <ul class="list-unstyled clear-margins">
                                                 <li class="font-weight-bold">$200.00</li>
                                                 <li class="text-success">In Stock</li>
                                             </ul>
                                          </div>
                                    </div>
                                </li>
                                <li class="med-item">
                                    <div class="media">
                                          <img class="d-flex mr-3" src="/images/200x200.jpg" alt="Generic placeholder image" width="100px">
                                          <div class="media-body">
                                            <a href="#" >
                                                <h5 class="mt-0">Medicine Name</h5>
                                            </a>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                          </div>
                                          <div class="d-flex align-self-center ml-3 text-right">
                                             <ul class="list-unstyled clear-margins">
                                                 <li class="font-weight-bold">$200.00</li>
                                                 <li class="text-success">In Stock</li>
                                             </ul>
                                          </div>
                                    </div>
                                </li>
                                <li class="med-item">
                                    <div class="media">
                                          <img class="d-flex mr-3" src="/images/200x200.jpg" alt="Generic placeholder image" width="100px">
                                          <div class="media-body">
                                            <a href="#" >
                                                <h5 class="mt-0">Medicine Name</h5>
                                            </a>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                          </div>
                                          <div class="d-flex align-self-center ml-3 text-right">
                                             <ul class="list-unstyled clear-margins">
                                                 <li class="font-weight-bold">$200.00</li>
                                                 <li class="text-danger">Out Of Stock</li>
                                             </ul>
                                          </div>
                                    </div>
                                </li>
                                <li class="med-item">
                                    <div class="media">
                                          <img class="d-flex mr-3" src="/images/200x200.jpg" alt="Generic placeholder image" width="100px">
                                          <div class="media-body">
                                            <a href="#" >
                                                <h5 class="mt-0">Medicine Name</h5>
                                            </a>
                                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                          </div>
                                          <div class="d-flex align-self-center ml-3 text-right">
                                             <ul class="list-unstyled clear-margins">
                                                 <li class="font-weight-bold">$200.00</li>
                                                 <li class="text-success">In Stock</li>
                                             </ul>
                                          </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript" src="/js/script.js"></script>
@endpush
