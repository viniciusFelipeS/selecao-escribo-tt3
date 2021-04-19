<?php

namespace App\Model\Session;

final class Session
{
    private static function start()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public static function set($name, $value)
    {
       self::start();
        $_SESSION[$name] = $value;
    }


    public static function get($name)
    {
       self::start();
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }


    public static function kill($name)
    {
       self::start();
        unset($_SESSION[$name]);
    }

    public static function killAll()
    {
       self::start();
        session_destroy();
    }

    public static function isLogged()
    {
       self::start();
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

}
