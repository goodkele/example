<?php 

namespace aku\core\log;

use Psr\Log\LoggerInterface;

class Log {

    private static $logger;

    /**
     * 设置log
     *
     * @param LoggerInterface $logger
     */
    public static function setLogger(LoggerInterface $logger)
    {
        self::$logger = $logger;
    }

    /**
     * 用上下文信息替换记录信息中的占位符
     *
     * @param string $message
     * @param array $context
     * @return string
     */
    public static function interpolate($message, array $context = array())
    {
        $replace = array();
        foreach ($context as $key => $val) {
            $replace['{' . $key . '}'] = $val;
        }
    
        return strtr($message, $replace);
    }

    /**
     * 系统不可用
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public static function emergency($message, array $context = array())
    {
        self::$logger->emergency(LogLevel::EMERGENCY, $message, $context);
    }

    /**
     *  **必须** 立刻采取行动
     *
     * 例如：在整个网站都垮掉了、数据库不可用了或者其他的情况下， **应该** 发送一条警报短信把你叫醒。
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public static function alert($message, array $context = array())
    {
        self::$logger->alert(LogLevel::ALERT, $message, $context);
    }

    /**
     * 紧急情况
     *
     * 例如：程序组件不可用或者出现非预期的异常。
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public static function critical($message, array $context = array())
    {
        self::$logger->critical(LogLevel::CRITICAL, $message, $context);
    }

    /**
     * 运行时出现的错误，不需要立刻采取行动，但必须记录下来以备检测。
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public static function error($message, array $context = array())
    {
        self::$logger->error(LogLevel::ERROR, $message, $context);
    }

    /**
     * 出现非错误性的异常。
     *
     * 例如：使用了被弃用的API、错误地使用了API或者非预想的不必要错误。
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public static function warning($message, array $context = array())
    {
        self::$logger->warning(LogLevel::WARNING, $message, $context);
    }

    /**
     * 一般性重要的事件。
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public static function notice($message, array $context = array())
    {
        self::$logger->notice(LogLevel::NOTICE, $message, $context);
    }

    /**
     * 重要事件
     *
     * 例如：用户登录和SQL记录。
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public static function info($message, array $context = array())
    {
        self::$logger->info(LogLevel::INFO, $message, $context);
    }

    /**
     * debug 详情
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public static function debug($message, array $context = array())
    {
        self::$logger->debug(LogLevel::DEBUG, $message, $context);
    }

    /**
     * 任意等级的日志记录
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
     */
    public static function log($level, $message, array $context = array())
    {
        $datetime = date_create();
        $premsg = '[{pid}][{datetime}][{route}]';
        $precontext = [
            'pid' => getmypid(),
            'datetime' => date_format($datetime, 'Y-m-d H:i:s.u'),
            'route' => null,
        ];

        $premsg = self::interpolate($premsg, $precontext);

        self::$logger->log(LogLevel::DEBUG, $premsg . $message, $context);
    }

}