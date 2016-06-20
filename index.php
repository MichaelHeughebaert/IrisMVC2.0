<?php
/**
 * This is the index page, all traffic is routed though this page.
 */

namespace IrisMVC;

require '../config.php';

use IrisMVC\libs\bootstrap;

$bootstrap = new Bootstrap();
$bootstrap->init();