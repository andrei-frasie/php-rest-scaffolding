<?php

define('INDEX_PATH', __DIR__ . '/');
define('DEMO_PATH', dirname(INDEX_PATH) . '/');
define('ROOT_PATH', dirname(DEMO_PATH) . '/');
define('SRC_PATH', ROOT_PATH . 'src/');

require SRC_PATH . "rest.module.php";

ApplicationBootstraper::bootstrap();
