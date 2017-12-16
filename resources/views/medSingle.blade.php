@extends('master')
@section('content')
    <style media="screen">
        .rating {
            font-size: 1.6rem;
            color: #FFD333;
            cursor: pointer;
        }
    </style>
    <script type="text/javascript" src="{{url('/')}}/js/singlePageScript.js"></script>
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
        {{-- @foreach ($sMed as $sMed) --}}
                <div class="col-md-4">
                    <div class="catList">
                        <img src="{{glob(public_path("/images/product/med-" . $sMed->id. ".*")) ?  url("/") . "/images/product/med-" . $sMed->id. ".jpg" : url("/")  . "/images/product/demo.jpg" }}" alt="" width="100%">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="medList">
                        <h3><span class="text-success">{{$sMed->name}}</span> -  {{$sMed->description}}  - <i id="watchList" title="{{$watchlist? 'Already added': 'Add this item to watch list'}}" class="fa {{$watchlist? 'fa-heart': 'fa-heart-o'}} text-danger"></i></h3>
                        <p>
                            <table class="table  table-responsive">
                              <tbody>
                                <tr>
                                     <td><h5 class="font-weight-bold ">Price:</h5> </td>
                                     <td><h5 class="font-weight-bold "><span class="text-danger font-weight-bold">${{$sMed->price}}</span></h5></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Product Id:</td>
                                    <td>{{$sMed->id}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Shipping:</td>
                                    <td>Usually Ships in 2 Business Days</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Current Stock:</td>
                                    <td>{{$sMed->stock}}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">caution:</td>
                                    <td>alertness and prudence in a hazardous situation; care; wariness</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Avarage Rating:</td>
                                    <td>
                                        <div data-rate="{{$rating ? $rating : '0'}}" class="rating">
                                            <span data-value="1">&star;</span>
                                            <span data-value="2">&star;</span>
                                            <span data-value="3">&star;</span>
                                            <span data-value="4">&star;</span>
                                            <span data-value="5">&star;</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Quantity:</td>
                                    <td>
                                        <form id="item-data" style="width: 300px;" action="" method="post">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-info minus" type="button"><i class="fa fa-minus"></i></button>
                                                </span>

                                                <input type="number" name="qty" class="form-control text-center"  value="1">

                                                <span class="input-group-btn">
                                                    <button class="btn btn-info plus" type="button"><i class="fa fa-plus"></i></button>
                                                </span>
                                                <span class="input-group-btn">
                                                    <button name="submit" class="btn btn-danger add-cart" type="button"
                                                        data-id="{{$sMed->id}}"
                                                        data-name="{{$sMed->name}}"
                                                        data-stock="{{$sMed->stock}}"
                                                        data-price="{{$sMed->price}}">
                                                        Add To Cart
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                        </p>
                    </div>
                </div>

            </div>

            <div class="product-info row">
                <div class="col-md-12">
                    <!-- Nav tabs -->
                    <ul class=" nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#productInfo" role="tab">Product Information</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#warranty" role="tab">Warranty Information</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#patient" role="tab">Patient Info</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a>
                      </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane active" id="productInfo" role="tabpanel">
                          For use on most hard surfaces. Colors may be mixed or thinned withwater. Dries in 30 minutes. Easy brush clean-up with water. Log onto www.deltacrafts.com for color chart & pattern ideas.Leaf Green
                      </div>
                      <div class="tab-pane" id="warranty" role="tabpanel">
                          See Description for any Warranty Details
                      </div>
                      <div class="tab-pane" id="patient" role="tabpanel">
                            IMPORTANT: HOW TO USE THIS INFORMATION: This is a summary and does NOT have all possible information about this product. This information does not assure that this product is safe, effective, or appropriate for you. This information is not individual medical advice and does not substitute for the advice of your health care professional. Always ask your health care professional for complete information about this product and your specific health needs.
                            USES: This medication is used with a doctor-approved exercise, behavior change, and reduced-calorie diet program to help you lose weight. It is used by certain overweight people, such as those who are obese or have weight-related medical problems. Taking orlistat can also help keep you from gaining back weight you have lost. Losing weight and keeping it off can lessen the many health risks that come with obesity, including heart disease, diabetes, high blood pressure, and a shorter life. Dietary fats need to be broken down into smaller pieces before the body can absorb them. Orlistat works by blocking the enzyme that breaks down fats in your diet. This undigested fat then passes out of your body in your bowel movement. Orlistat does not block the absorption of calories from sugar and other non-fat foods, so you still need to restrict your total intake of calories.

                            HOW TO USE: If you are taking the over-the-counter product to self-treat, read all directions on the product package before taking this medication. If your doctor has prescribed this medication, read the Patient Information Leaflet if available from your pharmacist before you start taking orlistat and each time you get a refill. Take this medication as directed by your doctor, by mouth with liquid sometime during each meal that contains fat or within 1 hour after the meal, usually 3 times daily. If you miss a meal or your meal contains no fat, skip that dose of the medication. To decrease the chance of unpleasant side effects, it is very important that no more than 30% of the calories in your diet come from fat. Your daily intake of fat, protein, and carbohydrates should be evenly spread over 3 main meals. Do not increase your dose or use this drug more often or for longer than prescribed. Your condition will not improve any faster, and your risk of side effects will increase. Because this drug can interfere with the absorption of certain vitamins (fat-soluble vitamins including A, D, E, K), a daily multivitamin supplement containing these nutrients is recommended. Take the multivitamin at least 2 hours before or 2 hours after taking orlistat (such as at bedtime). If you take cyclosporine, take it at least 3 hours before or after orlistat to make sure the full dose of cyclosporine is absorbed into your bloodstream. If you take levothyroxine, take it at least 4 hours before or after orlistat. You should see some weight loss within 2 weeks after you start orlistat. Tell your doctor if your condition does not improve or if it worsens.

                            SIDE EFFECTS: Changes in your bowel function often occur because of the unabsorbed fat. Fatty/oily stool, oily spotting, intestinal gas with discharge, a feeling of needing to have a bowel movement right away, increased number of bowel movements, or poor bowel control may occur. These side effects may get worse if you eat more fat than you should. If these effects persist or worsen, notify your doctor promptly. If your doctor has directed you to use this medication, remember that he or she has judged that the benefit to you is greater than the risk of side effects. Many people using this medication do not have serious side effects. Stop taking this medication and tell your doctor right away if any of these rare but serious side effects occur: symptoms of liver disease (such as persistent nausea/vomiting, severe stomach/abdominal pain, dark urine, yellowing eyes/skin), symptoms of kidney stones (such as back pain, pain when urinating, pink/bloody urine). A very serious allergic reaction to this drug is rare. However, get medical help right away if you notice any symptoms of a serious allergic reaction, including: rash, itching/swelling (especially of the face/tongue/throat), severe dizziness, trouble breathing. This is not a complete list of possible side effects. If you notice other effects not listed above, contact your doctor or pharmacist. In the US - Call your doctor for medical advice about side effects. You may report side effects to FDA at 1-800-FDA-1088 or at www.fda.gov/medwatch. In Canada - Call your doctor for medical advice about side effects. You may report side effects to Health Canada at 1-866-234-2345.
                      </div>
                      <div class="tab-pane" id="reviews" role="tabpanel">
                          <form class="addComment row" method="post" action="{{url('/')}}/add-comment">
                              {{ csrf_field() }}
                              <input type="hidden" name="id" value="{{$sMed->id}}">
                              <textarea name="comment" rows="6" class="form-control"placeholder="Write your review here..."></textarea>
                              <br>
                              <input type="submit" name="submit" value="Comment" class="form-control btn btn-success col-md-3">
                              @if ($errors->has('comment') || Session::has('msg'))
                                  <div class="text-danger">
                                      {{Session::has('msg')? Session::get('msg') : ""}}
                                      {{($errors->has('comment')) ? $errors->first('comment') : ""}}
                                  </div>
                              @endif
                          </form>
                          <br>
                          <br>
                          <div class="row">
                             @forelse ($comments as $comment)
                                 <div class="media col-md-12">
                                     <img class="d-flex mr-3" src="{{url('/')}}/images/product/demo.jpg" alt="Generic placeholder image" width="80px">
                                     <div class="media-body">
                                       <h5 class="mt-0">{{$comment->uname}}</h5>
                                       <p>{{$comment->comment}}</p>
                                     </div>
                                 </div>
                             @empty
                                 <div class="media">
                                     <div class="media-body">
                                       <p>No Comment Yet!!! Be First In Comment</p>
                                     </div>
                                 </div>
                             @endforelse
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        {{-- @endforeach --}}
        </div>
    </div>

@endsection

{{-- @push('scripts')
    <script type="text/javascript" src="/js/script.js"></script>
@endpush --}}
