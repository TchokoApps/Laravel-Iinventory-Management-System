@extends('backend.master')
@section('page-content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Purchase Page</h4><br><br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-3">
                                <label for="example-date-input" class="form-label">Date</label>
                                <input class="form-control" name="date" type="date" id="date"/>
                            </div>
                        </div>
{{--                        <div class="col-md-4">--}}
{{--                            <div class="md-3">--}}
{{--                                <label for="example-date-input" class="form-label">Purchase No</label>--}}
{{--                                <input class="form-control" name="product_no" type="text" id="purchase_no"/>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-md-6">
                            <div class="md-3">
                                <label for="example-text-input" class="form-label">Supplier Name</label>
                                <select id="supplier_id" name="supplier_id" class="form-select select2" aria-label="Default select example">
                                    <option selected="">Select Supplier</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-3">
                                <label for="example-date-input" class="form-label">Category Name</label>
                                <select name="category_id" id="category_id" class="form-select select2" aria-label="Default select example">
                                    <option selected="">Select Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="md-3">
                                <label for="example-date-input" class="form-label">Product Name</label>
                                <select name="product_id" id="product_id" class="form-select select2" aria-label="Default select example">
                                    <option selected="">Select Product</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-top: 20px">
                            <div class="md-3">
                                <label for="example-date-input" class="form-label"></label>
                                <input type="submit" value="Add More" class="btn btn-primary waves-effect waves-light add_event_more_purchase"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('backend.purchase.create') }}">
                        @csrf
                        <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>PSC/KG</th>
                                <th>Unit Price</th>
                                <th>Description</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="addRowPurchase" class="addRowPurchase">
                            </tbody>
                            <tbody>
                            <tr>
                                <td colspan="5"></td>
                                <td>
                                    <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount"
                                           readonly style="background-color: #ddd;">
                                </td>
                                <td></td>
                            </tr>

                            </tbody>
                        </table>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info" id="storeButton"> Purchase Store</button>

                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

    <!-- end row -->
@endsection
