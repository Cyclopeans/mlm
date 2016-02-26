<div class="navbar">
    <div class="navbar-inner container">
        <div class="sidebar-pusher">
            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="logo-box">
            <a href="index-2.html" class="logo-text"><span>MLM SECURE SYSTEM</span></a>
        </div><!-- Logo Box -->        
        <div class="topmenu-outer">
            <div class="top-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                            <span class="user-name"><?php echo $this->session->userdata('first_name'); ?><i class="fa fa-angle-down"></i></span>
                            <img class="img-circle avatar" src="<?php echo ADMIN_IMAGE_PATH ?>avatar1.png" width="40" height="40" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-list" role="menu">
                            <li role="presentation"><a href="<?php echo ADMIN_SITE_URL; ?>staff/profile"><i class="fa fa-user"></i>Profile</a></li>
                            <li role="presentation"><a href="<?php echo ADMIN_SITE_URL ?>staff/logout"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                        </ul>
                    </li>                    
                </ul><!-- Nav -->
            </div><!-- Top Menu -->
        </div>
    </div>
</div><!-- Navbar -->
<div class="page-sidebar sidebar horizontal-bar">
    <div class="page-sidebar-inner">
        <ul class="menu accordion-menu">
            <li class="nav-heading"><span>Navigation</span></li>
            <li><a href="<?php echo ADMIN_SITE_URL ?>dashboard"><span class="menu-icon icon-speedometer"></span><p>Dashboard</p></a></li>
            <li class="droplink"><a href="<?php echo ADMIN_SITE_URL ?>staff"><span class="menu-icon icon-user"></span><p>Staff Management</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="<?php echo ADMIN_SITE_URL ?>staff">Staff Listing</a></li>
                    <li><a href="<?php echo ADMIN_SITE_URL ?>staff/add">Add New Staff</a></li>                                      
                </ul>
            </li>
            <li class="droplink"><a href="#"><span class="menu-icon icon-users"></span><p>Affiliates Management</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href=""></a>Add New Affiliate</li>
                    <li><a href="">All Affiliate Listing</a></li>
                    <li><a href="">Paid Affiliate Listing</a></li>
                    <li><a href="">Unpaid Affiliate</a></li>
                    <li><a href="">Blocked Affiliate</a></li>
                </ul>
            </li>
            <li class="droplink"><a href=""><span class="menu-icon icon-folder"></span><p>Genealogy</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="">Tree View</a></li>
                    <li><a href="">BInary Tree</a></li>
                    <li><a href="">Left Right Detail</a></li>
                    <li><a href="">Referrals Detail</a></li>
                </ul>
            </li>
            <li class="droplink"><a href=""><span class="menu-icon icon-briefcase"></span><p>Joining Code</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="<?php echo ADMIN_SITE_URL?>product">Product Management</a></li>
                    <li><a href="<?php echo ADMIN_SITE_URL?>epin">Create EPIN</a></li>
                    <li><a href="<?php echo ADMIN_SITE_URL?>epin"> EPIN  Request</a></li>
                    <li><a href="">Joining Code Detail</a></li>
                    <li><a href="">Cancel Joining Code</a></li>
                    <li><a href="">Transfer Report</a></li>
                </ul>
            </li>
            <li class="droplink"><a href="#"><span class="menu-icon icon-bar-chart"></span><p>Payment</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="">Payment Due</a></li>
                    <li><a href="">Payment Details</a></li>
                </ul>
            </li>
            <li class="droplink"><a href="#"><span class="menu-icon icon-wallet"></span><p>E-Wallet</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="">Wallet Details</a></li>
                    <li><a href="">Wallet Transaction</a></li>
                    <li><a href="">Fund Request Details</a></li>
                    <li><a href="">Issue Fund Request</a></li>
                    </ul>
            </li>
            <li class="droplink"><a href="#"><span class="menu-icon icon-envelope-open"></span><p>Email Management</p><span class="arrow"></span></a>
                <ul class="sub-menu">
                    <li><a href="<?php echo ADMIN_SITE_URL?>email/index">Email Template</a></li>
                    <li><a href="<?php echo ADMIN_SITE_URL?>email/sendemail">Send Email</a></li>
                </ul>
            </li>
            <li><a href=""><span class="menu-icon icon-settings"></span><p>Settings</p></a></li>
            
        </ul>
    </div><!-- Page Sidebar Inner -->
</div><!-- Page Sidebar -->