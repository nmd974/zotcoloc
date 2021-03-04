<div class="d-flex flex-column justify-content-center align-lg-items-center unshow_step" id="logs_tab_content">
    <pre class="mt-5">
        <?php 
            $file = __ROOT__ . '/src/app.log';
            $logs = file_get_contents($file);
            echo $logs;
        ?>
    </pre>
</div>