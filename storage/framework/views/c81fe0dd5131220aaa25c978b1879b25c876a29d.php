<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.list-view'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn3.devexpress.com/jslib/24.1.3/css/dx.light.css">
<?php $__env->stopSection(); ?>
<style>
    .highlight-border {
        border: 2px solid red;
        /* Change the color and thickness as needed */
    }
</style>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Orders
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Order List
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="tasksList">
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <form id="form_user">
                        <?php echo csrf_field(); ?>
                        <div>
                            <div class="row fw-bold">
                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4" >
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Driver : Thaindu</div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Company : ABC Company</div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Order No : <?php echo e($order_head_result->order_number); ?></div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Truck No : <?php echo e($order_head_result->truck_number); ?></div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Trailer : <?php echo e($order_head_result->trailer_number_1); ?> <?php echo e($order_head_result->trailer_number_2); ?> <?php echo e($order_head_result->trailer_number_3); ?></div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                    <?php if(!empty($order_note_result->Dispatcher_Notes)): ?>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Dispatcher Notes : <?php echo e($order_note_result->Dispatcher_Notes); ?></div>
                                    <?php else: ?>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Dispatcher Notes : Not provided</div>
                                    <?php endif; ?>

                                    <?php if(!empty($order_instrct_result->Driver_Instructions)): ?>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Driver Instructions : <?php echo e($order_instrct_result->Driver_Instructions); ?></div>
                                    <?php else: ?>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Driver Instructions : Not provided</div>
                                    <?php endif; ?>

                                </div>

                            </div>


                            <div class="row">

                                <div class="col-xxl-12">
                                    <div class="card mt-2">
                                        <div class="card-body">
                                            <ul class="nav nav-tabs nav-tabs-custom nav-dark nav-justified mb-3"
                                                role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#home1"
                                                        role="tab">
                                                        Pick Up
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#profile1"
                                                        role="tab">
                                                        Delivery
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#messages1"
                                                        role="tab">
                                                        Border-X
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab" aria-selected="true">
                                                        Status
                                                    </a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content ">
                                                <div class="tab-pane active" id="home1" role="tabpanel">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1 ">
                                                            <?php $__currentLoopData = $order_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_statu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="modal-header p-3 mt-2 bg-soft-dark">
                                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                                                        <div class="row mb-0">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Company : <?php echo e($order_statu->Company_Name); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Address : <?php echo e($order_statu->Address_Line_1); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Contact : <?php echo e($order_statu->Contact_Person); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Phone/ext : <?php echo e($order_statu->Phone_Number); ?> <?php echo e($order_statu->Phone_Extension); ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Load ID-1 : <?php echo e($order_statu->Load_ID_Reference_1); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Load ID-2 : <?php echo e($order_statu->Load_ID_Reference_2); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Commodity : <?php echo e($order_statu->Commodity); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Hazardous : <?php echo e($order_statu->Hazardous_Goods); ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Tarping : <?php echo e($order_statu->Tarping); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Plastic Wrap : <?php echo e($order_statu->Plastic_Wrap); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Over dim : <?php echo e($order_statu->Over_Dimensional); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Heat/Temp : <?php echo e($order_statu->Heat_Required); ?> <?php echo e($order_statu->Heat_Temperature); ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    

                                                                    

                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="profile1" role="tabpanel">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                            <?php $__currentLoopData = $order_status_Delivery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_status_Delivery_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="modal-header p-3 mt-2 bg-soft-dark">
                                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                                                        <div class="row mb-0">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Company : <?php echo e($order_status_Delivery_data->Company_Name); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Address : <?php echo e($order_status_Delivery_data->Address_Line_1); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Contact : <?php echo e($order_status_Delivery_data->Contact_Person); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Phone/ext : <?php echo e($order_status_Delivery_data->Phone_Number); ?> <?php echo e($order_status_Delivery_data->Phone_Extension); ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Load ID-1 : <?php echo e($order_status_Delivery_data->Load_ID_Reference_1); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Load ID-2 : <?php echo e($order_status_Delivery_data->Load_ID_Reference_2); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Commodity : <?php echo e($order_status_Delivery_data->Commodity); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Hazardous : <?php echo e($order_status_Delivery_data->Hazardous_Goods); ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Tarping : <?php echo e($order_status_Delivery_data->Tarping); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Plastic Wrap : <?php echo e($order_status_Delivery_data->Plastic_Wrap); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Over dim : <?php echo e($order_status_Delivery_data->Over_Dimensional); ?></div>
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Heat/Temp : <?php echo e($order_status_Delivery_data->Heat_Required); ?> <?php echo e($order_status_Delivery_data->Heat_Temperature); ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    

                                                                    

                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane " id="messages1" role="tabpanel">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                        <?php $__currentLoopData = $order_status_borderx; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_status_borderx_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="modal-header p-3 mt-2 bg-soft-dark">
                                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Broker : <?php echo e($order_status_borderx_data->Broker); ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Broker : <?php echo e($order_status_borderx_data->Broker); ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Broker Ph : <?php echo e($order_status_borderx_data->Phone_number); ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    

                                                                    

                                                                </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>

                                                    </div>

                                                </div>
                                                <div class="tab-pane " id="settings" role="tabpanel">
                                                    <div class="d-flex">
                                                        <div class="flex-grow-1">
                                                        <?php $__currentLoopData = $order_status_changes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_status_change): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="modal-header p-3 mt-2 bg-soft-dark">
                                                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Status : <span style="text-transform: uppercase;"> <?php echo e($order_status_change->status); ?></span></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Date : <span style="text-transform: uppercase;"><?php echo e($order_status_change->date); ?></span></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Time : <span style="text-transform: uppercase;"><?php echo e($order_status_change->time); ?></span></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">Reason : <span style="text-transform: uppercase;"><?php echo e($order_status_change->reason); ?></span></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card-body -->
                                    </div><!-- end card -->
                                </div><!--end col-->


                            </div><!--end row-->
                            <div class="col-lg-12 mt-2">
                                <div class="hstack gap-2 justify-content-end">
                                    <a href="/order_list" class="btn btn-dark bg-gradient waves-effect waves-light mb-2 text-danger">Back</a>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="modal fade" id="orderDetailsView" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-header" style="background-color: #135079">
                    <h5 class="modal-title text-light" id="UserModalTitle">Order Full Details</h5>
                    <div class="">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                </div>
                <div class="modal-body">
                    <!-- User Create -->
                    
                    <!-- User Create -->
                </div>
            </div>
        </div>

        <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body p-5 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                        <div class="mt-4 text-center">
                            <h4>You are about to delete a task ?</h4>
                            <p class="text-muted fs-14 mb-4">Deleting your task will remove all of
                                your information from our database.</p>
                            <div class="hstack gap-2 justify-content-center remove">
                                <button class="btn btn-link btn-ghost-success fw-medium text-decoration-none"
                                    data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                <button class="btn btn-danger" id="delete-record">Yes, Delete It</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end delete modal -->

        <div class="modal fade zoomIn" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0">
                    <div class="modal-header p-3 bg-soft-info">
                        <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="close-modal"></button>
                    </div>
                    <form action="">
                        <div class="modal-body">
                            <input type="hidden" id="tasksId" />
                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <label for="projectName-field" class="form-label">Project Name</label>
                                    <input type="text" id="projectName-field" class="form-control"
                                        placeholder="Project name" required />
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div>
                                        <label for="tasksTitle-field" class="form-label">Title</label>
                                        <input type="text" id="tasksTitle-field" class="form-control"
                                            placeholder="Title" required />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <label for="clientName-field" class="form-label">Client Name</label>
                                    <input type="text" id="clientName-field" class="form-control"
                                        placeholder="Client name" required />
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <label class="form-label">Assigned To</label>
                                    <div data-simplebar style="height: 95px;">
                                        <ul class="list-unstyled vstack gap-2 mb-0">
                                            <li>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input me-3" type="checkbox"
                                                        name="assignedTo[]" value="avatar-1.jpg" id="anna-adame">
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="anna-adame">
                                                        <span class="flex-shrink-0">
                                                            <img src="<?php echo e(URL::asset('assets/images/users/avatar-1.jpg')); ?>"
                                                                alt="" class="avatar-xxs rounded-circle">
                                                        </span>
                                                        <span class="flex-grow-1 ms-2">
                                                            Anna Adame
                                                        </span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input me-3" type="checkbox"
                                                        name="assignedTo[]" value="avatar-3.jpg" id="frank-hook">
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="frank-hook">
                                                        <span class="flex-shrink-0">
                                                            <img src="<?php echo e(URL::asset('assets/images/users/avatar-3.jpg')); ?>"
                                                                alt="" class="avatar-xxs rounded-circle">
                                                        </span>
                                                        <span class="flex-grow-1 ms-2">
                                                            Frank Hook
                                                        </span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input me-3" type="checkbox"
                                                        name="assignedTo[]" value="avatar-6.jpg" id="alexis-clarke">
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="alexis-clarke">
                                                        <span class="flex-shrink-0">
                                                            <img src="<?php echo e(URL::asset('assets/images/users/avatar-6.jpg')); ?>"
                                                                alt="" class="avatar-xxs rounded-circle">
                                                        </span>
                                                        <span class="flex-grow-1 ms-2">
                                                            Alexis Clarke
                                                        </span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input me-3" type="checkbox"
                                                        name="assignedTo[]" value="avatar-2.jpg" id="herbert-stokes">
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="herbert-stokes">
                                                        <span class="flex-shrink-0">
                                                            <img src="<?php echo e(URL::asset('assets/images/users/avatar-2.jpg')); ?>"
                                                                alt="" class="avatar-xxs rounded-circle">
                                                        </span>
                                                        <span class="flex-grow-1 ms-2">
                                                            Herbert Stokes
                                                        </span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input me-3" type="checkbox"
                                                        name="assignedTo[]" value="avatar-7.jpg" id="michael-morris">
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="michael-morris">
                                                        <span class="flex-shrink-0">
                                                            <img src="<?php echo e(URL::asset('assets/images/users/avatar-7.jpg')); ?>"
                                                                alt="" class="avatar-xxs rounded-circle">
                                                        </span>
                                                        <span class="flex-grow-1 ms-2">
                                                            Michael Morris
                                                        </span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input me-3" type="checkbox"
                                                        name="assignedTo[]" value="avatar-5.jpg" id="nancy-martino">
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="nancy-martino">
                                                        <span class="flex-shrink-0">
                                                            <img src="<?php echo e(URL::asset('assets/images/users/avatar-5.jpg')); ?>"
                                                                alt="" class="avatar-xxs rounded-circle">
                                                        </span>
                                                        <span class="flex-grow-1 ms-2">
                                                            Nancy Martino
                                                        </span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input me-3" type="checkbox"
                                                        name="assignedTo[]" value="avatar-8.jpg" id="thomas-taylor">
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="thomas-taylor">
                                                        <span class="flex-shrink-0">
                                                            <img src="<?php echo e(URL::asset('assets/images/users/avatar-8.jpg')); ?>"
                                                                alt="" class="avatar-xxs rounded-circle">
                                                        </span>
                                                        <span class="flex-grow-1 ms-2">
                                                            Thomas Taylor
                                                        </span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check d-flex align-items-center">
                                                    <input class="form-check-input me-3" type="checkbox"
                                                        name="assignedTo[]" value="avatar-10.jpg" id="tonya-noble">
                                                    <label class="form-check-label d-flex align-items-center"
                                                        for="tonya-noble">
                                                        <span class="flex-shrink-0">
                                                            <img src="<?php echo e(URL::asset('assets/images/users/avatar-10.jpg')); ?>"
                                                                alt="" class="avatar-xxs rounded-circle">
                                                        </span>
                                                        <span class="flex-grow-1 ms-2">
                                                            Tonya Noble
                                                        </span>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <label for="duedate-field" class="form-label">Due Date</label>
                                    <input type="text" id="duedate-field" class="form-control"
                                        data-provider="flatpickr" placeholder="Due date" required />
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <label for="ticket-ReadStatus" class="form-label">ReadStatus</label>
                                    <select class="form-control" data-choices data-choices-search-false
                                        id="ticket-ReadStatus">
                                        <option value="">ReadStatus</option>
                                        <option value="New">New</option>
                                        <option value="Inprogress">Inprogress</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <label for="priority-field" class="form-label">Priority</label>
                                    <select class="form-control" data-choices data-choices-search-false
                                        id="priority-field">
                                        <option value="">Priority</option>
                                        <option value="High">High</option>
                                        <option value="Medium">Medium</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" id="close-modal"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Add Task</button>
                                <button type="button" class="btn btn-success" id="edit-btn">Update Task</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end modal-->
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="<?php echo e(URL::asset('assets/libs/list.js/list.js.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('assets/js/pages/tasks-list.init.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
        <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


        
        <script type="text/javascript" src="https://cdn3.devexpress.com/jslib/22.1.4/js/dx.all.js"></script>

        <script type="text/javascript">
            // var employees = [{}];

            $(document).ready(function() {
                // load_all_orders();
            });



            function load_all_orders() {
                $.ajax({
                    url: "/get_all_orders",
                    method: "GET",
                    success: function(response) {
                        console.log(response.data);
                        // Check if response has the expected structure
                        // if (response && response.data && response.data.data) {
                        // employees = response.data;
                        //     console.log("Employees data assigned successfully:", employees);
                        //     // You can include other related code here, if necessary
                        // } else {
                        //     console.error("Unexpected response structure:", response);
                        // }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX request failed:", status, error);
                    }
                });
            }




            // console.log(employees);

            const employees = [{

                "Company": "Nancy Davolio",
                "DriverID": "99002",
                "Order": "5467",
                "Type": "Pending",
                "ReceivedDate": "1968-12-08T00:00:00.000Z",
                "ReceivedTime": "2011-05-01T00:00:00.000Z",
                "ReadStatus": 0,
                "Status": "Pickup"
            }, {

                "Company": "Andrew Fuller",
                "DriverID": "99000",
                "Order": "3457",
                "Type": "New",
                "ReceivedDate": "1972-02-19T00:00:00.000Z",
                "ReceivedTime": "2011-08-14T00:00:00.000Z",
                "ReadStatus": 0,
                "Status": "Delivery"
            }, {

                "Company": "Janet Leverling",
                "DriverID": "99001",
                "Order": "3355",
                "Type": "New",
                "ReceivedDate": "1983-08-30T00:00:00.000Z",
                "ReceivedTime": "2011-04-01T00:00:00.000Z",
                "ReadStatus": 1,
                "Status": "Border-X"
            }, {

                "Company": "Margaret Peacock",
                "DriverID": "99005",
                "ReceivedDate": "1957-09-19T00:00:00.000Z",
                "ReceivedTime": "2012-05-03T00:00:00.000Z",
                "Order": "5176",
                "Type": "Complete",
                "ReadStatus": 0,
                "Status": "Pickup"
            }, {

                "Company": "Steven Buchanan",
                "DriverID": "99010",
                "Order": "3453",
                "Type": "Pending",
                "ReceivedDate": "1975-03-04T00:00:00.000Z",
                "ReceivedTime": "2012-10-17T00:00:00.000Z",
                "ReadStatus": 0,
                "Status": "Delivery"
            }, {

                "Company": "Michael Suyama",
                "DriverID": "99012",
                "Order": "428",
                "Type": "New",
                "ReceivedDate": "1983-07-02T00:00:00.000Z",
                "ReceivedTime": "2012-10-17T00:00:00.000Z",
                "ReadStatus": 0,
                "Status": "Border-X"
            }, {

                "Company": "Robert King",
                "DriverID": "99015",
                "Order": "465",
                "Type": "Pending",
                "ReceivedDate": "1980-05-29T00:00:00.000Z",
                "ReceivedTime": "2012-01-02T00:00:00.000Z",
                "ReadStatus": 0,
                "Status": "Border-X"
            }, {

                "Company": "Laura Callahan",
                "DriverID": "99006",
                "Order": "2344",
                "Type": "Complete",
                "ReceivedDate": "1978-01-09T00:00:00.000Z",
                "ReceivedTime": "2012-03-05T00:00:00.000Z",
                "ReadStatus": 1,
                "Status": "Delivery"
            }, {

                "Company": "Brett Wade",
                "DriverID": "99016",
                "Order": "452",
                "Type": "New",
                "ReceivedDate": "1986-01-27T00:00:00.000Z",
                "ReceivedTime": "2012-11-15T00:00:00.000Z",
                "ReadStatus": 1,
                "Status": "Pickup"
            }];

            $("#dataGrid").dxDataGrid({
                dataSource: employees,
                keyExpr: "Company",
                showBorders: true,
                columns: [
                    // ...
                    {
                        dataField: "Company",
                        // width: 100,
                        // groupIndex: 1,
                    },
                    {
                        dataField: "DriverID",
                        // width: 100,
                    },
                    {
                        dataField: "Order",
                        // dataType: "date",
                        // width: 100,
                    },
                    {
                        dataField: "Type",
                        // dataType: "date",
                        // width: 100,
                    },
                    {
                        dataField: "ReceivedDate",
                        dataType: "date",
                        // width: 100,
                    },
                    {
                        dataField: "ReceivedTime",
                        dataType: "date",
                        format: "HH:mm:ss", // Display time in hours, minutes, and seconds
                        filter: false, // Disable filtering
                        sortable: true // Keep sorting enabled if needed
                    },

                    {
                        dataField: "ReadStatus",
                        // dataType: "date",
                        // width: 100,
                        alignment: 'center',
                        cellTemplate: function(container, options) {

                            console.log(options.data.ReadStatus);
                            if (options.data.ReadStatus === 1) {
                                // Create the span element
                                var span = $('<span>')
                                    .text('Read')
                                    .css({
                                        'color': 'white',
                                        'background-color': 'green',
                                        'font-weight': 'bold',
                                        'padding': '2px 5px', // Add padding for better appearance
                                        'border-radius': '10px' // Add border radius for rounded corners
                                    });

                                // Append the span to the container
                                container.append(span);
                            } else {
                                // If you want to show the actual ReadStatus value for other cases
                                // container.text(options.data.ReadStatus);
                                var span = $('<span>')
                                    .text('Pending')
                                    .css({
                                        'color': 'white',
                                        'background-color': '#E69130',
                                        'font-weight': 'bold',
                                        'padding': '2px 5px', // Add padding for better appearance
                                        'border-radius': '10px' // Add border radius for rounded corners
                                    });

                                // Append the span to the container
                                container.append(span);
                            }

                        }
                    },
                    {
                        dataField: "Status",
                        // dataType: "date",
                        // width: 100,
                        filterRow: {
                            visible: false
                        },
                    },
                    {
                        dataField: "Action",
                        // dataType: "date",
                        // width: 100,
                        cellTemplate: function(container, options) {
                            // Create the 'Read' button with an icon
                            var readButton = $('<button>')
                                .html('<i class="fas fa-eye"></i>') // Add FontAwesome icon
                                .attr('type', 'button')
                                .css({
                                    'color': 'white',
                                    'background-color': 'gray',
                                    'font-weight': 'bold',
                                    'padding': '2px 5px',
                                    'border-radius': '10px',
                                    'border': 'none',
                                    'cursor': 'pointer',
                                    'margin-right': '5px' // Add margin to separate buttons
                                })
                                .on('click', function() {
                                    // alert('Read button clicked for ' + options
                                    // .dataField); // Action for the Read button
                                    $('#orderDetailsView').modal("show");
                                });

                            // Create the 'Edit' button with an icon
                            var editButton = $('<button>')
                                .html('<i class="fas fa-file-pdf"></i>') // Add FontAwesome icon
                                .css({
                                    'color': 'black',
                                    'background-color': 'gray',
                                    'font-weight': 'bold',
                                    'padding': '2px 5px',
                                    'border-radius': '10px',
                                    'border': 'none',
                                    'cursor': 'pointer',
                                    'margin-right': '5px' // Add margin to separate buttons
                                })
                                .on('click', function() {
                                    alert('Edit button clicked for ' + options
                                        .dataField); // Action for the Edit button
                                });

                            // Create the 'Delete' button with an icon
                            var deleteButton = $('<button>')
                                .html('<i class="fa fa-repeat"></i> ') // Add FontAwesome icon
                                .css({
                                    'color': 'white',
                                    'background-color': 'gray',
                                    'font-weight': 'bold',
                                    'padding': '2px 5px',
                                    'border-radius': '10px',
                                    'border': 'none',
                                    'cursor': 'pointer'
                                })
                                .on('click', function() {
                                    alert('Delete button clicked for ' + options
                                        .dataField); // Action for the Delete button
                                });

                            // Append the buttons to the container
                            container.append(readButton, editButton, deleteButton);
                        }


                    },
                    // ...
                ],
                filterRow: {
                    visible: true
                },
                // searchPanel: {
                //     visible: true
                // },
                allowColumnResizing: true,
                columnAutoWidth: true,
                paging: {
                    pageSize: 10,
                },
                pager: {
                    visible: true,
                    allowedPageSizes: [5, 10, 'all'],
                    showPageSizeSelector: true,
                    showInfo: true,
                    showNavigationButtons: true,
                },
                // groupPanel: {
                //     visible: true
                // },
            });
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\CANADA-New\PWA_ADMIN_PANEL\resources\views/order-details-view.blade.php ENDPATH**/ ?>