@extends('backend.master')
@section('page-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Customer Page</h4><br><br>

                    <form method="POST" action="{{ route('backend.customer.update') }}" class="custom-validation" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $customer->id }}">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="form-group col-sm-10">
                                <input class=" form-control @error('name') is-invalid @enderror" type="text" id="name" name="name"
                                       value="{{ $customer->name }}">
                                @error('name')
                                <div class="alert bg-red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">E-Mail</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email"
                                       value="{{ $customer->email }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Mobile Number</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control @error('mobile_number') is-invalid @enderror" type="text" id="mobile_number"
                                       name="mobile_number" value="{{ $customer->mobile_number }}">
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                            <div class="form-group col-sm-10">
                                <input class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address"
                                       value="{{ $customer->address }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="image" name="customer_image">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img src="{{ !empty($item->customer_image) ? url($item->customer_image) : url('upload/no_image.jpg') }}"
                                     id="showImage" alt="" class="rounded-circle avatar-lg">
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-primary waves-effect waves-light" value="Update Customer">
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection
