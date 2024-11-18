@extends('layouts.master-without-nav')
@section('title')
    @lang('translation.signup')
@endsection
<style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: poppins;
    }

    body {
        background-color: #E8EDF2;
    }

    div.container_register {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        display: flex;
        flex-direction: row;
        align-items: center;

        background-color: white;
        padding: 30px;
        box-shadow: 0 70px 50px -50px rgb(79, 78, 47);

         /* Adding border */
        border: 2px solid #000; /* 2px solid black border */
        border-radius: 10px; /* Optional: to add rounded corners */
    }

    div.container_register div.myform {
        width: 370px;
        /* margin-right: 10px; */
    }

    div.container_register div.myform h2 {
        color: #1c1c1e;
        margin-bottom: 20px;
    }

    div.container_register div.myform input {
        border: none;
        outline: none;
        border-radius: 0;
        width: 100%;
        border-bottom: 2px solid #1c1c1e;
        margin-bottom: 25px;
        padding: 7px 0;
        font-size: 14px;
    }

    div.container_register div.myform button {
        color: white;
        background-color: #545338;
        border: none;
        outline: none;
        border-radius: 2px;
        font-size: 14px;
        padding: 5px 12px;
        font-weight: 500;
    }

    div.container_register div.image img {
        width: 300px;
    }

    .myform .form-footer {
        text-align: right;
        margin-top: 20px;
    }

    .myform .form-footer p {
        margin: 0;
        font-size: 0.9rem;
        color: #666;
    }
</style>
@section('content')
    <div class="container_register">
        <div class="myform">
            <form action="" method="POST">
                <h3 class="text-center">Super Admin Default Account Create</h3>
                {{-- <input type="text" placeholder="Admin Name"> --}}
                <label for="username" class="form-label mt-3 fw-bold">Username</label>
                <input type="text" class="form-control"
                 id="username" name="username" placeholder="Enter username">

                <label for="username" class="form-label fw-bold">Email</label>
                <input type="text" class="form-control" id="email" name="email"
                    placeholder="Enter email">
                {{-- <input type="password" placeholder="Password"> --}}
                <label class="form-label fw-bold" for="password-input">Password</label>
                <div class="position-relative auth-pass-inputgroup mb-3">
                    <input type="password" class="form-control pe-5 @error('password') is-invalid @enderror" name="password"
                        placeholder="Enter password" id="password-input" >
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <label class="form-label fw-bold" for="password-input">Confirm Password</label>
                <div class="position-relative auth-pass-inputgroup mb-3">
                    <input type="password" class="form-control pe-5 @error('password') is-invalid @enderror" name="password"
                        placeholder="Enter confirm password" id="password-input-con" >
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="container">
                    <div class="row">
                      <div class="col text-end">
                        <button type="button" class="btn btn-primary">Create</button>
                      </div>
                    </div>
                  </div>
            </form>
            <div class="form-footer">
                <p>Version 1.0.001</p>
            </div>
        </div>


    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/particles.js/particles.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/particles.app.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/password-addon.init.js') }}"></script>

    <script src="">
        if (document.getElementById('password-addon-con'))
            document.getElementById('password-addon-con').addEventListener('click', function () {
                var passwordInput = document.getElementById("password-input");
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                } else {
                    passwordInput.type = "password";
                }
            });
    </script>
@endsection
