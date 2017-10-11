@extends('master')
@section('content')

      <!--medByCat -->
    <div class="medByCat">
        <div class="container">
            <div class="row ">
                <div class="col-md-12">
                    <div class="success text-center">
                        <h2 class="display-3">Upload Medicines List</h2>
                        <form class="" action="/medicine/import" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="file" name="medicinesExcel">
                            <input type="submit" name="submit" value="Upload">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript" src="/js/script.js"></script>
@endpush
