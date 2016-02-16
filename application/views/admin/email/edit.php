<div class="page-breadcrumb">
    <ol class="breadcrumb container">
        <li><a href="<?php echo ADMIN_SITE_URL ?>dashboard">Home</a></li>
        <li><a href="<?php echo ADMIN_SITE_URL ?>email">Email Listing</a></li>
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
                    <form method="post" name="edit_template" id="edit_user" action="" class="">
                        <?php if (validation_errors() != false || isset($common_error)) { ?>
                            <div class="alert alert-danger">
                                <?php echo $common_error; ?>
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>
                        <input type="hidden" name="id" value="<?php echo $template_data['id'] ?>">
                        <div class="form-group col-md-6"><label>Template Name</label>
                            <input type="text" name='template_name' value="<?php echo set_value('template_name', $template_data['template_name']); ?>"  class="form-control">
                        </div>
                        <div class="form-group col-md-6"><label>Email Subject</label>
                            <input type="text" name='email_subject' value="<?php echo set_value('email_subject', $template_data['email_subject']); ?>"  class="form-control">
                        </div>
                        
                        <div class="form-group col-md-6"><label>Sender Email</label>
                            <input type="text" name='sender_email_id' value="<?php echo set_value('sender_email_id', $template_data['sender_email_id']); ?>"  class="form-control">
                        </div>                       
                        
                        <div class="form-group col-md-12"><label>Placeholder</label>
                            <textarea class="form-control" readonly="" rows="5" name="placeholder" id="placeholder"><?php echo set_value('placeholder', $template_data['placeholder']); ?> </textarea>
                        </div>
                        
                        <div class="form-group col-md-12"><label>Email Content</label>
                            <textarea class="form-control" rows="5" name="email_content" id="email_content"><?php echo set_value('email_content', $template_data['email_content']); ?> </textarea>
                        </div>                                                                   
                        <div class="form-group col-md-6"><label>Status</label>
                            
                                <select name="status" class="form-control m-b">
                                    <option value=''>Please select </option>
                                    <?php foreach ($status_listing as $key => $val) { ?>
                                        <option value="<?php echo $key ?>" <?php echo set_select('status', $key, ($template_data['status'] == $key ? TRUE : '')) ?>><?php echo $val ?></option>
                                    <?php } ?>
                                </select>
                           
                        </div>
                        
                        <div class="form-group col-md-12">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="<?php echo SITE_URL ?>admin/email" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>