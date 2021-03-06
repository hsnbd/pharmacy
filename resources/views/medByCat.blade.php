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
                                <h1 class="title-widget">{{$scat->category->name}}</h1>
                                <ul>
                                    @foreach ($scatAll as $scatAll)
                                        <li><a href="{{url('/')}}/view/{{$scatAll->category->url_slug}}/{{$scatAll->url_slug}}" <?php echo ($scat->name == $scatAll->name)? "class='text-success'":""?>>{{$scatAll->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>

                        <marquee class="text-danger">
                            Ads By onlinepharmacy.com
                        </marquee>
                        <div class="ads text-right">
                            <div class="ads-item">
                                <span class="ads-close">X</span>
                                <a href="#"><img src="{{url('/')}}/images/ads{{rand(1,10)}}.jpg" alt="" width="100%"></a>
                                <p class="ads-warning text-center">
                                    Tell Us Why?
                                    <br>
                                    <br>
                                    <a class="btn btn-sm btn-primary" href="#">Stop Seeing this ad</a>
                                    <a class="btn btn-sm" href="#">Ads By onlinepharmacy.com</a>
                                </p>
                            </div>
                            <div class="ads-item">
                                <span class="ads-close">X</span>
                                <a href="#"><img src="{{url('/')}}/images/ads{{rand(1,4)}}.png" alt="" width="100%"></a>
                                <p class="ads-warning text-center">
                                    Tell Us Why?
                                    <br>
                                    <br>
                                    <a class="btn btn-sm btn-primary" href="#">Stop Seeing this ad</a>
                                    <a class="btn btn-sm" href="#">Ads By onlinepharmacy.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="medList">
                        <div class="row">
                            <h3 class="display-5 col-md-6 mr-auto">{{$scat->name}}</h3>
                            <form class="col-md-6 text-right">
                                <select id="filterType" name="type">
                                    <option value="search"  selected>Filter BY</option>
                                    <option value="alphabet">Alphabet</option>
                                    <option value="shape" >Shape & Color</option>
                                </select>
                            </form>
                        </div>
                        <hr>
                        <div id="shape">
                            <div class="row col-md-12">
                                <div class="shape mr-auto">
                                    <a href="{{url()->current()}}?s=rectangle"><img src="{{url('/')}}/images/shape/rectangle.png" alt="" width="45px"></a>
                                    <a href="{{url()->current()}}?s=square"><img src="{{url('/')}}/images/shape/square.png" alt="" width="45px"></a>
                                    <a href="{{url()->current()}}?s=round"><img src="{{url('/')}}/images/shape/Round.png" alt="" width="45px"></a>
                                    <a href="{{url()->current()}}?s=oval"><img src="{{url('/')}}/images/shape/Oval.png" alt="" width="45px"></a>
                                    <a href="{{url()->current()}}?s=oblong"><img src="{{url('/')}}/images/shape/Oblong.png" alt="" width="45px"></a>
                                    <a href="{{url()->current()}}?s=diamond"><img src="{{url('/')}}/images/shape/Diamond.png" alt="" width="45px"></a>
                                    <a href="{{url()->current()}}?s=3-sided"><img src="{{url('/')}}/images/shape/3_sided.png" alt="" width="45px"></a>
                                    <a href="{{url()->current()}}?s=5-sided"><img src="{{url('/')}}/images/shape/5_sided.png" alt="" width="45px"></a>
                                </div>
                                <div class="color ">
                                    <a title="Red" href="{{url()->current()}}?c=red"></a>
                                    <a title="Green" href="{{url()->current()}}?c=green"></a>
                                    <a title="White" href="{{url()->current()}}?c=white"></a>
                                    <a title="Purple" href="{{url()->current()}}?c=purple"></a>
                                    <a title="Yellow" href="{{url()->current()}}?c=yellow"></a>
                                    <a title="Brown" href="{{url()->current()}}?c=brown"></a>
                                    <a title="Blue" href="{{url()->current()}}?c=blue"></a>
                                </div>
                            </div>
                        </div>
                        <div id="char" class="aToz">
                            @foreach (range('a','z') as $char)
                                <a href="{{url()->current()}}?q={{$char}}">{{$char}}</a>
                            @endforeach
                        </div>
                        <span class="text-micro">Showing items 1-2 of 2</span>
                        <div class="list-top row">
                            <form method="post" class="mr-auto">
                                <select class="" name="type">
                                    <option value="1" selected>Newest</option>
                                    <option value="1" >Oldest</option>
                                </select>
                            </form>
                            {{ $medList->links() }}
                        </div>

                        <div class="list-body">
                            <ul class="list-unstyled clear-margins">
                                @foreach ($medList as $med)
                                    <li class="med-item">
                                        <div class="media">
                                             <img class="d-flex mr-3" src="{{glob(public_path("/images/product/med-" . $med->id. ".*")) ?  url("/") . "/images/product/med-" . $med->id. ".jpg" : url("/")  . "/images/product/demo.jpg" }}" alt="" width="100px">
                                              <div class="media-body">
                                                <a href="#" >
                                                    <h5 class="mt-0"><a href="{{url('/')}}/medicine/view/{{$med->id}}/{{$med->name}}">{{$med->name}}</a></h5>
                                                </a>
                                                    <p>{{$med->description}}</p>
                                                </div>
                                              <div class="d-flex align-self-center ml-3 text-right">
                                                 <ul class="list-unstyled clear-margins">
                                                     <li class="font-weight-bold">${{$med->price}}</li>
                                                     <li class="text-success">In Stock</li>
                                                     <li>
                                                         <button name="submit" class="btn btn-sm btn-outline-danger add-cart" type="button"
                                                             data-id="{{$med->id}}"
                                                             data-name="{{$med->name}}"
                                                             data-description="{{$med->description}}"
                                                             data-stock="{{$med->stock}}"
                                                             data-price="{{$med->price}}">
                                                                Add To Cart
                                                            </script>
                                                        </button>
                                                     </li>
                                                 </ul>
                                              </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
{{--
@push('scripts')
    <script type="text/javascript" src="/js/script.js"></script>
@endpush --}}
