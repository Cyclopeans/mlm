
<div class="page-inner">
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-3 center">
                <div class="login-box">
                    <a href="" class="logo-name text-lg text-center">MLM SECURE SYSTEM</a>
                    <p class="text-center m-t-md">Please login into your account.</p>
                    <form id="loginfrm" class="m-t-md" action="" method="post">
                        <?php if (validation_errors() != false || isset($common_error)) { ?>
                            <div class="alert alert-danger">
                                <?php echo (isset($common_error)?$common_error:''); ?>
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('success_message')) { ?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success_message'); ?>
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <input name="username" type="text" class="form-control" placeholder="username" >
                            <div id="username_error"></div>
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Password" >
                            <div id="password_error"></div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Login</button>
                    </form>
                    <p class="text-center m-t-xs text-sm">2016 &copy; MLM by cyclopeansystems.</p>
                </div>
            </div>
        </div><!-- Row -->
    </div><!-- Main Wrapper -->
</div><!-- Page Inner -->
