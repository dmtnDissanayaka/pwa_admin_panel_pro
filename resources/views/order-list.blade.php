@extends('layouts.master-layouts')
@section('title')
    @lang('Orders ')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/24.1.3/css/dx.light.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.1/jquery.timepicker.min.css">
@endsection
<style>
    .highlight-border {
        border: 2px solid red;
        /* Change the color and thickness as needed */
    }
    .centered-message {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%; /* Adjust the height as needed */
        width: 100%;
        font-size: 1.5em; /* Adjust the font size as needed */
        color: #555; /* Adjust the color as needed */
    }
</style>
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Orders
        @endslot
        @slot('title')
            Order List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="tasksList">
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <form>
                        {{-- <div class="row g-3">
                            <div id="dataGrid"></div>
                        </div> --}}
                        <!--end row-->
                        <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                            aria-labelledby="custom-content-below-home-tab">
                            <table class="display" id="show_order_list" width="100%">
                                <thead>
                                    {{-- <tr>
                                    <td>
                                        <input type="text" class="form-control filter-input">
                                    </td>
                                </tr> --}}

                                    <tr class="fs-14">
                                        <th>Company</th>
                                        <th style="width:8%">Driver ID</th>
                                        <th style="width:10%">Order</th>
                                        <th style="width:10%">Type</th>
                                        <th>Received Date</th>
                                        <th style="width:10%">Received Time</th>
                                        <th style="width:12%"class="text-center">Read Status</th>
                                        <th style="width:10%">Status</th>
                                        <th style="width:8%">Action</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <input type="text" id="companyFilter" class="form-control form-control-sm"
                                                placeholder="Search...">
                                        </th>
                                        <th style="width:8%">
                                            <input type="text" id="driverFilter" class="form-control form-control-sm"
                                                placeholder="Search...">
                                        </th>
                                        <th style="width:10%">
                                            <input type="text" id="orderFilter" class="form-control form-control-sm"
                                                placeholder="Search...">
                                        </th>
                                        <th>
                                            {{-- <input type="text" id="typeFilter" class="form-control form-control-sm"
                                                placeholder="Search..."> --}}
                                            <select name="" id="typeFilter" class="form-select form-select-sm">
                                                <option value="">Select</option>
                                                <option value="NEW">NEW</option>
                                                <option value="MODIFY">MODIFY</option>
                                                <option value="CANCEL">CANCEL</option>
                                            </select>
                                        </th>
                                        <th>
                                            <input type="date" id="dateFilter" class="form-control form-control-sm"
                                                placeholder="Search...">

                                        </th>
                                        <th>
                                            {{-- <input type="text" class="form-control form-control-sm" placeholder="Search..."> --}}

                                            <input type="time" id="dateFilter" class="form-control form-control-sm"
                                                placeholder="Select date and time">

                                        </th>
                                        <th class="text-center">
                                            {{-- <input type="text" class="form-control form-control-sm" placeholder="Search..."> --}}
                                            <select name="" id="readStatusFilter" class="form-select form-select-sm">
                                                <option value="">Select</option>
                                                <option value="true">Yes</option>
                                                <option value="false">No</option>
                                            </select>
                                        </th>
                                        <th>
                                            <input type="text" id="statusFilter" class="form-control form-control-sm"
                                                placeholder="Search...">
                                        </th>
                                        <th style="width:6%"></th>
                                    </tr>

                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="modal fade" id="orderDetailsView" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-header" style="background-color: #135079">
                    <h5 class="modal-title text-light" id="UserModalTitle">Order Full Details</h5>
                    <div class="">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>
                <div class="modal-body">
                    <!-- User Create -->
                    <form id="form_user">
                        @csrf
                        <div>

                            <div class="modal-header p-3 bg-soft-header" style="background-color: #d9d9d9">
                                <div class="col">Deriver : Thaindu</div>
                                <div class="col">Company : ABC COmpany</div>
                                <div class="col">Order No : 0053</div>
                                <div class="col">Truck No : SC-2145</div>
                                <div class="col">Trailer : 0142</div>

                            </div>
                            <div class="modal-header p-3 bg-soft-header mt-1" style="background-color: #d9d9d9">
                                <div class="col">Dispatcher Notes :</div>
                                <div class="col">Driver Instructions :</div>

                            </div>

                            <div class="row">

                                <div class="col-xxl-12">
                                    <div class="card mt-2" style="background-color: #f0f0f0">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3"
                                                role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#home1"
                                                        role="tab">
                                                        Pick Up
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#profile1"
                                                        role="tab">
                                                        Delivery
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#messages1"
                                                        role="tab">
                                                        Border-X
                                                    </a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content text-muted">
                                                <div class="tab-pane active" id="home1" role="tabpanel">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1 ms-2">
                                                            <div class="modal-header p-3 mt-2 bg-soft-header"
                                                                style="background-color: #ffffff">
                                                                {{-- <div class="row"> --}}
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <p class="fw-bold">Company : ABC Company</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <p class="fw-bold">Address : GD STN A, CALGARY AB
                                                                            T0H 1A0</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <p class="fw-bold">Contact : JONES</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <p class="fw-bold">Phone/ext : 555-1212 +1(416)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <p class="fw-bold">Load ID-1 : 00075</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <p class="fw-bold">Load ID-2 : 00125</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <p class="fw-bold">Commodity : -</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <p class="fw-bold">Hazardous : -</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <p class="fw-bold">Tarping : Y</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <p class="fw-bold">Plastic Wrap : N</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <p class="fw-bold">Over dim : Y</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <p class="fw-bold">Heat/Temp : N</p>
                                                                    </div>
                                                                </div>
                                                                {{-- </div> --}}

                                                                {{-- <div class="col">
                                                                    <div class="row">Refeer/Temp : ABC Company</div>
                                                                    <div class="row">Notes : GD STN A, CALGARY AB T0H 1A0</div>
                                                                </div> --}}

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="profile1" role="tabpanel">
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0">
                                                            <i class="ri-checkbox-multiple-blank-fill text-success"></i>
                                                        </div>
                                                        <div class="flex-grow-1 ms-2">
                                                            When, while the lovely valley teems with vapour around me, and
                                                            the meridian sun strikes the upper surface of the impenetrable
                                                            foliage of my trees, and but a few stray gleams steal into the
                                                            inner sanctuary, I throw myself down among the tall grass by the
                                                            trickling stream; and, as I lie close to the earth, a thousand
                                                            unknown.
                                                            <div class="mt-2">
                                                                <a href="javascript:void(0);"
                                                                    class="btn btn-sm btn-soft-primary">Read More <i
                                                                        class="ri-arrow-right-line ms-1 align-middle"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane " id="messages1" role="tabpanel">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1 ms-2">
                                                            <div class="modal-header p-3 mt-2 bg-soft-header"
                                                                style="background-color: #d9d9d9">
                                                                <div class="col">Border : RDE-10</div>
                                                                <div class="col">Broker : ABC Test</div>
                                                                <div class="col">Broker Ph : +1(105) 214 214</div>

                                                            </div>
                                                            <div class="modal-header p-3 mt-2 bg-soft-header"
                                                                style="background-color: #d9d9d9">
                                                                <div class="col">Border : RDE-10</div>
                                                                <div class="col">Broker : ABC Test</div>
                                                                <div class="col">Broker Ph : +1(105) 214 214</div>

                                                            </div>
                                                            <div class="modal-header p-3 mt-2 bg-soft-header"
                                                                style="background-color: #d9d9d9">
                                                                <div class="col">Border : RDE-10</div>
                                                                <div class="col">Broker : ABC Test</div>
                                                                <div class="col">Broker Ph : +1(105) 214 214</div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card-body -->
                                    </div><!-- end card -->
                                </div><!--end col-->


                            </div><!--end row-->



                            <div class="col-lg-12 mt-2">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button"
                                        class="btn btn-light bg-gradient waves-effect waves-light mb-2 text-danger"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- User Create -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="orderScansShow" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-dark">
                    <h5 class="modal-title text-light" id="UserModalTitle">Scan Docs</h5>
                    <div class="">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>
                <div class="modal-body">
                    <!-- User Create -->
                    <form id="form_user">
                        @csrf
                        <div class="row">
                            <div id="dataContainer"></div>

                        </div>
                    </form>
                    <!-- User Create -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light bg-gradient waves-effect waves-light mb-2 text-danger"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                    <div class="mt-4 text-center">
                        <h4>You are about to delete a task ?</h4>
                        <p class="text-muted fs-14 mb-4">Deleting your task will remove all of
                            your information from our database.</p>
                        <div class="hstack gap-2 justify-content-center remove">
                            <button class="btn btn-link btn-ghost-success fw-medium text-decoration-none"
                                data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                            <button class="btn btn-danger" id="delete-record">Yes, Delete It</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end delete modal -->


    <!--end modal-->
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/tasks-list.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.1/jquery.timepicker.min.js"></script>

    <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/22.1.4/js/dx.all.js"></script>

    <script type="text/javascript">
        //Globle variables
        var selected_order_id = '';
        var employees = [{}];

        $(document).ready(function() {
            load_all_orders();
        });

        function load_all_orders() {
            $.ajax({
                url: "/get_all_orders",
                method: "GET",
                success: function(response) {
                    console.log(response.data);
                    employees = response.data;
                },
                error: function(xhr, status, error) {
                    console.error("AJAX request failed:", status, error);
                }
            });
        }

        //tblorderlist table load
        var tblorderlist = $("#show_order_list").DataTable({
            "bPaginate": true,
            "bFilter": true,
            "bInfo": true,
            serverSide: true,
            processing: true,
            aaSorting: [
                [0, "desc"]
            ],
            ajax: "/get_all_orders",
            columns: [{
                    data: 'Company',
                    name: 'Company'
                },
                {
                    data: 'DriverID',
                    name: 'DriverID'
                },
                {
                    data: 'Order',
                    name: 'Order'
                },
                {
                    data: 'Type',
                    name: 'Type',
                    render: function(data, type) {
                        // let warranty = ''
                        if (data == 'NEW') {
                            return `<span style="color: #FFD700; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 14px;">NEW</span>`;
                        }else if(data == 'MODIFY') {
                            return `<span style="color: #e38d9c; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 14px;text-transform: uppercase;">MODIFY</span>`;
                        }else {
                            return `<span style="color: #FF0000; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 14px;">CANCEL</span>`;
                        }
                        // return warranty;
                    }
                },
                {
                    data: 'ReceivedDate',
                    name: 'ReceivedDate'
                },
                {
                    data: 'ReceivedTime',
                    name: 'ReceivedTime'
                },
                {
                    data: 'ReadStatus',
                    name: 'ReadStatus',
                    className: 'text-center',
                    render: function(data, type) {
                        // let warranty = ''
                        if (data == 'true') {
                            return `<span style="background-color: green; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;">Yes</span>`;
                        } else {
                            return `<span style="background-color: red; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;">No</span>`;
                        }
                        // return warranty;
                    }

                },
                {
                    data: 'Status',
                    name: 'Status',
                    className: 'text-center',
                    render: function(data, type) {
                        // let warranty = ''
                        if (data == 'COMPLETE') {
                            return `<span style="background-color: green; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;text-transform: uppercase;">${data}</span>`;
                        }else if(data == 'STARTED') {
                            return `<span style="background-color: blue; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;text-transform: uppercase;">${data}</span>`;
                        }else if(data == 'CANNOT COMPLETE') {
                            return `<span style="background-color: red; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;text-transform: uppercase;">${data}</span>`;
                        }else if(data == 'ETA') {
                            return `<span style="background-color: teal; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;text-transform: uppercase;">${data}</span>`;
                        }else if(data == 'REJECTED') {
                            return `<span style="background-color: red; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;text-transform: uppercase;">${data}</span>`;
                        }else if(data == 'NEW') {
                            return `<span style="background-color: yellow; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;text-transform: uppercase;">${data}</span>`;
                        } else {
                            return `<span style="background-color: red; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;text-transform: uppercase;">${data}</span>`;
                        }

                        // return warranty;
                    }

                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
            'drawCallback': function() {
                $('#show_order_list tbody tr td').css('padding-top', '0px');
                $('#show_order_list tbody tr td').css('font-size', '12px');
                $('#show_order_list tbody tr td').css('padding-bottom', '0px');
                $('#show_order_list tbody tr td').css('margin-bottom', '0px');
                $('#show_order_list tbody tr td').css('font-family', ' "PT Sans", sans-serif');

                $('#show_order_list thead tr th').css('font-family', ' "PT Sans", sans-serif');
                $('#show_order_list thead tr th').css('padding-top', '1px');
                $('#show_order_list thead tr th').css('padding-bottom', '1px');
                $('#show_order_list thead tr th').css('margin-bottom', '0px');
                $('#show_order_list thead tr th').css('font-style', 'normal');

                $('#show_order_list .paginate_button').css('padding', '0px');
                $('#show_order_list .paginate_button').css('font-family', ' "PT Sans", sans-serif');
                $('#show_order_list .paginate_button').css('font-size', '11px');

                $('#show_order_list .dataTables_info').css('padding', '4px');
                $('#show_order_list .dataTables_info').css('font-family', ' "PT Sans", sans-serif');
                $('#show_order_list .dataTables_info').css('font-size', '12px');

                $(".dataTables_length").css('padding', '0px');
                $(".dataTables_length").css('margin', '0px');
                $(".dataTables_length label").css('margin', '0px');
                $(".dataTables_length label").css('font-size', '11px');
                $(".dataTables_length select").css('padding', '2px');
            }
        });

        function reloadTable() {
            tblorderlist.ajax.reload(); // Reload the DataTable data
        }

        $('#orderFilter').keyup(function() {
            var orderFilter = $('#orderFilter').val();
            tblorderlist.ajax.url('{{ route('search_filter') }}?orderFilter=' + orderFilter).load();
        });
        $('#companyFilter').keyup(function() {
            var companyFilter = $('#companyFilter').val();
            tblorderlist.ajax.url('{{ route('company_filter') }}?companyFilter=' + companyFilter).load();
        });
        $('#driverFilter').keyup(function() {
            var driverFilter = $('#driverFilter').val();
            tblorderlist.ajax.url('{{ route('driver_filter') }}?driverFilter=' + driverFilter).load();
        });
        $('#typeFilter').change(function() {
            var typeFilter = $('#typeFilter').val();
            tblorderlist.ajax.url('{{ route('type_filter') }}?typeFilter=' + typeFilter).load();
        });
        $('#dateFilter').change(function() {
            var dateFilter = $('#dateFilter').val();
            console.log(dateFilter);
            tblorderlist.ajax.url('{{ route('date_filter') }}?dateFilter=' + dateFilter).load();
        });
        $('#readStatusFilter').change(function() {
            var readStatusFilter = $('#readStatusFilter').val();
            console.log(readStatusFilter);
            tblorderlist.ajax.url('{{ route('readStatus_Filter') }}?readStatusFilter=' + readStatusFilter).load();
        });
        $('#statusFilter').keyup(function() {
            var statusFilter = $('#statusFilter').val();
            console.log(statusFilter);
            tblorderlist.ajax.url('{{ route('status_Filter') }}?statusFilter=' + statusFilter).load();
        });

        $('#show_order_list tbody').on('click', '.viewOrder', function() {
            var data = tblorderlist.row($(this).parents('tr')).data();

            console.log(data);

            window.location.href = '/order_details_view/'+ data.Order_id;

        });

        $("#dataGrid").dxDataGrid({
            dataSource: employees,
            // keyExpr: "id",
            showBorders: true,
            columns: [
                // ...
                {
                    dataField: "Company",
                    // width: 100,
                    // groupIndex: 1,
                },
                {
                    dataField: "DriverID",
                    // width: 100,
                },
                {
                    dataField: "Order",
                    // dataType: "date",
                    // width: 100,
                },
                {
                    dataField: "Type",
                    // dataType: "date",
                    // width: 100,
                },
                {
                    dataField: "ReceivedDate",
                    dataType: "date",
                    // width: 100,
                },
                {
                    dataField: "ReceivedTime",
                    dataType: "date",
                    format: "HH:mm:ss", // Display time in hours, minutes, and seconds
                    filter: false, // Disable filtering
                    sortable: true // Keep sorting enabled if needed
                },

                {
                    dataField: "ReadStatus",
                    // dataType: "date",
                    // width: 100,
                    alignment: 'center',
                    cellTemplate: function(container, options) {

                        // console.log(options);
                        if (options.data.ReadStatus === true) {
                            // Create the span element
                            var span = $('<span>')
                                .text('Read')
                                .css({
                                    'color': 'white',
                                    'background-color': 'green',
                                    'font-weight': 'bold',
                                    'padding': '2px 5px', // Add padding for better appearance
                                    'border-radius': '10px' // Add border radius for rounded corners
                                });

                            // Append the span to the container
                            container.append(span);
                        } else {
                            // If you want to show the actual ReadStatus value for other cases
                            // container.text(options.data.ReadStatus);
                            var span = $('<span>')
                                .text('Pending')
                                .css({
                                    'color': 'white',
                                    'background-color': '#E69130',
                                    'font-weight': 'bold',
                                    'padding': '2px 5px', // Add padding for better appearance
                                    'border-radius': '10px' // Add border radius for rounded corners
                                });

                            // Append the span to the container
                            container.append(span);
                        }

                    }
                },
                {
                    dataField: "Status",
                    // dataType: "date",
                    // width: 100,
                    filterRow: {
                        visible: false
                    },
                },
                {
                    dataField: "Action",
                    // dataType: "date",
                    // width: 100,
                    cellTemplate: function(container, options) {
                        // Create the 'Read' button with an icon
                        var readButton = $('<button>')
                            .html('<i class="fas fa-eye"></i>') // Add FontAwesome icon
                            .attr('type', 'button')
                            .css({
                                'color': 'white',
                                'background-color': 'gray',
                                'font-weight': 'bold',
                                'padding': '2px 5px',
                                'border-radius': '10px',
                                'border': 'none',
                                'cursor': 'pointer',
                                'margin-right': '5px' // Add margin to separate buttons
                            })
                            .on('click', function() {
                                // alert('Read button clicked for ' + options
                                // .dataField); // Action for the Read button
                                // $('#orderDetailsView').modal("show");
                                // window.location.href = '/your-page-url?param=' + options.data.DriverID;
                                window.location.href = '/order_details_view';
                            });

                        // Create the 'Edit' button with an icon
                        var editButton = $('<button>')
                            .html('<i class="fas fa-file-pdf"></i>') // Add FontAwesome icon
                            .css({
                                'color': 'black',
                                'background-color': 'gray',
                                'font-weight': 'bold',
                                'padding': '2px 5px',
                                'border-radius': '10px',
                                'border': 'none',
                                'cursor': 'pointer',
                                'margin-right': '5px' // Add margin to separate buttons
                            })
                            .on('click', function() {
                                alert('Edit button clicked for ' + options
                                    .dataField); // Action for the Edit button
                            });

                        // Create the 'Delete' button with an icon
                        var deleteButton = $('<button>')
                            .html('<i class="fa fa-repeat"></i> ') // Add FontAwesome icon
                            .css({
                                'color': 'white',
                                'background-color': 'gray',
                                'font-weight': 'bold',
                                'padding': '2px 5px',
                                'border-radius': '10px',
                                'border': 'none',
                                'cursor': 'pointer'
                            })
                            .on('click', function() {
                                alert('Delete button clicked for ' + options
                                    .dataField); // Action for the Delete button
                            });

                        // Append the buttons to the container
                        container.append(readButton, editButton, deleteButton);
                    }


                },
                // ...
            ],
            filterRow: {
                visible: true
            },
            // searchPanel: {
            //     visible: true
            // },
            allowColumnResizing: true,
            columnAutoWidth: true,
            paging: {
                pageSize: 10,
            },
            pager: {
                visible: true,
                allowedPageSizes: [5, 10, 'all'],
                showPageSizeSelector: true,
                showInfo: true,
                showNavigationButtons: true,
            },
            // groupPanel: {
            //     visible: true
            // },
        });

        $('#show_order_list tbody').on('click', '.viewOrderScans', function() {
            var data = tblorderlist.row($(this).parents('tr')).data();

            selected_order_id = data.Order_id;

            $('#orderScansShow').modal('show');

            load_order_related_scan_docs();

        });

        function load_order_related_scan_docs() {
            $.ajax({
                url: "/get_order_related_docs/" + selected_order_id,
                method: 'GET',
                success: function(response) {
                    var container = $('#dataContainer');
                    container.empty();

                    if (response.data.length === 0) {
                        container
                            .addClass('centered-message')
                            .text('No any scan documents.');
                        return;
                    } else {
                        container.removeClass('centered-message');
                    }

                    // Create the table and header
                    var table = $('<table></table>').addClass('table');
                    var thead = $('<thead></thead>');
                    var headerRow = $('<tr></tr>');
                    headerRow.append($('<th></th>').text('ID'));
                    headerRow.append($('<th></th>').text('File Name'));
                    thead.append(headerRow);
                    table.append(thead);

                    var tbody = $('<tbody></tbody>');

                    response.data.forEach(function(item) {
                        // Create a row for each item
                        var row = $('<tr></tr>');
                        var idColumn = $('<td></td>').text(item.id);
                        var filenameColumn = $('<td></td>').text(item.File_name);

                        // Create download button
                        var downloadButton = $('<button></button>')
                            .addClass('btn btn-sm btn-dark')
                            .attr('type', 'button')
                            .html('<i class="fas fa-download"></i>')
                            .click(function() {
                                // Assuming you have a download endpoint
                                // window.location.href = "http://127.0.0.1:8000/api/v1/scan_doc_download/" + item.id;
                                // window.location.href = "https://api-docv1.bimatrix.ca/api/v1/scan_doc_download/" + item.id;
                                window.location.href = "https://admin.hlshighway101.com/api/v1/scan_doc_download/" + item.id;
                            });
                        var downloadColumn = $('<td></td>').append(downloadButton);

                        // Append columns to the row
                        row.append(idColumn);
                        row.append(filenameColumn);
                        row.append(downloadColumn);

                        // Append row to the tbody
                        tbody.append(row);
                    });

                    // Append tbody to the table
                    table.append(tbody);

                    // Append table to the container
                    container.append(table);
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error('Error occurred while fetching data:', error);
                }
            });
        }
    </script>
@endsection
