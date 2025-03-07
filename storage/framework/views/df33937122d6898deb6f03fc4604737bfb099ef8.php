<?php $__env->startSection('content'); ?>
<?php
    $employees      = App\Helper::getEmployeesList();
    $departments    = App\Department::all();
    $locations      = App\Location::select('title', 'id')->get()->pluck('title', 'id')->toArray();
    $roles          = Spatie\Permission\Models\Role::all()->toArray();
?>
<div class="wt-haslayout wt-innerbannerholder">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-xs-12 col-sm-12 col-md-8 push-md-2 col-lg-6 push-lg-3">
                <div class="wt-innerbannercontent">
                    <div class="wt-title">
                        <h2><?php echo e(trans('lang.join_for_free')); ?></h2>
                    </div>
                    <ol class="wt-breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="wt-active">Join Now</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wt-haslayout wt-main-section">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-xs-12 col-sm-12 col-md-10 push-md-1 col-lg-8 push-lg-2" id="registration">
                <div class="preloader-section" v-if="loading" v-cloak>
                    <div class="preloader-holder">
                        <div class="loader"></div>
                    </div>
                </div>
                <div class="wt-registerformhold">
                    <div class="wt-registerformmain">
                        <div class="wt-joinforms">
                            <form method="POST" action="<?php echo e(url('register/form-step1-custom-errors')); ?>" class="wt-formtheme wt-formregister" @submit.prevent="checkStep1" id="register_form">
                                <?php echo csrf_field(); ?>
                                <fieldset class="wt-registerformgroup">
                                    <div class="wt-haslayout" v-if="step === 1" v-cloak>
                                        <div class="wt-registerhead">
                                            <div class="wt-title">
                                                <h3><?php echo e(trans('lang.join_for_good')); ?></h3>
                                            </div>
                                            <div class="wt-description">
                                                <p><?php echo e(trans('lang.join_for_good_reason')); ?></p>
                                            </div>
                                        </div>
                                        <ul class="wt-joinsteps">
                                            <li class="wt-active"><a href="javascrip:void(0);"><?php echo e(trans('lang.01')); ?></a></li>
                                            <li><a href="javascrip:void(0);"><?php echo e(trans('lang.02')); ?></a></li>
                                            <li><a href="javascrip:void(0);"><?php echo e(trans('lang.03')); ?></a></li>
                                            <li><a href="javascrip:void(0);"><?php echo e(trans('lang.04')); ?></a></li>
                                        </ul>
                                        <div class="form-group form-group-half">
                                            <input type="text" name="first_name" class="form-control" placeholder="<?php echo e(trans('lang.ph_first_name')); ?>" v-bind:class="{ 'is-invalid': form_step1.is_first_name_error }" v-model="first_name">
                                            <span class="help-block" v-if="form_step1.first_name_error">
                                                <strong v-cloak>{{form_step1.first_name_error}}</strong>
                                            </span>
                                        </div>
                                        <div class="form-group form-group-half">
                                            <input type="text" name="last_name" class="form-control" placeholder="<?php echo e(trans('lang.ph_last_name')); ?>" v-bind:class="{ 'is-invalid': form_step1.is_last_name_error }" v-model="last_name">
                                            <span class="help-block" v-if="form_step1.last_name_error">
                                                <strong v-cloak>{{form_step1.last_name_error}}</strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <input id="user_email" type="email" class="form-control" name="email" placeholder="<?php echo e(trans('lang.ph_email')); ?>" value="<?php echo e(old('email')); ?>" v-bind:class="{ 'is-invalid': form_step1.is_email_error }" v-model="user_email">
                                            <span class="help-block" v-if="form_step1.email_error">
                                                <strong v-cloak>{{form_step1.email_error}}</strong>
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="wt-btn"><?php echo e(trans('lang.btn_startnow')); ?></button>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="wt-haslayout" v-if="step === 2" v-cloak>
                                    <fieldset class="wt-registerformgroup">
                                        <div class="wt-registerhead">
                                            <div class="wt-title">
                                                <h3><?php echo e(trans('lang.pro_info')); ?></h3>
                                            </div>
                                        </div>
                                        <ul class="wt-joinsteps">
                                            <li class="wt-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                            <li class="wt-active"><a href="javascrip:void(0);"><?php echo e(trans('lang.02')); ?></a></li>
                                            <li><a href="javascrip:void(0);"><?php echo e(trans('lang.03')); ?></a></li>
                                            <li><a href="javascrip:void(0);"><?php echo e(trans('lang.04')); ?></a></li>
                                        </ul>
                                        <?php if(!empty($locations)): ?>
                                            <div class="form-group">
                                                <span class="wt-select">
                                                    <?php echo Form::select('locations', $locations, null, array('placeholder' => trans('lang.select_locations'), 'v-bind:class' => '{ "is-invalid": form_step2.is_locations_error }')); ?>

                                                    <span class="help-block" v-if="form_step2.locations_error">
                                                        <strong v-cloak>{{form_step2.locations_error}}</strong>
                                                    </span>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group form-group-half">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="<?php echo e(trans('lang.ph_pass')); ?>" v-bind:class="{ 'is-invalid': form_step2.is_password_error }">
                                            <span class="help-block" v-if="form_step2.password_error">
                                                <strong v-cloak>{{form_step2.password_error}}</strong>
                                            </span>
                                        </div>
                                        <div class="form-group form-group-half">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="<?php echo e(trans('lang.ph_retry_pass')); ?>" v-bind:class="{ 'is-invalid': form_step2.is_password_confirm_error }">
                                            <span class="help-block" v-if="form_step2.password_confirm_error">
                                                <strong v-cloak>{{form_step2.password_confirm_error}}</strong>
                                            </span>
                                        </div>
                                    </fieldset>
                                    <fieldset class="wt-formregisterstart">
                                        <div class="wt-title wt-formtitle">
                                            <h4><?php echo e(trans('lang.start_as')); ?></h4>
                                        </div>
                                        <?php if(!empty($roles)): ?>
                                            <ul class="wt-accordionhold wt-formaccordionhold accordion">
                                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(!in_array($role['id'] == 1, $roles)): ?>
                                                        <li>
                                                            <div class="wt-accordiontitle" id="headingOne" data-toggle="collapse" data-target="#collapseOne">
                                                                <span class="wt-radio">
                                                                <input id="wt-company-<?php echo e($key); ?>" type="radio" name="role" value="<?php echo e($role['role_type']); ?>" checked="" v-model="user_role" v-on:change="selectedRole(user_role)">
                                                                <label for="wt-company-<?php echo e($key); ?>"><?php echo e($role['name']); ?><span> (<?php echo e(trans('lang.signup_as_country')); ?>)</span></label>
                                                                </span>
                                                            </div>
                                                            <?php if($role['role_type'] === 'employer'): ?>
                                                                <div class="wt-accordiondetails collapse show" id="collapseOne" aria-labelledby="headingOne" v-if="is_show">
                                                                    <div class="wt-radioboxholder">
                                                                        <div class="wt-title">
                                                                            <h4><?php echo e(trans('lang.no_of_employees')); ?></h4>
                                                                        </div>
                                                                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <span class="wt-radio">
                                                                                <input id="wt-just-<?php echo e($key); ?>" type="radio" name="employees" value="<?php echo e($employee['value']); ?>" checked="">
                                                                                <label for="wt-just-<?php echo e($key); ?>"><?php echo e($employee['title']); ?></label>
                                                                            </span>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                    <?php if($departments->count() > 0): ?>
                                                                        <div class="wt-radioboxholder">
                                                                            <div class="wt-title">
                                                                                <h4><?php echo e(trans('lang.your_department')); ?></h4>
                                                                            </div>
                                                                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <span class="wt-radio">
                                                                                        <input id="wt-department-<?php echo e($department->id); ?>" type="radio" name="department" value="<?php echo e($department->id); ?>" checked="">
                                                                                        <label for="wt-department-<?php echo e($department->id); ?>"><?php echo e($department->title); ?></label>
                                                                                </span>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </div>
                                                                        <div class="form-group wt-othersearch d-none">
                                                                            <input type="text" name="department_name" class="form-control" placeholder="<?php echo e(trans('lang.enter_department')); ?>">
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </fieldset>
                                    <fieldset class="wt-termsconditions">
                                        <div class="wt-checkboxholder">
                                            <span class="wt-checkbox">
                                                <input id="termsconditions" type="checkbox" name="termsconditions" checked="">
                                                <label for="termsconditions"><span><?php echo e(trans('lang.agree_terms')); ?></span></label>
                                                <span class="help-block" v-if="form_step2.termsconditions_error">
                                                    <strong style="color: red;" v-cloak>please accept the terms and conditions</strong>
                                                </span>
                                            </span>
                                            <a href="#" @click.prevent="prev()" class="wt-btn"><?php echo e(trans('lang.previous')); ?></a>
                                            <a href="#" @click.prevent="checkStep2()" class="wt-btn"><?php echo e(trans('lang.continue')); ?></a>
                                        </div>
                                    </fieldset>
                                </div>
                            </form>
                            <div class="wt-joinformc" v-if="step === 3" v-cloak>
                                <form method="POST" action="" class="wt-formtheme wt-formregister" id="verification_form">
                                    <div class="wt-registerhead">
                                        <div class="wt-title">
                                            <h3><?php echo e(trans('lang.almost_there')); ?></h3>
                                        </div>
                                        <div class="wt-description">
                                            <p><?php echo e(trans('lang.acc_almost_created_note')); ?></p>
                                        </div>
                                    </div>
                                    <ul class="wt-joinsteps">
                                        <li class="wt-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                        <li class="wt-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                        <li class="wt-active"><a href="javascrip:void(0);"><?php echo e(trans('lang.03')); ?></a></li>
                                        <li><a href="javascrip:void(0);"><?php echo e(trans('lang.04')); ?></a></li>
                                    </ul>
                                    <figure class="wt-joinformsimg">
                                        <img src="<?php echo e(asset('images/work.jpg')); ?>" alt="<?php echo e(trans('lang.verification_code_img')); ?>">
                                    </figure>
                                    <fieldset>
                                        <div class="form-group">
                                            <label><?php echo e(trans('lang.verify_code_note')); ?><a href="javascript:void(0);"> <?php echo e(trans('lang.why_need_code')); ?></a></label>
                                            <input type="text" name="code" class="form-control" placeholder="<?php echo e(trans('lang.enter_code')); ?>">
                                        </div>
                                        <div class="form-group wt-btnarea">
                                            <a href="#" @click.prevent="prev()" class="wt-btn"><?php echo e(trans('lang.previous')); ?></a>
                                            <a href="#" @click.prevent="verifyCode()" class="wt-btn"><?php echo e(trans('lang.continue')); ?></a>
                                        </div>
                                    </fieldset>
                                    </form>
                            </div>
                            <div class="wt-gotodashboard" v-if="step === 4" v-cloak>
                                <ul class="wt-joinsteps">
                                    <li class="wt-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                    <li class="wt-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                    <li class="wt-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                    <li class="wt-done-next"><a href="javascrip:void(0);"><i class="fa fa-check"></i></a></li>
                                </ul>
                                <div class="wt-registerhead">
                                    <div class="wt-title">
                                        <h3><?php echo e(trans('lang.congrats')); ?></h3>
                                    </div>
                                    <div class="description">
                                        <p><?php echo e(trans('lang.acc_creation_note')); ?></p>
                                    </div>
                                </div>
                                
                                <a href="#" class="wt-btn" @click.prevent="loginRegisterUser()"><?php echo e(trans('lang.goto_dashboard')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="wt-registerformfooter">
                        <span><?php echo e(trans('lang.have_account')); ?><a href="javascript:void(0);"><?php echo e(trans('lang.btn_login_now')); ?></a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front-end.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>