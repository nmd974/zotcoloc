<?php if(empty($_GET["id"])){
    header('Location: home.php');
    }?>
<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>


<div id="wrapper_page_content">
    <pre>
        <?php 
            $file = __ROOT__ . '/src/app.log';
            file_get_contents($file);
        ?>
    </pre>
</div>

<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>