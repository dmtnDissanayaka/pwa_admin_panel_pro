@extends('layouts.master-layouts')
@section('title')
    @lang('Drivers ')
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/metismenu/dist/metisMenu.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/22.1.4/css/dx.light.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <style>

    </style>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Drivers
        @endslot
        @slot('title')
            Drivers List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <table class="display" id="show_driver" width="100%">
                            <thead>
                                <tr>
                                    <th>Driver ID</th>
                                    <th>Company</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Status</th>
                                    <th>Version</th>

                                    {{-- <th width="6%">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="https://unpkg.com/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/metismenu"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/22.1.4/js/dx.all.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //TblUser table load
        var tbluser = $("#show_driver").DataTable({
            serverSide: true,
            processing: true,
            aaSorting: [
                [0, "desc"]
            ],
            ajax: "/load_dricer_for_table",
            columns: [{
                    data: 'driver_id',
                    name: 'driver_id'
                },
                {
                    data: 'driver_company',
                    name: 'driver_company'
                },
                {
                    data: 'driver_first_name',
                    name: 'driver_first_name'
                },
                {
                    data: 'driver_last_name',
                    name: 'driver_last_name'
                },
                {
                    data: 'driver_status',
                    name: 'driver_status',
                    render: function(data, type, row, meta) {
                        if (data == 'Online') {
                            return `<span style="background-color: green; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;">${data}</span>`;
                        } else {
                            return `<span style="background-color: red; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;">${data}</span>`;
                        }
                    }
                },
                {
                    data: 'driver_version',
                    name: 'driver_version'
                },

                // {
                //     data:'action',
                //     name:'action'
                // }

                // {
                //     data: 'status',
                //     name: 'status',
                //     className: 'text-center',
                //     render: function(data, type) {
                //         // let warranty = ''
                //         if (data == '1') {
                //             return `<span style="background-color: green; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;">Active</span>`;
                //         } else {
                //             return `<span style="background-color: red; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;">Deactive</span>`;
                //         }
                //         // return warranty;
                //     }
                // },
            ],
            'drawCallback': function() {
                $('#show_driver tbody tr td').css('padding-top', '0px');
                $('#show_driver tbody tr td').css('font-size', '14px');
                $('#show_driver tbody tr td').css('padding-bottom', '0px');
                $('#show_driver tbody tr td').css('margin-bottom', '0px');
                $('#show_driver tbody tr td').css('font-family', ' "PT Sans", sans-serif');

                $('#show_driver thead tr th').css('font-family', ' "PT Sans", sans-serif');
                $('#show_driver thead tr th').css('padding-top', '2px');
                $('#show_driver thead tr th').css('padding-bottom', '2px');
                $('#show_driver thead tr th').css('margin-bottom', '0px');
                $('#show_driver thead tr th').css('font-style', 'normal');

                $('#show_driver .paginate_button').css('padding', '0px');
                $('#show_driver .paginate_button').css('font-family', ' "PT Sans", sans-serif');
                $('#show_driver .paginate_button').css('font-size', '12px');

                $('#show_driver .dataTables_info').css('padding', '4px');
                $('#show_driver .dataTables_info').css('font-family', ' "PT Sans", sans-serif');
                $('#show_driver .dataTables_info').css('font-size', '14px');

                $(".dataTables_length").css('padding', '0px');
                $(".dataTables_length").css('margin', '0px');
                $(".dataTables_length label").css('margin', '0px');
                $(".dataTables_length label").css('font-size', '11px');
                $(".dataTables_length select").css('padding', '2px');
            }
        });
    </script>
@endsection
