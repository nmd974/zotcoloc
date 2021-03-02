<?php require_once(dirname(__DIR__).'/includes/Layout/header.php');?>
<div id="wrapper_page_content">
    <pre class="mt-5">
        <?php 
            $file = __ROOT__ . '/src/app.log';
            $logs = file_get_contents($file);
            echo $logs;
        ?>
    </pre>
</div>
<?php require_once(dirname(__DIR__).'/includes/Layout/footer.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/scriptsSrc.php');?>
<?php require_once(dirname(__DIR__).'/includes/Layout/finbalise.php');?>