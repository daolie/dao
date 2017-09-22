<?php

require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'path.php';

require VENDOR_PATH.D_S.'autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
$config = require_once APP_PATH.D_S.'config'.D_S.'config.php';

$application = new \vendor\dao\web\Application($config);

$application->run();