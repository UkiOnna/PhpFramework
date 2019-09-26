<?php
/**
 * Created by PhpStorm.
 * User: СикировТ
 * Date: 26.09.2019
 * Time: 20:09
 */

namespace classes;


final class Vars
{
    private static $vars = [];

    private function __construct()
    {
    }

    static function set($key, $value)
    {
        self::$vars[$key] = $value;
    }

    static function get($key)
    {
        return self::$vars[$key];
    }
}