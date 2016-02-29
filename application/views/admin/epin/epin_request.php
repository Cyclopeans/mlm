<div class="page-breadcrumb">
    <ol class="breadcrumb container">
        <li><a href="<?php echo ADMIN_SITE_URL ?>dashboard">Home</a></li>
        <li><a href="<?php echo ADMIN_SITE_URL ?>product">EPIN</a></li>        
        <li><a href="">EPIN Request</a></li>        
    </ol>
</div>
<div class="page-title">
    <div class="container">
        <h3><?php echo $title ?></h3>
    </div>
</div>
<div class="container" id="main-wrapper">   
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-white">
                <div class="panel-body">
                    <?php if ($this->session->flashdata('success_message')) { ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success_message'); ?>
                        </div>
                    <?php } ?>
                    <a href="<?php echo ADMIN_SITE_URL ?>epin/add"><button class="btn btn-success btn-addon m-b-sm" type="button"><i class="fa fa-plus"></i> Add New Epin</button></a>
                    <?php if (!empty($epin_request_data)) { ?>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>  
                                        <th>No.</th>
                                        <th>Affiliate Email</th>
                                        <th>Total Epin request</th>
                                        <th>Requested Date</th>
                                        <!--<th>Status</th>-->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($epin_request_data as $val) { ?>
                                        <tr> 
                                            <td><?php echo ++$page ?></td>                                 
                                            <td><?php echo $val['email'] ?></small></td>
                                            <td><?php echo $val['number_of_epin'] ?></td>
                                            <td><?php echo $val['created_date'] ?></td>
                                            <!--<td><?php echo $val['status'] ?></td>-->     
                                            <?php if($val['status']=='completed'){?>
                                            <td><span class="label label-success">Request Completed</span></td>
                                            <?php }else{?>
                                            <td><a alt="generate requested Epin" href="<?php echo SITE_URL ?>admin/epin/add_epin_request/<?php echo $val['id'] ?>"><span class="label label-primary">Process EPIN</span></a>&nbsp;<a alt="delete request" href="<?php echo ADMIN_SITE_URL ?>epin/epin_request_delete/<?php echo $val['id'] ?>"><span class="label label-danger">delete</span></a></td>
                                            <?php }?>
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