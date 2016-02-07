<!DOCTYPE html>
<html>   

<head>
        
        <!-- Title -->
        <title>Modern | Login - Sign in</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='../../fonts.googleapis.com/css8b01.css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href="<?php echo base_url() ?>assets/admin/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="<?php echo base_url() ?>assets/admin/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="<?php echo base_url() ?>assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>assets/admin/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>assets/admin/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/> 
        <link href="<?php echo base_url() ?>assets/admin/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>  
        <link href="<?php echo base_url() ?>assets/admin/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>assets/admin/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/> 
        
        <!-- Theme Styles -->
        <link href="<?php echo base_url() ?>assets/admin/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>assets/admin/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="<?php echo base_url() ?>assets/admin/plugins/3d-bold-navigation/js/modernizr.js"></script>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-login">
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                                <a href="index-2.html" class="logo-name text-lg text-center">Modern</a>
                                <p class="text-center m-t-md">Please login into your account.</p>
                                <!-- Alert Messages  -->
                                <?php echo $this->session->flashdata('message'); ?>
                                <form class="m-t-md" action="<?php echo base_url()."admin/login"?>" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username" name="user_name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block" name="submit">Login</button>
                                    <a href="" class="display-block text-center m-t-md text-sm">Forgot Password?</a>
                                    
                                </form>
                                <p class="text-center m-t-xs text-sm">2015 &copy; Modern by Steelcoders.</p>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
    

        <!-- Javascripts -->
        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/pace-master/pace.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/switchery/switchery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/classie/classie.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/plugins/waves/waves.min.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/js/modern.min.js"></script>

</body>

</html>