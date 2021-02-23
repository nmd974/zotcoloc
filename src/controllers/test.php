<?php
require_once(dirname(__DIR__).'/vendor/autoload.php');
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

$logger = new Logger('channel-name');
$logger->pushHandler(new StreamHandler(dirname(__DIR__).'/log.log', Logger::DEBUG));
$logger->info('This is a log! ^_^ ');
$logger->warning('This is a log warning! ^_^ ');
$logger->error('This is a log error! ^_^ ');