<div class="page-breadcrumb">
    <ol class="breadcrumb container">
        <li><a href="<?php echo ADMIN_SITE_URL ?>dashboard">Home</a></li>
        <li><a href="<?php echo ADMIN_SITE_URL ?>staff">Staff</a></li>
        <li class="active">Add New Staff</li>
    </ol>
</div>
<div class="page-title">
    <div class="container">
        <h3><?php echo $title; ?></h3>
    </div>
</div>
<div class="container" id="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-body">
                    <form method="post" name="add_staff" id="add_staff" action="">
                        <?php if (validation_errors() != false || isset($common_error)) { ?>
                            <div class="alert alert-danger">
                                <?php echo (isset($common_error)?$common_error:''); ?>
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>
                       <div class="form-group col-md-6"><label>Username</label>
                            <input type="text" name='username' value="<?php echo set_value('username'); ?>"  class="form-control">
                        </div>
                       <div class="form-group col-md-6"><label>Password</label>
                            <input type="password" name='password' value="<?php echo set_value('password'); ?>"  class="form-control">
                        </div>
                        <div class="form-group col-md-6"><label>First Name</label>
                            <input type="text" name='first_name' value="<?php echo set_value('first_name'); ?>"  class="form-control">
                        </div>
                        <div class="form-group col-md-6"><label>Last Name</label>
                            <input type="text" name='last_name' value="<?php echo set_value('last_name'); ?>"  class="form-control">
                        </div>
                        <div class="form-group col-md-6"><label>Primary Email</label>
                            <input type="text" name='primary_email' value="<?php echo set_value('primary_email'); ?>"  class="form-control">
                        </div>
                        <div class="form-group col-md-6"><label>Secondary Email</label>
                            <input type="text" name='secondary_email' value="<?php echo set_value('secondary_email'); ?>"  class="form-control">
                        </div>
                        <div class="form-group col-md-6"><label>Phone</label>
                            <input type="text" name='phone' value="<?php echo set_value('phone'); ?>"  class="form-control">
                        </div>
                                                                      
                        <div class="form-group col-md-6"><label>Status</label>
                            
                                <select name="status" class="form-control m-b">
                                    <option value=''>Please select </option>
                                    <?php foreach ($status_listing as $key => $val) { ?>
                                        <option value="<?php echo $key ?>" <?php echo set_select('status', $key) ?>><?php echo $val ?></option>
                                    <?php } ?>
                                </select>
                           
                        </div>
                        
                        <div class="form-group col-md-12">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo SITE_URL ?>admin/staff" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>