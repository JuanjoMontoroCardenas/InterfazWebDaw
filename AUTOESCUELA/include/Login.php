<?php
require_once "Session.php";
require_once "GBD.php";
class Login
{
    public static function Identifica(string $user, string $password, bool $recuerdame)
    {
        if(self::Existeusuario($user, $password))
        {
            Session::start();
            Session::write('login', $user); 
            
            if($recuerdame)
            {
                setcookie('recuerdameUser', $user, time()+30*24*60*60);
                setcookie('recuerdamePassword', $password, time()+30*24*60*60);
            }
            return true;
        }
        return false;
    }

    private static function ExisteUsuario(string $user, string $password)
    {
        DB::connect();
        return DB::existeUsuario($user, $password);
    }

    public static function UsuarioEstaLogueado()
    {
        if(Session::read('login'))
        {
            return true;
        }
        else if(isset($_COOKIE['recuerdameUser']) && self::ExisteUsuario($_COOKIE['recuerdameUser'], $_COOKIE['recuerdamePassword']))
        {
            Session::start();
            Session::write('login', $_COOKIE['recuerdame']);
            return true;
        }
        return false;
    }
}