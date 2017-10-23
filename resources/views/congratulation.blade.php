@extends('master')
@section('content')
      <!--medByCat -->
    <div class="medByCat">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="success text-center">
                        <h2 class="display-3">Successfully Purchased</h2>
                        <img src="{{url('/')}}/images/congratulation.jpg" alt="" width="100%">
                        <h2 class="display-5">Thanks For Purchase Your Shopping, Enjoy !!!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

{{-- @push('scripts')
    <script type="text/javascript" src="/js/script.js"></script>
@endpush --}}
