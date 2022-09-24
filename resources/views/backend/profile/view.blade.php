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
        <div class="col-lg-6">
            <div class="card">
                <img class="card-img-top img-fluid"
                     src="{{ !empty($data->profile_image) ? url('upload/admin_images/'.$data->profile_image) : url('upload/no_image.jpg') }}"
                     alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Name: {{$data->name}}</h4>
                    <hr>
                    <h4 class="card-title">Username: {{$data->username}}</h4>
                    <hr>
                    <h4 class="card-title">Email: {{$data->email}}</h4>
                    <hr>
                    <a type="button" class="btn btn-primary waves-effect waves-light" href="{{route('backend.profile.edit')}}">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>

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
@endsection
