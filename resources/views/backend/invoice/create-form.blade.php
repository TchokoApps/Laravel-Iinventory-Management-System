@extends('backend.master')
@section('header-css')
    <!-- Bootstrap Css -->
    <link href="{{asset('backend/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css')}}">
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
                                <input type="submit" value="Add More" class="btn btn-primary waves-effect waves-light addeventmore"/>
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
                            <tbody id="addRow" class="addRow">
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
                                <td></td>
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
                            <div class="col-md-12">
                                <label class="form-label">Paid Status</label>
                                <select name="paid_status" id="paid_status" class="form-select">
                                    <option value="">Select Status</option>
                                    <option value="full_paid">Full Paid</option>
                                    <option value="full_due">Full Due</option>
                                    <option value="partial_paid">Partial Paid</option>
                                </select>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control paid_amount" name="paid_amount" id="paid_amount"
                                       placeholder="Enter Paid Amount"
                                       style="display:none;">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Customer Name</label>
                                <select name="customer_id" id="customer_id" class="form-select">
                                    <option value="">Select Customer</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }} - {{ $customer->mobile_number }}</option>
                                    @endforeach
                                    <option value="0">New Customer</option>
                                </select>
                            </div>
                        </div><br>
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

@section('bottom-js')

    <!-- JAVASCRIPT -->
    <script src="{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
    <!-- JAVASCRIPT -->
    <script src="{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>

    <script src="{{asset('backend/assets/libs/parsleyjs/parsley.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/pages/form-validation.init.js')}}"></script>
    <script src="{{asset('backend/assets/js/handlebars.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

    <!-- JAVASCRIPT -->
    {{--    <script src="{{asset('backend/assets/libs/select2/js/select2.min.js')}}"></script>--}}
    {{--    <script src="{{asset('backend/assets/js/pages/form-advanced.init.js')}}"></script>--}}

    <script id="document-template" type="text/x-handlebars-template">

        <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" name="date" value="@{{date}}">
            <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
            <td>
                <input type="hidden" name="category_id[]" value="@{{category_id}}">
                @{{ category_name }}
            </td>
            <td>
                <input type="hidden" name="product_id[]" value="@{{product_id}}">
                @{{ product_name }}
            </td>
            <td>
                <input type="number" min="1" class="form-control selling_qty text-right" name="selling_qty[]" value="">
            </td>
            <td>
                <input type="number" class="form-control unit_price text-right" name="unit_price[]" value="">
            </td>
            <td>
                <input type="number" class="form-control selling_price text-right" name="selling_price[]" value="0" readonly>
            </td>
            <td>
                <i class="btn btn-danger btn-sm fas fa-window-close removeeventmore"></i>
            </td>
        </tr>

    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on("click", ".addeventmore", function () {
                var date = $('#date').val();
                var invoice_no = $('#invoice_no').val();
                var category_id = $('#category_id').val();
                var category_name = $('#category_id').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();
                if (date == '') {
                    $.notify("Date is Required", {globalPosition: 'top right', className: 'error'});
                    return false;
                }
                if (invoice_no == '') {
                    $.notify("Invoice No is Required", {globalPosition: 'top right', className: 'error'});
                    return false;
                }
                if (category_id == '') {
                    $.notify("Category is Required", {globalPosition: 'top right', className: 'error'});
                    return false;
                }
                if (product_id == '') {
                    $.notify("Product Field is Required", {globalPosition: 'top right', className: 'error'});
                    return false;
                }
                var source = $("#document-template").html();
                var tamplate = Handlebars.compile(source);
                var data = {
                    date: date,
                    invoice_no: invoice_no,
                    category_id: category_id,
                    category_name: category_name,
                    product_id: product_id,
                    product_name: product_name
                };
                var html = tamplate(data);
                $("#addRow").append(html);
            });
            $(document).on("click", ".removeeventmore", function (event) {
                $(this).closest(".delete_add_more_item").remove();
                totalAmountPrice();
            });
            $(document).on('keyup click', '.unit_price,.selling_qty', function () {
                var unit_price = $(this).closest("tr").find("input.unit_price").val();
                var qty = $(this).closest("tr").find("input.selling_qty").val();
                var total = unit_price * qty;
                $(this).closest("tr").find("input.selling_price").val(total);
                $('#discount_amount').trigger('keyup');
            });

            $(document).on('keyup', '#discount_amount', function () {
                totalAmountPrice();
            });

            // Calculate sum of amout in invoice
            function totalAmountPrice() {
                var sum = 0;
                $(".selling_price").each(function () {
                    var value = $(this).val();
                    if (!isNaN(value) && value.length !== 0) {
                        sum += parseFloat(value);
                    }
                });
                var discount_amount = parseFloat($('#discount_amount').val());
                if (!isNaN(discount_amount) && discount_amount.length !== 0) {
                    sum -= parseFloat(discount_amount);
                }
                $('#estimated_amount').val(sum);
            }
        });
    </script>

    <script type="text/javascript">
        $(function () {
            $(document).on('change', '#category_id', function () {
                var category_id = $(this).val();
                $.ajax({
                    url: "{{ route('backend.product.category.product.get') }}",
                    type: "GET",
                    data: {category_id: category_id},
                    success: function (data) {
                        var html = '<option value="">Select Product</option>';
                        $.each(data, function (key, v) {
                            html += '<option value=" ' + v.id + ' "> ' + v.name + '</option>';
                        });
                        $('#product_id').html(html);
                    }
                })
            });
        });
    </script>

    <script type="text/javascript">
        $(function () {
            $(document).on('change', '#product_id', function () {
                var product_id = $(this).val();
                $.ajax({
                    url: "{{ route('backend.product.get') }}",
                    type: "GET",
                    data: {product_id: product_id},
                    success: function (data) {
                        $('#current_stock_qty').val(data);
                    }
                })
            });
        });
    </script>

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

    <script type="text/javascript">
        $(document).on('change', '#paid_status', function () {
            var paid_status = $(this).val();
            if (paid_status === 'partial_paid') {
                $('.paid_amount').show();
            } else {
                $('.paid_amount').hide();
            }
        });
        $(document).on('change', '#customer_id', function () {
            var customer_id = $(this).val();
            if (customer_id === '0') {
                $('.new_customer').show();
            } else {
                $('.new_customer').hide();
            }
        });
    </script>

@endsection
