<?php
namespace aku\core;

class Application {

    private static $instance;

    private $config;

    private $bootstrap;

    /**
     * 单件方法
     *
     * @return Application
     */
    public static function app()
    {
        return self::$instance;
    }

    /**
     * 构造函数
     *
     * @param null $filename
     */
    public function __construct($filename = null)
    {
        if (empty($filename)) {
            throw new Exception("Application filename is empty.");
        }

        if (self::$instance === null) {
            self::$instance = $this;
        }

        $this->config = new Config($filename);

    }

    /**
     * 获得Config对象
     *
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * 注册启动器
     */
    public function bootstart(Bootstrap_Abstract $bootstrap)
    {

        $this->bootstrap = $bootstrap;
        return $this;
    }

    /**
     * 运行
     */
    public function run()
    {

        try {

        } catch (Exception $e) {

        }
    }

}