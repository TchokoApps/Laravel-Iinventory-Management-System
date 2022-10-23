@extends('backend.master')
@section('page-content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Invoice Page</h4><br><br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="md-3">
                                <label for="example-date-input" class="form-label">Invoice No</label>
                                <input class="form-control" name="invoice_no" type="text" id="invoice_no" readonly style="background-color: #ddd"
                                       value="{{$invoice_no}}"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <label for="example-date-input" class="form-label">Date</label>
                                <input class="form-control" name="date" type="date" id="date" value="{{$date}}"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <label for="example-date-input" class="form-label">Category Name</label>
                                <select name="category_id" id="category_id" class="form-select select2" aria-label="Default select example">
                                    <option selected="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <label for="example-date-input" class="form-label">Product Name</label>
                                <select name="product_id" id="product_id" class="form-select select2" aria-label="Default select example">
                                    <option selected="">Select Product</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="md-3">
                                <label for="example-date-input" class="form-label">Stock(Pic/Kg)</label>
                                <input class="form-control" name="current_stock_qty" type="text" id="current_stock_qty" readonly
                                       style="background-color: #ddd"/>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-top: 30px">
                            <div class="md-3">
                                <label for="example-date-input" class="form-label"></label>
                                <input type="submit" value="Add More" class="btn btn-primary waves-effect waves-light add_event_more_invoice"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('backend.invoice.create') }}">
                        @csrf
                        <table class="table-sm table-bordered" width="100%" style="border-color: #ddd;">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>PSC/KG</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="addRowInvoice" class="addRowInvoice">
                            </tbody>
                            <tbody>
                            <tr>
                                <td colspan="4"> Discount</td>
                                <td>
                                    <input type="text" name="discount_amount" id="discount_amount" class="form-control estimated_amount"
                                           placeholder="Discount Amount">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">Total</td>
                                <td>
                                    <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control estimated_amount"
                                           readonly style="background-color: #ddd;">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <textarea name="description" class="form-control" id="description" placeholder="Write Description Here"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <div>
                                    <label class="form-label">Paid Status</label>
                                    <select name="paid_status" id="paid_status" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="full_paid">Full Paid</option>
                                        <option value="full_due">Full Due</option>
                                        <option value="partial_paid">Partial Paid</option>
                                    </select>
                                </div>
                                <div>
                                    <input type="text" class="form-control paid_amount" name="paid_amount" id="paid_amount"
                                           placeholder="Enter Paid Amount"
                                           style="display:none;">
                                </div>
                            </div>
                            <div class="form-group col-md-9">
                                <label>Customer Name</label>
                                <select name="customer_id" id="customer_id" class="form-select">
                                    <option value="">Select Customer</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }} - {{ $customer->mobile_no }}</option>
                                    @endforeach
                                    <option value="0">New Customer</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row new_customer" style="display:none">
                            <div class="col-md-4">
                                <label class="form-label">New Customer Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Write Customer Name">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">New Customer Mobile No</label>
                                <input type="text" class="form-control" name="mobile_no" id="mobile_no" placeholder="Write Customer Mobile No">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">New Customer Email</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Write Customer Email">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info" id="storeButton"> Invoice Store</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

    <!-- end row -->
@endsection
