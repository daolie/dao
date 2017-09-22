<?php
namespace lib;

use Seaslog;
use vendor\dao\Dao;

/**
 * Seaslog
 */
class Dtedulog
{
	/**
	 * 日志级别
	 * @var [type]
	 */
    private static $_levels = [
        'debug'     => SEASLOG_DEBUG,
        'info'      => SEASLOG_INFO,
        'notice'    => SEASLOG_NOTICE,
        'warning'   => SEASLOG_WARNING,
        'error'     => SEASLOG_ERROR,
        'critical'  => SEASLOG_CRITICAL,
        'alert'     => SEASLOG_ALERT,
        'emergency' => SEASLOG_EMERGENCY,
    ];
    /**
     * Seaslog日志模块
     * @var [type]
     */
    private static $_module;

    public $seas;

    public function __construct()
    {
        
        $this->seas    = new Seaslog;
        $controller    = Dao::$app->controller;
        $action        = Dao::$app->action;
        self::$_module = $controller . DIRECTORY_SEPARATOR . $action;
        Seaslog::setBasePath(LOG_PATH);
        Seaslog::setLogger(self::$_module);
    }

    /**
     * [write description]
     * @param  string $level   日志级别
     * @param  string $message 消息
     * @param  array  $content [description]
     * @param  string $module  模块
     * @return [type]          [description]
     */
    public function write($level = 'info', $message = '', array $content = array(), $module = '')
    {
        if (!$module) {
            $module = self::$_module;
        }
        if (!isset(self::$_levels[$level])) {
            $level = 'info';
        }
        Seaslog::log(self::$_levels[$level], $message, $content, $module);
    }
}
