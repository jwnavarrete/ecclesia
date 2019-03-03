<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="container-fluid">

            <!--Section: Team v.1-->
            <section class="section team-section">

                <!--Grid row-->
                <div class="row text-center">

                    <!-- Grid column -->
                    <div class="col-md-8 mb-r">

                        <!--Card-->
                        <div class="card card-cascade cascading-admin-card user-card">

                            <!--Card Data-->
                            <div class="admin-up d-flex justify-content-start">
                                <i class="fa fa-users info-color py-4"></i>
                                <div class="data">
                                    <h5 class="font-bold dark-grey-text">Edit Profile - <span class="text-muted">Complete your profile</span></h5>
                                </div>
                            </div>
                            <!--/.Card Data-->

                            <!--Card content-->
                            <div class="card-body">

                                <!-- Grid row -->
                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                            <input type="text" id="form12" class="form-control">
                                            <label for="form12" class="">Username</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                            <input type="text" id="form3" class="form-control">
                                            <label for="form3" class="">Email address</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-4">

                                        <div class="md-form form-sm">
                                            <input type="text" id="form4" class="form-control" disabled="">
                                            <label for="form4" class="disabled">Company</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>
                                <!-- Grid row -->

                                <!-- Grid row -->
                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-md-6">

                                        <div class="md-form form-sm">
                                            <input type="text" id="form5" class="form-control">
                                            <label for="form5" class="">First name</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-md-6">

                                        <div class="md-form form-sm">
                                            <input type="text" id="form5" class="form-control">
                                            <label for="form5" class="">Last name</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>
                                <!-- Grid row -->

                                <!-- Grid row -->
                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-md-12">

                                        <div class="md-form form-sm">
                                            <input type="text" id="form6" class="form-control">
                                            <label for="form6" class="">Address</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>
                                <!-- Grid row -->

                                <!-- Grid row -->
                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-lg-4 col-md-12">

                                        <div class="md-form form-sm">
                                            <input type="text" id="form7" class="form-control">
                                            <label for="form7" class="">City</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-4 col-md-6">

                                        <div class="md-form form-sm">
                                            <input type="text" id="form8" class="form-control">
                                            <label for="form8" class="">Country</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                    <!-- Grid column -->
                                    <div class="col-lg-4 col-md-6">

                                        <div class="md-form form-sm">
                                            <input type="text" id="form9" class="form-control">
                                            <label for="form9" class="">Postal Code</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>
                                <!-- Grid row -->

                                <!-- Grid row -->
                                <div class="row">

                                    <!-- Grid column -->
                                    <div class="col-md-12 about-text">

                                        <h4 class="text-muted text-left my-4"><strong>About me</strong></h4>

                                        <!--Basic textarea-->
                                        <div class="md-form">
                                            <textarea type="text" id="form10" class="md-textarea"></textarea>
                                            <label for="form10">Basic textarea</label>
                                        </div>

                                    </div>
                                    <!-- Grid column -->

                                </div>
                                <!-- Grid row -->

                            </div>
                            <!--/.Card content-->

                        </div>
                        <!--/.Card-->

                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 mb-r">

                        <!--Card-->
                        <div class="card profile-card">

                            <!--Avatar-->
                            <div class="avatar z-depth-1-half mb-4">
                                <img src="<?php echo e(URL::asset(Auth::user()->foto)); ?>" class="rounded-circle" alt="First sample avatar image">                                
                            </div>

                            <div class="card-body pt-0 mt-0">
                                <!--Name-->
                                <h3 class="mb-3 font-bold"><strong><?php echo e(Auth::user()->first_name); ?></strong></h3>
                                <h6 class="font-bold cyan-text mb-4">Web Designer</h6>

                                <p class="mt-4 text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco laboris nisi ut aliquip consequat.</p>

                                <a class="btn btn-info btn-rounded waves-effect waves-light"> Follow</a>

                            </div>

                        </div>
                        <!--Card-->

                    </div>
                    <!-- Grid column -->

                </div>
                <!--Grid row-->

            </section>
            <!--Section: Team v.1-->

        </div>

    
    <?php $__env->stopSection(); ?>
    
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>