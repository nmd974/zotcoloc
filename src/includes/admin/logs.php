<pre class="mt-5">
<?php 
$file = __ROOT__ . '/src/app.log';
$logs = file_get_contents($file);
echo $logs;
?>
</pre>