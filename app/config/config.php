<?php
$router = require_once APP_PATH. D_S . 'config' . D_S . 'router.php';
$db = require_once APP_PATH. D_S . 'config' . D_S . 'db.php';

return [
    'defoultController' => 'site',
    'defoultAction' => 'index',
    'routers' => $router,
    'db' => $db,
];