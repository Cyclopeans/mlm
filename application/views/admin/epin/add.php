<div class="page-breadcrumb">
    <ol class="breadcrumb container">
        <li><a href="<?php echo ADMIN_SITE_URL ?>dashboard">Home</a></li>
        <li><a href="<?php echo ADMIN_SITE_URL ?>product">Product Listing</a></li>
        <li class="active">Add New EPIN</li>
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
                    <form method="post" name="add_epin" id="add_epin" action="">
                        <?php if (validation_errors() != false || isset($common_error)) { ?>
                            <div class="alert alert-danger">
                                <?php echo (isset($common_error) ? $common_error : ''); ?>
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>
                        <div class="form-group col-md-6"><label>Sponser Affiliate Id (<span style="color: red">optional</span>)</label>
                            <input type="text" name='sponser_affiliate_id' value="<?php echo set_value('sponser_affiliate_id'); ?>"  class="form-control">                           
                        </div>
                        <div class="form-group col-md-6"><label>Number of Epin Codes</label>
                            <input type="text" name='number_of_code' value="<?php echo set_value('number_of_code'); ?>"  class="form-control">                            
                        </div>
                        <div class="form-group col-md-6"><label>Select Package</label>                            
                            <select name="product_id" class="form-control m-b">
                                <option value=''>Please select </option>
                                <?php foreach ($prodauct_data as $key => $val) { ?>
                                    <option value="<?php echo $val['id'] ?>" <?php echo set_select('product_id', $val['id']) ?>><?php echo $val['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>                      

                        <div class="form-group col-md-6"><label>Transaction Password</label>
                            <input type="text" name='transaction_password' value="<?php echo set_value('transaction_password'); ?>"  class="form-control">                            
                        </div>                   
                        <div class="form-group col-md-12">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo SITE_URL ?>admin/epin" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>