@extends('backend.master')
@section('page-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Invoice Approve</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <a type="button" class="btn btn-primary btn-rounded waves-effect waves-light" style="float: right"
               href="{{ route('backend.invoice.pending') }}">
                <i class="fa fa-list"> Pending Invoices</i> </a><br><br><br>
        </div> <!-- end col -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Invoice Number: {{ $invoice->invoice_no  }} - {{ date('d/m/Y', strtotime($invoice->date)) }}</h4>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Customer Infos</h4>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{ $customer->name }}" id="example-text-input" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-search-input" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="search" value="{{ $customer->mobile_no }}" id="example-search-input" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" value="{{ $customer->email }}" id="example-text-input" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Invoice Details</h4>
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Product Name</th>
                                <th>Current Stock</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoice->invoiceDetail as $key => $invoiceDetail)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $invoiceDetail->category->name }}</td>
                                    <td>{{ $invoiceDetail->product->name }}</td>
                                    <td>{{ $invoiceDetail->product->quantity }}</td>
                                    <td>{{ $invoiceDetail->selling_qty }}</td>
                                    <td>{{ $invoiceDetail->unit_price }}</td>
                                    <td>{{ $invoiceDetail->selling_price }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('bottom-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
