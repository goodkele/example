<?php

namespace aku\core;

class Registry {

    private static $data;

    /**
     * 删除
     *
     * @param $name
     */
    public static function del($name)
    {
        unset(self::$data[$name]);
    }

    /**
     * 获得
     *
     * @param $name
     * @return mixed
     */
    public static function get($name)
    {
        return self::$data[$name];
    }

    /**
     * 是否存在
     *
     * @param $name
     * @return bool
     */
    public static function has($name)
    {
        return isset(self::$data[$name]);
    }

    /**
     * 设置
     *
     * @param $name
     * @param $value
     * @return bool
     */
    public static function set($name, $value)
    {
        self::$data[$name] = $value;
        return true;
    }

}