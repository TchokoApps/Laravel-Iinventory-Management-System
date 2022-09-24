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
                    <h4 class="card-title">Edit Profile Page</h4>
                    <form method="POST" action="{{ route('backend.store.profile') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Name" id="name" name="name" value="{{$data->name}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Username" id="username" name="username"
                                       value="{{$data->username}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">E-Mail</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="E-Mail" id="email" name="email" value="{{$data->email}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="image" name="profile_image">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img
                                    src="{{ !empty($data->profile_image) ? url('upload/admin_images/'.$data->profile_image) : url('upload/no_image.jpg') }}"
                                    id="showImage" alt="" class="rounded-circle avatar-lg">
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-primary waves-effect waves-light" value="Update Profile">
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

    <!-- bs custom file input plugin -->
    <script src="{{asset('backend/assets/libs/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script src="{{asset('backend/assets/js/pages/form-element.init.js')}}"></script>
    <script src="{{asset('backend/assets/js/app.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
