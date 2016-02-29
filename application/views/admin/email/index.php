<div class="page-breadcrumb">
    <ol class="breadcrumb container">
        <li><a href="<?php echo ADMIN_SITE_URL ?>dashboard">Home</a></li>
        <li><a href="<?php echo ADMIN_SITE_URL ?>email">Email</a></li>        
    </ol>
</div>
<div class="page-title">
    <div class="container">
        <h3><?php echo $title?></h3>
    </div>
</div>
<div class="container" id="main-wrapper">   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-white">
                <div class="panel-body">
                    <?php if (!empty($template_data)) { ?>
                        <?php if ($this->session->flashdata('success_message')) { ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success_message'); ?>
                            </div>
                        <?php } ?>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>  
                                        <th>No.</th>
                                        <th>Template key </th>
                                        <th>Template name </th>
                                        <th>Email subject</th>                                   
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($template_data as $val) { ?>
                                        <tr> 
                                            <td><?php echo ++$page ?></td>                                 
                                            <td><?php echo $val['template_key'] ?></small></td>
                                            <td><?php echo $val['template_name'] ?></td>
                                            <td><?php echo $val['email_subject'] ?></td>                                           
                                            <td><?php echo $val['status'] ?></td>                                           
                                            <td><a href="<?php echo SITE_URL ?>admin/email/edit/<?php echo $val['id'] ?>"><i class="fa fa-pencil-square-o"></i></a><a class="delete_db_record" cnt="email" recordid="<?php echo $val['id'] ?>" href="<?php echo ADMIN_SITE_URL?>email/delete/<?php echo $val['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>                              
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div class="col-md-12 text-center">
                                <?php echo $pagination; ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-danger">
                            Record not found
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>