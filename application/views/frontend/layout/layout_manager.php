<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view("frontend/layout/header"); ?>
    </head>
    <body class="<?php echo ((isset($layout_section) && $layout_section == 'login') ? 'page-login' : 'page-header-fixed compact-menu page-horizontal-bar') ?>">
        <?php if (isset($layout_section) && $layout_section == 'login') { ?> 
        <main class="page-content">
            <?php echo $content_for_layout; ?>
        </main>
    <?php } else {
        ?>      

        <main class="page-content content-wrap">
            <?php $this->load->view('frontend/layout/topmenu'); ?>
            <div class="page-inner">
                <?php echo $content_for_layout; ?>
                <?php $this->load->view('frontend/layout/footer'); ?>
            </div>
            
        </main>
        <?php
    }
    ?>
    <?php $this->load->view('frontend/layout/footer_js'); ?>
</body>
</html>
