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
                    <h4 class="card-title">Update Product Page</h4><br><br>

                    <form method="POST" action="{{ route('backend.product.update') }}" class="custom-validation">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="form-group col-sm-10">
                                <input class=" form-control @error('name') is-invalid @enderror" type="text" id="name" name="name"
                                       value="{{ $product->name }}">
                                @error('name')
                                <div class="alert bg-red">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Supplier Name</label>
                            <div class="col-sm-10">
                                <select name="supplier_id" class="form-select" aria-label="Default select example" required>
                                    <option selected=""></option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ $supplier->id == $product->supplier_id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <select name="category_id"  class="form-select" aria-label="Default select example" required>
                                    <option selected=""></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Unit Name</label>
                            <div class="col-sm-10">
                                <select name="unit_id"  class="form-select" aria-label="Default select example" required>
                                    <option selected=""></option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}" {{ $unit->id == $product->unit_id ? 'selected' : '' }} >{{ $unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-number-input" class="col-sm-2 col-form-label">Number</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" value="{{ $product->quantity }}" id="quantity" name="quantity" required>
                            </div>
                        </div>
                        <!-- end row -->
                        <input type="submit" class="btn btn-primary waves-effect waves-light" value="Update Product">
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection

@section('bottom-js')

    <!-- JAVASCRIPT -->
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
