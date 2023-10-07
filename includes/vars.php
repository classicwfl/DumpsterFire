<?php

require dirname(__FILE__) . '/../vendor/autoload.php';

$envPath = dirname(__FILE__) . '/../';

$dotenv = Dotenv\Dotenv::createImmutable($envPath);
$dotenv->load();