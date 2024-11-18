<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('login'); ?>
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
        border: 2px solid #000; /* 2px solid black border */
        border-radius: 10px; /* Optional: to add rounded corners */
    }

    div.container_loging div.myform {
        width: 270px;
        /* margin-right: 30px; */
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

    div.container_loging div.myform button {
        color: white;
        background-color: #545338;
        border: none;
        outline: none;
        border-radius: 2px;
        font-size: 14px;
        padding: 5px 12px;
        font-weight: 500;
    }

    div.container_loging div.image img {
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
<div class="container_loging">
    <div class="myform">
        <form action="<?php echo e(route('pw_reset_email')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <h3 class="text-center">Enter Your Email</h3>
            <?php if(session()->has('error')): ?>
                <div class="alert alert-danger" id="error">
                    <?php echo session()->get('error'); ?>

                </div>
            <?php endif; ?>
            
            <input type="text" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                id="username" name="email"
                placeholder="Enter email">



            
            <div class="container">
                <div class="row">
                  <div class="col text-center">
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                  </div>
                </div>
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
<script src="<?php echo e(URL::asset('assets/libs/particles.js/particles.js.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/pages/particles.app.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/pages/password-addon.init.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\CANADA-New\PWA_ADMIN_PANEL\resources\views/password_reset/password_reset.blade.php ENDPATH**/ ?>