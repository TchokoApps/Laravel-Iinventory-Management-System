@extends('backend.master')
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
