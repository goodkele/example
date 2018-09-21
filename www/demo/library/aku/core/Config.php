<?php
namespace aku\core;

class Config {

    private $data;

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

        $data = parse_ini_file($filename, true);

        $this->data = array_merge($data['app'], $data[$data['app']['environ'] . ':app']);
    }

    /**
     * 返回数组
     *
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }

}