<div class="page-breadcrumb">
    <ol class="breadcrumb container">
        <li><a href="<?php echo ADMIN_SITE_URL ?>dashboard">Home</a></li>
        <li><a href="<?php echo ADMIN_SITE_URL ?>product">Product Listing</a></li>
        <li class="active">Edit</li>
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
                    <form method="post" name="edit_epin" id="edit_epin" action="">
                        <?php if (validation_errors() != false || isset($common_error)) { ?>
                            <div class="alert alert-danger">
                                <?php echo (isset($common_error)?$common_error:''); ?>
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="id" value="<?php echo $epin_data['epin_id'] ?>">
                        <div class="form-group col-md-12"><label>Affiliate Sponser Id</label>
                            <input type="text" name='sponser_affiliate_id' value="<?php echo set_value('sponser_affiliate_id', $epin_data['sponser_affiliate_id']); ?>"  class="form-control">
                        </div>
                        <div class="form-group col-md-12"><label>Transaction Password</label>
                            <input type="text" name='transaction_password' value="<?php echo set_value('transaction_password', $epin_data['transaction_password']); ?>"  class="form-control">
                        </div>
                        <div class="form-group col-md-6"><label>Epin Code</label>
                            <input type="text" name='epin_code' value="<?php echo set_value('epin_code', $epin_data['epin_code']); ?>"  class="form-control">
                        </div>                      
                        <div class="form-group col-md-6"><label>Epin Code</label>
                            <input type="text" name='epin_sr_no' value="<?php echo set_value('epin_sr_no', $epin_data['epin_sr_no']); ?>"  class="form-control">
                        </div>                      
                                                                      
                        <div class="form-group col-md-6"><label>Product</label>
                            
                                <select name="product_id" class="form-control m-b">
                                    <option value=''>Please select </option>
                                    <?php foreach ($product_data as $key => $val) { ?>
                                        <option value="<?php echo $val['id'] ?>" <?php echo set_select('status', $val['id'], ($epin_data['epin_id'] == $val['id'] ? TRUE : '')) ?>><?php echo $val['name'] ?></option>
                                    <?php } ?>
                                </select>
                           
                        </div>
                        <div class="form-group col-md-6"><label>Status</label>
                            
                                <select name="status" class="form-control m-b">
                                    <option value=''>Please select </option>
                                    <?php foreach ($status_listing as $key => $val) { ?>
                                        <option value="<?php echo $key ?>" <?php echo set_select('status', $key, ($epin_data['status'] == $key ? TRUE : '')) ?>><?php echo $val ?></option>
                                    <?php } ?>
                                </select>
                           
                        </div>
                        
                        <div class="form-group col-md-12">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo SITE_URL ?>admin/product" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>