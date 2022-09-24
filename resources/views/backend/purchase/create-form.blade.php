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
                    <h4 class="card-title">Add Purchase Page</h4><br><br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="md-3">
                                <div class="mb-4">
                                    <label for="example-date-input" class="form-label">Date</label>
                                    <input class="form-control example-date-input" name="date" type="date" id="date"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <div class="mb-4">
                                    <label for="example-date-input" class="form-label">Purchase No</label>
                                    <input class="form-control example-date-input" name="product_no" type="text" id="product_no"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <div class="mb-4">
                                    <label for="example-date-input" class="form-label">Supplier Name</label>
                                    <div class="col-sm-10">
                                        <select name="supplier_id" id="supplier_id" class="form-select" aria-label="Default select example" required>
                                            <option selected=""></option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <div class="mb-4">
                                    <label for="example-date-input" class="form-label">Category Name</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" id="category_id" class="form-select" aria-label="Default select example" required>
                                            <option selected=""></option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <div class="mb-4">
                                    <label for="example-date-input" class="form-label">Product Name</label>
                                    <div class="col-sm-10">
                                        <select name=$product_id" id="$product_id" class="form-select" aria-label="Default select example" required>
                                            <option selected=""></option>
                                            @foreach($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="md-3">
                                <div class="mb-4">
                                    <label for="example-date-input" class="form-label"></label>
                                    <input type="submit" value="Add More" class="btn btn-primary waves-effect waves-light" style="margin-top: 30git px"/>
                                </div>
                            </div>
                        </div>

                    </div>

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
