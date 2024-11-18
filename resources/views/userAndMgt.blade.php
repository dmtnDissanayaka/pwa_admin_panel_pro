@extends('layouts.master-layouts')
@section('title')
    @lang('Users ')
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
            Users
        @endslot
        @slot('title')
            Users List
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-body">
                    <!-- Buttons New User -->
                    <div class="d-flex justify-content-start">
                        <button type="button" id="newUserBtn"
                            class="btn btn-sm btn-primary  waves-effect waves-light mb-2">
                            Create User
                        </button>
                    </div>
                    <!-- Buttons New User -->

                    <!-- Users Show Area -->
                    <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <table class="display" id="showUser" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th style="width:6%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- Users Show Area -->

                    <!-- staticBackdrop Modal -->
                    <div class="modal fade" id="newUserModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content border-0">
                                <div class="modal-header p-3 bg-soft-header" style="background-color: #38454a">
                                    <h5 class="modal-title text-light" id="UserModalTitle">Create New User</h5>
                                    <div class="">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                </div>
                                <div class="modal-body">
                                    <!-- User Create -->
                                    <form id="form_user">
                                        @csrf
                                        <div>
                                            <div class="row" {{-- style="background-color: #326080; border-radius: 10px 10px 10px 10px;"
                                                class="mt-2 mb-4" --}}>
                                                <div class="col-6">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="username" class="form-label ">Username <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                id="username" autocomplete="off" name="CredentialUsr">
                                                            <span id="usernameError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="userEmail" class="form-label  ">Email <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <input type="email" class="form-control" placeholder=""
                                                                id="userEmail" onblur="validateEmail(this);">
                                                            <span id="userEmailError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-6">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="userPwd" class="form-label ">Password <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <input type="password" class="form-control" placeholder=""
                                                                id="userPwd" onblur="validatePassword(this);"
                                                                onfocus="this.removeAttribute('readonly');"
                                                                autocomplete="off" name="CredentialKey">
                                                            <span id="userPwdError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="userConPwd" class="form-label  ">
                                                                Confirm Password <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="password" class="form-control" placeholder=""
                                                                id="userConPwd" onblur="checkPasswordEqual(this);"
                                                                onfocus="this.removeAttribute('readonly');"
                                                                autocomplete="off" name="CredentialKey2">
                                                            <span id="userConPwdError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" id="userSave"
                                                    class="btn btn-sm btn-success mb-2">Create</button><button
                                                    type="button"
                                                    class="btn btn-sm btn-light bg-gradient waves-effect waves-light mb-2 text-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                                <!-- User Create -->
                            </div>
                        </div>
                    </div>


                    {{-- view modal  --}}

                    <div class="modal fade" id="viewUserModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content border-0">
                                <div class="modal-header p-3 bg-soft-header" style="background-color: #135079">
                                    <h5 class="modal-title text-light" id="UserModalTitle">User Details</h5>
                                    <div class="">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                </div>
                                <div class="modal-body">
                                    <!-- User Update -->
                                    <form id="form_userU" autocomplete="off">
                                        @csrf
                                        <div>
                                            <div class="row" {{-- style="background-color: #326080; border-radius: 10px 10px 10px 10px;"
                                                class="mt-2 mb-4" --}}>
                                                <div class="col-6">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="username" class="form-label ">Username <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                id="usernameU" autocomplete="off" name="CredentialUsr">
                                                            <span id="usernameErrorU" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="userEmail" class="form-label  ">Email <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <input type="email" class="form-control" placeholder=""
                                                                id="userEmailU" onblur="validateEmail(this);">
                                                            <span id="userEmailErrorU" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-6">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="userPwd" class="form-label ">Password <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <input type="password" class="form-control" placeholder=""
                                                                id="userPwdU" onblur="validatePassword(this);"
                                                                onfocus="this.removeAttribute('readonly');"
                                                                autocomplete="off" name="CredentialKey">
                                                            <span id="userPwdErrorU" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="col-md-12">
                                                        <div class="mb-2 mt-2">
                                                            <label for="userConPwdU" class="form-label  ">
                                                                Confirm Password <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="password" class="form-control" placeholder=""
                                                                id="userConPwdU" onblur="checkPasswordEqual(this);"
                                                                onfocus="this.removeAttribute('readonly');"
                                                                autocomplete="off" name="CredentialKey2">
                                                            <span id="userConPwdError" class="text-danger"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" id="userUpdate"
                                                    class="btn btn-sm btn-success mb-2">Update</button>
                                                <button type="button" id="userDelete"
                                                    class="btn btn-sm btn-danger mb-2">Delete</button>
                                                {{-- <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</a> --}}
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

                    {{-- end view modal --}}
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    </div>
@endsection
@section('script')
    {{-- <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/22.1.4/js/dx.all.js"></script> --}}
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

        //Add New Button Click
        $('#newUserBtn').on('click', function() {
            // load_acc();
            $('#newUserModal').modal("show");
        });
        //

        //TblUser table load
        var tbluser = $("#showUser").DataTable({
            serverSide: true,
            processing: true,
            aaSorting: [
                [0, "desc"]
            ],
            ajax: "/load_super_admin_users",
            columns: [{
                    data: 'id',
                    name: 'ID'
                },
                {
                    data: 'username',
                    name: 'Username'
                },
                {
                    data: 'email',
                    name: 'Email'
                },

                {
                    data: 'action',
                    name: 'action'
                },
            ],
            'drawCallback': function() {
                $('#showUser tbody tr td').css('padding-top', '0px');
                $('#showUser tbody tr td').css('font-size', '14px');
                $('#showUser tbody tr td').css('padding-bottom', '0px');
                $('#showUser tbody tr td').css('margin-bottom', '0px');
                $('#showUser tbody tr td').css('font-family', ' "PT Sans", sans-serif');

                $('#showUser thead tr th').css('font-family', ' "PT Sans", sans-serif');
                $('#showUser thead tr th').css('padding-top', '2px');
                $('#showUser thead tr th').css('padding-bottom', '2px');
                $('#showUser thead tr th').css('margin-bottom', '0px');
                $('#showUser thead tr th').css('font-style', 'normal');

                $('#showUser .paginate_button').css('padding', '0px');
                $('#showUser .paginate_button').css('font-family', ' "PT Sans", sans-serif');
                $('#showUser .paginate_button').css('font-size', '12px');

                $('#showUser .dataTables_info').css('padding', '4px');
                $('#showUser .dataTables_info').css('font-family', ' "PT Sans", sans-serif');
                $('#showUser .dataTables_info').css('font-size', '14px');

                $(".dataTables_length").css('padding', '0px');
                $(".dataTables_length").css('margin', '0px');
                $(".dataTables_length label").css('margin', '0px');
                $(".dataTables_length label").css('font-size', '11px');
                $(".dataTables_length select").css('padding', '2px');
            }
        });

        //email validation
        function validateEmail(emailField) {
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

            if (reg.test(emailField.value) == false) {
                document.getElementById('userEmailError').innerHTML = "Invalid Email Address";
                document.getElementById('userEmailUError').innerHTML = "Invalid Email Address";
                // alert('Invalid Email Address');
                return false;
            }
            document.getElementById('userEmailError').innerHTML = "";
            document.getElementById('userEmailUError').innerHTML = "";
            return true;

        }


        // validate confirm password
        function checkPasswordEqual(inputtxt) {
            let pwd = $("#userPwd").val();
            if (inputtxt.value.match(pwd)) {
                document.getElementById('userConPwdError').innerHTML = "";
                return true;
            } else {
                document.getElementById('userConPwdError').innerHTML = "Password does not Match";
                // alert("message");
                return false;
            }

        }

        //password validation
        // Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character
        function validatePassword(inputtxt) {
            var pwd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}$/;
            if (inputtxt.value.match(pwd)) {
                document.getElementById('userPwdError').innerHTML = "";
                return true;
            } else {
                document.getElementById('userPwdError').innerHTML =
                    "Invalid Password, Password must have minimum 8 characters, at least 1 uppercase letter, 1 lowercase letter, 1 number and 1 special character";
                // alert("message");
                return false;
            }
        }

        function ckeckValidation() {

            var username = document.getElementById('username').value;
            if (username == "") {
                document.getElementById('usernameError').innerHTML = "Username field is required.";
                return false;
            }

            var userEmail = document.getElementById('userEmail').value;
            if (userEmail == "") {
                document.getElementById('userEmailError').innerHTML = "Email field is required.";
                return false;
            }
            var userPwd = document.getElementById('userPwd').value;
            if (userPwd == "") {
                document.getElementById('userPwdError').innerHTML = "Password field is required.";
                return false;
            }
            var userConPwd = document.getElementById('userConPwd').value;
            if (userConPwd == "") {
                document.getElementById('userConPwdError').innerHTML = "Confirm Password field is required.";
                return false;
            }
        }
        function ckeckValidationU() {

            var username = document.getElementById('usernameU').value;
            if (username == "") {
                document.getElementById('usernameErrorU').innerHTML = "Username field is required.";
                return false;
            }

            var userEmail = document.getElementById('userEmailU').value;
            if (userEmail == "") {
                document.getElementById('userEmailErrorU').innerHTML = "Email field is required.";
                return false;
            }
            var userPwd = document.getElementById('userPwdU').value;
            if (userPwd == "") {
                document.getElementById('userPwdErrorU').innerHTML = "Password field is required.";
                return false;
            }
            var userConPwd = document.getElementById('userConPwdU').value;
            if (userConPwd == "") {
                document.getElementById('userConPwdErrorU').innerHTML = "Confirm Password field is required.";
                return false;
            }
        }

        //Save Button Click
        $("#userSave").click(function(e) {

            e.preventDefault();
            let data = {
                "username": $("#username").val(),
                "userEmail": $("#userEmail").val(),
                "userPwd": $("#userPwd").val(),
                "userConPwd": $("#userConPwd").val(),
            }

            $.ajax({
                url: "/user_create",
                data: data,
                method: "POST",
                beforeSend: function() {

                    ckeckValidation();
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    if (!data.success) {
                        Toastify({
                            text: data.message,
                            className: "danger",
                            style: {
                                background: "#FF0000",
                            }
                        }).showToast();
                    } else {
                        $("#form_user").trigger("reset");
                        tbluser.ajax.reload();
                        $('#newUserModal').modal("hide");
                        Toastify({
                            text: data.message,
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

        var selectedUserId = null;

        $('#showUser tbody').on('click', '.viewuser', function() {
            var data = tbluser.row($(this).parents('tr')).data();

            $('#viewUserModal').modal('show');

            selectedUserId = data.id;

            $("#usernameU").val(data.username);
            $("#userEmailU").val(data.email);
            $("#userPwdU").val(data.password);
            $("#userConPwdU").val(data.confirmpassword);
        });

        $("#userUpdate").click(function(e) {

            e.preventDefault();

            let data = {
                "userId": selectedUserId,
                "username": $("#usernameU").val(),
                "userEmail": $("#userEmailU").val(),
                "userPwd": $("#userPwdU").val(),
                "userConPwd": $("#userConPwdU").val(),
            }

            $.ajax({
                url: "/user_update",
                data: data,
                method: "POST",
                beforeSend: function() {

                    ckeckValidationU();
                },
                success: function(data) {
                    if (!data.success) {
                        Toastify({
                            text: data.message,
                            className: "danger",
                            style: {
                                background: "#FF0000",
                            }
                        }).showToast();
                    } else {
                        $("#form_userU").trigger("reset");
                        tbluser.ajax.reload();
                        $('#viewUserModal').modal("hide");
                        Toastify({
                            text: data.message,
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


        $('#userDelete').on('click', function() {
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

                    $.ajax({
                        method: "post",
                        url: "/user_delete/" + selectedUserId,
                        success: function(data) {
                            $('#viewUserModal').modal("hide");
                            tbluser.ajax.reload();
                            Toastify({
                                text: "User Deleted Successfully",
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
@endsection
