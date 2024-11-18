<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Company '); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/metismenu/dist/metisMenu.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/22.1.4/css/dx.light.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <style>
        table {
            page-break-inside: auto;
            background-color:rgb(255, 255, 255);
            border:2px solid rgb(132, 123, 123);
        }
        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }
        thead {
            display: table-header-group;
        }
        tfoot {
            display: table-footer-group;
        }
        td{
            border:2px solid rgb(64, 64, 120);
        }
        .break-word {
            word-break: break-all;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Audit Trails
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            API Call
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <div class="table-container">
                            <table class="display" id="show_apis" width="100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>API Call</th>
                                        <th>Reference</th>
                                        <th>Status</th>
                                        <th>Date & Time</th>
                                        <th class="break-word" >Request</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Data Rows Here -->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="<?php echo e(URL::asset('assets/libs/prismjs/prismjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
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
        var tbluser = $("#show_apis").DataTable({
            serverSide: true,
            processing: true,
            aaSorting: [
                [0, "desc"]
            ],
            ajax: "/load_apis_log_for_table",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'api_call',
                    name: 'api_call'
                },
                {
                    data: 'reference',
                    name: 'reference'
                },

                {
                    data: 'status',
                    name: 'status',
                    // className: 'text-center',
                    // render: function(data, type) {
                    //     // let warranty = ''
                    //     if (data == '1') {
                    //         return `<span style="background-color: green; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;">Active</span>`;
                    //     } else {
                    //         return `<span style="background-color: red; color: white; font-weight: bold; border-radius: 5px; padding: 2px 5px; font-size: 10px;">Deactive</span>`;
                    //     }
                    //     // return warranty;
                    // }
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                },
                {
                    data: 'request',
                    name: 'request',
                },
                // {
                //     data: 'response',
                //     name: 'response',
                // },
            ],
            'drawCallback': function() {
                $('#show_apis tbody tr td').css('padding-top', '0px');
                $('#show_apis tbody tr td').css('font-size', '14px');
                $('#show_apis tbody tr td').css('padding-bottom', '0px');
                $('#show_apis tbody tr td').css('margin-bottom', '0px');
                $('#show_apis tbody tr td').css('font-family', ' "PT Sans", sans-serif');

                $('#show_apis thead tr th').css('font-family', ' "PT Sans", sans-serif');
                $('#show_apis thead tr th').css('padding-top', '2px');
                $('#show_apis thead tr th').css('padding-bottom', '2px');
                $('#show_apis thead tr th').css('margin-bottom', '0px');
                $('#show_apis thead tr th').css('font-style', 'normal');

                $('#show_apis .paginate_button').css('padding', '0px');
                $('#show_apis .paginate_button').css('font-family', ' "PT Sans", sans-serif');
                $('#show_apis .paginate_button').css('font-size', '12px');

                $('#show_apis .dataTables_info').css('padding', '4px');
                $('#show_apis .dataTables_info').css('font-family', ' "PT Sans", sans-serif');
                $('#show_apis .dataTables_info').css('font-size', '14px');

                $(".dataTables_length").css('padding', '0px');
                $(".dataTables_length").css('margin', '0px');
                $(".dataTables_length label").css('margin', '0px');
                $(".dataTables_length label").css('font-size', '11px');
                $(".dataTables_length select").css('padding', '2px');
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\CANADA-New\PWA_ADMIN_PANEL\resources\views/apis_call.blade.php ENDPATH**/ ?>