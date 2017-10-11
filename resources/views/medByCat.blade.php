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
                                @foreach ($Vcat as $Vcat)
                                    <h1 class="title-widget">{{$Vcat->name}}</h1>
                                    <ul>
                                    @foreach ($Vcat->subCategories as $scat)
                                            <li><a href="/view/{{$Vcat->url_slug}}/{{$scat->url_slug}}" <?php echo ($scat->name == $scname)? "class='text-success'":""?>>{{$scat->name}}</a></li>
                                    @endforeach
                                    </ul>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="medList">
                        <h3 class="display-5">{{$scname}}</h3>

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
                                              <img class="d-flex mr-3" src="/images/200x200.jpg" alt="Generic placeholder image" width="100px">
                                              <div class="media-body">
                                                <a href="#" >
                                                    <h5 class="mt-0"><a href="/medicine/view/{{$med->id}}/{{$med->name}}">{{$med->name}}</a></h5>
                                                </a>
                                                    <p>{{$med->description}}</p>
                                                </div>
                                              <div class="d-flex align-self-center ml-3 text-right">
                                                 <ul class="list-unstyled clear-margins">
                                                     <li class="font-weight-bold">${{$med->price}}</li>
                                                     <li class="text-success">In Stock</li>
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

@push('scripts')
    <script type="text/javascript" src="/js/script.js"></script>
@endpush
