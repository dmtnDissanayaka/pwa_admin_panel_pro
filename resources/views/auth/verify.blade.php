@extends('layouts.master-without-nav')
@section('title')
    @lang('Email Verify')
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

    div.container_loging {
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
        border: 2px solid #000;
        /* 2px solid black border */
        border-radius: 10px;
        /* Optional: to add rounded corners */
    }

    div.container_loging div.myform {
        width: 270px;
        /* margin-right: 10px; */
    }

    div.container_loging div.myform h2 {
        color: #1c1c1e;
        margin-bottom: 20px;
    }

    div.container_loging div.myform input {
        border: none;
        outline: none;
        border-radius: 0;
        width: 100%;
        border-bottom: 2px solid #1c1c1e;
        margin-bottom: 25px;
        padding: 7px 0;
        font-size: 14px;
    }

    /* div.container_loging div.myform button {
        color: white;
        background-color: #545338;
        border: none;
        outline: none;
        border-radius: 2px;
        font-size: 14px;
        padding: 5px 12px;
        font-weight: 500;
    } */

    div.container_loging div.image img {
        width: 350px;
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
    <div class="container_loging">
        <div class="myform">
            <form action="{{ route('checkOTP') }}" method="POST">
                @csrf
                <h3 class="text-center">Verify Your Email</h3>
                @if (session()->has('error'))
                    <div class="alert alert-danger" id="error">
                        {!! session()->get('error') !!}
                    </div>
                @endif
                {{-- <input type="text" placeholder="Admin Name"> --}}
                <label for="username" class="text-center">We’ve sent a 6-character code to <span class="fw-bold">{{ session('otpSentEmail') }}</span> The code expires shortly, so please
                    enter it soon.</label>
                    <input type="text" name="otpSentEmail" value="{{ session('otpSentEmail') }}" hidden>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="digit1-input" name="digit1-input"
                    placeholder="Enter code">



                {{-- <button type="submit">LOGIN</button> --}}
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary">VERIFY</button>
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <p class="mb-0">Didn't receive a code ?<button type="button"
                            class=" btn fw-semibold text-primary text-decoration-underline" id="btnResend">Resend</button>
                    </p>
                </div>
            </form>
            <div class="form-footer">
                <p>Version 1.0.001</p>
            </div>
        </div>

        {{-- <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="index" class="d-inline-block auth-logo">
                                <img src="{{ URL::asset('assets/images/logo-light.png')}}" alt="" height="20">
                            </a>
                        </div>
                        <p class="mt-3 fs-15 fw-medium">Premium Admin & Dashboard Template</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p class="text-muted">Sign in to continue to Velzon.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', 'admin@themesbrand.com') }}" id="username" name="email" placeholder="Enter username">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="float-end">
                                            <a href="auth-pass-reset-basic" class="text-muted">Forgot password?</a>
                                        </div>
                                        <label class="form-label" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" class="form-control pe-5 @error('password') is-invalid @enderror" name="password" placeholder="Enter password" id="password-input" value="123456">
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Sign In</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <div class="signin-other-title">
                                            <h5 class="fs-13 mb-4 title">Sign In with</h5>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                            <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                            <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                            <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0">Don't have an account ? <a href="register" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content --> --}}

        <!-- footer -->
        {{-- <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">&copy; <script>document.write(new Date().getFullYear())</script> V 1.0.001</p>
                    </div>
                </div>
            </div>
        </div>
    </footer> --}}
        <!-- end Footer -->
    </div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('assets/libs/particles.js/particles.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/particles.app.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/password-addon.init.js') }}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('csrf')
            }
        });

        $('#btnResend').on('click', function() {

            var userEmail = "{{ session('otpSentEmail') }}";
            console.log(userEmail);
            $.ajax({
                url: "/resendEmail",
                method: "post",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'email': userEmail,
                },
                beforeSend: function() {
                    // $('#all_data_submit').attr("disabled", false);
                    $(document).find('span.error-text').text('');
                },
                success: function(data) {
                    // $('#all_data_submit').attr("disabled", false);
                    location.reload();

                }
            });
        });
    </script>
@endsection
