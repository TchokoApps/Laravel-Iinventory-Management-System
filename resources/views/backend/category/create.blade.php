@extends('backend.master')
@section('header-css')
    <!-- Bootstrap Css -->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>

@endsection
@section('page-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create  Category Page</h4><br><br>

                    <form method="POST" action="{{ route('backend.category.store') }}" class="custom-validation">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="form-group col-sm-10">
                                <input class=" form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" required>
                                @error('name')
                                <div class="alert bg-red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-primary waves-effect waves-light" value="Create  Category" required>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection

@section('bottom-js')

    <!-- JAVASCRIPT -->
    {{--    <script src="{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>--}}
    <script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>

    <!-- masonry pkgd -->
    <script src="{{asset('backend/assets/libs/masonry-layout/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/app.js')}}"></script>

    <!-- bs custom file input plugin -->
    <script src="{{asset('backend/assets/libs/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/pages/form-element.init.js')}}"></script>
    <script src="{{asset('backend/assets/js/app.js')}}"></script>
    <script src="{{asset('backend/assets/js/validate.min.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{asset('backend/assets/libs/parsleyjs/parsley.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/pages/form-validation.init.js')}}"></script>

    <script src="{{asset('backend/assets/js/upload.js')}}"></script>

@endsection
