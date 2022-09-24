

@extends('backend.master')
@section('header-css')
    <link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- Responsive datatable examples -->
    <link href="{{asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>

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

    <div class="row">
        <div class="col-12">
            <a type="button" class="btn btn-primary btn-rounded waves-effect waves-light" style="float: right"
               href="{{ route('backend.customer.create.form') }}">Add Customer</a><br><br><br>
            <div class="card">
                <div class="card-body">
                    {{--                    <h4 class="card-title">Show All Customers</h4>--}}
                    {{--                    <p class="card-title-desc">DataTables has most features enabled by--}}
                    {{--                        default, so all you need to do to use it with your own tables is to call--}}
                    {{--                        the construction function: <code>$().DataTable();</code>.--}}
                    {{--                    </p>--}}

                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length"
                                                                                                         aria-controls="datatable"
                                                                                                         class="custom-select custom-select-sm form-control form-control-sm form-select form-select-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                                                                                          class="form-control form-control-sm"
                                                                                                          placeholder=""
                                                                                                          aria-controls="datatable"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline"
                                       style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid"
                                       aria-describedby="datatable_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label="Name: activate to sort column descending">Index
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label="Name: activate to sort column descending">Name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                            aria-label="Position: activate to sort column ascending">Image
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                            aria-label="Office: activate to sort column ascending">E-Mail
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                            aria-label="Office: activate to sort column ascending">Mobile Number
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                            aria-label="Age: activate to sort column ascending">Address
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1"
                                            aria-label="Start date: activate to sort column ascending">Action
                                        </th>
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
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                                    <ul class="pagination pagination-rounded">
                                        <li class="paginate_button page-item previous disabled" id="datatable_previous"><a href="#"
                                                                                                                           aria-controls="datatable"
                                                                                                                           data-dt-idx="0"
                                                                                                                           tabindex="0"
                                                                                                                           class="page-link"><i
                                                    class="mdi mdi-chevron-left"></i></a></li>
                                        <li class="paginate_button page-item active"><a href="#" aria-controls="datatable" data-dt-idx="1"
                                                                                        tabindex="0" class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0"
                                                                                  class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="3" tabindex="0"
                                                                                  class="page-link">3</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="4" tabindex="0"
                                                                                  class="page-link">4</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="5" tabindex="0"
                                                                                  class="page-link">5</a></li>
                                        <li class="paginate_button page-item "><a href="#" aria-controls="datatable" data-dt-idx="6" tabindex="0"
                                                                                  class="page-link">6</a></li>
                                        <li class="paginate_button page-item next" id="datatable_next"><a href="#" aria-controls="datatable"
                                                                                                          data-dt-idx="7" tabindex="0"
                                                                                                          class="page-link"><i
                                                    class="mdi mdi-chevron-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>


@endsection

@section('bottom-js')
    <!-- JAVASCRIPT -->
    <script src="{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>

    <!-- Required datatable js -->
    <script src="{{asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

    <script src="{{asset('backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>

    <!-- Responsive examples -->
    <script src="{{asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
            @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;
            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;
            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;
            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('backend/assets/js/code.js') }}"></script>
@endsection
