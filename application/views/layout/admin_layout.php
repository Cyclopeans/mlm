<?php
//$object = & get_instance();
//$object->load->library("carabiner");
//$carabiner_config = array(
//    'script_dir' => 'public/js/',
//    'style_dir' => 'public/css/',
//    'cache_dir' => 'public/cache/',
//    'base_uri' => base_url(),
//    'combine' => TRUE,
//    'dev' => TRUE,
//    'minify_js' => TRUE,
//    'minify_css' => TRUE
//);
//
//$object->carabiner->config($carabiner_config);

$this->load->view("admin/common/header.php");
?>
<div>
    <?php echo $content_for_layout; ?>	
</div>
<?php
$this->load->view("admin/common/footer.php");
?>