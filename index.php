<?php

spl_autoload_register(function ($class) {
    $parts = explode('\\', $class);
    require implode('/', $parts) . '.php';
});

require '../config.php';

use libs\bootstrap;

$bootstrap = new Bootstrap();
$bootstrap->init();