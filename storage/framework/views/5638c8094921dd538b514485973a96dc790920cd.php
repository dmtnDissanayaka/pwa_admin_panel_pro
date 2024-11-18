<?php $__env->startSection('title'); ?>
    Employees
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/metismenu/dist/metisMenu.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/22.1.4/css/dx.light.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <style>

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Peoples
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Employees
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-body">
                    <!-- Buttons New Vender -->
                    <div class="d-flex justify-content-start">
                        <button type="button" id="newEmpBtn" class="btn btn-primary btn-sm waves-effect waves-light mb-2">
                            Add New
                        </button>
                    </div>
                    <!-- Buttons New Vender -->

                    <!-- Employees Show Area -->
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <table class="display" id="showEmployees" width="100%">
                            <thead>
                                <tr class="text-light" style="background-color: #326080;">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>NIC</th>
                                    <th>Designation</th>
                                    <th width="20%">Address</th>
                                    <th>Date Of Joined</th>
                                    <th style="width:8%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- Employee Show Area -->

                    <!-- staticBackdrop Modal -->
                    <div class="modal fade" id="newEmpModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content border-0">
                                <div class="modal-header p-3 bg-soft-header" style="background-color: #135079">
                                    <h5 class="modal-title text-light" id="UserModalTitle">New Employee</h5>
                                    <div class="">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <!-- suppler Create -->
                                    <form id="form_emp">
                                        <?php echo csrf_field(); ?>
                                        <div>
                                            <div class="row"  class="mt-2 mb-4">
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empName" class="form-label text-dark">Name <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control " placeholder=""
                                                                id="empName">
                                                            <span id="empNameError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empNic" class="form-label text-dark ">
                                                                NIC</label>
                                                            <input type="text" class="form-control " placeholder=""
                                                                id="empNic">
                                                            <span id="empNicError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empNation" class="form-label text-dark ">Nationality
                                                            </label>
                                                            <input type="text" class="form-control " placeholder=""
                                                                id="empNation">
                                                            <span id="empNationError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empTel" class="form-label text-dark ">Telephone
                                                            </label>
                                                            <input type="tel" class="form-control " placeholder=""
                                                                id="empTel">
                                                            <span id="empTelError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empDob" class="form-label text-dark ">Date Of
                                                                Birth
                                                            </label>
                                                            <input type="date" class="form-control " placeholder=""
                                                                id="empDob">
                                                            <span id="empDobError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empGender" class="form-label text-dark ">Gender
                                                            </label>
                                                            <div id="empGender" class="form-control mb-2"></div>
                                                            
                                                            <span id="empGenderError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="col-12">
                                                        <div class="col-md-12">
                                                            <div class="mb-2 mt-2">
                                                                <label for="empAddress"
                                                                    class="form-label text-dark ">Address</label>
                                                                <input type="text" class="form-control "
                                                                    placeholder="" id="empAddress">
                                                                <span id="empAddressError" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empDoj" class="form-label text-dark ">Date Of
                                                                Join
                                                            </label>
                                                            <input type="date" class="form-control " placeholder=""
                                                                id="empDoj">
                                                            <span id="empDojError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empSkillType" class="form-label text-dark ">Skill
                                                                Type
                                                            </label>
                                                            <input type="text" class="form-control " placeholder=""
                                                                id="empSkillType">
                                                            <span id="empSkillTypeError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empDesignation"
                                                                class="form-label text-dark ">Designation <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="input-group mb-2 ">
                                                                <div id="empDesignation" class="col-md-10"></div>
                                                                <button class="btn btn-info" type="button"
                                                                    title="Add New" id="addNewDesignation"><i
                                                                        class=" bx bxs-plus-square"></i></button>
                                                            </div>

                                                            
                                                            <span id="empDesignationError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                                


                                            </div>

                                        </div>

                                        


                                        <div class="col-lg-12 mt-2">
                                            <div class="hstack gap-2 justify-content-end">
                                                
                                                <button type="button" id="empSavenNew"
                                                    class="btn btn-primary btn-sm mb-2">Save and New</button>
                                                
                                                <button type="button"
                                                    class="btn btn-light btn-sm bg-gradient waves-effect waves-light mb-2 text-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                                <!-- Vender Create -->
                            </div>
                        </div>
                    </div>

                    <!-- designation modal -->
                    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel"
                        aria-modal="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-1">
                                <div class="modal-header p-3 bg-soft-header" style="background-color: #135079">
                                    <h5 class="modal-title text-light" id="exampleModalgridLabel">Designation Create</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="javascript:void(0);" id="designationForm">
                                        <div class="row g-3">
                                            <div class="col-xxl-12">
                                                <div>
                                                    <label for="designation" class="form-label">Designation</label>
                                                    <input type="text" class="form-control" id="designation"
                                                        placeholder="Enter designation">
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="button" class="btn btn-sm btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" id="btnDesignationCreate"
                                                        class="btn btn-sm btn-primary">Crate</button>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>




                    

                    <div class="modal fade" id="viewEmpModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content border-0">
                                <div class="modal-header p-3 bg-soft-header" style="background-color: #135079">
                                    <h5 class="modal-title text-light" id="UserModalTitle">Employee Details</h5>
                                    <div class="">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                </div>
                                <div class="modal-body">
                                    <!-- Employee view -->
                                    <form id="form_empU">
                                        <?php echo csrf_field(); ?>
                                        <div>
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empNameU" class="form-label text-dark">Name <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control " placeholder=""
                                                                id="empNameU">
                                                            <span id="empNameUError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empNicU" class="form-label text-dark ">
                                                                NIC</label>
                                                            <input type="text" class="form-control " placeholder=""
                                                                id="empNicU">
                                                            <span id="empNicUError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empNationU"
                                                                class="form-label text-dark ">Nationality
                                                            </label>
                                                            <input type="text" class="form-control " placeholder=""
                                                                id="empNationU">
                                                            <span id="empNationUError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empTelU" class="form-label text-dark ">Telephone
                                                            </label>
                                                            <input type="tel" class="form-control " placeholder=""
                                                                id="empTelU">
                                                            <span id="empTelUError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empDobU" class="form-label text-dark ">Date Of
                                                                Birth
                                                            </label>
                                                            <input type="date" class="form-control " placeholder=""
                                                                id="empDobU">
                                                            <span id="empDobUError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empGenderU" class="form-label text-dark ">Gender
                                                            </label>
                                                            <div id="empGenderU"></div>
                                                            
                                                            <span id="empGenderUError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="col-12">
                                                        <div class="col-md-12">
                                                            <div class="mb-2 mt-2">
                                                                <label for="empAddressU"
                                                                    class="form-label text-dark ">Address</label>
                                                                <input type="text" class="form-control "
                                                                    placeholder="" id="empAddressU">
                                                                <span id="empAddressUError" class="text-danger"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empDojU" class="form-label text-dark ">Date Of
                                                                Join
                                                            </label>
                                                            <input type="date" class="form-control " placeholder=""
                                                                id="empDojU">
                                                            <span id="empDojUError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empSkillTypeU" class="form-label text-dark ">Skill
                                                                Type
                                                            </label>
                                                            <input type="text" class="form-control " placeholder=""
                                                                id="empSkillTypeU">
                                                            <span id="empSkillTypeUError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="empDesignationU"
                                                                class="form-label text-dark ">Designation <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            
                                                            <div class="input-group mb-2 ">
                                                                <div id="empDesignationU" class="col-md-10"></div>
                                                                <button class="btn btn-info" type="button"
                                                                    title="Add New" id="addNewDesignationU"><i class="ri-filter-fill"></i></button>
                                                            </div>
                                                            
                                                            <span id="empDesignationUError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                


                                            </div>

                                        </div>

                                        


                                        <div class="col-lg-12 mt-2">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" id="empSaveChanges"
                                                    class="btn btn-sm btn-success mb-2">Save Changes</button>
                                                <button type="button" id="empDelete"
                                                    class="btn btn-sm btn-danger mb-2">Delete</button>
                                                
                                                <button type="button"
                                                    class="btn btn-sm btn-light bg-gradient waves-effect waves-light mb-2 text-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                                <!-- Vender Create -->
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModalgridU" tabindex="-1"
                        aria-labelledby="exampleModalgridLabel" aria-modal="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-1">
                                <div class="modal-header p-3 bg-soft-header" style="background-color: #135079">
                                    <h5 class="modal-title text-light" id="exampleModalgridLabel">Designation Create</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="javascript:void(0);" id="designationFormU">
                                        <div class="row g-3">
                                            <div class="col-xxl-12">
                                                <div>
                                                    <label for="designation" class="form-label">Designation</label>
                                                    <input type="text" class="form-control" id="designationU"
                                                        placeholder="Enter designation">
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="button" class="btn btn-sm btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" id="btnDesignationCreateU"
                                                        class="btn btn-sm btn-primary">Crate</button>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div> <!-- end col -->
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

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
            }
        });

        checkDeniedPermission();


        //Add New Button Click
        $('#newEmpBtn').on('click', function() {
            // load_acc();
            $('#newEmpModal').modal("show");
        });
        //
        //Add New Button Click
        $('#addNewDesignation').on('click', function() {
            // load_acc();
            $('#exampleModalgrid').modal("show");
        });
        //

        //Add New Button Click
        $('#addNewDesignationU').on('click', function() {
            // load_acc();
            $('#exampleModalgridU').modal("show");
        });
        //

        //Tblsuppiler table load
        // var tblemp = $("#showEmployees").DataTable({
        //     // "bPaginate": false,
        //     // "bFilter": false,
        //     // "bInfo": false,
        //     serverSide: true,
        //     processing: true,
        //     aaSorting: [
        //         [0, "desc"]
        //     ],
        //     ajax: "/get_all_tblemp",
        //     columns: [{
        //             data: 'ID',
        //             name: 'ID'
        //         },
        //         {
        //             data: 'Name',
        //             name: 'Name'
        //         },
        //         {
        //             data: 'NIC',
        //             name: 'NIC'
        //         },

        //         {
        //             data: 'designation.Designation',
        //             name: 'designation.Designation',
        //             render: function(data, type, row, meta) {
        //                 // var price = parseFloat(data);
        //                 if (data) {
        //                     return data;
        //                 } else {
        //                     return '-';
        //                 }
        //             }
        //         },
        //         {
        //             data: 'Address',
        //             name: 'Address'
        //         },
        //         {
        //             data: 'DateOfJoint',
        //             name: 'Date Of Joined'
        //         },

        //         {
        //             data: 'action',
        //             name: 'action'
        //         },
        //     ],
        //     'drawCallback': function() {
        //         $('table tbody tr td').css('padding-top', '2px');
        //         $('table tbody tr td').css('font-size', '12px');
        //         $('table tbody tr td').css('padding-bottom', '0px');
        //     }
        // });
        //





        //Vender save to database
        //Save Button Click
        $("#empSave").click(function(e) {

            e.preventDefault();
            $(this).html('Save');

            // let selected_venCL_id = $('#venderCreditorLedger').dxSelectBox('instance').option("value");
            let selected_gender = $('#empGender').dxSelectBox('instance').option("value");
            let designation = $('#empDesignation').dxSelectBox('instance').option("value");
            // console.log(selected_gender);

            let data = {
                "empName": $("#empName").val(),
                "empNic": $("#empNic").val(),
                "empNation": $("#empNation").val(),
                "empTel": $("#empTel").val(),
                "empDob": $("#empDob").val(),
                "empGender": selected_gender,
                "empAddress": $("#empAddress").val(),
                "empDoj": $("#empDoj").val(),
                "empSkillType": $("#empSkillType").val(),
                "empDesignation": designation,
                // "empBsicSalary": $("#empBsicSalary").val(),
                // "empETFPayfor": $("#empETFPayfor").val(),


                // "venderCreditorLedger": selected_venCL_id,
                // "venderAdvanceCreditorLedger": selected_venACL_id,
            }
            $("#empSave").prop('disabled', true);
            $("#empSavenNew").prop('disabled', true);

            $.ajax({
                data: data,
                url: "/employee_create",
                method: "post",
                beforeSend: function() {

                    ckeckValidation();
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    $("#empSave").prop('disabled', false);
                    $("#empSavenNew").prop('disabled', false);
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);

                        });
                    } else {
                        $("#form_emp").trigger("reset");
                        $('#newEmpModal').modal("hide");

                        tblemp.ajax.reload();
                        Toastify({
                            text: "Employee Create Successfully",
                            className: "info",
                            style: {
                                background: "Success",
                            }
                        }).showToast();
                        selectedId = null;
                    }
                },
                error: function(err) {
                    $("#empSave").prop('disabled', false);
                    $("#empSavenNew").prop('disabled', false);
                }
            });
        });
        //

        //Save and New Button CLick
        $("#empSavenNew").click(function(e) {

            // var empdesignation = $('#empDesignation').dxSelectBox('instance').option("value");
            // console.log(empdesignation);
            // if (!empdesignation) {
            //     document.getElementById('empDesignationError').innerHTML = "Designation is required.";
            //     return false;
            // } else {
            //     document.getElementById('empDesignationError').innerHTML = "";
            //     return true;

            //     return;
            // }

            e.preventDefault();
            $(this).html('Save and New');

            let selected_gender1 = $('#empGender').dxSelectBox('instance').option("value");
            let designation = $('#empDesignation').dxSelectBox('instance').option("value");
            // console.log(selected_gender);


            let data = {
                "empName": $("#empName").val(),
                "empNic": $("#empNic").val(),
                "empNation": $("#empNation").val(),
                "empTel": $("#empTel").val(),
                "empDob": $("#empDob").val(),
                "empGender": selected_gender1,
                "empAddress": $("#empAddress").val(),
                "empDoj": $("#empDoj").val(),
                "empSkillType": $("#empSkillType").val(),
                // "empDesignation": $("#empDesignation").val(),
                "empBsicSalary": $("#empBsicSalary").val(),
                "empETFPayfor": $("#empETFPayfor").val(),
                "empDesignation": designation,


            }
            $("#empSave").prop('disabled', true);
            $("#empSavenNew").prop('disabled', true);
            $.ajax({
                data: data,
                url: "/employee_create",
                method: "post",
                beforeSend: function() {
                    // poSaveValid();
                    ckeckValidation();
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    $("#empSave").prop('disabled', false);
                    $("#empSavenNew").prop('disabled', false);
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);

                        });
                    } else {
                        $("#form_emp").trigger("reset");
                        tblemp.ajax.reload();
                        Toastify({
                            text: "Employee Create Successfully",
                            className: "info",
                            style: {
                                background: "Success",
                            }
                        }).showToast();
                        selectedId = null;
                    }
                },
                error: function(err) {
                    $("#empSave").prop('disabled', false);
                    $("#empSavenNew").prop('disabled', false);
                }
            });
        });
        //

        function ckeckValidation() {
            var empName = document.getElementById('empName').value;
            if (empName == "") {
                document.getElementById('empNameError').innerHTML = "Name field is required.";
                return false;
            } else {
                document.getElementById('empNameError').innerHTML = "";
                return true;
            }





            // var empNic = document.getElementById('empNic').value;
            // if (empNic == "") {
            //     document.getElementById('empNicError').innerHTML = "NIC field is required.";
            //     return false;
            // }

            // var empNation = document.getElementById('empNation').value;
            // if (empNation == "") {
            //     document.getElementById('empNationError').innerHTML = "Nationality field is required.";
            //     return false;
            // }

            // var empTel = document.getElementById('empTel').value;
            // if (empTel == "") {
            //     document.getElementById('empTelError').innerHTML = "Telephone field is required.";
            //     return false;
            // }

            // var empDob = document.getElementById('empDob').value;
            // if (empDob == "") {
            //     document.getElementById('empDobError').innerHTML = "Date Of Birth field is required.";
            //     return false;
            // }
            // var empGender = document.getElementById('empGender').value;
            // if (empGender == "") {
            //     document.getElementById('empGenderError').innerHTML = "Gender field is required.";
            //     return false;
            // }
            // var empAddress = document.getElementById('empAddress').value;
            // if (empAddress == "") {
            //     document.getElementById('empAddressError').innerHTML = "Address field is required.";
            //     return false;
            // }
            // var empDoj = document.getElementById('empDoj').value;
            // if (empDoj == "") {
            //     document.getElementById('empDojError').innerHTML = "Date of joint field is required.";
            //     return false;
            // }

            // var empDesignation = document.getElementById('empDesignation').value;
            // if (empDesignation == "") {
            //     document.getElementById('empDesignationError').innerHTML = "Designation field is required.";
            //     return false;
            // }
        }

        //view Employee edit & delete
        //view Button Click
        var selectedEmpId = null;

        $('#showEmployees tbody').on('click', '.viewEmp', function() {
            // $(".dx-texteditor-input").css("height", "27px")
            // $(".dx-texteditor-input").css("min-height", "27px")
            // $(".dx-texteditor-input").css("max-height", "27px")
            var data = tblemp.row($(this).parents('tr')).data();
            // console.log('test');
            selectedEmpId = data.ID;
            var designationId = parseInt(data.Designation);
            $("#empNameU").val(data.Name);
            $("#empNicU").val(data.NIC);
            $("#empNationU").val(data.Nationality);
            $("#empTelU").val(data.Tel);
            $("#empDobU").val(data.DateOfBirth);
            $('#empGenderU').dxSelectBox("instance").option("value", );
            $("#empAddressU").val(data.Address);
            $("#empDojU").val(data.DateOfJoint);
            $("#empSkillTypeU").val(data.SkillType);
            $("#empDesignationU").val(data.Designation);
            $("#empBsicSalaryU").val(data.BsicSalary);
            $("#empETFPayforU").val(data.ETFPayfor);

            console.log(designationId);


            $('#empDesignationU').dxSelectBox('instance').option("value", designationId);

            $('#viewEmpModal').modal("show");
        });


        //Vender save  to database
        //Save Button Click
        $("#empSaveChanges").click(function(e) {

            e.preventDefault();
            $(this).html('Save Changes');

            // let masteracc = $('#masterAcc').dxSelectBox("instance").option("value");
            // console.log(masterAcc);
            // let body_data = JSON.stringify(ds1);

            // let selected_venCL_id = $('#venderCreditorLedger').dxSelectBox('instance').option("value");
            // let selected_venACL_id = $('#venderAdvanceCreditorLedger').dxSelectBox('instance').option("value");
            let selected_genderU = $('#empGenderU').dxSelectBox('instance').option("value");
            let empDesignationU = $('#empDesignationU').dxSelectBox('instance').option("value");

            let data = {
                "empId": selectedEmpId,
                "empName": $("#empNameU").val(),
                "empNic": $("#empNicU").val(),
                "empNation": $("#empNationU").val(),
                "empTel": $("#empTelU").val(),
                "empDob": $("#empDobU").val(),
                "empGender": selected_genderU,
                "empAddress": $("#empAddressU").val(),
                "empDoj": $("#empDojU").val(),
                "empSkillType": $("#empSkillTypeU").val(),
                // "empDesignation": $("#empDesignationU").val(),
                "empBsicSalary": $("#empBsicSalaryU").val(),
                "empETFPayfor": $("#empETFPayforU").val(),
                "empDesignationU": empDesignationU,

            }

            $.ajax({
                data: data,
                url: "/employee_update",
                method: "post",
                beforeSend: function() {

                    ckeckValidationU();
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);

                        });
                    } else {
                        $("#form_empU").trigger("reset");
                        $('#viewEmpModal').modal("hide");

                        tblemp.ajax.reload();
                        Toastify({
                            text: "Employee Updated Successfully",
                            className: "info",
                            style: {
                                background: "Success",
                            }
                        }).showToast();
                        selectedId = null;
                    }
                }
            });
        });
        //

        function ckeckValidationU() {
            var empName = document.getElementById('empNameU').value;
            if (empName == "") {
                document.getElementById('empNameUError').innerHTML = "Name field is required.";
                return false;
            }

            // var empNic = document.getElementById('empNicU').value;
            // if (empNic == "") {
            //     document.getElementById('empNicUError').innerHTML = "NIC field is required.";
            //     return false;
            // }

            // var empNation = document.getElementById('empNationU').value;
            // if (empNation == "") {
            //     document.getElementById('empNationUError').innerHTML = "Nationality field is required.";
            //     return false;
            // }

            // var empTel = document.getElementById('empTelU').value;
            // if (empTel == "") {
            //     document.getElementById('empTelUError').innerHTML = "Telephone field is required.";
            //     return false;
            // }

            // var empDob = document.getElementById('empDobU').value;
            // if (empDob == "") {
            //     document.getElementById('empDobUError').innerHTML = "Date Of Birth field is required.";
            //     return false;
            // }
            // var empGender = document.getElementById('empGenderU').value;
            // if (empGender == "") {
            //     document.getElementById('empGenderUError').innerHTML = "Gender field is required.";
            //     return false;
            // }
            // var empAddress = document.getElementById('empAddressU').value;
            // if (empAddress == "") {
            //     document.getElementById('empAddressUError').innerHTML = "Address field is required.";
            //     return false;
            // }
            // var empDoj = document.getElementById('empDojU').value;
            // if (empDoj == "") {
            //     document.getElementById('empDojUError').innerHTML = "Date of joint field is required.";
            //     return false;
            // }

            // var empDesignation = document.getElementById('empDesignationU').value;
            // if (empDesignation == "") {
            //     document.getElementById('empDesignationUError').innerHTML = "Designation field is required.";
            //     return false;
            // }
        }


        $('#empDelete').on('click', function() {
            Swal.fire({
                title: "Are you sure?",
                text: "You are responsible for the deleted record!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn btn-primary w-xs me-2 mt-2',
                cancelButtonClass: 'btn btn-danger w-xs mt-2',
                confirmButtonText: "Yes, delete it!",
                buttonsStyling: false,
                showCloseButton: true
            }).then((result) => {
                if (result.value) {
                    // selectedVnderId = data.ID;
                    // console.log(selectedVnderId);
                    $.ajax({
                        method: "post",
                        url: "/employee_delete/" + selectedEmpId,
                        success: function(data) {
                            $('#viewEmpModal').modal("hide");
                            tblemp.ajax.reload();
                            Toastify({
                                text: "Employee Deleted Successfully",
                                className: "danger",
                                style: {
                                    background: "danger",
                                }
                            }).showToast();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                        }
                    });
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\CANADA-New\PWA_ADMIN_PANEL\resources\views/layouts-vertical-hovered.blade.php ENDPATH**/ ?>