<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.signup'); ?>
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
<?php $__env->startSection('content'); ?>
    <div class="container_register">
        <div class="myform">
            <form action="<?php echo e(route('login')); ?>" method="POST">
                <h3 class="text-center">Super Admin Default Account Create</h3>
                
                <label for="username" class="form-label mt-3 fw-bold">Username</label>
                <input type="text" class="form-control"
                 id="username" name="username" placeholder="Enter username">

                <label for="username" class="form-label fw-bold">Email</label>
                <input type="text" class="form-control" id="email" name="email"
                    placeholder="Enter email">
                
                <label class="form-label fw-bold" for="password-input">Password</label>
                <div class="position-relative auth-pass-inputgroup mb-3">
                    <input type="password" class="form-control pe-5 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                        placeholder="Enter password" id="password-input" >
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <label class="form-label fw-bold" for="password-input">Confirm Password</label>
                <div class="position-relative auth-pass-inputgroup mb-3">
                    <input type="password" class="form-control pe-5 <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                        placeholder="Enter confirm password" id="password-input-con" >
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/particles.js/particles.js.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/particles.app.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/form-validation.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/password-addon.init.js')); ?>"></script>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\CANADA-New\PWA_ADMIN_PANEL\resources\views/auth/register.blade.php ENDPATH**/ ?>