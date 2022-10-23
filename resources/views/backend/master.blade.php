<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Dashboard | IMS - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesdesign" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <link href="{{asset('backend/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('backend/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet">

    <!-- jquery.vectormap css -->
    <link href="{{asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css"/>
    <!-- DataTables -->
    <link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Responsive datatable examples -->
    <link href="{{asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap Css -->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('backend/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Responsive datatable examples -->
    <link href="{{asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>

</head>

<body data-topbar="dark">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">


@include('backend.page-topbar')

<!-- ========== Left Sidebar Start ========== -->
@include('backend.vertical-menu')
<!-- Left Sidebar End -->


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

            @yield('page-content')
            <!-- End Page-content -->
                @include('backend.footer')
            </div>
            <!-- end main content-->
        </div>
    </div>
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
@include('backend.right-bar')
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@yield('bottom-js')
<!-- JAVASCRIPT -->
<script src="{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>


<!-- apexcharts -->
<script src="{{asset('backend/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<!-- jquery.vectormap map -->
<script src="{{asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

<!-- Required datatable js -->
<script src="{{asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<!-- Responsive examples -->
<script src="{{asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{asset('backend/assets/js/pages/dashboard.init.js')}}"></script>

<script src="{{asset('backend/assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/form-advanced.init.js')}}"></script>

<script src="{{asset('backend/assets/js/app.js')}}"></script>
<script src="{{asset('backend/assets/js/handlebars.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

<!-- App js -->
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

<!-- masonry pkgd -->
<script src="{{asset('backend/assets/libs/masonry-layout/masonry.pkgd.min.js')}}"></script>
<!-- bs custom file input plugin -->
<script src="{{asset('backend/assets/libs/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/form-element.init.js')}}"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.rea
            dAsDataURL(e.target.files['0']);
        });
    });
</script>
<!-- JAVASCRIPT -->

<!-- Datatable init js -->
<script src="{{asset('backend/assets/js/pages/datatables.init.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('backend/assets/js/code.js') }}"></script>

<!-- bs custom file input plugin -->
<script src="{{asset('backend/assets/js/validate.min.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/form-validation.init.js')}}"></script>
<script src="{{asset('backend/assets/js/upload.js')}}"></script>

<script id="document-template-purchase" type="text/x-handlebars-template">

    <tr class="delete_add_more_item_purchase" id="delete_add_more_item_purchase">
        <input type="hidden" name="date[]" value="@{{date}}">
        <input type="hidden" name="supplier_id[]" value="@{{supplier_id}}">
        <td>
            <input type="hidden" name="category_id[]" value="@{{category_id}}">
            @{{ category_name }}
        </td>
        <td>
            <input type="hidden" name="product_id[]" value="@{{product_id}}">
            @{{ product_name }}
        </td>
        <td>
            <input type="number" min="1" class="form-control buying_qty text-right" name="buying_qty[]" value="">
        </td>
        <td>
            <input type="number" class="form-control unit_price text-right" name="unit_price[]" value="">
        </td>
        <td>
            <input type="text" class="form-control" name="description[]">
        </td>
        <td>
            <input type="number" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly>
        </td>
        <td>
            <i class="btn btn-danger btn-sm fas fa-window-close remove_event_more_purchase"></i>
        </td>
    </tr>

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on("click", ".add_event_more_purchase", function () {
            var date = $('#date').val();
            var supplier_id = $('#supplier_id').val();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();
            if (date === '') {
                $.notify("Date is Required", {globalPosition: 'top right', className: 'error'});
                return false;
            }
            if (supplier_id === '' || supplier_id === 'Select Supplier') {
                $.notify("Supplier is Required", {globalPosition: 'top right', className: 'error'});
                return false;
            }
            if (category_id === '' || category_id === 'Select Category') {
                $.notify("Category is Required", {globalPosition: 'top right', className: 'error'});
                return false;
            }
            if (product_id === '' || product_id === 'Select Product') {
                $.notify("Product Field is Required", {globalPosition: 'top right', className: 'error'});
                return false;
            }
            var source = $("#document-template-purchase").html();
            var tamplate = Handlebars.compile(source);
            var data = {
                date: date,
                supplier_id: supplier_id,
                category_id: category_id,
                category_name: category_name,
                product_id: product_id,
                product_name: product_name
            };
            var html = tamplate(data);
            $("#addRowPurchase").append(html);
        });
        $(document).on("click", ".remove_event_more_purchase", function (event) {
            $(this).closest(".delete_add_more_item_purchase").remove();
            totalAmountPrice();
        });
        $(document).on('keyup click', '.unit_price,.buying_qty', function () {
            var unit_price = $(this).closest("tr").find("input.unit_price").val();
            var qty = $(this).closest("tr").find("input.buying_qty").val();
            var total = unit_price * qty;
            $(this).closest("tr").find("input.buying_price").val(total);
            totalAmountPrice();
        });

        // Calculate sum of amout in invoice
        function totalAmountPrice() {
            var sum = 0;
            $(".buying_price").each(function () {
                var value = $(this).val();
                if (!isNaN(value) && value.length !== 0) {
                    sum += parseFloat(value);
                }
            });
            $('#estimated_amount').val(sum);
        }
    });
</script>

<script type="text/javascript">
    $(function () {
        $(document).on('change', '#supplier_id', function () {
            var supplier_id = $(this).val();
            $.ajax({
                url: "{{ route('backend.purchase.supplier.category.get') }}",
                type: "GET",
                data: {supplier_id: supplier_id},
                success: function (data) {
                    var html = '<option value="">Select Category</option>';
                    $.each(data, function (key, v) {
                        html += '<option value=" ' + v.category_id + ' "> ' + v.category.name + '</option>';
                    });
                    $('#category_id').html(html);
                }
            })
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $(document).on('change', '#category_id', function () {
            var category_id = $(this).val();
            $.ajax({
                url: "{{ route('backend.purchase.category.product.get') }}",
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

<script id="document-template-invoice" type="text/x-handlebars-template">

    <tr class="delete_add_more_item_invoice" id="delete_add_more_item_invoice">
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
            <i class="btn btn-danger btn-sm fas fa-window-close remove_event_more_invoice"></i>
        </td>
    </tr>

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on("click", ".add_event_more_invoice", function () {
            var date = $('#date').val();
            var invoice_no = $('#invoice_no').val();
            var category_id = $('#category_id').val();
            var category_name = $('#category_id').find('option:selected').text();
            var product_id = $('#product_id').val();
            var product_name = $('#product_id').find('option:selected').text();
            if (date === '') {
                $.notify("Date is Required", {globalPosition: 'top right', className: 'error'});
                return false;
            }
            if (invoice_no === '') {
                $.notify("Invoice No is Required", {globalPosition: 'top right', className: 'error'});
                return false;
            }
            if (category_id === '' || category_id === 'Select Category') {
                $.notify("Category is Required", {globalPosition: 'top right', className: 'error'});
                return false;
            }
            if (product_id === '' || product_id === 'Select Product') {
                $.notify("Product Field is Required", {globalPosition: 'top right', className: 'error'});
                return false;
            }
            var source = $("#document-template-invoice").html();
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
            $("#addRowInvoice").append(html);
        });
        $(document).on("click", ".remove_event_more_invoice", function (event) {
            $(this).closest(".delete_add_more_item_invoice").remove();
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
                url: "{{ route('backend.invoice.category.product.get') }}",
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
                url: "{{ route('backend.invoice.product.quantity.get') }}",
                type: "GET",
                data: {product_id: product_id},
                success: function (data) {
                    $('#current_stock_qty').val(data);
                }
            })
        });
    });
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
</body>

</html>
