<?php
namespace Src\Commons;

class Debug
{
    public static function dd($arg)
    {
        echo '<pre>';
        var_dump($arg);
        echo '</pre>';
        exit;
    }
}