<?php
class Session
{
    public static function start()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
    }

    public static function read(string $clave)
    {
        return isset($_SESSION[$clave])?$_SESSION[$clave]:"";
    }

    public static function exist(string $clave)
    {
        return isset($_SESSION[$clave])?true:false;
    }

    public static function write($clave, $valor)
    {
        $_SESSION[$clave]=$valor;
    }

    public static function delete($clave)
    {
        unset($_SESSION[$clave]);
    }

    public static function destroy()
    {
        session_destroy();
    }
}