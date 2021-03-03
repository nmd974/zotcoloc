<?php 
    if($_SESSION['role'] != "administrateur"){
        header("Location: ./home.php");
    }
?>
<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<div id="wrapper_page_content">
    <?php require_once(__ROOT__ . '/src/includes/admin/logs.php');?>
</div>
<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>