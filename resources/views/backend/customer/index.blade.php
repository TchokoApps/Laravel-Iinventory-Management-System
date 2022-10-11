@extends('backend.master')
@section('page-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Customers</h4>

                {{--                <div class="page-title-right">--}}
                {{--                    <ol class="breadcrumb m-0">--}}
                {{--                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>--}}
                {{--                        <li class="breadcrumb-item active">Data Tables</li>--}}
                {{--                    </ol>--}}
                {{--                </div>--}}

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <a type="button" class="btn btn-primary btn-rounded waves-effect waves-light" style="float: right"
               href="{{ route('backend.customer.create.form') }}">Add Customer</a><br><br><br>
        </div> <!-- end col -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Customers</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Index</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>E-Mail</th>
                            <th>Moble Number</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $key => $item)
                            <tr class="odd">
                                <td> {{ $key+1}} </td>
                                <td class="sorting_1 dtr-control">{{ $item->name }}</td>
                                <td><img
                                        src="{{ !empty($item->customer_image) ? url($item->customer_image) : url('upload/no_image.jpg') }}"
                                        id="showImage" alt="" class="rounded-circle avatar-lg">
                                </td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->mobile_number }}</td>
                                <td>{{ $item->address }}</td>
                                <td><a href="{{ route('backend.customer.update.form', $item->id) }}" class="btn btn-info sm"
                                       title="Edit Data"> <i
                                            class="fas fa-edit"></i> </a>

                                    <a href="{{ route('backend.customer.delete', $item->id) }}" class="btn btn-danger sm"
                                       title="Delete Data"
                                       id="delete"> <i class="fas fa-trash-alt"></i> </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
