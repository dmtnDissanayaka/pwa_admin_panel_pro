<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Email Verify'); ?>
<?php $__env->stopSection(); ?>
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
<?php $__env->startSection('content'); ?>
    <div class="container_loging">
        <div class="myform">
            <form action="<?php echo e(route('checkOTP')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <h3 class="text-center">Verify Your Email</h3>
                <?php if(session()->has('error')): ?>
                    <div class="alert alert-danger" id="error">
                        <?php echo session()->get('error'); ?>

                    </div>
                <?php endif; ?>
                
                <label for="username" class="text-center">We’ve sent a 6-character code to <span class="fw-bold"><?php echo e(session('otpSentEmail')); ?></span> The code expires shortly, so please
                    enter it soon.</label>
                    <input type="text" name="otpSentEmail" value="<?php echo e(session('otpSentEmail')); ?>" hidden>
                <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="digit1-input" name="digit1-input"
                    placeholder="Enter code">



                
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

        

        <!-- footer -->
        
        <!-- end Footer -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="<?php echo e(URL::asset('assets/libs/particles.js/particles.js.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/particles.app.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/password-addon.init.js')); ?>"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'x-csrf-token': $('meta[name="csrf-token"]').attr('csrf')
            }
        });

        $('#btnResend').on('click', function() {

            var userEmail = "<?php echo e(session('otpSentEmail')); ?>";
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\CANADA-New\PWA_ADMIN_PANEL\resources\views/auth/verify.blade.php ENDPATH**/ ?>