<div class="page-breadcrumb">
    <ol class="breadcrumb container">
        <li><a href="<?php echo ADMIN_SITE_URL ?>dashboard">Home</a></li>
        <li><a href="<?php echo ADMIN_SITE_URL ?>product">Staff</a></li>        
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
                    <?php if (!empty($staff_data)) { ?>
                        <?php if ($this->session->flashdata('success_message')) { ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success_message'); ?>
                            </div>
                        <?php } ?>
                        <a href="<?php echo ADMIN_SITE_URL?>staff/add"><button class="btn btn-success btn-addon m-b-sm" type="button"><i class="fa fa-plus"></i> Add New Staff</button></a>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>  
                                        <th>No.</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($staff_data as $val) { ?>
                                        <tr> 
                                            <td><?php echo ++$page ?></td>                                 
                                            <td><?php echo $val['first_name'] ?></small></td>
                                            <td><?php echo $val['last_name'] ?></td>
                                            <td><?php echo $val['primary_email'] ?></td>
                                            <td><?php echo $val['phone'] ?></td>
                                            <td><?php echo ucfirst($val['role']); ?></td>
                                            <td><span class="label label-<?php echo($val['status']=='pending'?'primary':($val['status']=='active'?'success':($val['status']=='inactive'?'warning':'danger')))?>"><?php echo $val['status'] ?></span></td>                                           
                                            <td><a href="<?php echo SITE_URL ?>admin/staff/edit/<?php echo $val['id'] ?>"><i class="fa fa-pencil-square-o"></i></a>&nbsp;<a href="<?php echo ADMIN_SITE_URL?>staff/delete/<?php echo $val['id'] ?>"><i class="fa fa-trash-o"></i></a></td>
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