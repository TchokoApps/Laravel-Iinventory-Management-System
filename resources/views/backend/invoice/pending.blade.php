@extends('backend.master')
@section('page-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Invoices</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <a type="button" class="btn btn-primary btn-rounded waves-effect waves-light" style="float: right"
               href="{{ route('backend.invoice.create.form') }}">Add Invoice</a><br><br><br>
        </div> <!-- end col -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Invoices</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Index</th>
                            <th>Customer Name</th>
                            <th>Invoice No</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $key => $item)
                            <tr class="odd">
                                <td> {{ $key+1}} </td>
                                <td>{{$item->payment->customer->name}}</td>
                                <td>{{ $item->invoice_no }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>
                                <td>{{ Str::limit($item->description, 20, '...') }}</td>
                                <td>$ {{ $item->payment->total_amount }}</td>
                                @if($item->status == 0)
                                    <td><span class="btn btn-warning">Pending</span></td>
                                @elseif($item->status == 1)
                                    <td><span class="btn btn-success">Approved</span></td>
                                @endif
                                @if($item->status == 0)
                                    <td><a href="{{ route('backend.invoice.approve', $item->id) }}" class="btn btn-dark sm"
                                           title="Approved"> <i class="fas fa-check-circle"></i> </a>
                                        <a href="{{ route('backend.invoice.destroy', $item->id) }}" class="btn btn-danger sm"
                                           title="Delete Data"
                                           id="delete"> <i class="fas fa-trash-alt"></i></a></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection

@section('bottom-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
