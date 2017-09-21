<?php

require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'path.php';

require VENDOR_PATH.D_S.'autoload.php';

require_once VENDOR_PATH.D_S.'core'.D_S.'Router.php';

Router::run();
