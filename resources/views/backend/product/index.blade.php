@extends('backend.master')
@section('page-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Products</h4>

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
               href="{{ route('backend.product.create') }}">Add Product</a><br><br><br>
        </div> <!-- end col -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Products</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Index</th>
                            <th>Name</th>
                            <th>Supplier Name</th>
                            <th>Category Name</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key => $item)
                            <tr class="odd">
                                <td> {{ $key+1}} </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item['supplier']['name']  }}</td>
                                <td>{{ $item['category']['name']  }}</td>
                                <td>{{ $item['unit']['name'] }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td><a href="{{ route('backend.product.edit', $item->id) }}" class="btn btn-info sm"
                                       title="Edit Data"> <i
                                            class="fas fa-edit"></i> </a>

                                    <a href="{{ route('backend.product.destroy', $item->id) }}" class="btn btn-danger sm"
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
