@extends('layouts.master-layouts')
@section('title')
    @lang('Company ')
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
            Company
        @endslot
        @slot('title')
            Company List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <table class="display" id="show_company" width="100%">
                            <thead>
                                <tr>
                                    <th>Company ID</th>
                                    <th>Company Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
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
        var tbluser = $("#show_company").DataTable({
            serverSide: true,
            processing: true,
            aaSorting: [
                [0, "desc"]
            ],
            ajax: "/load_company_for_table",
            columns: [{
                    data: 'company_id',
                    name: 'company_id'
                },
                {
                    data: 'company_name',
                    name: 'company_name'
                },
                {
                    data: 'email',
                    name: 'email'
                },

                {
                    data: 'status',
                    name: 'status',
                    className: 'text-center',
                    render: function(data, type) {
                        // let warranty = ''
                        if (data == 'ENABLED') {
                            return `<span style="background-color: green; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;">Active</span>`;
                        } else {
                            return `<span style="background-color: red; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;">Deactive</span>`;
                        }
                        // return warranty;
                    }
                },
            ],
            'drawCallback': function() {
                $('#show_company tbody tr td').css('padding-top', '0px');
                $('#show_company tbody tr td').css('font-size', '14px');
                $('#show_company tbody tr td').css('padding-bottom', '0px');
                $('#show_company tbody tr td').css('margin-bottom', '0px');
                $('#show_company tbody tr td').css('font-family', ' "PT Sans", sans-serif');

                $('#show_company thead tr th').css('font-family', ' "PT Sans", sans-serif');
                $('#show_company thead tr th').css('padding-top', '2px');
                $('#show_company thead tr th').css('padding-bottom', '2px');
                $('#show_company thead tr th').css('margin-bottom', '0px');
                $('#show_company thead tr th').css('font-style', 'normal');

                $('#show_company .paginate_button').css('padding', '0px');
                $('#show_company .paginate_button').css('font-family', ' "PT Sans", sans-serif');
                $('#show_company .paginate_button').css('font-size', '12px');

                $('#show_company .dataTables_info').css('padding', '4px');
                $('#show_company .dataTables_info').css('font-family', ' "PT Sans", sans-serif');
                $('#show_company .dataTables_info').css('font-size', '14px');

                $(".dataTables_length").css('padding', '0px');
                $(".dataTables_length").css('margin', '0px');
                $(".dataTables_length label").css('margin', '0px');
                $(".dataTables_length label").css('font-size', '11px');
                $(".dataTables_length select").css('padding', '2px');
            }
        });
    </script>
@endsection
