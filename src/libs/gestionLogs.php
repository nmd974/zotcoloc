<?php

require_once(__ROOT__ . '/src/vendor/autoload.php');
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

$log_file = __ROOT__ . '/src/app.log';
$logger = new Logger('application-generale');
$logger->pushHandler(new StreamHandler($log_file, Logger::DEBUG));