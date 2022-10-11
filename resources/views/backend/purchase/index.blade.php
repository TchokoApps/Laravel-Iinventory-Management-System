@extends('backend.master')
@section('page-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Purchases</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <a type="button" class="btn btn-primary btn-rounded waves-effect waves-light" style="float: right"
               href="{{ route('backend.purchase.create.form') }}"><i class="fas fa-plus-circle"></i> Add Purchase</a><br><br><br>
        </div> <!-- end col -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Purchases</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr><span>Manage Purchase</span>
                            <th>Index</th>
                            <th>Purchase No</th>
                            <th>Date</th>
                            <th>Supplier</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($purchases as $key => $item)
                            <tr class="odd">
                                <td> {{ $key+1}} </td>
                                <td>{{ $item->purchase_no }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->date)) }}</td>
                                <td>{{ $item['supplier']['name'] }}</td>
                                <td>{{ $item['category']['name'] }}</td>
                                <td>{{ $item['product']['name'] }}</td>
                                <td>{{ $item->buying_qty }}</td>
                                @if($item->status == '0')
                                    <td><span class="btn btn-warning">Pending</span></td>
                                @elseif($item->status == '1')
                                    <td><span class="btn btn-success">Approved</span></td>
                                @endif
                                @if($item->status == '0')
                                    <td><a href="{{ route('backend.purchase.edit', $item->id) }}" class="btn btn-info sm"
                                           title="Edit Data"> <i
                                                class="fas fa-edit"></i> </a>
                                        <a href="{{ route('backend.purchase.destroy', $item->id) }}" class="btn btn-danger sm"
                                           title="Delete Data"
                                           id="delete"> <i class="fas fa-trash-alt"></i> </a></td>
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
